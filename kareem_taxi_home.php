<?php
# For the configuration of Database
include("config.php");
require_once('stripe-php/init.php');


$one_signal_app_id="one_signal_app_id";
$one_signal_server_id="one_signal_server_id";
$mapbox_access_token = "mapbox_access_token";
$firebase_realtime_database_url = "firebase_realtime_database_url";
$stripe_public_token = "stripe_public_token";
$stripe_private_token = "stripe_private_token"; 

$table_name_location="Location";
$table_name_country="Country";
$table_name_payment="PaymentType";
$table_name_ride_meta="RideTypeMeta";
$table_name_coupon="Coupon";
$table_name_user_payment="UserPayment";
$table_name_ride_order = "RideOrder";
$table_name_captain = "Captain";
$table_name_rating = "Rating";
$table_name_user="User";
$table_name_captain_document="CaptainDocuments";
$table_name_captain_bank="CaptainBankDetail";
$table_name_tracking="Tracking";
$table_name_ride_category="RideCategory";
$table_name_policy="Policy";






$_POST = json_decode(file_get_contents('php://input'), true);

if (isset($_POST["functionality"])) {
$object=$_POST["functionality"];
}


/*if (isset($_SERVER['HTTP_AUTHORIZED_API_KEY'])){
	$apiKey=$_SERVER['HTTP_AUTHORIZED_API_KEY'];


	if(!checkApiKeyVerification( validate($apiKey) ) ){
		$object="failed";	



	}	

}else{
	$object="failed";
  
}*/

//echo "Working ".$object;

if (isset($_POST["comment"])) {
	
 $comment=validate($_POST["comment"]);
 $comment=mysql_real_escape_string($comment);


}

if (isset($_POST["latitude"]) && !empty($_POST["latitude"])) {
   $latitude=$_POST["latitude"];

}

if (isset($_POST["longitude"]) && !empty($_POST["longitude"]) ) {
   $longitude=$_POST["longitude"];

}

if (isset($_POST["city"]) && !empty($_POST["city"]) ) {
   $city=$_POST["city"];

}

if (isset($_POST["place_id"]) && !empty($_POST["place_id"]) ) {
   $place_id=$_POST["place_id"];

}


if (isset($_POST["radius"]) && !empty($_POST["radius"]) ) {
   $radius=$_POST["radius"];

}

if (isset($_POST["skip_ids"]) && !empty($_POST["skip_ids"]) ) {
   $skip_ids=$_POST["skip_ids"];

}

if (isset($_POST["rating"]) && !empty($_POST["rating"]) ) {
   $rating=$_POST["rating"];

}

if (isset($_POST["expense"]) && !empty($_POST["expense"]) ) {
   $expense=$_POST["expense"];

}

if (isset($_POST["restaurant_id"]) && !empty($_POST["restaurant_id"]) ) {
   $restaurant_id=$_POST["restaurant_id"];

}

if (isset($_POST["category_id"]) && !empty($_POST["category_id"]) ) {
   $category_id=$_POST["category_id"];

}

if (isset($_POST["search_term"]) && !empty($_POST["search_term"]) ) {
   $search_term=$_POST["search_term"];

}

if (isset($_POST["user_id"]) && !empty($_POST["user_id"]) ) {
   $user_id=$_POST["user_id"];

}

if (isset($_POST["review"]) && !empty($_POST["review"]) ) {
   $review=$_POST["review"];

}

if (isset($_POST["review_pictures"]) && !empty($_POST["review_pictures"]) ) {
   $review_pictures=$_POST["review_pictures"];

}

if (isset($_POST["product_id"]) && !empty($_POST["product_id"]) ) {
   $product_id=$_POST["product_id"];

}

if (isset($_POST["inventory_id"]) && !empty($_POST["inventory_id"]) ) {
   $inventory_id=$_POST["inventory_id"];

}

if (isset($_POST["attribute_id"]) && !empty($_POST["attribute_id"]) ) {
   $attribute_id=$_POST["attribute_id"];

}

if (isset($_POST["order_type"]) && !empty($_POST["order_type"]) ) {
   $order_type=$_POST["order_type"];

}

if (isset($_POST["quantity"]) && !empty($_POST["quantity"]) ) {
   $quantity=$_POST["quantity"];

}

if (isset($_POST["coupon_code"]) && !empty($_POST["coupon_code"]) ) {
   $coupon_code=$_POST["coupon_code"];

}


if (isset($_POST["coupon_id"]) && !empty($_POST["coupon_id"]) ) {
   $coupon_id=$_POST["coupon_id"];

}

if (isset($_POST["category"]) && !empty($_POST["category"]) ) {
   $category=$_POST["category"];

}

if (isset($_POST["card_no"]) && !empty($_POST["card_no"]) ) {
   $card_no=$_POST["card_no"];

}

if (isset($_POST["card_company"]) && !empty($_POST["card_company"]) ) {
   $card_company=$_POST["card_company"];

}

if (isset($_POST["stripe_customer_id"]) && !empty($_POST["stripe_customer_id"]) ) {
   $stripe_customer_id=$_POST["stripe_customer_id"];

}


if (isset($_POST["order_price"]) && !empty($_POST["order_price"]) ) {
   $order_price=$_POST["order_price"];

}

if (isset($_POST["discount_id"]) && !empty($_POST["discount_id"]) ) {
   $discount_id=$_POST["discount_id"];

}

if (isset($_POST["billing_address"]) && !empty($_POST["billing_address"]) ) {
   $billing_address=$_POST["billing_address"];

}

if (isset($_POST["building_no"]) && !empty($_POST["building_no"]) ) {
   $building_no=$_POST["building_no"];

}

if (isset($_POST["area_name"]) && !empty($_POST["area_name"]) ) {
   $area_name=$_POST["area_name"];

}

if (isset($_POST["floor_name"]) && !empty($_POST["floor_name"]) ) {
   $floor_name=$_POST["floor_name"];

}

if (isset($_POST["rider_note"]) && !empty($_POST["rider_note"]) ) {
   $rider_note=$_POST["rider_note"];

}

if (isset($_POST["delivery_date"]) && !empty($_POST["delivery_date"]) ) {
   $delivery_date=$_POST["delivery_date"];

}

if (isset($_POST["no_of_product"]) && !empty($_POST["no_of_product"]) ) {
   $no_of_product=$_POST["no_of_product"];

}

if (isset($_POST["latitude"]) && !empty($_POST["latitude"]) ) {
   $latitude=$_POST["latitude"];

}

if (isset($_POST["longitude"]) && !empty($_POST["longitude"]) ) {
   $longitude=$_POST["longitude"];

}

if (isset($_POST["first_name"]) && !empty($_POST["first_name"])) {
  $fname=$_POST["first_name"];
}

if (isset($_POST["last_name"]) && !empty($_POST["last_name"])) {
  $lname=$_POST["last_name"];

}

if (isset($_POST["email"]) && !empty($_POST["email"])) {
  $email=$_POST["email"];
}

if (isset($_POST["picture"]) && !empty($_POST["picture"])) {
  $avatar=$_POST["picture"];
}

if (isset($_POST["password"]) && !empty($_POST["password"])) {
  $password=$_POST["password"];
}


if (isset($_POST["userType"]) && !empty($_POST["userType"])) {
  $userType=$_POST["userType"];

}

if (isset($_POST["uid"]) && !empty($_POST["uid"])) {
   $uid=$_POST["uid"];

}

if (isset($_POST["device_id"]) && !empty($_POST["device_id"])) {
   $deviceId=$_POST["device_id"];

}

if (isset($_POST["phone"]) && !empty($_POST["phone"])) {
   $phone=$_POST["phone"];

}

if (isset($_POST["stripe_token"]) && !empty($_POST["stripe_token"])) {
   $stripe_token=$_POST["stripe_token"];
   
}

if (isset($_POST["payment_card_id"]) && !empty($_POST["payment_card_id"])) {
   $payment_card_id=$_POST["payment_card_id"];
   
}

if (isset($_POST["payment_type"]) && !empty($_POST["payment_type"])) {
   $payment_type=$_POST["payment_type"];
   
}

if (isset($_POST["delivery_time"]) && !empty($_POST["delivery_time"])) {
   $delivery_time=$_POST["delivery_time"];
   
}

if (isset($_POST["rider_id"]) && !empty($_POST["rider_id"])) {
   $rider_id=$_POST["rider_id"];
   
}

if (isset($_POST["order_id"]) && !empty($_POST["order_id"])) {
   $order_id=$_POST["order_id"];
   
}

if (isset($_POST["document_id"]) && !empty($_POST["document_id"])) {
   $document_id=$_POST["document_id"];
   
}


if (isset($_POST["document_picture"]) && !empty($_POST["document_picture"])) {
   $document_picture=$_POST["document_picture"];
   
}


if (isset($_POST["holder_name"]) && !empty($_POST["holder_name"])) {
   $holder_name=$_POST["holder_name"];
   
}

if (isset($_POST["account_no"]) && !empty($_POST["account_no"])) {
   $account_no=$_POST["account_no"];
   
}

if (isset($_POST["transist_no"]) && !empty($_POST["transist_no"])) {
   $transist_no=$_POST["transist_no"];
   
}

if (isset($_POST["bank_no"]) && !empty($_POST["bank_no"])) {
   $bank_no=$_POST["bank_no"];
   
}


if (isset($_POST["holder_name_id"]) && !empty($_POST["holder_name_id"])) {
   $holder_name_id=$_POST["holder_name_id"];
   
}

if (isset($_POST["account_no_id"]) && !empty($_POST["account_no_id"])) {
   $account_no_id=$_POST["account_no_id"];
   
}

if (isset($_POST["transist_no_id"]) && !empty($_POST["transist_no_id"])) {
   $transist_no_id=$_POST["transist_no_id"];
   
}

if (isset($_POST["bank_no_id"]) && !empty($_POST["bank_no_id"])) {
   $bank_no_id=$_POST["bank_no_id"];
   
}

if (isset($_POST["rating"]) && !empty($_POST["rating"])) {
   $rating=$_POST["rating"];
   
}

if (isset($_POST["user_id"]) && !empty($_POST["user_id"])) {
   $user_id=$_POST["user_id"];
   
}

if (isset($_POST["ride_type_id"]) && !empty($_POST["ride_type_id"])) {
   $ride_type_id=$_POST["ride_type_id"];
   
}


if (isset($_POST["to_latitude"]) && !empty($_POST["to_latitude"])) {
   $to_latitude=$_POST["to_latitude"];

}

if (isset($_POST["to_longitude"]) && !empty($_POST["to_longitude"]) ) {
   $to_longitude=$_POST["to_longitude"];

}

if (isset($_POST["expiry_month"]) && !empty($_POST["expiry_month"]) ) {
   $expiry_month=$_POST["expiry_month"];

}


if (isset($_POST["expiry_year"]) && !empty($_POST["expiry_year"]) ) {
   $expiry_year=$_POST["expiry_year"];

}


if (isset($_POST["distance"]) && !empty($_POST["distance"]) ) {
   $distance=$_POST["distance"];

}


if (isset($_POST["price"]) && !empty($_POST["price"]) ) {
   $price=$_POST["price"];

}


if (isset($_POST["time"]) && !empty($_POST["time"]) ) {
   $time=$_POST["time"];

}

if (isset($_POST["currency_symbol"]) && !empty($_POST["currency_symbol"]) ) {
   $currency_symbol=$_POST["currency_symbol"];

}

if (isset($_POST["payment"]) && !empty($_POST["payment"]) ) {
   $payment=$_POST["payment"];

}

