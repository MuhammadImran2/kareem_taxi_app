<?php

$db_hostname="localhost";
$db_username="db_username";
$db_password="db_password";
$db_name="db_name";


$connection=mysql_connect($db_hostname,$db_username,$db_password) or die("Connection Problem");
$select_db=mysql_select_db($db_name,$connection) or die("Could not Select Database");





?>