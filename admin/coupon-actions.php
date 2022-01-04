 <?php   

session_start();
if(empty($_SESSION['uid']))
 {
    header("location:login.php");
  }


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


if(isset($_POST['coupon_insert']))
{   
      
      $country_id = mysql_real_escape_string($_POST['country_id']);
      $coupon_code = mysql_real_escape_string($_POST['coupon_code']);
      $coupon_reward = mysql_real_escape_string($_POST['coupon_reward']);
      $coupon_limit = mysql_real_escape_string($_POST['coupon_limit']);
      $from_date = mysql_real_escape_string($_POST['from_date']);
      $to_date = mysql_real_escape_string($_POST['to_date']);
      $place_id = mysql_real_escape_string($_POST['city_id']);
     

      $query = "INSERT into Coupon (place_id,coupon_code,coupon_reward,coupon_limit,coupon_from_date,coupon_to_date) VALUES ('".$place_id."','".$coupon_code."','".$coupon_reward."','".$coupon_limit."','".$from_date."','".$to_date."')";
      $run = queryRunner($query);

      if ($run) {

          session_start();
          $_SESSION['success-insert'] = 'success';
          header("location:coupon.php?id=".$country_id);

        }

    }
else if (isset($_POST['coupon_edit'])) 
{
     
      $country_id = mysql_real_escape_string($_POST['country_id']);
      $coupon_code = mysql_real_escape_string($_POST['coupon_code']);
      $coupon_reward = mysql_real_escape_string($_POST['coupon_reward']);
      $coupon_limit = mysql_real_escape_string($_POST['coupon_limit']);
      $from_date = mysql_real_escape_string($_POST['from_date']);
      $to_date = mysql_real_escape_string($_POST['to_date']);
      $place_id = mysql_real_escape_string($_POST['city_id']);
      $id = $_GET['id'];
      



      $update = "UPDATE Coupon set place_id = '".$place_id."' , coupon_code = '".$coupon_code."' , coupon_reward = '".$coupon_reward."' , 
      coupon_limit = '".$coupon_limit."' , coupon_from_date = '".$from_date."' , coupon_to_date = '".$to_date."' where id = '".$id."' ";
      $run = queryRunner($update);

      if ($run) {

              session_start();
              $_SESSION['success-edit'] = 'success';
              header("location:coupon.php?id=".$country_id);

            }


    }
else
{

      $id = $_GET['id'];
      $country_id = mysql_real_escape_string($_GET['country_id']);
      $delete = "DELETE FROM Coupon where id = '".$id."'";
      $res = queryRunner($delete);
      if($res){
          session_start();
          $_SESSION['success-del'] = 'success';
          header("location:coupon.php?id=".$country_id);
        }
        
    }