if (isset($_POST["customer_payment_id"]) && !empty($_POST["customer_payment_id"]) ) {
   $payment_customer_id=$_POST["customer_payment_id"];

}

if (isset($_POST["captain_id"]) && !empty($_POST["captain_id"]) ) {
   $captain_id=$_POST["captain_id"];

}

if (isset($_POST["from_address"]) && !empty($_POST["from_address"]) ) {
   $from_address=$_POST["from_address"];

}

if (isset($_POST["to_address"]) && !empty($_POST["to_address"]) ) {
   $to_address=$_POST["to_address"];

}

if (isset($_POST["schedule_date"]) && !empty($_POST["schedule_date"]) ) {
   $schedule_date=$_POST["schedule_date"];

}

if (isset($_POST["status"]) && !empty($_POST["status"]) ) {
   $status=$_POST["status"];

}

if (isset($_POST["from_date"]) && !empty($_POST["from_date"]) ) {
   $from_date=$_POST["from_date"];

}

if (isset($_POST["to_date"]) && !empty($_POST["to_date"]) ) {
   $to_date=$_POST["to_date"];

}

if (isset($_POST["document_type"]) && !empty($_POST["document_type"]) ) {
   $document_type=$_POST["document_type"];

}

if (isset($_POST["document_id"]) && !empty($_POST["document_id"]) ) {
   $document_id=$_POST["document_id"];

}

if (isset($_POST["car_brand"]) && !empty($_POST["car_brand"]) ) {
   $car_brand=$_POST["car_brand"];

}

if (isset($_POST["car_name"]) && !empty($_POST["car_name"]) ) {
   $car_name=$_POST["car_name"];

}

if (isset($_POST["car_colour"]) && !empty($_POST["car_colour"]) ) {
   $car_colour=$_POST["car_colour"];

}

if (isset($_POST["car_number_plate"]) && !empty($_POST["car_number_plate"]) ) {
   $car_number_plate=$_POST["car_number_plate"];

}

if (isset($_POST["address"]) && !empty($_POST["address"]) ) {
   $address=$_POST["address"];

}


if (isset($_POST["place_id"]) && !empty($_POST["place_id"]) ) {
   $place_id=$_POST["place_id"];

}


if (isset($_POST["car_category_id"]) && !empty($_POST["car_category_id"]) ) {
   $car_category_id=$_POST["car_category_id"];

}

if (isset($_POST["report"]) && !empty($_POST["report"]) ) {
   $report=$_POST["report"];

}




if ($object=="retrieve_ride_type") {
  # For retrieving home screen data
  retrieve_ride_type($latitude,$longitude,$city,$user_id);

}elseif ($object=="find_nearest_ride_distance") {
  # For retrieving home screen data
  find_nearest_ride_distance($latitude,$longitude,$ride_type_id);

}elseif ($object=="find_estimated_fare_price") {
  # For retrieving home screen data
  find_estimated_fare_price($latitude,$longitude,$to_latitude,$to_longitude,$ride_type_id);

}elseif ($object=="book_ride") {
  
  orderProduct($ride_type_id,$user_id,$from_address,$latitude,$longitude,$to_address,$to_latitude,$to_longitude,$distance,$price,$time,$currency_symbol,$payment,$payment_customer_id,false
    ,$schedule_date);

}elseif ($object=="schedule_ride") {
  
  orderProduct($ride_type_id,$user_id,$from_address,$latitude,$longitude,$to_address,$to_latitude,$to_longitude,$distance,$price,$time,$currency_symbol,$payment,$payment_customer_id,true
    ,$schedule_date);

}elseif ($object=="add_rider_rating") {
  
  giveRatingToRider($order_id,$captain_id,$rating,$review);

}elseif ($object=="order_schedule") {
  
  retrieve_all_history("2");

}elseif ($object=="order_history") {
  
  retrieve_all_history("4");

}elseif ($object=="update_name") {
  # For searching specific restaurants
  update_name($user_id,$fname,$lname);

}elseif ($object=="update_email") {
  # For searching specific restaurants
  update_email($user_id,$email);

}elseif ($object=="update_password") {
  # For searching specific restaurants
  update_password($user_id,$password);

}elseif ($object=="cancel_order") {
  # For searching specific restaurants
  cancel_order($order_id);

}elseif ($object=="current_ride") {
  
  retrieve_current_ride($user_id);

}elseif ($object=="test_firebase") {
  # For searching specific restaurants 
  addRecordIntoFirebase($order_id,$user_id,$captain_id,$latitude,$longitude,$to_latitude,$to_longitude);

}elseif ($object=="rider_current_order") {
  
  retrieve_current_ride_for_captain($rider_id);

}elseif ($object=="accept_reject_captain_ride") {
  
  accept_reject_ride($captain_id,$status);

}elseif ($object=="retrieve_all_countries") {
  # For searching specific restaurants
  retrieve_all_countries();

}elseif ($object=="retrieve_all_ride_category") {
  # For searching specific restaurants
  retrieve_all_ride_category();

}elseif ($object=="complete_ride") {
  
  complete_ride($order_id,$status);

}elseif ($object=="retrieve_captain_analytics") {
  
  retrieve_captain_earning_record($captain_id,$from_date,$to_date);

}elseif ($object=="retrieve_driving_license") {
  
  retrieve_driving_license($captain_id);

}elseif ($object=="retrieve_national_identity_card") {
  
  retrieve_national_identity_card($captain_id);

}elseif ($object=="retrieve_car_documents") {
  
  retrieve_car_documents($captain_id);

}elseif ($object=="retrieve_car_pictures") {
  
  retrieve_car_pictures($captain_id);

}elseif ($object=="delete_document") {
  # For registering User
  deleteRiderDocument($document_id);

}elseif ($object=="add_document") {
  # For registering User
  addDocumentsToRider($captain_id,$document_type,$document_picture);

}elseif ($object=="update_document") {
  # For registering User
  updateRiderDocuments($captain_id,$document_type,$document_id,$document_picture);

}elseif ($object=="retrieve_rider_bank_detail") {
  # For registering User
  getRiderBankDetail($captain_id);

}elseif ($object=="insert_bank_detail") {
  # For registering User
  insertRiderBankDetail($captain_id,$holder_name,$account_no,$transist_no,$bank_no);

}elseif ($object=="update_bank_detail") {
  # For registering User
  updateRiderBankDetail($captain_id,$account_id,$holder_name,$account_no,$transist_no,$bank_no);

}elseif ($object=="activate_rider") {
  # For registering User
  pushRiderStatus($captain_id,"0");

}elseif ($object=="deactivate_rider") {
  # For registering User
  pushRiderStatus($captain_id,"1");

}elseif ($object=="rider_login") {
  # For login use
  loginRider($email,$password);

}elseif ($object=="rider_register") {
  # For registering User 
  registerRider($email,$password,$fname,$avatar,$deviceId,$phone,$car_brand,$car_name,$car_colour,$car_number_plate,$address,$latitude,$longitude,$place_id,$car_category_id);

}elseif ($object=="forgot_rider_password") {
  # Reset password request
  forgotRiderPassword($email);

}elseif ($object=="update_captain_name") {
  # For searching specific restaurants
  update_captain_name($captain_id,$fname);

}elseif ($object=="update_captain_email") {
  # For searching specific restaurants
  update_captain_email($captain_id,$email);

}elseif ($object=="update_captain_password") {
  # For searching specific restaurants
  update_captain_password($captain_id,$password);

}elseif ($object=="update_captain_location") {
  # For searching specific restaurants
  update_captain_location($captain_id,$latitude,$longitude);

}elseif ($object=="verify_coupon") {
  # For searching specific restaurants
  verifyCoupon($coupon_code,$place_id);

}elseif ($object=="add_payment_cards") {
  # For searching specific restaurants
  addPaymentCards($user_id,$card_no,$card_company,$expiry_month,$expiry_year,$stripe_customer_id);

}elseif ($object=="report_ride") {
  # For searching specific restaurants
  report_ride($order_id,$report);

}elseif ($object=="login") {
  # For authenticate User
  login($email,$password,$userType,$uid);

}elseif ($object=="register") {
  # For registering User
  register($email,$password,$fname,$lname,$avatar,$userType,$uid,$deviceId,$phone);

}elseif ($object=="forgot_password") {
  # Reset password request
  forgotPassword($email);

}elseif ($object=="privacy") {
  # Reset password request
  retrieve_privacy_policy();

}








/*

It is used for formatting of Trending Data into Object

*/
class RideAndPayment 
{

  public $code="";
  public $message="";
  public $rideType=[];
  public $paymentType=[];
  public $configuration=[];
  public $captain=[];
  


} 




/*

It is used for formatting of Trending Data into Object

*/
class Captain 
{

  public $code="";
  public $message="";
  public $captain=[];
  


} 



/*

It is used for formatting of Trending Data into Object

*/
class PaymentDetail 
{

  public $company_name="";
  public $card_title="";
  public $card_number="";
  public $expiry_month="";
  public $expiry_year="";
  public $customer_no="";


} 




/*

It is used for formatting of Trending Data into Object

*/
class FareEstimation 
{

  public $code="";
  public $message="";
  public $estimatedFare="";
  public $estimatedDistance="";


} 




/*

It is used for formatting of Country list

*/
class Country 
{

  public $code="";
  public $message="";
  public $country_list=[];
  


} 


/*

It is used for formatting of Country list

*/
class History 
{

  public $code="";
  public $message="";
  public $history_list=[];
  


} 



/*

It is used for formatting of Country list

*/
class Statistics 
{

  public $code="";
  public $message="";
  public $statistics=[];
  


} 



class Profile {

  public $code;
  public $message;

}




 /*Firebase Database Strucutre functionality*/

 class FirebaseStructure {

  public $riderObject ;
  public $userObject;
  public $destinationObject;
  public $trackingObject;
  public $typingObject;
  
 }


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

 class TrackingObject {

   public $latitude = 0.0;
   public $longitude = 0.0 ;
   public $remaining_distance = "0 km";
   public $remaining_duration = "0 min";
   public $status =  "running";
   public $trip_price;
   public $company_percentage;

 }

 class DestinationObject {

   public $latitude = 0.0;
   public $longitude = 0.0 ;


 }

 class UserObject {

    public $user_id;
    public $user_latitude;
    public $user_longitude;
    public $user_name;
    public $user_picture;

 }

 class TypingObject {
    public $from = false;
    public $to = false;
 }




/*

It is used for formatting of Trending Data into Object

*/
class Home 
{

	public $code="";
	public $message="";
	public $featured=[];
    public $trending=[];
    public $nearest=[];


} 


/*

It is used for formatting of Category Data into Object

*/
class Category 
{

	public $code="";
	public $message="";
	public $categories=[];
    

}  



class Product 
{

    public $code="";
    public $message = "";
 	  public $products = [] ;
        

 }


 class ProductAttribute 
 {
  
    public $attribute_tagline;
    public $attribute_description;
    public $attribute_nature;
    public $attribute_type;
    public $attribute_selector;
    public $attribute ;
 }


 class ProductDetail 
 {
  
    public $product_name;
    public $product_quantity;
    public $product_price;
 }


  class DeliveryDetail 
 {
  
    public $code="";
    public $message="";
    public $delivery_charges = "";
 }



 class UserPaymentCards 
 {
  
    public $code;
    public $message;
    public $cards = [];

 }



class Review 
{

    public $code="";
    public $message = "";
 	public $reviews = [] ;
        

 }


 class RedeemCoin 
 {

   public $code = "";
   public $message = "";
   public $redeemCoinPrice ="";

 }


 class Coupon 
 {

   public $code = "";
   public $message = "";
   public $coupon_id ="";
   public $coupon_reward ="";

 }



