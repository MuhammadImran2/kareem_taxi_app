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


if(isset($_POST['country_insert']))
{   
      
      $country_name = mysql_real_escape_string($_POST['country_name']);
      $country_percentage = mysql_real_escape_string($_POST['country_percentage']);

      $query = "INSERT into Country (name,percentage) VALUES ('".$country_name."','".$country_percentage."')";
      $run = queryRunner($query);

        if ($run) {

          session_start();
          $_SESSION['success-insert'] = 'success';
          header("location:country.php");

        }

    }
else if (isset($_POST['country_edit'])) 
{
     
      $country_name = mysql_real_escape_string($_POST['country_name']);
      $country_percentage = mysql_real_escape_string($_POST['country_percentage']);
      $id = $_GET['id'];


      $update = "UPDATE Country set name = '".$country_name."' , percentage = '".$country_percentage."'   where id = '".$id."'";
      $run = queryRunner($update);

            if ($run) {

              session_start();
              $_SESSION['success-edit'] = 'success';
              header("location:country.php");

            }


    }
else
{

      $id = $_GET['id'];
      
      $delete = "DELETE FROM Country where id = '".$id."'";
      $res = queryRunner($delete);

        if($res){
          session_start();
          $_SESSION['success-del'] = 'success';
          header("location:country.php");
        }
    }



