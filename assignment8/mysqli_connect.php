<?php
DEFINE ('DB_HOST', 'localhost'); //Database server -- Typically "localhost"
DEFINE ('DB_USER', 'paulpauy_gbook'); //Database User Name
DEFINE ('DB_PASSWORD', '@0mL9$VzGNSPCdjG3Kq%'); //Database User Password
DEFINE ('DB_NAME', 'paulpauy_guestbook'); //Database Name


//This connects us to the database
$db = @ new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die ('Could not connect to MySQL server with error: ' . mysqli_connect_error());
if($mysqli->connect_error)
{
    die("$mysqli->connect_errno: $mysqli->connect_error");
}

$content = "paulpauy_guestbook.comments";
?>