class Response  
{

   public $code = "";
   public $message = "";

 }



class OrderHistory 
 {
  
    public $code;
    public $message;
    public $orderList = [];

 }



class ProductOrder 
 {
  
    public $code;
    public $message;
    public $order_id;

 }



class Reviews 
 {
  
    public $code;
    public $message;
    public $reviewList = [];

 }


 class AppOffers  
 {

   public $code = "";
   public $message = "";
   public $offers = [];
   public $categories = [];

 }


/*

It is used for formatting of Trending Data into Object

*/
class PrivacyPolicy 
{

	public $code="";
	public $message="";
	public $privacy="";

}    



/*

It is used for formatting of Category Data into Object

*/
class Comment 
{

	public $code="";
	public $message="";
	public $comments=[];

}  


/*

It is used for formatting of Category Data into Object

*/
class Ads 
{

  public $code="";
  public $message="";
  public $ads=[];

}  



/*

It is used for formatting of User Data into Object

*/
class User 
{

  public $code="";
  public $message="";
  public $id;
  public $userType;
  public $phone;
  public $fName;
  public $lName;
  public $email;
  public $pass;
  public $avatar;
  public $uid;
  public $coin;
  public $isEnable="0";
  public $favouriteList = [];

}  



/*

It is used for formatting of Favourites Data into Object

*/
class Favourites 
{

	public $code="";
	public $message="";
	public $favourites=[];

}  


/*

It is used for formatting of Favourites Data into Object

*/
class UserData 
{

  public $code="";
  public $message="";
  public $favourites=[];
  public $subscription=[];

} 



/*

It is used for formatting of Favourites Data into Object

*/
class Subscription 
{

  public $code="";
  public $message="";
  public $subscription=[];

}  



 


 /*




It is used for formatting of Artist Data

*/
class Rider 
{

  public $code;
  public $message;
  public $riderDetail = [];

}  


/* 
     Functionalities for getting Header keys verification
     along with validating of data

*/


function validate($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars(strip_tags($data, ENT_QUOTES));
  return $data;
}



function checkApiKeyVerification($apiKey){

  $isVerified;
  $table=$GLOBALS['table_name_verification'];
  $query="SELECT * FROM $table WHERE api='$apiKey' AND type ='rest_api_authorization' ";
  $result=mysql_query($query) OR die(mysql_error());
  $count=countRow($result); 


  if ($count>0) {
   $isVerified=true;
  }else{
  	$isVerified=false;
  }

 return $isVerified;

}



/* 
     MY Sql Query Functionalties

MY SQL Function used to retrieve , counting & running query
All of query processing done by these functions , it 
follow central logic mechanism to enhance the Management
along with mysql upgradation problem 

*/



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






function distance($lat1, $lon1, $lat2, $lon2) {

    $pi80 = M_PI / 180;
    $lat1 *= $pi80;
    $lon1 *= $pi80;
    $lat2 *= $pi80;
    $lon2 *= $pi80;

    $r = 6372.797; // mean radius of Earth in km
    $dlat = $lat2 - $lat1;
    $dlon = $lon2 - $lon1;
    $a = sin($dlat / 2) * sin($dlat / 2) + cos($lat1) * cos($lat2) * sin($dlon / 2) * sin($dlon / 2);
    $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
    $km = $r * $c;

    //echo '<br/>'.$km;
    return $km;
}



function extract_numbers($string)
{
   preg_match_all('/([\d]+)/', $string, $match);

   return $match[0];
}


/* 
     Function for retrieving data for home screen
     regarding specific location etc

*/

function retrieve_ride_type($userlatitude,$userlongitude,$city,$user_id) {
  
  $rideTypeList = [];
  $paymentTypeList = [];
  $configurationList = [];
  $captainList = [];


  $general = new RideAndPayment();


  /* For finding nearest places by keeping in view given radius */  

  $table = $GLOBALS['table_name_location'];
  $query = "SELECT ride_type.id , ride_type.name , ride_type.tagline , ride_type.tag , ride_type.picture , ride_category.name as ride_category
  FROM $table as location
  INNER JOIN Country as country ON country.id = location.country_id AND country.enable = '0'
  LEFT JOIN RideType as ride_type ON ride_type.place_id = location.id AND ride_type.enable = '0'
  LEFT JOIN RideCategory as ride_category ON ride_category.id = ride_type.ride_category AND ride_category.enable = '0'
  WHERE location.name = '$city' AND location.enable = '0' ";


  $result=queryRunner($query);
  while ($row = rowRetriever($result)) { 
      array_push($rideTypeList, [
        'id' => $row['id'] , 
        'name' => $row['name'] , 
        'tagline' => $row['tagline'] , 
        'category' => $row['ride_category'], 
        'tag' => $row['tag'] , 
        'picture' => $row['picture']
        

      ]);

    }




  $query = "SELECT DISTINCT payment_type.id , payment_method.name ,  payment_method.tag , payment_method.picture , 

  (
  SELECT group_concat(concat(id , ':',company_name,':',card_title,':',card_number,':',expiry_month,':',expiry_year,':',payment_type,':',customer_no)) 
  FROM UserPayment WHERE user_id = '$user_id' AND  payment_type = payment_type.id AND enable = '0' GROUP BY user_id
  ) payment_details

  FROM $table as location
  INNER JOIN Country as country ON country.id = location.country_id AND country.enable = '0'
  LEFT JOIN PaymentType as payment_type ON payment_type.country_id = country.id  AND payment_type.enable = '0'
  LEFT JOIN PaymentMethod as payment_method ON payment_method.id = payment_type.payment_method_id AND payment_method.enable = '0'
  WHERE location.name = '$city' AND location.enable = '0' ";


  $result=queryRunner($query);
  while ($row = rowRetriever($result)) { 

      ///$payment_detail = new PaymentDetail();
      $card_list = [];

      if (!is_null($row['payment_details'])){

            $payment_array = array_filter(explode ("," , $row['payment_details']));
            for($i = 0 ; $i < count($payment_array) ; $i++ ){

              $detail_array = array_filter(explode (":" , $payment_array[$i]));
              array_push($card_list, [
                'id' => $detail_array[0] , 
                'company_name' => $detail_array[1] , 
                'card_title' => $detail_array[2] , 
                'card_number' => $detail_array[3] ,
                'expiry_month' => $detail_array[4],
                'expiry_year' => $detail_array[5] , 
                'payment_type' => $detail_array[6] ,
                'customer_no' => $detail_array[7]
            ]);
          }
      }  

      array_push($paymentTypeList, [
        'id' => $row['id'] , 
        'name' => $row['name'] , 
        'tag' => $row['tag'] ,
        'picture' => $row['picture'] ,
        'payment_detail' => $card_list ,

      ]);

    }



  $query = "SELECT configuration.id , configuration.currency_name ,  configuration.currency_symbol , location.id as place_id
  FROM $table as location
  INNER JOIN Country as country ON country.id = location.country_id AND country.enable = '0'
  INNER JOIN Configuration as configuration ON configuration.country_id = country.id AND configuration.enable = '0'
  WHERE location.name = '$city' AND location.enable = '0' AND location.country_id = country.id ";


  $result=queryRunner($query);
  while ($row = rowRetriever($result)) { 
      array_push($configurationList, [
        'id' => $row['id'] , 
        'currency_name' => $row['currency_name'] , 
        'currency_symbol' => $row['currency_symbol'] ,
        'place_id' => $row['place_id'] 

      ]);

    }

    


  $query = "SELECT  captain.id , captain.name , captain.phone , ride_type.id as ride_type_id ,ride_type.name as ride_type_name,tracking.latitude,tracking.longitude,
   ROUND(SQRT(
    POW(69.1 * (tracking.latitude - $userlatitude), 2) +
    POW(69.1 * ($userlongitude - tracking.longitude) * COS(tracking.latitude / 57.3), 2)),1) AS distance
  FROM Tracking as tracking
  INNER JOIN Captain as captain ON captain.id = tracking.term_id AND captain.enable = '0' AND captain.status = '0' AND captain.live = '0'
  INNER JOIN RideType as ride_type ON ride_type.id = captain.ride_type_id AND ride_type.enable = '0' 
  INNER JOIN Location as location ON location.id = ride_type.place_id AND location.enable = '0' 
  INNER JOIN Country as country ON country.id = location.country_id AND country.enable = '0' 
  HAVING distance <= '2' ";


  $result=queryRunner($query);
  while ($row = rowRetriever($result)) { 
      array_push($captainList, [
        'id' => $row['id'] , 
        'name' => $row['name'] ,
        'phone' => $row['phone'] ,
        'latitude' => $row['latitude'] ,
        'longitude' => $row['longitude'] ,
        'ride_type_id' => $row['ride_type_id'] ,
        'ride_type_name' => $row['ride_type_name'] ,
        'distance' => $row['distance'] 

      ]);

    }  

   
   if ( count($rideTypeList) > 0 || count($paymentTypeList) > 0 || count($configurationList) > 0 || count($captainList) > 0) {
     
      $general -> rideType = $rideTypeList;
      $general -> paymentType = $paymentTypeList;
      $general -> configuration = $configurationList;
      $general -> captain = $captainList;
      $general -> code ="202";
      $general -> message ="Data Retrieve Successfully";

   }else{

      $general -> code ="206";
      $general -> message ="No data available";

   }

  
   $result = json_encode($general);
   echo "$result";

}




/* 
     Function for retrieving data for home screen
     regarding specific location etc

*/
function find_nearest_ride_distance($userlatitude,$userlongitude,$ride_type_id) {
  
 
  $captainList = [];


  $general = new Captain();


  /* For finding nearest places by keeping in view given radius */  

  $table = $GLOBALS['table_name_location'];
  $query = "SELECT  captain.id , captain.name , captain.phone , ride_type.id as ride_type_id ,ride_type.name as ride_type_name,tracking.latitude,tracking.longitude,
   MIN(ROUND(SQRT(
    POW(69.1 * (tracking.latitude - $userlatitude), 2) +
    POW(69.1 * ($userlongitude - tracking.longitude) * COS(tracking.latitude / 57.3), 2)),1)) AS distance
  FROM Tracking as tracking
  INNER JOIN Captain as captain ON captain.id = tracking.term_id AND captain.enable = '0' AND captain.status = '0' AND captain.live = '0' AND captain.ride_type_id = '$ride_type_id'
  INNER JOIN RideType as ride_type ON ride_type.id = captain.ride_type_id AND ride_type.enable = '0' 
  INNER JOIN Location as location ON location.id = ride_type.place_id AND location.enable = '0' 
  INNER JOIN Country as country ON country.id = location.country_id AND country.enable = '0' 
  HAVING distance <= '2' ";

  ///echo $query;

  $captain_id;
  $name;
  $phone;
  $rider_type_id;
  $rider_type_name;
  $latitude;
  $longitude;
  $distance;
  $result=queryRunner($query);
  while ($row = rowRetrieverObject($result)) {
        $captain_id = $row -> id;
        $name = $row -> name;
        $phone = $row -> phone;
        $rider_type_id = $row -> ride_type_id;
        $rider_type_name = $row -> ride_type_name;
        $latitude =  $row -> latitude;
        $longitude = $row -> longitude;
        $distance = $row -> distance;
  }

  $post_data="coordinates=".$userlongitude.",".$userlatitude.";".$longitude.",".$latitude;
  $map_box_url = "https://api.mapbox.com/directions/v5/mapbox/driving?access_token=".$GLOBALS['mapbox_access_token'];

   $curl = curl_init();
   curl_setopt_array($curl, array(
              CURLOPT_URL => $map_box_url,
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 100,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => "POST",
              CURLOPT_POSTFIELDS => $post_data,
              CURLOPT_HTTPHEADER => array(
                  "cache-control: no-cache",
                  "content-type: application/x-www-form-urlencoded"
              ),
          ));
   $response = curl_exec($curl);
   $err = curl_error($curl);

   curl_close($curl);

   if (!$err)
   {
      
        $route = json_decode($response,true);
        if ($route['code'] == "Ok") {
        $duration=$route['routes'][0]['duration'];
        
            array_push($captainList, [
                    'id' => $captain_id, 
                    'name' => $name , 
                    'phone' => $phone , 
                    'rider_type_id' => $rider_type_id, 
                    'rider_type_name' => $rider_type_name, 
                    'latitude' => $latitude,
                    'longitude' => $longitude,
                    'distance' => $distance,
                    'duration' => round(($duration/60))." min",
                  
                  ]);

          $general -> captain = $captainList;
          $general -> code ="202";
          $general -> message ="Data Retrieve Successfully"; 

        }else{

          $general -> code ="206";
          $general -> message ="Failed to laod duration";

       }
        
      
   }else{

      $general -> code ="206";
      $general -> message ="No data available";

   }


   $result = json_encode($general);
   echo "$result";


}



