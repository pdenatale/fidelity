<?php
session_start();
include '../lib/dbConn.php';
include '../lib/strUtils.php';

$json = $_REQUEST['json'];

if(isset($json) && $json &&
		isFormFieldValid($_REQUEST['username']) &&
		isFormFieldValid($_REQUEST['password'])  )
{
	$username = stripslashes( $_REQUEST['username'] );
	$password = stripslashes( $_REQUEST['password'] );

	//execute the SQL query and return records
	$result = mysql_query("SELECT * FROM end_user WHERE login='$username'");
	$row = mysql_fetch_array($result);
	
	if(isset($row) && $username == $row{'login'} && md5($password) == $row{'password'})
	{
		// Login good, create session variables
		$_SESSION["valid_client_id"] = $row{'id'};
		$_SESSION["valid_client_user"] = $username;
		$_SESSION["valid_time"] = time();
		echo 1;
	}
	else echo 0;
}


?>