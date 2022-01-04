<?php 

include('connection.php');


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
    
function findLastInsertId(){

      return mysql_insert_id();
    }

function simplifySpecialCharacter($data){

      return mysql_real_escape_string($data);
    }

$value = $_GET['var1'];
$type = $_GET['type'];
$id = $_GET['var2'];

if ($value == 1) {
    $value = 0;
}
else{
    $value = 1;
}

      if ($type == "user"){
          $query = "Update User set enable = '" .$value. "' where id = '".$id."'";
      }else if ($type == "country"){
          $query = "Update Country set enable = '" .$value. "' where id = '".$id."'";
      }else if ($type == "ride_category"){
          $query = "Update RideCategory set enable = '" .$value. "' where id = '".$id."'";
      }else if ($type == "payment_method"){
          $query = "Update PaymentMethod set enable = '" .$value. "' where id = '".$id."'";
      }else if ($type == "city"){
          $query = "Update Location set enable = '" .$value. "' where id = '".$id."'";
      }else if ($type == "ride_type"){
          $query = "Update RideType set enable = '" .$value. "' where id = '".$id."'";
      }else if ($type == "ride_type"){
          $query = "Update RideType set enable = '" .$value. "' where id = '".$id."'";
      }else if ($type == "payment"){
          $query = "Update PaymentType set enable = '" .$value. "' where id = '".$id."'";
      }else if ($type == "coupon"){
          $query = "Update Coupon set enable = '" .$value. "' where id = '".$id."'";
      }else if ($type == "report"){
          $query = "Update Report set enable = '" .$value. "' where id = '".$id."'";
      }else if ($type == "ride_enable"){
          $query = "Update Captain set enable = '" .$value. "' where id = '".$id."'";
      }else if ($type == "rider_activation"){
          $query = "Update Captain set status = '" .$value. "' where id = '".$id."'";
      }
      
      //echo $type;
      

      $update = $query;
      $res = queryRunner($update);

        if($res){
            echo $value;
          /*session_start();
          $_SESSION['success-edit'] = 'success';
          echo "<script>window.location.reload();</script>";*/
        }

?>

