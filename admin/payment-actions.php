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


if(isset($_POST['payment_insert']))
{   
      
      $country_id = mysql_real_escape_string($_POST['country_id']);
      $payment_id = mysql_real_escape_string($_POST['payment_id']);
      

      $query = "INSERT into PaymentType (country_id,payment_method_id) VALUES ('".$country_id."','".$payment_id."')";
      $run = queryRunner($query);

      if ($run) {

          session_start();
          $_SESSION['success-insert'] = 'success';
          header("location:payment.php?id=".$country_id);

        }

    }
else if (isset($_POST['payment_edit'])) 
{
     
     
      $payment_id = mysql_real_escape_string($_POST['payment_id']);
      $country_id = mysql_real_escape_string($_POST['country_id']);
      $id = $_GET['id'];
      


      $update = "UPDATE PaymentType set payment_method_id = '".$payment_id."' where id = '".$id."'";
      $run = queryRunner($update);

      if ($run) {

              session_start();
              $_SESSION['success-edit'] = 'success';
              header("location:payment.php?id=".$country_id);

            }


    }
else
{

      $id = $_GET['id'];
      $country_id = mysql_real_escape_string($_GET['country_id']);
      $delete = "DELETE FROM PaymentType where id = '".$id."'";
      $res = queryRunner($delete);
      if($res){
          session_start();
          $_SESSION['success-del'] = 'success';
          header("location:payment.php?id=".$country_id);
        }
        
    }