/* 
     Function for retrieving data for home screen
     regarding specific location etc 3607

*/
function find_estimated_fare_price($fromLatitude,$fromLongitude,$toLatitude,$toLongitude,$ride_type_id) {
  
 
  $estimatedFair = [];


  $general = new FareEstimation();


  /* For finding nearest places by keeping in view given radius */  

  $table = $GLOBALS['table_name_ride_meta'];
  $query = "SELECT ride_meta.* , MIN(ROUND(SQRT(
    POW(69.1 * (tracking.latitude - $fromLatitude), 2) +
    POW(69.1 * ($fromLongitude - tracking.longitude) * COS(tracking.latitude / 57.3), 2)),1)) AS distance 
    FROM  $table as ride_meta
    LEFT JOIN Captain as captain ON  captain.enable = '0' AND captain.status = '0' AND captain.live = '0' AND captain.ride_type_id = ride_meta.term_id
    LEFT JOIN Tracking as tracking ON tracking.term_id = captain.id
    LEFT JOIN RideType as ride_type ON ride_type.id = captain.ride_type_id AND ride_type.enable = '0' 
    LEFT JOIN Location as location ON location.id = ride_type.place_id AND location.enable = '0' 
    LEFT JOIN Country as country ON country.id = location.country_id AND country.enable = '0' 
    WHERE ride_meta.term_id = '$ride_type_id' ";

  $result=queryRunner($query);
  while ($row = rowRetrieverObject($result)) {
        $id = $row -> term_id;
        $price = $row -> price;
        $condition = $row -> distance_condition;
  }

  if (countRow($result)<=0) {
  
    $general -> code ="206";
    $general -> message ="Failed to estimate fare";
    $general -> estimatedFare = "0.0";

    $result = json_encode($general);
    echo "$result";

    return;
  }

  $post_data="coordinates=".$fromLongitude.",".$fromLatitude.";".$toLongitude.",".$toLatitude;
  $map_box_url = "https://api.mapbox.com/directions/v5/mapbox/driving?access_token=".$GLOBALS['mapbox_access_token'];

   $curl = curl_init();
   curl_setopt_array($curl, array(
              CURLOPT_URL => $map_box_url,
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 100,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => "POST",
              CURLOPT_POSTFIELDS => $post_data,
              CURLOPT_HTTPHEADER => array(
                  "cache-control: no-cache",
                  "content-type: application/x-www-form-urlencoded"
              ),
          ));
   $response = curl_exec($curl);
   $err = curl_error($curl);

   curl_close($curl);

   if (!$err)
   {

        $route = json_decode($response,true);
        ///var_dump($route);
        
        if ($route['code'] == "Ok") {
            $distance_in_meters=$route['routes'][0]['distance'];
            $duration=$route['routes'][0]['duration'];

          $distance_in_km = $distance_in_meters / 1000;
          ///echo "Distance in Km = ".$distance_in_km;

          $calculated_distance =  $distance_in_km / $condition;
          $calculated_charges = $price * $calculated_distance;

          $general -> estimatedFare = round($calculated_charges);
          $general -> estimatedDistance = $distance_in_km." km";
          $general -> estimatedDuration = round(($duration/60))." min";
          $general -> code ="202";
          $general -> message ="Fare calculated Successfully"; 

        }else{

          $general -> code ="206";
          $general -> message ="Something went wrong";

        }


   }else{

          $general -> code ="206";
          $general -> message ="Failed to estimate fae";

   }


  

   $result = json_encode($general);
   echo "$result";


}




/*

    Function for managing Order

*/

function verifyCoupon($coupon_code,$place_id) 
{
  
  $coupon = new Coupon();

  $table = $GLOBALS['table_name_coupon'];
  $query = "SELECT id as coupon_id  , coupon_reward as coupon_reward FROM $table 
    WHERE coupon_code = '$coupon_code' AND enable = '0' 
    AND CURDATE() between coupon_from_date AND coupon_to_date AND place_id = '$place_id' AND coupon_limit >= 0 ";

  $result=queryRunner($query);
  while ($row = rowRetrieverObject($result)) {
     $coupon_id = $row -> coupon_id;
     $coupon_reward = $row -> coupon_reward;
     $coup_limit = $row -> coup_limit;
  }

  if (countRow($result)>0) {

    $coup_limit = $coup_limit - 1;

    $query ="UPDATE Coupon SET  coupon_limit = '$coup_limit' WHERE id ='$coupon_id'  ";
    $result=queryRunner($query);

    $coupon -> code = "202";
    $coupon -> message = "Coupon Redeem Successfully";
    $coupon -> coupon_id = $coupon_id;
    $coupon -> coupon_reward = $coupon_reward;

  }else{

    $coupon -> code = "206";
    $coupon -> message = "Failed to verify coupon";

  }

  $result = json_encode($coupon);
  echo "$result";

} 





/*

    Function for managing Order

*/

function retrieve_all_countries() 
{
  

  $country_list = [];
  $country = new Country();

  $table = $GLOBALS['table_name_country'];
  $query = "SELECT  country.id , country.name , group_concat(concat(location.id,':',location.name,':',location.latitude,':',location.longitude)) as location_detail
      FROM $table as country 
      INNER JOIN Location as location ON location.country_id = country.id AND location.enable = '0'
      WHERE country.enable = '0' ";

  $result=queryRunner($query);
  while ($row = rowRetriever($result)) {

    $location_detail = array_filter(explode ("," , $row['location_detail']));
    $city_list = [];

    for ($i = 0 ; $i < count($location_detail) ; $i++){
              $country_detail = array_filter(explode (":" , $location_detail[$i]));
              array_push($city_list, [
                'id' => $country_detail[0] , 
                'name' => $country_detail[1] , 
                'latitude' => $country_detail[2] , 
                'longitude' => $country_detail[3] 
            ]);

    }

     array_push($country_list, [
        'id' => $row['id'], 
        'name' => $row['name'] , 
        'city_list' => $city_list
        
      ]);
  }

  if (countRow($result)>0) {

    $country -> code = "202";
    $country -> message = "Retrieve Countries list";
    $country -> country_list = $country_list;

  }else{

    $country -> code = "206";
    $country -> message = "Failed to get country";

  }

  $result = json_encode($country);
  echo "$result";

} 



/*

    Function for managing Order

*/

function retrieve_all_ride_category() 
{
  

  $country_list = [];
  $country = new Country();

  $table = $GLOBALS['table_name_ride_category'];
  $query = "SELECT  id , name FROM $table 
      WHERE enable = '0' ";

  $result=queryRunner($query);
  while ($row = rowRetriever($result)) {
     array_push($country_list, [
        'id' => $row['id'], 
        'name' => $row['name'] 
        
      ]);
  }

  if (countRow($result)>0) {

    $country -> code = "202";
    $country -> message = "Retrieve Countries list";
    $country -> country_list = $country_list;

  }else{

    $country -> code = "206";
    $country -> message = "Failed to get country";

  }

  $result = json_encode($country);
  echo "$result";

} 



function orderProduct($ride_type_id,$user_id, $from_address,$from_latitude,$from_longitude,$to_address,$to_latitude,$to_longitude,$distance,$price,$time,$currency_symbol,$payment,$payment_customer_id,$schedule,$schedule_date) 
{
  

  $productOrder = new ProductOrder();
  $table = $GLOBALS['table_name_ride_order'];  
  

    if (!$schedule) {

      $status = "1";
      
      $query = "SELECT  captain.id , captain.name , captain.phone , ride_type.id as ride_type_id ,ride_type.name as ride_type_name,tracking.latitude,tracking.longitude,
       MIN(ROUND(SQRT(
        POW(69.1 * (tracking.latitude - $from_latitude), 2) +
        POW(69.1 * ($from_longitude - tracking.longitude) * COS(tracking.latitude / 57.3), 2)),1)) AS distance , country.percentage as company_percentage
      FROM Tracking as tracking
      INNER JOIN Captain as captain ON captain.id = tracking.term_id AND captain.enable = '0' AND captain.status = '0' AND captain.live = '0' AND captain.ride_type_id = '$ride_type_id'
      INNER JOIN RideOrder as ride_order ON ride_order.captain_id = captain.id AND ride_order.status != '1'
      INNER JOIN RideType as ride_type ON ride_type.id = captain.ride_type_id AND ride_type.enable = '0' 
      INNER JOIN Location as location ON location.id = ride_type.place_id AND location.enable = '0' 
      INNER JOIN Country as country ON country.id = location.country_id AND country.enable = '0' 
      HAVING distance <= '2' ";

       $result=queryRunner($query);
       while ($row = rowRetrieverObject($result)) { 
          $captain_id =  $row -> id;
          $company_percentage =  $row -> company_percentage;
        }

        if (countRow($result)<=0) {
          
          $productOrder -> code ="206";
          $productOrder -> message = "Currently no captain available right now";
          $result = json_encode($productOrder);
            echo "$result";


          return;
        }



    }else{

        $status = "2";
        $captain_id = 0;

    }

    if ($payment == "1") {

        $query = "INSERT INTO $table
        (ride_type_id,user_id,captain_id,from_address,from_latitude,from_longitude,to_address,to_latitude,to_longitude,distance,price,trip_time,payment,status,customer_payment_id
        ,schedule_date_created,company_percentage)
       VALUES
        ('$ride_type_id','$user_id','$captain_id','$from_address','$from_latitude','$from_longitude','$to_address','$to_latitude','$to_longitude','$distance','$price','$time','$payment'
        ,'$status','$payment_customer_id','$schedule_date','$company_percentage') ";

       $result=queryRunner($query);
       $order_id=findLastInsertId();    
      
        if ($result != null) {

             addRecordIntoFirebase($order_id,$user_id,$captain_id,$from_latitude,$from_longitude,$to_latitude,$to_longitude,$company_percentage,$price);

             $productOrder -> code ="202";
             $productOrder -> message = "Order Successfully";
             $productOrder -> order_id = "$order_id";

          }else{

             

        }

        $result = json_encode($productOrder);
        echo "$result";

    }else{

     $productOrder = chargePayment($order_id,$payment_customer_id,$currency_symbol,extract_numbers($price));

       if ($productOrder -> code == "202") {


               $query = "INSERT INTO $table
        (ride_type_id,user_id,captain_id,from_address,from_latitude,from_longitude,to_address,to_latitude,to_longitude,distance,price,trip_time,payment,status,customer_payment_id
        ,schedule_date_created,company_percentage)
       VALUES
        ('$ride_type_id','$user_id','$captain_id','$from_address','$from_latitude','$from_longitude','$to_address','$to_latitude','$to_longitude','$distance','$price','$time','$payment'
        ,'$status','$payment_customer_id','$schedule_date','$company_percentage') ";

             $result=queryRunner($query);
             $order_id=findLastInsertId();
             addRecordIntoFirebase($order_id,$user_id,$captain_id,$from_latitude,$from_longitude,$to_latitude,$to_longitude,$company_percentage,$price); 
           
             $productOrder -> order_id = "$order_id";
             $result = json_encode($productOrder);
             echo "$result";

      }else{

            $result = json_encode($productOrder);
            echo "$result";

      }

    }

} 




