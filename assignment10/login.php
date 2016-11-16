<?php
#########  This script shows the login form, and handles its submissions  ##########

#set title variable and include header and connection scripts
include ('includes/mysqli_connect.php');

#redirect if already logged in
if (isset($_SESSION['agent']) AND ($_SESSION['agent'] = md5($_SERVER['HTTP_USER_AGENT']) )) {
	header("location: logged.php");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$e = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
	$p = filter_var($_POST['pass'],FILTER_SANITIZE_STRING);

	if (empty($e)) {
		$errors[] = 'Email is required.';
	}

	if (empty($p)) {
		$errors[] = 'Password is required.';
	}

	if (empty($errors)) { // If everything's OK.

			// Retrieve the user_id and first_name for that email/password combination:
			$q = "SELECT * FROM users WHERE EMAIL='$e' AND PASSWORD=SHA1('$p')";
			$r = @mysqli_query ($conn, $q); // Run the query.

			// Check the result:
			if (mysqli_num_rows($r) == 1) {

				// Fetch the record:
				$row = mysqli_fetch_array ($r, MYSQLI_ASSOC);

				// Return true and the record:
				if ($row) {

					// Set the session data:
					session_start();
					$_SESSION['user'] = $row['ID'];
					$_SESSION['name'] = $row['FNAME'].' '.$row['LNAME'];

					// Store the HTTP_USER_AGENT:
					$_SESSION['agent'] = md5($_SERVER['HTTP_USER_AGENT']);

					// Redirect:
					header('location:logged.php');

				} else { // Unsuccessful!

					$errors[] = 'We were unable to log you in at this time. Please doublecheck the email and password and try again.';

				}

			} else { // Not a match!
				$errors[] = 'The email address and password entered do not match those on file.';
			}

		}
	}

$title = 'Departure - Login';
include ('includes/header.php');
// Print any error messages, if they exist:
if (!empty($errors)) {
	echo '<div class="alert alert-danger">Oops! We see some problems:<br />';
	foreach ($errors as $msg) {
		echo " - $msg<br />\n";
	}
	echo 'Please try again.</div>';
}

// Display the form:
?>
<div class="container-fluid">
	<div class="jumbotron">
    <div class="page-header text-center">
      <h1>Welcome Back</h1>
    </div>
    <div class="row">
      <div class="col-md-7">
				<div class="page-header">
						<h2>Your ultimate rambling resource</h2>
				</div>
        <p>Departure delivers industry leading resources to guide you to experiences you've never before experienced. Our innovative approach to curated wanderings is second to none and delivers the ultimate value. Come see what you've been missing.</p>
      </div>
      <div class="col-md-5">
				<div class="page-header">
					<h2>Sign in now</h2>
				</div>
        <form action="login.php" method="POST" class="form-horizontal">
					<div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
				    <div class="col-sm-10">
				      <input type="email" class="form-control" name="email" value="<?php if ($email) {echo $email;}?>">
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
				    <div class="col-sm-10">
				      <input type="password" class="form-control" name="pass" value="<?php if ($password) {echo $password;}?>">
				    </div>
				  </div>
					<div class="text-center">
						<button type="submit" class="btn btn-lg btn-warning">Submit</button>
					</div>
        </form>
			</div>
		</div>
	</div>
</div>

<?php include ('includes/footer.php'); ?>
