<?php
include('connection.php');

session_start();
    if(!empty($_SESSION['uid']))
    {
        header("location:index.php");
    }           
?>


<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login - Dashboard</title>


    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>



</head>

<body  style="background-color:#11D06B" >



    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                
                <div class="login-logo text-light"   >
                       <img class="align-content" src="images/app_icon.png" height="90" width="90"  alt="">
                       
                </div>
                
                <div class="login-logo text-light"  style="margin-top:18px; margin-bottom:18px;" align="center" > <h4>Kareem</h4> </div>
                
                <div class="login-form"  >
                    <form method="post">
                        
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" placeholder="Enter Username" name="username" required>
                        </div>
                        
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="pass" placeholder="Enter Password" required>
                        </div>
                                
                                <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
 
                    </form>
                </div>
            </div>
        </div>
    </div>


<?php

function validate($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars(strip_tags($data, ENT_QUOTES));
  return $data;
}


if($_POST)
{       
    
    $em = validate($_POST['username']);
    $pass = validate($_POST['pass']);
    
    $query = "select * from Admin where username = '$em' and password = '$pass' and role = 'admin' ";
    echo $query;
    $run = mysql_query($query);
    $data = mysql_fetch_array($run);
    
        if(($data['username'] != $em) && $data['password'] != $pass )
        {

            //echo "Username or password is incorrect"; 
            ?>
                <div class="center">
                    <div class="myAlert-top alert alert-danger">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close"> &times;</a>
                      <strong>Wrong!</strong> Your Username or Password is not correct. 
                    </div>
                </div>
            <?php
        }

        else if(($data['username'] == $em) && $data['password'] == $pass)
        {
            $_SESSION['uid'] = $data['id'];
            
            header("location:index.php");
        }


}


    include('footer.php');

?>



<style>
    .center{
        display: flex;
        justify-content: center;
    }
    .myAlert-top{
        position: absolute;
        top: 10px;
        z-index: 9999;
    }
</style>
