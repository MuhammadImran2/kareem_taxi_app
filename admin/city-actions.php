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


if(isset($_POST['city_insert']))
{   
      
      $country_id = mysql_real_escape_string($_POST['country_id']);
      $city_name = mysql_real_escape_string($_POST['city_name']);
      $city_latitude = mysql_real_escape_string($_POST['city_latitude']);
      $city_longitude = mysql_real_escape_string($_POST['city_longitude']);
      

      $query = "INSERT into Location (country_id,name,latitude,longitude) VALUES ('".$country_id."','".$city_name."','".$city_latitude."','".$city_longitude."')";
      $run = queryRunner($query);

      if ($run) {

          session_start();
          $_SESSION['success-insert'] = 'success';
          header("location:city.php?id=".$country_id);

        }

    }
else if (isset($_POST['city_edit'])) 
{
     
      $city_name = mysql_real_escape_string($_POST['city_name']);
      $city_latitude = mysql_real_escape_string($_POST['city_latitude']);
      $city_longitude = mysql_real_escape_string($_POST['city_longitude']);
      $country_id = mysql_real_escape_string($_POST['country_id']);
      $id = $_GET['id'];
      


      $update = "UPDATE Location set name = '".$city_name."' , latitude = '".$city_latitude."' , longitude = '".$city_longitude."'
      where id = '".$id."'";
      $run = queryRunner($update);

      if ($run) {

              session_start();
              $_SESSION['success-edit'] = 'success';
              header("location:city.php?id=".$country_id);

            }


    }
else
{

      $id = $_GET['id'];
      $country_id = mysql_real_escape_string($_GET['country_id']);
      $delete = "DELETE FROM Location where id = '".$id."'";
      $res = queryRunner($delete);
      if($res){
          session_start();
          $_SESSION['success-del'] = 'success';
          header("location:city.php?id=".$country_id);
        }
        
    }






