<?php
include('dbConfig.php');
include ('functions.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	#load post values into variables
	$uname = filter_var($_POST['uname'],FILTER_SANITIZE_STRING);
  $pass = trim(filter_var($_POST['pass'],FILTER_SANITIZE_STRING));
	
	
	$check = credentialCheck($db, $uname, $pass);
	
	if ($check[0]) {
		session_start();
		$_SESSION['loggedInUser'] = $check[1]['usernm'];
		if ($check[1]['admin'] == '1'){
			$_SESSION['admin'] = SHA1($check[1]['usernm']);
		}
		redirect('index.php');
	} else {
		$error = $check[1];
		include('../login.php');
	}
	
} else {
	redirect();
}
?>
