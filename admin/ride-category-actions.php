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


if(isset($_POST['category_insert']))
{   
      
      $category_name = mysql_real_escape_string($_POST['category_name']);

      $query = "INSERT into RideCategory (name) VALUES ('".$category_name."')";
      $run = queryRunner($query);

        if ($run) {

          session_start();
          $_SESSION['success-insert'] = 'success';
          header("location:ride-category.php");

        }

    }
else if (isset($_POST['category_edit'])) 
{
     
      $category_name = mysql_real_escape_string($_POST['category_name']);
      $id = $_GET['id'];


      $update = "UPDATE RideCategory set name = '".$category_name."'  where id = '".$id."'";
      $run = queryRunner($update);

            if ($run) {

              session_start();
              $_SESSION['success-edit'] = 'success';
              header("location:ride-category.php");

            }


    }
else
{

      $id = $_GET['id'];
      
      $delete = "DELETE FROM RideCategory where id = '".$id."'";
      $res = queryRunner($delete);

        if($res){
          session_start();
          $_SESSION['success-del'] = 'success';
          header("location:ride-category.php");
        }
    }



