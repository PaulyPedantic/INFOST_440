<?php
//Create Session
session_start();
//header
include('./includes/header.html');

//If a user name is entered display login mesage
	if (isset($_SESSION['first_name'])) {
		echo "You currently logged in as {$_SESSION['first_name']}. Welcome to our website!";
}


//header
include('./includes/footer.html');
?>