function addRecordIntoFirebase($order_id,$user_id,$captain_id,$from_latitude,$from_longitude,$to_latitude,$to_longitude,$company_percentage,$price) 
{
  

  $user_name="";
  $cardList = [];
  $userPayment =  new UserPaymentCards();
  $table = $GLOBALS['table_name_captain'];
  $realtime_db_url = $GLOBALS['firebase_realtime_database_url'];

  $query="SELECT captain.id , captain.name , captain.picture , car_detail.brand_name as car_brand , car_detail.car_name , 
  car_detail.car_colour , car_detail.car_number_plate , tracking.latitude , tracking.longitude , captain.device_token
  FROM $table as captain 
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




  $query = "SELECT user.id , concat(user.first_name,' ',user.last_name) as user_name , user.profile_picture as user_picture 
  FROM User as user WHERE user.id = '$user_id' AND user.enable = '0' ";

  $result=queryRunner($query);
  while ($row = rowRetrieverObject($result)) { 
        $user_id = (int) $row -> id;
        $user_name = $row -> user_name;
        $user_picture = $row -> user_picture;
  }


  $firebaseStructure = new FirebaseStructure();

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


  $firebaseStructure -> riderObject = $riderObject;
  
  $userObject = new UserObject();
  $userObject -> user_id = $user_id;
  $userObject -> user_name = $user_name;
  $userObject -> user_picture = $user_picture;
  $userObject -> user_latitude = floatval($from_latitude);
  $userObject -> user_longitude = floatval($from_longitude);

  $firebaseStructure -> userObject = $userObject;

  $destinationObject = new DestinationObject();
  $destinationObject -> latitude = floatval($to_latitude);
  $destinationObject -> longitude = floatval($to_longitude);

  $firebaseStructure -> destinationObject = $destinationObject;
  $firebaseStructure -> typingObject = new TypingObject();

  $trackingObject = new TrackingObject();
  $trackingObject -> company_percentage = $company_percentage;
  $trackingObject -> trip_price = $price;

  $firebaseStructure -> trackingObject = $trackingObject;


  ///echo $trackingObject -> user_id;
  $newJsonString = json_encode($firebaseStructure);
  ///echo $newJsonString;
  ///var_dump($riderObject);
  ///$data[0]

  $firebase_url = $realtime_db_url."$order_id".".json";


   $curl = curl_init();
   curl_setopt_array($curl, array(
              CURLOPT_URL => $firebase_url,
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 100,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => "PUT",
              CURLOPT_POSTFIELDS => $newJsonString,
              CURLOPT_HTTPHEADER => array(
                  "cache-control: no-cache"
              ),
          ));
   $response = curl_exec($curl);
   $err = curl_error($curl);

   curl_close($curl);

   if (!$err)
   {

    sendNotificationToUser($device_token,true);
   
   }   


} 


/*

  It is used tp assign Rating to Rider

*/
function giveRatingToRider($order_id,$captain_id,$rating,$review){

 $table=$GLOBALS['table_name_rating'];
 $query = "INSERT INTO $table (captain_id,order_id,rating,review) VALUES ('$captain_id','$order_id','$rating','$review')";
 $result=queryRunner($query);


 /*$query = "UPDATE RideOrder SET status = '1' WHERE id = '$order_id' ";
 $result=queryRunner($query);*/

}



/*

  It is used tp assign Rating to Rider

*/
function retrieve_all_history($status_id){

 $history_list = [];
 $history = new History();

 $table=$GLOBALS['table_name_ride_order'];
 $query = "SELECT ride.id , concat(user.first_name,' ',user.last_name) customer_name , captain.name as captain_name , captain.picture as captain_picture ,
  car_detail.brand_name , car_detail.car_name , car_detail.car_colour , car_detail.car_number_plate , ride_type.name as ride_type_name , rating.rating , ride.from_address ,
  ride.from_latitude , ride.from_longitude ,ride.to_address ,ride.to_latitude , ride.to_longitude , ride.distance , ride.price , ride.trip_time , payment_method.name as payment,
  ride.status , ride.date_created  , ride.schedule_date_created 
  FROM $table as ride 
  INNER JOIN User as user ON user.id = ride.user_id 
  LEFT JOIN Captain as captain ON captain.id = ride.captain_id
  LEFT JOIN CaptainMeta as car_detail ON car_detail.term_id = captain.id
  LEFT JOIN RideType as ride_type ON ride_type.id = captain.ride_type_id
  LEFT JOIN PaymentType as payment_type ON payment_type.id = ride.payment
  LEFT JOIN PaymentMethod as payment_method ON payment_method.id = payment_type.payment_method_id AND payment_method.enable = '0'
  LEFT JOIN Rating as rating ON rating.order_id = ride.id AND rating.captain_id = captain.id
  WHERE ride.status = '$status_id' ";
  ///echo $query;

 $result=queryRunner($query);
 while ($row = rowRetriever($result)) {

    if ($status_id == "1") {

      $date_created = $row['date_created'];

    }else if ($status_id == "2") {

      $date_created = $row['schedule_date_created'];

    }else {

      $date_created = $row['date_created'];

    }

    
    

    array_push($history_list, [
        'id' => $row['id'], 
        'customer_name' => $row['customer_name'] , 
        'captain_name' => $row['captain_name'] , 
        'captain_picture' => $row['captain_picture'] , 
        'brand_name' => $row['brand_name'] , 
        'car_name' => $row['car_name'] , 
        'car_colour' => $row['car_colour'] , 
        'car_number_plate' => $row['car_number_plate'] , 
        'ride_type_name' => $row['ride_type_name'] , 
        'from_address' => $row['from_address'] , 
        'from_latitude' => $row['from_latitude'] , 
        'from_longitude' => $row['from_longitude'] , 
        'to_address' => $row['to_address'] , 
        'to_latitude' => $row['to_latitude'] , 
        'to_longitude' => $row['to_longitude'] , 
        'distance' => $row['distance'] , 
        'price' => $row['price'] , 
        'trip_time' => $row['trip_time'] , 
        'payment' => $row['payment'] , 
        'status' => $row['status'] ,
        'rating' => $row['rating'] ,
        'date_created' => $date_created
        
      ]);

  }

  if ($result != null) {
   
   $history -> code = "202";
   $history -> message = "Load data Successfully";
   $history -> history_list = $history_list;

  }else{

  $history -> code = "206";
  $history -> message = "Failed to load";

  }

  $result = json_encode($history);
  echo "$result";

}





/*

  It is used to update data

*/
function update_name($user_id,$first_name,$last_name){


 $profile = new Profile();

 $table=$GLOBALS['table_name_user'];
 $query = "UPDATE $table SET first_name = '$first_name' , last_name = '$last_name' WHERE id = '$user_id' ";
 $result=queryRunner($query);

 if ($result != null) {
   
   $profile -> code = "202";
   $profile -> message = "Updated Successfully";

  }else{

   $profile -> code = "206";
   $profile -> message = "Failed to load";

  }

  $result = json_encode($profile);
  echo "$result";

}



/*

  It is used to update data

*/
function update_email($user_id,$email){


 $profile = new Profile();

 $table=$GLOBALS['table_name_user'];
 $query = "UPDATE $table SET email = '$email'  WHERE id = '$user_id' ";
 $result=queryRunner($query);

 if ($result != null) {
   
   $profile -> code = "202";
   $profile -> message = "Updated Successfully";

  }else{

   $profile -> code = "206";
   $profile -> message = "Failed to load";

  }

  $result = json_encode($profile);
  echo "$result";

}


/*

  It is used to update data

*/
function update_password($user_id,$password){


 $profile = new Profile();

 $table=$GLOBALS['table_name_user'];
 $query = "UPDATE $table SET password = '$password' WHERE id = '$user_id' ";
 $result=queryRunner($query);

 if ($result != null) {
   
   $profile -> code = "202";
   $profile -> message = "Updated Successfully";

  }else{

   $profile -> code = "206";
   $profile -> message = "Failed to load";

  }

  $result = json_encode($profile);
  echo "$result";

}


/*

  It is used to update data

*/
function cancel_order($order_id){


 $profile = new Profile();

 $table=$GLOBALS['table_name_ride_order'];
 $query = "UPDATE $table SET status = '3' WHERE id = '$order_id' ";
 $result=queryRunner($query);

 if ($result != null) {
   
   $profile -> code = "202";
   $profile -> message = "Updated Successfully";

  }else{

   $profile -> code = "206";
   $profile -> message = "Failed to load";

  }

  $result = json_encode($profile);
  echo "$result";

}



function addPaymentCards($user_id,$card_number,$card_company,$expiry_month,$expiry_year,$stripe_customer_id) 
{
  

  $user_name="";
  $cardList = [];
  $userPayment =  new UserPaymentCards();
  $table = $GLOBALS['table_name_user_payment'];
  $public_token = $GLOBALS['stripe_public_token'];
  $private_token = $GLOBALS['stripe_private_token'];

  $query="SELECT concat(first_name,' ',last_name) as name FROM User WHERE id='$user_id' AND enable = '0' ";
  $result=queryRunner($query);
  while ($row = rowRetrieverObject($result)) { 
        $user_name = $row -> name;
  }

  ///\Stripe\Stripe::setApiKey('$public_token');

  \Stripe\Stripe::setApiKey($private_token);  /// For Testing purpose , uncomment this line

  $customer = \Stripe\Customer::create(array(
  "source" => $stripe_customer_id,
  "description" => $user_name)
  );

  $customer_id = $customer->id;


  $query = "INSERT IGNORE  INTO $table (user_id,company_name,card_title,card_number,expiry_month,expiry_year,payment_type,customer_no)
     VALUES
    ('$user_id','$card_company','$user_name','$card_number','$expiry_month','$expiry_year','2','$customer_id') ";

  $result=queryRunner($query);
  $id = findLastInsertId();

  if ($result!=null && $id != 0 ) {

        array_push($cardList, [
                  'id' =>  "$id" ,
                  'company_name' => $card_company, 
                  'card_name' => $user_name , 
                  'card_no' => $card_number, 
                  'expiry_month' => $expiry_month,
                  'expiry_year' => $expiry_year,
                  'stripe_customer_id' => $customer_id
                ]);
      
    
    $userPayment -> code ="202";
    $userPayment -> message = "Card Added Successfully";
    $userPayment -> cards = $cardList;

  }else{

    $userPayment -> code ="206";
    $userPayment -> message = "Failed to Add Card";

  }

  $result = json_encode($userPayment);
  echo "$result";
 

} 




