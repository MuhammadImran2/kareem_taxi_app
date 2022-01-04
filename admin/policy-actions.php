 <?php   

 session_start();
  if(empty($_SESSION['uid']))
  {
    header("location:login.php");
  }


include('connection.php');

    if(isset($_POST['policy_insert']))
    {   
      
      $policy_title = mysql_real_escape_string($_POST['policy_title']);
      $policy_desc = mysql_real_escape_string($_POST['policy_desc']);

        //(title, description) VALUES ('".$policy_title."', '".$policy_desc. "')
      $query = "UPDATE Policy set title='".$policy_title."' , description = '".$policy_desc. "' where id ='1'";
      $run = mysql_query($query);

        if ($run) {

          session_start();
          $_SESSION['success-insert'] = 'success';
          header("location:policy.php");

        }

    }


    