<?php

include("config.php");

$_POST = json_decode(file_get_contents('php://input'), true);
$one_signal_app_id="one_signal_app_id";
$one_signal_server_id="one_signal_server_id";
$firebase_realtime_database_url = "firebase_realtime_database_url";


class RiderObject {
  
  public $user_id;
  public $user_name;
  public $user_picture;
  public $car_brand;
  public $car_name;
  public $car_colour;
  public $car_number_plate;
  public $rider_latitude;
  public $rider_longitude;
  public $direction_route;

 }

function queryRunner($query){
 $result=mysql_query($query) OR die(mysql_error());
 return $result;
}

function countRow($result){

  return mysql_num_rows($result);
}

function rowRetriever($result){

  return mysql_fetch_assoc($result);
}

function rowRetrieverObject($result){

  return mysql_fetch_object($result);
}

function findLastInsertId(){

  return mysql_insert_id();
}


$table_name_ride_order = "RideOrder";

check_schedule_rides();


/*

  It is used tp assign Rating to Rider

*/
function check_schedule_rides(){


 $status_id = "2";
 $table=$GLOBALS['table_name_ride_order'];
 $query = "SELECT * FROM $table 
 WHERE  status = '2' AND schedule_date_created <= NOW() ";

 $result=queryRunner($query);
 while ($row = rowRetrieverObject($result)) {

    $order_id = $row -> id ;
  $ride_type_id = $row -> ride_type_id;
  $from_latitude = $row -> from_latitude;
    $from_longitude = $row -> from_longitude;

  $query_captain = "SELECT  captain.id , captain.name , captain.phone , ride_type.id as ride_type_id ,ride_type.name as ride_type_name,tracking.latitude,tracking.longitude,
       MIN(ROUND(SQRT(
        POW(69.1 * (tracking.latitude - $from_latitude), 2) +
        POW(69.1 * ($from_longitude - tracking.longitude) * COS(tracking.latitude / 57.3), 2)),1)) AS distance
      FROM Tracking as tracking
      INNER JOIN Captain as captain ON captain.id = tracking.term_id AND captain.enable = '0' AND captain.status = '0' AND captain.live = '0' AND captain.ride_type_id = '$ride_type_id'
      INNER JOIN RideType as ride_type ON ride_type.id = captain.ride_type_id AND ride_type.enable = '0' 
      INNER JOIN Location as location ON location.id = ride_type.place_id AND location.enable = '0' 
      INNER JOIN Country as country ON country.id = location.country_id AND country.enable = '0' 
      HAVING distance <= '4' ";
    $result_captain=queryRunner($query_captain);
    while ($row_captain = rowRetrieverObject($result_captain)) { 
          $captain_id =  $row_captain -> id;
          
    }

    if (countRow($result_captain)>0) {

        update_firebase_order($order_id,$captain_id);
          update_captain_id($order_id,$captain_id);

    }
  
  }


}



function update_firebase_order($order_id,$captain_id){


  $realtime_db_url = $GLOBALS['firebase_realtime_database_url'];

  $query="SELECT captain.id , captain.name , captain.picture , car_detail.brand_name as car_brand , car_detail.car_name , 
  car_detail.car_colour , car_detail.car_number_plate , tracking.latitude , tracking.longitude,captain.device_token
  FROM Captain as captain 
  INNER JOIN CaptainMeta as car_detail ON car_detail.term_id = captain.id
  INNER JOIN Tracking as tracking ON tracking.term_id = car_detail.term_id  
  WHERE captain.id = '$captain_id' AND captain.enable = '0' ";
  ///echo $query;

  $result=queryRunner($query);
  while ($row = rowRetrieverObject($result)) { 
        $captain_id = (int) $row -> id;
        $captain_name = $row -> name;
        $captain_picture = $row -> picture;
        $car_brand = $row -> car_brand;
        $car_name = $row -> car_name;
        $car_colour = $row -> car_colour;
        $car_number_plate = $row -> car_number_plate;
        $latitude = $row -> latitude;
        $longitude = $row -> longitude;
        $device_token = $row -> device_token;
  }


  $riderObject = new RiderObject();
  $riderObject -> user_id = $captain_id;
  $riderObject -> user_name = $captain_name;
  $riderObject -> user_picture = $captain_picture;
  $riderObject -> car_brand = $car_brand;
  $riderObject -> car_name = $car_name;
  $riderObject -> car_colour = $car_colour;
  $riderObject -> car_number_plate = $car_number_plate;
  $riderObject -> rider_latitude = floatval($latitude);
  $riderObject -> rider_longitude = floatval($longitude);
  $riderObject -> direction_route = "null";

  $newJsonString = json_encode($riderObject);
   
   $firebase_url = $realtime_db_url."$order_id"."/riderObject.json";

   $curl = curl_init();
   curl_setopt_array($curl, array(
              CURLOPT_URL => $firebase_url,
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 100,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => "PATCH",
              CURLOPT_POSTFIELDS => $newJsonString,
              CURLOPT_HTTPHEADER => array(
                  "cache-control: no-cache"
              ),
          ));
   $response = curl_exec($curl);
   $err = curl_error($curl);

   curl_close($curl);
   sendNotificationToUser($device_token,true);

}


function update_captain_id($order_id,$captain_id){

 $table=$GLOBALS['table_name_ride_order'];
 $query = "UPDATE $table SET captain_id = '$captain_id' , status = '1' WHERE id = '$order_id' ";
 $result=queryRunner($query);

}



function sendNotificationToUser($device_token,$isCaptain){


     if ($isCaptain) {
        $message = "You received an order";
     }else{
         $message = "Captain is on its ways to your pickup location";
     }
  
     
     $content = array(
            "en" => $message
            );

      $fields = array(
            'app_id' => $GLOBALS['one_signal_app_id'] ,
            'include_player_ids' => array($device_token),
            'large_icon' =>"ic_launcher_round.png",
            'contents' => $content
        );

        $fields = json_encode($fields);
        //print("\nJSON sent:\n");
        //print($fields);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
                                                   'Authorization: Basic '.$GLOBALS['one_signal_server_id'] ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);    

        $response = curl_exec($ch);
        curl_close($ch);

  
}








?>