/*

  It is used tp assign Rating to Rider

*/
function retrieve_current_ride($user_id){

 $history_list = [];
 $history = new History();

 $table=$GLOBALS['table_name_ride_order'];
 $query = "SELECT ride.id 
  FROM $table as ride 
  INNER JOIN User as user ON user.id = ride.user_id AND user.enable = '0'
  WHERE ride.status = '1' AND ride.enable = '0' AND ride.user_id = '$user_id' ";
  ///echo $query;

 $result=queryRunner($query);
 while ($row = rowRetriever($result)) {

 array_push($history_list, [
        'id' => $row['id']
        
      ]);

  }

  if (countRow($result) > 0) {
   
     $history -> code = "202";
     $history -> message = "Load data Successfully";
     $history -> history_list = $history_list;

  }else{

     $history -> code = "206";
     $history -> message = "Failed to load";

  }

  $result = json_encode($history);
  echo "$result";

}



/*

    Function for retrieving Assign Order List 
    for Rider App

*/
function retrieve_current_ride_for_captain($rider_id) {
  
  $orderList = [];
  $orderHistory = new OrderHistory();

  /* For finding nearest places by keeping in view given radius */

  $table = $GLOBALS['table_name_ride_order'];
  $query = "SELECT ride_order.id , ride_order.price , ride_category.name as ride_economy , payment_method.name as payment_method , ride_order.trip_time as duration
  FROM $table as ride_order 
  INNER JOIN RideType as ride_type ON ride_type.id = ride_order.ride_type_id AND ride_type.enable = '0'
  INNER JOIN RideCategory as ride_category ON ride_category.id = ride_type.ride_category AND ride_category.enable = '0'
  INNER JOIN PaymentType as payment_type ON payment_type.id = ride_order.payment AND payment_type.enable = '0'
  INNER JOIN PaymentMethod as payment_method ON payment_method.id = payment_type.payment_method_id AND payment_method.enable = '0'
  WHERE ride_order.captain_id ='$rider_id' AND ride_order.enable = '0' AND ride_order.status = '1' " ;

  //echo "$query";

  $result=queryRunner($query);
  while ($row = rowRetriever($result)) { 
       array_push($orderList, [
                  'id' => $row['id'], 
                  'price' => $row['price'], 
                  'ride_economy' => $row['ride_economy'], 
                  'payment_method' => $row['payment_method']." trip", 
                  'duration' => $row['duration']
                ]);
      }


   
  if (count($orderList)>0) {
      
    
    $orderHistory -> code ="202";
    $orderHistory -> message = "Order retrieve Successfully";
    $orderHistory -> orderList = $orderList;

  }else{

    $orderHistory -> code ="206";
    $orderHistory -> message = "Failed to load data";

  }
  
   $result = json_encode($orderHistory);
   echo "$result";

} 


/*

    Function for retrieving Assign Order List 
    for Rider App

*/
function accept_reject_ride($rider_id,$status) {


  /* For finding nearest places by keeping in view given radius */

  $table = $GLOBALS['table_name_ride_order'];
  $query = "UPDATE $table SET status = '$status' WHERE id = '$rider_id' " ;
  $result=queryRunner($query);


} 





/*

    Function for retrieving Assign Order List 
    for Rider App

*/
function complete_ride($order_id,$status) {


  /* For finding nearest places by keeping in view given radius */

  $table = $GLOBALS['table_name_ride_order'];
  $query = "UPDATE $table SET status = '$status' WHERE id = '$order_id' " ;
  $result=queryRunner($query);


} 





/*

    Function for retrieving Assign Order List 
    for Rider App

*/
function retrieve_captain_earning_record($captain_id,$from_date,$to_date) {


  $captain_statistics = [];
  $statistics = new Statistics();

  $table = $GLOBALS['table_name_ride_order'];
  $query = "SELECT GROUP_CONCAT(id) as order_id , 
  DAY(date(`date_created`)) as date_no ,
  DAYNAME(date(`date_created`)) as day_name, 
  COUNT(*) as total_sale , 
  SUM(SUBSTRING_INDEX(SUBSTRING_INDEX(price, ' ', 2), ' ', -1)) as total_earning , SUBSTRING_INDEX(SUBSTRING_INDEX(price, ' ', 1), ' ', -1) as currency_symbol , 
  ROUND(SUM(SUBSTRING_INDEX(SUBSTRING_INDEX(distance, ' ', 1), ' ', -1)),2) as total_distance , SUBSTRING_INDEX(SUBSTRING_INDEX(distance, ' ', 2), ' ', -1) as distance_symbol , 
  SUM(SUBSTRING_INDEX(SUBSTRING_INDEX(trip_time, ' ', 1), ' ', -1)) as total_duration , SUBSTRING_INDEX(SUBSTRING_INDEX(trip_time, ' ', 2), ' ', -1) as duration_symbol , 
  company_percentage , date(`date_created`) as date_created 
  FROM $table 
  WHERE  captain_id = '$captain_id' AND (date(`date_created`) BETWEEN '$from_date' AND '$to_date') AND status = '4'
  GROUP BY DATE(`date_created`) " ;

  ///echo $query;

  $result=queryRunner($query);
  while ($row = rowRetriever($result)) { 
       array_push($captain_statistics, [
                  'id' => $row['order_id'], 
                  'date_no' => $row['date_no'], 
                  'day_name' => $row['day_name'], 
                  'total_sale' => $row['total_sale'], 
                  'total_earning' => $row['total_earning'], 
                  'currency_symbol' => $row['currency_symbol'], 
                  'total_distance' => $row['total_distance'], 
                  'distance_symbol' => $row['distance_symbol'], 
                  'total_duration' => $row['total_duration'], 
                  'duration_symbol' => $row['duration_symbol'], 
                  'company_percentage' => $row['company_percentage'],
                  'date_created' => $row['date_created']
                ]);

  }

  if (count($captain_statistics)>0) {

    $statistics -> code = "202";
    $statistics -> message = "Load Data Successfully";
    $statistics -> statistics = $captain_statistics;
    
  }else{

    $statistics -> code = "206";
    $statistics -> message = "Failed to load data";

  }

  
   $result = json_encode($statistics);
   echo "$result";


} 





/*

    Function for retrieving bank detail

*/
function retrieve_driving_license($captain_id) {
  
  $riderDocumentList = [];
  $rider = new Rider();


  $table = $GLOBALS['table_name_captain_document'];
  $query = "SELECT picture.id , document.id as document_id , document.document_type , document.status , picture.picture_url
  FROM $table as document
  INNER JOIN  DocumentPicture as picture ON picture.term_id = document.id
  WHERE document.term_id = '$captain_id' AND document.enable = '0' AND document.document_type = 'driving_license' ";
  $result=queryRunner($query);
  $count=countRow($result); 

  while ($row = rowRetriever($result)) { 

    if ($row['status'] == "1") {
       $document_status = "Under Processing";
    }else if ($row['status'] == "2") {
      $document_status = "Canceled";
    }else if ($row['status'] == "0") {
      $document_status = "Approved";
    }
    

     array_push($riderDocumentList, [
                  'id' => $row['id'], 
                  'document_id' => $row['document_id'], 
                  'document_type' => $row['document_type'],
                  'document_status' => $document_status ,
                  'picture_url' => $row['picture_url']
                ]);
   }

  if ($count > 0) {
    
    $rider -> code ="202";
    $rider -> message ="Data Load Successfully";
    $rider -> riderDetail = $riderDocumentList;

  }else{

    $rider -> code ="206";
    $rider -> message ="Failed to load data";

  }

  $result = json_encode($rider);
  echo "$result";

} 




/*

    Function for retrieving bank detail

*/
function retrieve_national_identity_card($captain_id) {
  
  $riderDocumentList = [];
  $rider = new Rider();


  $table = $GLOBALS['table_name_captain_document'];
  $query = "SELECT picture.id , document.id as document_id , document.document_type , document.status , picture.picture_url
  FROM $table as document
  INNER JOIN  DocumentPicture as picture ON picture.term_id = document.id
  WHERE document.term_id = '$captain_id' AND document.enable = '0' AND document.document_type = 'national_identity_card' ";
  $result=queryRunner($query);
  $count=countRow($result); 

  while ($row = rowRetriever($result)) { 

    if ($row['status'] == "1") {
       $document_status = "Under Processing";
    }else if ($row['status'] == "2") {
      $document_status = "Canceled";
    }else if ($row['status'] == "0") {
      $document_status = "Approved";
    }
    

     array_push($riderDocumentList, [
                  'id' => $row['id'], 
                  'document_id' => $row['document_id'], 
                  'document_type' => $row['document_type'],
                  'document_status' => $document_status ,
                  'picture_url' => $row['picture_url']
                ]);
   }

  if ($count > 0) {
    
    $rider -> code ="202";
    $rider -> message ="Data Load Successfully";
    $rider -> riderDetail = $riderDocumentList;

  }else{

    $rider -> code ="206";
    $rider -> message ="Failed to load data";

  }

  $result = json_encode($rider);
  echo "$result";

} 



/*

    Function for retrieving bank detail

*/
function retrieve_car_documents($captain_id) {
  
  $riderDocumentList = [];
  $rider = new Rider();


  $table = $GLOBALS['table_name_captain_document'];
  $query = "SELECT picture.id , document.id as document_id ,  document.document_type , document.status , picture.picture_url
  FROM $table as document
  INNER JOIN  DocumentPicture as picture ON picture.term_id = document.id
  WHERE document.term_id = '$captain_id' AND document.enable = '0' AND document.document_type = 'car_documents' ";
  $result=queryRunner($query);
  $count=countRow($result); 

  while ($row = rowRetriever($result)) { 

    if ($row['status'] == "1") {
       $document_status = "Under Processing";
    }else if ($row['status'] == "2") {
      $document_status = "Canceled";
    }else if ($row['status'] == "0") {
      $document_status = "Approved";
    }
    

     array_push($riderDocumentList, [
                  'id' => $row['id'], 
                  'document_id' => $row['document_id'], 
                  'document_type' => $row['document_type'],
                  'document_status' => $document_status ,
                  'picture_url' => $row['picture_url']
                ]);
   }

  if ($count > 0) {
    
    $rider -> code ="202";
    $rider -> message ="Data Load Successfully";
    $rider -> riderDetail = $riderDocumentList;

  }else{

    $rider -> code ="206";
    $rider -> message ="Failed to load data";

  }

  $result = json_encode($rider);
  echo "$result";

} 




/*

    Function for retrieving bank detail

*/
function retrieve_car_pictures($captain_id) {
  
  $riderDocumentList = [];
  $rider = new Rider();


  $table = $GLOBALS['table_name_captain_document'];
  $query = "SELECT picture.id , document.id as document_id , document.document_type , document.status , picture.picture_url
  FROM $table as document
  INNER JOIN  DocumentPicture as picture ON picture.term_id = document.id
  WHERE document.term_id = '$captain_id' AND document.enable = '0' AND document.document_type = 'car_pictures' ";
  $result=queryRunner($query);
  $count=countRow($result); 

  while ($row = rowRetriever($result)) { 

    if ($row['status'] == "1") {
       $document_status = "Under Processing";
    }else if ($row['status'] == "2") {
      $document_status = "Canceled";
    }else if ($row['status'] == "0") {
      $document_status = "Approved";
    }
    

     array_push($riderDocumentList, [
                  'id' => $row['id'], 
                  'document_id' => $row['document_id'], 
                  'document_type' => $row['document_type'],
                  'document_status' => $document_status ,
                  'picture_url' => $row['picture_url']
                ]);
   }

  if ($count > 0) {
    
    $rider -> code ="202";
    $rider -> message ="Data Load Successfully";
    $rider -> riderDetail = $riderDocumentList;

  }else{

    $rider -> code ="206";
    $rider -> message ="Failed to load data";

  }

  $result = json_encode($rider);
  echo "$result";

} 


