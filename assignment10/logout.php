<?php
########## This script will blow away the existing sessions and log the user out ##########
// Set the page title and include the HTML header:
$title = 'Departure - Log Out!';
include ('includes/header.php');
// If no session variable exists, redirect the user:
if (isset($_SESSION['agent'])) {


	$_SESSION = array(); // Clear the variables.
	session_destroy(); // Destroy the session itself.
	setcookie ('PHPSESSID', '', time()-3600, '/', '', 0, 0); // Destroy the cookie.

}



// Print a customized message:
?>
<div class="container-fluid">
	<div class="jumbotron text-center">
		<div class="page-header">
			<h1>Logged Out!</h1>
		</div>
		<p>You are now logged out!</p>
	</div>
</div>

<?php
include ('includes/footer.php');
?>
