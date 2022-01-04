<?php 

$con = mysql_connect("localhost","db_username","db_password");
$db = mysql_select_db("db_name",$con);
	
	if(!$db)
	{
		mysql_error();
	}



	

?>