<?php
##########  This is the landing page the user is directed to from login if they have or create a valid session  ##########
session_start();
// Set the page title and include the HTML header:

// Also validate the HTTP_USER_AGENT!
if (!isset($_SESSION['agent']) OR ($_SESSION['agent'] != md5($_SERVER['HTTP_USER_AGENT']) )) {

	$title = 'Departure - Login Failure';
	include ('includes/header.php');
	echo '<div class="alert alert-danger">Please <a href="login.php">login</a> to view this page</div>';
	exit();

} else {
	$title = 'Welcome to the illuminati portal';
	include ('includes/header.php');
}


?>
<div class="container-fluid">
	<div class="jumbotron text-center">
		<div class="page-header">
			<h1>One of Us!</h1>
		</div>
		<p>You have seen past our ingenious facade and we welcome you among our numbers</p>
		<p>
			<?php echo $_SESSION['name'].', welcome to the illuminati'; ?>
		</p>
		<p><a href="logout.php" class="btn btn-lg btn-warning logout">Logout</a></p>
	</div>
</div>
<?php
include ('includes/footer.php');
?>
