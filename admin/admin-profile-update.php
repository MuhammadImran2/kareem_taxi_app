<?php
session_start();

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
    
function rowRetrieverArray($result){
    
      return mysql_fetch_array($result);
    }    
    
function findLastInsertId(){

      return mysql_insert_id();
    }

function simplifySpecialCharacter($data){

      return mysql_real_escape_string($data);
    }

    if($_POST)
    {
      $pass = $_POST['pass'];
      $id = $_POST['id'];

      $update = "UPDATE Admin set password = '$pass' where id = '".$id."'";
      $res = queryRunner($update);

        if($res){
          session_start();
          $_SESSION['success'] = 'success';
          header("location:admin-profile.php");
        }
    }