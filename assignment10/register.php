<?php
##########  This script creates user accounts by inserting user records into the table  ##########

$page_title = 'Register';
include ('./includes/header.php');

// Check for form submission:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	require ('./includes/mysqli_connect.php'); // Connect to the db.

	$errors = array(); // Initialize an error array.
	$fname = trim(filter_var($_POST['fname'], FILTER_SANITIZE_STRING));
	$lname = trim(filter_var($_POST['lname'], FILTER_SANITIZE_STRING));
	$email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
	$pass = trim(filter_var($_POST['pass'], FILTER_SANITIZE_STRING));
	$pass2 = trim(filter_var($_POST['pass2'], FILTER_SANITIZE_STRING));

	// Check for a first name:
	if (empty($fname)) {
		$errors[] = 'First name is required.';
	} else {
	}

	// Check for a last name:
	if (empty($lname)) {
		$errors[] = 'Last name is required.';
	} else {
	}

	// Check for an email address:
	if (empty($email)) {
		$errors[] = 'Email address is required.';
	} else {
	}

	// Check for a password and match against the confirmed password:
	if (!empty($pass)) {
		if ($pass != $pass2) {
			$errors[] = 'Passwords do not match.';
		}
	} else {
		$errors[] = 'Password is required.';
	}

	if (empty($errors)) { // If everything's OK.

		// Register the user in the database...

		// Make the query:
		if ($q = mysqli_prepare($conn,"INSERT INTO users (ID, FNAME, LNAME, EMAIL, PASSWORD, CREATED) VALUES (NULL, ?, ?, ?, SHA1(?), NOW() )")) {

			mysqli_stmt_bind_param($q, "ssss", $fname, $lname, $email, $pass);

			mysqli_stmt_execute($q);

			if (mysqli_stmt_affected_rows($q) > 0) {
				$success = 'Success! Your account has been created. Please <a href="login.php">Log In</a> to get started.';
			} else {
				$errors[] = 'Something went wrong creating account. '.mysqli_error($conn).' Please try again';
			}
			}

			mysqli_close($conn); // Close the database connection.

		}

		if (!empty($errors)){
			echo '<div class="alert alert-danger">

			Sorry, there seem to be some problems:<br />';
			foreach ($errors as $msg) { // Print each error.
				echo " - $msg<br />\n";
			}
			echo '</div>';
		} else if (!empty($success)) {
			echo '<div class="alert alert-success">'. $success.'</div>';
		}

	} // End of if (empty($errors)) IF.

?>
<div class="container-fluid">
	<div class="jumbotron">
		<div class="page-header text-center">
			<h1>Register Now!</h1>
			<h2>And take advantage of all Departure has to offer.</h2>
		</div>
		<form class="form-horizontal" action="register.php" method="POST">
			<div class="form-group">
				<label for="fname" class="col-sm-2 control-label">First Name</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" name="fname" value="<?php if ($fname) {echo $fname;}?>">
				</div>

				<label for="lname" class="col-sm-2 control-label">Last Name</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" name="lname" value="<?php if ($lname) {echo $lname;}?>">
				</div>
			</div>
			<div class="form-group">
		    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
		    <div class="col-sm-10">
		      <input type="email" class="form-control" name="email" value="<?php if ($email) {echo $email;}?>">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="pass" class="col-sm-2 control-label">Password</label>
		    <div class="col-sm-10">
		      <input type="password" class="form-control" name="pass" value="<?php if ($pass) {echo $pass;}?>">
		    </div>
		  </div>
			<div class="form-group">
				<label for="pass2" class="col-sm-2 control-label">Confirm Password</label>
				<div class="col-sm-10">
					<input type="password" class="form-control" name="pass2" value="<?php if ($pass2) {echo $pass2;}?>">
				</div>
			</div>
			<div class="text-center">
				<button type="submit" class="btn btn-lg btn-warning">Submit</button>
			</div>
		</form>
	</div>
</div>

<?php include ('includes/footer.php'); ?>
