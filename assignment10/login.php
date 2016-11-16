<?php
#########  This script shows the login form, and handles its submissions  ##########

#set title variable and include header script
$title = 'Departure - Login';
include ('includes/header.php');

// Print any error messages, if they exist:
if (isset($errors) && !empty($errors)) {
	echo '<div class="alert alert-error">Oops! We see some problems:<br />';
	foreach ($errors as $msg) {
		echo " - $msg<br />\n";
	}
	echo 'Please try again.</div>';
}

// Display the form:
?>
<div class="jumbotron">
  <div class="container">
    <div class="page-header">
      <h1>Departure Login</h1>
    </div>
    <div class="row">
      <div class="col-md-8">
        <h2>The ultimate rambler resource</h2>
        <p>Departure delivers industry leading resources to guide you to experiences you've never before experienced. Our innovative approach to curated wanderings is second to none and delivers the ultimate value. Come see what you've been missing.</p>
      </div>
      <div class="col-md-4">
        <form action="login.php" method="POST">
          <div class="form-group">
            <label class="sr-only" for="email">Email address</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email">
          </div>
          <div class="form-group">
            <label class="sr-only" for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
          </div>
        </form>

<?php include ('includes/footer.php'); ?>
