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



if ($_GET['action'] == "approved"){

      $id = $_GET['id'];
      $rider_id = $_GET['rider_id'];
      $type = $_GET['type'];
      
      $delete = "Update CaptainDocuments SET status = '0' where id = '".$id."' ";
      $run = queryRunner($delete);
    
      if($run)
      {
          session_start();
          $_SESSION['success-del'] = 'success';
          header("location:".$type.".php?id=".$rider_id);
        }
        
}else if ($_GET['action'] == "declined"){

      $id = $_GET['id'];
      $rider_id = $_GET['rider_id'];
      $type = $_GET['type'];
      
      $delete = "Update CaptainDocuments SET status = '1' where id = '".$id."' ";
      $run = queryRunner($delete);
    
      if($run)
      {
          session_start();
          $_SESSION['success-del'] = 'success';
          header("location:".$type.".php?id=".$rider_id);
        }
        
}







