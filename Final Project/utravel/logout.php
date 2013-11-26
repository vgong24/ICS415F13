<?php
session_start();
$host = "localhost";
$user = "user";
$pass = "password";
$db = "test";

mysql_connect($host, $user, $pass);
mysql_select_db($db);

$sql = mysql_query("DELETE FROM active_members WHERE username='".$_SESSION['user']."'");

session_destroy();
header("Location: Online-Booking.php");
exit();

?>