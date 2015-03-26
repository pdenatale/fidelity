<?php
session_start();
include '../lib/dbConn.php';

if (!$_SESSION["valid_client_user"])
{
	// User not logged in, redirect to login page
	Header("Location: /json/loginService.php");
}

// // Display Member information
// echo "<p>User ID: " . $_SESSION["valid_client_id"];
// echo "<p>Username: " . $_SESSION["valid_client_user"];
// echo "<p>Logged in: " . date("m/d/Y", $_SESSION["valid_time"]);
// echo "<br>";

$query = "SELECT promotion.* FROM promotion,end_user WHERE end_user.id=". $_SESSION["valid_client_id"]." AND end_user.id_brand=promotion.id_brand";

$result = mysql_query($query);
$rows = array();
while($r = mysql_fetch_assoc($result)) {
  $rows[] = $r;
}
echo json_encode($rows);
?>