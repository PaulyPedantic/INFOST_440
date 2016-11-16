<?php
DEFINE ('DB_HOST', 'localhost'); //Database server -- Typically "localhost"
DEFINE ('DB_USER', 'paulruss_assign8'); //Database User Name
DEFINE ('DB_PASSWORD', 'DXMgX?7,NA5{;oge{_'); //Database User Password
DEFINE ('DB_NAME', 'paulruss_assignment8'); //Database Name


//This connects us to the database
$db = @ new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die ('Could not connect to SOIS MySQL server with error: ' . mysqli_connect_error());
if($mysqli->connect_error)
{
    die("$mysqli->connect_errno: $mysqli->connect_error");
}

$content = "paulruss_assignment8.content";
?>