/*

    Function for adding Reviews into Restaurants

*/

function addDocumentsToRider($captain_id,$document_type,$pictures) {
  
  $products = [];
  $product = new Product();

   $query= "INSERT INTO CaptainDocuments (term_id, document_type) VALUES ('$captain_id','$document_type')";
   $result=queryRunner($query);
   $document_id = findLastInsertId();


  for( $i = 0; $i<count($pictures); $i++ ) {
            

    $pictureData =  base64_decode($pictures[$i]['picture']);
    $picture_name = $pictures[$i]['picture'];
    $pictureName=($captain_id.'_'.$i).'_document_'.rand().'.png';
    file_put_contents($_SERVER['DOCUMENT_ROOT'].'/kareem_taxi_app/admin/uploads/image/'.$pictureName, $pictureData);
     
     $query= "INSERT INTO DocumentPicture (term_id, picture_url) VALUES ('$document_id','$pictureName')";
     $result=queryRunner($query);

    }

    if ($document_type == "driving_license") {
        retrieve_driving_license($captain_id);
    }elseif ($document_type == "national_identity_card") {
        retrieve_national_identity_card($captain_id);
    }elseif ($document_type == "car_documents") {
        retrieve_car_documents($captain_id);
    }elseif ($document_type == "car_pictures") {
        retrieve_car_pictures($captain_id);
    }



    ////getRiderDocuments($rider_id);
    
} 



/*

    Function for adding Reviews into Restaurants

*/

function updateRiderDocuments($captain_id,$document_type,$document_id,$pictures) {
  
  $products = [];
  $product = new Product();


  for( $i = 0; $i<count($pictures); $i++ ) {
            

    $pictureData =  base64_decode($pictures[$i]['picture']);
    $picture_name = $pictures[$i]['picture'];
    $pictureName=($captain_id.'_'.$i).'_document_'.rand().'.png';
    file_put_contents($_SERVER['DOCUMENT_ROOT'].'/kareem_taxi_app/admin/uploads/image/'.$pictureName, $pictureData);
     
     $query= "INSERT INTO DocumentPicture (term_id, picture_url) VALUES ('$document_id','$pictureName')";
     $result=queryRunner($query);

    }

    if ($document_type == "driving_license") {
        retrieve_driving_license($captain_id);
    }elseif ($document_type == "national_identity_card") {
        retrieve_national_identity_card($captain_id);
    }elseif ($document_type == "car_documents") {
        retrieve_car_documents($captain_id);
    }elseif ($document_type == "car_pictures") {
        retrieve_car_pictures($captain_id);
    }



    ////getRiderDocuments($rider_id);
    
} 





/*

    Function for updating status of Rider
*/
function deleteRiderDocument($rider_document_id) {
  


  /* For finding nearest places by keeping in view given radius */


  $query = "DELETE FROM  DocumentPicture WHERE id = '$rider_document_id' ";
  $result=queryRunner($query);

  

} 






/*

    Function for retrieving Rider Bank Detail

*/
function getRiderBankDetail($captain_id) {
  
  $bankDetail = [];
  $rider = new Rider();

   $table = $GLOBALS['table_name_captain_bank'];
   $query = "SELECT captain_bank.id  , captain_bank.account_holder_name as holder_name , 
   captain_bank.account_no as account_no , captain_bank.bank_no as bank_no  , 
   captain_bank.bank_transit_no as bank_transit_no 
   FROM $table as captain_bank 
   WHERE captain_bank.captain_id = '$captain_id' ";
   $result=queryRunner($query);

   while ($row = rowRetriever($result)) { 
     array_push($bankDetail, [
                  'account_number_id' => $row['id'], 
                  'holder_name' => $row['holder_name'],
                  'account_no' => $row['account_no'],
                  'bank_no' => $row['bank_no'],
                  'bank_transit_no' => $row['bank_transit_no']
                ]);
   }

  if (count($bankDetail)>0) {
    
    $rider -> code ="202";
    $rider -> message ="Data Load Successfully";
    $rider -> riderDetail = $bankDetail;

  }else{

    $rider -> code ="206";
    $rider -> message ="Failed to load data";

  }

  $result = json_encode($rider);
  echo "$result";

    
} 




/*

    Function for retrieving Rider Bank Detail

*/
function insertRiderBankDetail($captain_id,$holder_name,$account_no,$transist_no,$bank_no) {
  
  $bankDetail = [];
  $rider = new Rider();

   $table = $GLOBALS['table_name_captain_bank'];
   $query = "INSERT INTO $table
    ( captain_id , account_holder_name ,  account_no , bank_no  , bank_transit_no )
   VALUES
    ('$captain_id','$holder_name','$account_no','$bank_no' , '$transist_no') ";
   $result=queryRunner($query);

  if ($result != null) {
    
    getRiderBankDetail($captain_id);
   

  }else{

    $rider -> code ="206";
    $rider -> message ="Failed to Add Bank Detail";
    $result = json_encode($rider);
    echo "$result";

  }

    
} 


/*

    Function for retrieving Rider Bank Detail

*/
function updateRiderBankDetail($captain_id,$account_id,$holder_name,$account_no,$transist_no,$bank_no) {
  
  $bankDetail = [];
  $rider = new Rider();

   $table = $GLOBALS['table_name_captain_bank'];
   $query = "UPDATE $table SET account_holder_name = '$holder_name' , account_no = '$account_no' , 
   bank_transit_no = '$transist_no' ,  bank_no = '$bank_no' WHERE id = '$account_id' ";
   $result=queryRunner($query);

  if ($result != null) {
    
    getRiderBankDetail($captain_id);
   

  }else{

    $rider -> code ="206";
    $rider -> message ="Failed to Update Bank Detail";
    $result = json_encode($rider);
    echo "$result";

  }

    
} 





/*

    Function for updating status of Rider
*/
function pushRiderStatus($captain_id,$rider_status) {
  
  $orderList = [];
  $orderHistory = new OrderHistory();

  /* For finding nearest places by keeping in view given radius */

  $table = $GLOBALS['table_name_captain'];
  

  if ($rider_status == "0") {
    
      $query = "UPDATE $table SET live = '$rider_status' WHERE id = '$captain_id' AND enable = '0' ";
      $result=queryRunner($query);

  }else if ($rider_status == "1") {
    
      $query = "UPDATE $table SET live = '$rider_status' WHERE id = '$captain_id' AND enable = '0' ";
      $result=queryRunner($query);

  }

} 





/*

It is used to get All Categories Data

*/
function loginRider($email,$pass)
{

  $tableUser=$GLOBALS['table_name_captain'];
  $query="SELECT * FROM $tableUser WHERE email='$email' AND password='$pass'";
  $result=queryRunner($query);
  $count=countRow($result); 
  
  $user=new User(); 
  $data = [];
  $favouriteList = [];

  if ($count>0) {

    // Loop through query and push results into $data;
    while ($row = rowRetriever($result)) {
  
      array_push($data, [
        'id'   => $row['id'],
        'rider_name' => $row['name'],
        'rider_email'   => $row['email'],
        'rider_password'   => $row['password'],
        'rider_phone'   => $row['phone'],
        'rider_picture' => $row['picture'],
        'status' => $row['status'],
        'enable' => $row['enable']
      ]);
   
    }
     

     $user -> id=$data[0]['id'];
     $user -> fName=$data[0]['rider_name'];
     $user -> pass=$data[0]['rider_password'];
     $user -> phone=$data[0]['rider_phone'];
     $user -> email=$data[0]['rider_email'];
     $user -> avatar=$data[0]['rider_picture'];
     $user -> status = $data[0]['status'];

     if ($data[0]['enable']=="1") {
       
        $user -> code="206";
        $user -> message="Your account did not approved until yet";

     }else{

        $user -> code="202";
        $user -> message="Successfully Login";

     }
     

    
    
  }else{


    $user -> code="206";
    $user -> message="No data available";

  }
  

  $result = json_encode($user);
    echo "$result";

}



/*

It is used to get All Categories Data

*/
function registerRider($email,$pass,$fName,$avatar,$deviceId,$phone,$car_brand,$car_name,$car_colour,$car_number_plate,$address,$latitude,$longitude,$place_id,$car_category_id)
{

  $user=new User(); 

  $tableUser=$GLOBALS['table_name_captain'];
  $query="SELECT * FROM $tableUser WHERE email='$email' OR  phone ='$phone' ";
  $result=queryRunner($query);
  $count=countRow($result);

  if ($count > 0 ) {
   
    $user -> code="206";
    $user -> message="Account Already existed"; 

  }else{

   
  $query = "INSERT INTO $tableUser (name,email,password,phone,device_token,address,latitude,longitude,place_id,ride_type_id) VALUES ('$fName','$email','$pass','$phone','$deviceId','$address','$latitude','$longitude','$place_id','$car_category_id')";
  $result=queryRunner($query);
  $count=countRow($result);


    if ($result != null) {
         
         $pictureData = base64_decode($avatar);
         $userId=findLastInsertId();
         file_put_contents($_SERVER['DOCUMENT_ROOT'].'/kareem_taxi_app/admin/uploads/image/'.$userId.'.png', $pictureData);
         $pictureName=findLastInsertId().".png";
         $query_update= "UPDATE  $tableUser SET picture='$pictureName' WHERE id='$userId' ";
         $result_update=queryRunner($query_update);


         $query_car = "INSERT INTO CaptainMeta (term_id,brand_name,car_name,car_colour,car_number_plate) VALUES ('$userId','$car_brand','$car_name','$car_colour','$car_number_plate')";
         $result_car=queryRunner($query_car);


         $user -> code="202";
         $user -> message="Account Registered Successfully , you would receive email after approval";
        
      }else{

         $user -> code="206";
        $user -> message="Account Already existed"; 

      }

  }
 

    $result = json_encode($user);
    echo "$result";

}



/*

It is used to trigger forgot password

*/

function forgotRiderPassword($email)
{

  $tableUser=$GLOBALS['table_name_captain'];
  $query = "SELECT * FROM $tableUser WHERE email='$email' ";
  
  $result=queryRunner($query);
  $count=countRow($result);

  $pass=null;
  $user=new User();

  while ($row = rowRetriever($result)) {

   $pass=$row['rider_password'];

  }


    $to = $email; // this is your Email address
        $from = "email@kareem_taxi_app.com"; // this is your Email address
        $headers = "From:" . $from;
        $subject="Forget Password";
        $message = "Your password is: ".$pass." ";
        mail($to,$subject,$message,$headers); 



  if ($pass!=null) {
    # code...
    //echo "Your password is emailed to you";
    $user -> code ="202";
    $user -> message ="Your password is emailed to you at ".$email;

  }else{

     //echo "Sorry there is a problem.Kindly contact admin";
      $user -> code ="206";
    $user -> message ="Sorry there is a problem.Kindly contact admin";

  }
  

  $result = json_encode($user);
  echo "$result";
  

}




/*

  It is used to update data

*/
function update_captain_name($captain_id,$first_name){


 $profile = new Profile();

 $table=$GLOBALS['table_name_captain'];
 $query = "UPDATE $table SET name = '$first_name'  WHERE id = '$captain_id' ";
 $result=queryRunner($query);

 if ($result != null) {
   
   $profile -> code = "202";
   $profile -> message = "Updated Successfully";

  }else{

   $profile -> code = "206";
   $profile -> message = "Failed to load";

  }

  $result = json_encode($profile);
  echo "$result";

}



/*

  It is used to update data

*/
function update_captain_email($captain_id,$email){


 $profile = new Profile();

 $table=$GLOBALS['table_name_captain'];
 $query = "UPDATE $table SET email = '$email'  WHERE id = '$captain_id' ";
 $result=queryRunner($query);

 if ($result != null) {
   
   $profile -> code = "202";
   $profile -> message = "Updated Successfully";

  }else{

   $profile -> code = "206";
   $profile -> message = "Failed to load";

  }

  $result = json_encode($profile);
  echo "$result";

}


/*

  It is used to update data

*/
function update_captain_password($captain_id,$password){


 $profile = new Profile();

 $table=$GLOBALS['table_name_captain'];
 $query = "UPDATE $table SET password = '$password' WHERE id = '$captain_id' ";
 $result=queryRunner($query);

 if ($result != null) {
   
   $profile -> code = "202";
   $profile -> message = "Updated Successfully";

  }else{

   $profile -> code = "206";
   $profile -> message = "Failed to load";

  }

  $result = json_encode($profile);
  echo "$result";

}




/*

  It is used to update data

*/
function update_captain_location($captain_id,$latitude,$longitude){


 $profile = new Profile();

 $table=$GLOBALS['table_name_tracking'];
 $query = "REPLACE INTO $table (term_id,latitude,longitude) VALUES ('$captain_id','$latitude','$longitude') ";
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




function report_ride($order_id,$report){

    $table=$GLOBALS['table_name_ride_order'];
    $query="SELECT ride_order.captain_id FROM $table as ride_order
     INNER JOIN Captain as captain ON captain.id = ride_order.captain_id AND captain.enable = '0'
     WHERE ride_order.id='$order_id'";
     //echo $query;
    $result=queryRunner($query);
    while ($row = rowRetrieverObject($result)) {
       $captain_id = $row -> captain_id;
    }

    $query = "REPLACE INTO Report (order_id , captain_id , report  ) VALUES ('$order_id' , '$captain_id' , '$report' )";
     $result=queryRunner($query);

  
}




/*

It is used to get All Categories Data

*/
function login($email,$pass,$userType,$uid)
{

  $tableUser=$GLOBALS['table_name_user'];
 
  if ($userType=="native") {
    $query="SELECT * FROM $tableUser WHERE email='$email' AND password='$pass'";
  }else{
    $query="SELECT * FROM $tableUser WHERE email='$email' AND password = '$email' ";
  }
  
  $result=queryRunner($query);
  $count=countRow($result); 
  
  $user=new User(); 
  $data = [];
  $favouriteList = [];

  if ($count>0) {

    // Loop through query and push results into $data;
    while ($row = rowRetriever($result)) {
  
      array_push($data, [
        'id'   => $row['id'],
        'first_name' => $row['first_name'],
        'last_name' => $row['last_name'],
        'email'   => $row['email'],
        'password'   => $row['password'],
        'phone'   => $row['phone'],
        'profile_picture' => $row['profile_picture'],
        'uid' => $row['uid'],
        'login_type' => $row['login_type'],
        'enable' => $row['enable']
      ]);
   
    }
     
     /*$user_id = $data[0]['id'];
     $query="SELECT * FROM Favourite WHERE user_id ='$user_id' ";
     $result=queryRunner($query);
     while ($row = rowRetriever($result)) {
  
        array_push($favouriteList, [
          'id'   => $row['id'],
          'user_id' => $row['user_id'],
          'restaurant_id' => $row['restaurant_id']
        ]);
   
    }*/

     $user -> code="202";
     $user -> message="Data Retrieve Successfully";
     $user -> id=$data[0]['id'];
     $user -> fName=$data[0]['first_name'];
     $user -> lName=$data[0]['last_name'];
     $user -> pass=$data[0]['password'];
     $user -> phone=$data[0]['phone'];
     $user -> email=$data[0]['email'];
     $user -> avatar=$data[0]['profile_picture'];
     $user -> uid=$data[0]['uid'];
     $user -> userType=$data[0]['login_type'];
     $user -> isEnable=$data[0]['enable'];
     ///$user -> favouriteList = $favouriteList;

    
    
  }else{


    $user -> code="206";
    $user -> message="No data available";

  }
  

  $result = json_encode($user);
    echo "$result";

}



/*

It is used to get All Categories Data

*/
function register($email,$pass,$fName,$lName,$avatar,$userType,$uid,$deviceId,$phone)
{

  $tableUser=$GLOBALS['table_name_user'];

  if ($userType=="native") {
    $query="SELECT * FROM $tableUser WHERE email='$email'";
  }else{
    $query="SELECT * FROM $tableUser WHERE email='$email'";
  }

  $result=queryRunner($query);
  $count=countRow($result);

  //echo "$query";

  $user=new User();

  if ($count<=0) {

  if ($userType=="native") {
      $query = "INSERT INTO $tableUser (first_name,last_name,email,password,phone,login_type,device_token) VALUES ('$fName','$lName','$email','$pass','$phone','$userType','$deviceId')";
    }else {
      $query = "INSERT INTO $tableUser (first_name,last_name,email,password,phone,login_type,uid,device_token) VALUES ('$fName','$lName','$email','$email','$phone','$userType','$uid','$deviceId')";
      $pass = $email;
    } 

  
  $result=queryRunner($query);


    if (!$result) {
          # code...
        $isSuccess=false;

      }else{

        $isSuccess=true;

      }

        $data = [];

        /*if ($userType=="native") {

          if ($isSuccess) {
            # code...
            
            $pictureData = base64_decode($avatar);
            $userId=findLastInsertId();
            file_put_contents($_SERVER['DOCUMENT_ROOT'].'/kareem_taxi_app/admin/uploads/image/'.$userId.'.png', $pictureData);
            $pictureName=findLastInsertId().".png";
            $query_update= "UPDATE  $tableUser SET profile_picture='$pictureName' WHERE id='$userId' ";
            $result_update=queryRunner($query_update);
              $isPicture=true;
            

          }else{

             $isPicture=false;
            
          }


      }else{

      $userId=findLastInsertId();
        $pictureName=$avatar;
        $query_update= "UPDATE  $tableUser SET profile_picture='$pictureName' WHERE id='$userId' ";
        $result_update=queryRunner($query_update);
          $isPicture=true;
      }*/

      $isPicture = true;

      if ($isPicture) {

         $user -> code="202";
         $user -> message="Data Retrieve Successfully";
         $user -> id=$userId;
         $user -> fName=$fName;
         $user -> lName=$lName;
         $user -> pass=$pass;
         $user -> phone=$phone;
         $user -> email=$email;
         $user -> avatar=$pictureName;
         $user -> userType=$userType;

    
      }else{


      $user -> code="206";
      $user -> message="Problem while creating account";

      }

    }else{

        if ( $userType=="facebook" || $userType=="google" ) {
          login($email,$pass,$userType,$uid);
          return;
        }

        $user -> code="206";
        $user -> message="Account Already existed";

    }

    $result = json_encode($user);
      echo "$result";

}



/*

It is used to trigger forgot password

*/

function forgotPassword($email)
{

  $tableUser=$GLOBALS['table_name_user'];
  $query = "SELECT * FROM $tableUser WHERE email='$email' ";
  
  $result=queryRunner($query);
  $count=countRow($result);

  $pass=null;
  $user=new User();

  while ($row = rowRetriever($result)) {

   $pass=$row['password'];

  }


    $to = $email; // this is your Email address
        $from = "email@status4u.com"; // this is your Email address
        $headers = "From:" . $from;
        $subject="Forget Password";
        $message = "Your password is: ".$pass." ";
        mail($to,$subject,$message,$headers); 



  if ($pass!=null) {
    # code...
    //echo "Your password is emailed to you";
    $user -> code ="202";
    $user -> message ="Your password is emailed to you at ".$email;

  }else{

     //echo "Sorry there is a problem.Kindly contact admin";
      $user -> code ="206";
    $user -> message ="Sorry there is a problem.Kindly contact admin";

  }
  

  $result = json_encode($user);
  echo "$result";
  

}



function chargePayment($order_id,$stripe_token,$currency_symbol,$amount){

  $stripe_keys = [];
  $currency_symbol_list = [];
  $code;
  $message;

  
  $public_token = $GLOBALS['stripe_public_token'];
  $private_token = $GLOBALS['stripe_private_token'];
  $productOrder = new ProductOrder();


    \Stripe\Stripe::setApiKey($private_token);  /// For Testing purpose , uncomment this line


    try {

    //$charge = \Stripe\Charge::create(['amount' => 2000, 'currency' => 'usd', "customer" => $customer->id]);
    // Charge the Customer instead of the card
    \Stripe\Charge::create(array(
      "amount" => $amount."00" , # amount in cents, again
      "currency" => $currency_symbol,
      "customer" => $stripe_token)
    );
    $code = "202";

    } catch(\Stripe\Exception\CardException $e) {
    // Since it's a decline, \Stripe\Exception\CardException will be caught

    /*echo 'Status is:' . $e->getHttpStatus() . '\n';
    echo 'Type is:' . $e->getError()->type . '\n';
    echo 'Code is:' . $e->getError()->code . '\n';*/

    // param is '' in this case

    /*echo 'Param is:' . $e->getError()->param . '\n';
    echo 'Message is:' . $e->getError()->message . '\n';*/

    $code = "206";
    $message = $e->getError()->message;

  } catch (\Stripe\Exception\RateLimitException $e) {
    // Too many requests made to the API too quickly

    /*echo 'Message is:' . $e->getError()->message . '\n';*/

    $code = "206";
    $message = $e->getError()->message;

  } catch (\Stripe\Exception\InvalidRequestException $e) {
    // Invalid parameters were supplied to Stripe's API

    /*echo 'Message is:' . $e->getError()->message . '\n';*/

    $code = "206";
    $message = $e->getError()->message;

  } catch (\Stripe\Exception\AuthenticationException $e) {
    // Authentication with Stripe's API failed
    // (maybe you changed API keys recently)

    /*echo 'Message is:' . $e->getError()->message . '\n';*/

    $code = "206";
    $message = $e->getError()->message;

  } catch (\Stripe\Exception\ApiConnectionException $e) {
    // Network communication with Stripe failed

    /*echo 'Message is:' . $e->getError()->message . '\n';*/

    $code = "206";
    $message = $e->getError()->message;

  } catch (\Stripe\Exception\ApiErrorException $e) {
    // Display a very generic error to the user, and maybe send
    // yourself an email

    /*echo 'Message is:' . $e->getError()->message . '\n';*/

    $code = "206";
    $message = $e->getError()->message;

  } catch (Exception $e) {
    // Something else happened, completely unrelated to Stripe

    /*echo 'Message is:' . $e->getError()->message . '\n';*/

    $code = "206";
    $message = $e->getError()->message;

  } 

  if ($code == "202") {
    
   $productOrder -> code ="202";
   $productOrder -> message = "Order Successfully";
   $productOrder -> order_id = $order_id;

  }else{

    $productOrder -> code ="206";
    $productOrder -> message = $message;

  }

  return $productOrder;
  ///$result = json_encode($productOrder);
    //echo "$result";

}



/*

It is used to trigger forgot password

*/

function retrieve_privacy_policy()
{

  $tableUser=$GLOBALS['table_name_policy'];
  $query = "SELECT * FROM $tableUser  ";
  
  $result=queryRunner($query);
  $count=countRow($result);


  while ($row = rowRetrieverObject($result)) {

    $privacy = $row -> description;

  }

  $policy = new PrivacyPolicy();
  $policy -> code = "202";
  $policy -> message = "Data load Successfully";
  $policy -> privacy = $privacy;
  

  $result = json_encode($policy);
  echo "$result";
  

}




?>




