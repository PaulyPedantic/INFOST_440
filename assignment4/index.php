<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>Russ Assign 4</title>

		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<style>
			.body {
				padding-top: 50px; /*make space for bootstrap navbar*/
				background-color: #d4d4aa /*kind of a soft gray*/
			}
			/*I borrowed this spacing from one of the starter templates at getbootstrap.com*/
			.pg-head {
				padding: 40px 15px;
			}
			.logo {
				height: 51px; /*set logo image height to fill navbar*/
				width: 135px; /*width keeps logo proportionate*/
				position: absolute; /*override bootstrap defaults and push logo to top of navbar*/
				top: 0px;
			}
		</style>

	</head>

	<body>

		<!-- my navbar lives here -->

		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container">
				<!-- Standard code for responsive navbar -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="http://paulruss.uwmsois.com/assignment4"><img src="images/logo.png" alt="Low Rent Social Media Logo" class="img-responsive img-rounded logo"></a>
				</div>
				<div id="navbar" class="collapse navbar-collapse navbar-right">
					<ul class="nav navbar-nav">
						<li class="active"><a href="http://paulruss.uwmsois.com">Home</a></li>
					</ul>
				</div><!--/.nav-collapse -->
			</div>
		</nav>

		<!-- Done with the navbar -->

		<!--begin main page content -->

		<div class="container">

			<div class="pg-head">
				<h1 class="text-center">Welcome to Low-Rent Social Media!</h1>
			</div>
			<p class="lead">Please fill in your profile information below</p>

			<!-- begin form -->
			<form action=<?php
/*Validate fields populated and direct to thanks or back to index*/
					if (($_POST['name']) != "" &&
						($_POST['email'] != "") &&
						($_POST['password'] != "") &&
						($_POST['confirmPass'] != "") &&
						($_POST['about'] != "") &&
						($_POST['mm'] != "") &&
						($_POST['dd'] != "") &&
						($_POST['yy'] != "") &&
						($_POST['confirmPass']) == ($_POST['password'])) {
							echo '"http://paulruss.uwmsois.com/assignment4/thanks.php" method="POST" class="form-horizontal">';
						} else {
							echo '"http://paulruss.uwmsois.com/assignment4/index.php" method="POST" class="form-horizontal">';
							echo '<p id="help" class="text-danger">Please be sure all fields are filled in before submitting</p>';
						} 
				?>
						
						<!-- it would make more sense to use javascript or jquery to display bootstrap form contexts and only use php to validate form input before sending to the server
						     but I'm doing it with php because this assignment is focused on working with php -->
				<div class="form-group <?php
//Validate name and show error
					if ($_SERVER['REQUEST_METHOD'] == "POST") { //add this to each conditional formatting statement to make form pretty on initial load
						if (($_POST['name']) == "") {
							echo 'has-error has-feedback';
						} else {
							echo 'has-success has-feedback';
						}
					}
					?>">
					<label for="name" class="col-sm-2 control-label">Full Name</label>
					<div class="col-sm-10">
						<input name="name" type="text" class="form-control" id="name" placeholder="Full Name" value="<?php
//Make sticky
						if (isset($_POST['name'])) {
							echo $_POST['name'];
						}
						?>">
						<?php		//add error icon and message text for screen reader if validation fails
					if (($_POST['name']) == "") {
						echo '<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>';
						echo '<span id="nameError" class="sr-only">(error)</span>';
					} else {
						echo '<span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>';
						echo '<span id="nameSuccess" class="sr-only">(success)</span>';
					}
					?>
					</div>
				</div>
				<div class="form-group <?php
//Validate email and show error
					if (($_POST['email']) == NULL) {
						echo 'has-error has-feedback';
					} else {
						echo 'has-success has-feedback';
					}
					?>">
					<label for="email" class="col-sm-2 control-label">Email address</label>
					<div class="col-sm-10">
						<input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php
//Make sticky
						if (isset($_POST['email'])) {
							echo $_POST['email'];
						}
						?>">
						<?php		//add error icon and message text for screen reader if validation fails
					if (($_POST['email']) == "") {
						echo '<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>';
						echo '<span id="nameError" class="sr-only">(error)</span>';
					} else {
						echo '<span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>';
						echo '<span id="nameSuccess" class="sr-only">(success)</span>';
					}
					?>
					</div>
				</div>
				<div class="form-group <?php
//Validate password and show error
					if (($_POST['password']) == NULL) {
						echo 'has-error has-feedback';
					} else {
						echo 'has-success has-feedback';
					}
					?>">
					<label for="password" class="col-sm-2 control-label">Password</label>
					<div class="col-sm-10">
						<input type="password" class="form-control" id="password" name="password" placeholder="Password" value="<?php
//Make sticky
						if (isset($_POST['password'])) {
							echo $_POST['password'];
						}
						?>">
						<?php		//add error icon and message text for screen reader if validation fails
					if (($_POST['password']) == "") {
						echo '<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>';
						echo '<span id="nameError" class="sr-only">(error)</span>';
					} else {
						echo '<span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>';
						echo '<span id="nameSuccess" class="sr-only">(success)</span>';
					}
					?>
					</div>
				</div>
				<div class="form-group <?php
//Validate confirmPass and show error
					if (($_POST['confirmPass']) == NULL || ($_POST['confirmPass']) != ($_POST['password'])) {
						echo 'has-error has-feedback';
					} else {
						echo 'has-success has-feedback';
					}
					?>">
					<label for="confirmPass" class="col-sm-2 control-label">Re-enter to Confirm </label>
					<div class="col-sm-10">
						<input type="password" class="form-control" id="confirmPass" name="confirmPass" placeholder="Confirm Password" value="<?php
//Make sticky
						if (isset($_POST['confirmPass'])) {
							echo $_POST['confirmPass'];
						}
						?>">
						<?php		//add error icon and message text for screen reader if validation fails
					if (($_POST['confirmPass']) == "" || ($_POST['confirmPass']) != ($_POST['password'])) {
						echo '<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>';
						echo '<span id="nameError" class="sr-only">(error)</span>';
					} else {
						echo '<span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>';
						echo '<span id="nameSuccess" class="sr-only">(success)</span>';
					}
					?>
					</div>
				</div>

				<div class="form-group <?php
//Validate about and show error
					if (($_POST['about']) == NULL) {
						echo 'has-error has-feedback';
					} else {
						echo 'has-success has-feedback';
					}
					?>">
					<label for="about" class="col-sm-2 control-label">Bio</label>
					<div class="col-sm-10">
						<textarea class="form-control" id="about" maxlength="3000" name="about" placeholder="Tell us about yourself"><?php
//Make sticky
						if (isset($_POST['about'])) {
							echo $_POST['about'];
						}
						?></textarea>
						<p class="help-block">Limit 3000 characters</p>
						<?php		//add error icon and message text for screen reader if validation fails
					if (($_POST['about']) == "") {
						echo '<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>';
						echo '<span id="nameError" class="sr-only">(error)</span>';
					} else {
						echo '<span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>';
						echo '<span id="nameSuccess" class="sr-only">(success)</span>';
					}
					?>
					</div>
				</div>
				<div class="form-group <?php
//Validate birthdate and show error
					if (($_POST['mm']) == NULL||($_POST['dd']) == NULL || ($_POST['yy']) == NULL) {
						echo 'has-error has-feedback';
					} else {
						echo 'has-success has-feedback';
					}
					?>">
					<label for="bday" class="col-sm-2 control-label">Birthday</label>
					<div class="form-inline col-sm-10" id="bday">
						<label for="mm">Month</label>
						<select class="form-control" id="mm" name="mm">
						<?php
							if (!isset($_POST['mm'])) {
							
								echo '<option value="" selected>MM</option> <!-- default option names column and has no value -->';
							
								$month = range(1,12);
								
								foreach($month as $thism) {
									echo "<option value=\"$thism\">$thism</option>";
								} 
							} else {
								echo '<option selected value="' . $_POST['mm'] . '">' . $_POST['mm'] . '</option>';  //this method introduced bug of repeated value
								echo '<option value="" >MM</option> <!-- default option names column and has no value -->'; //try to play around and see if you can fix this
							
								$month = range(1,12);
								
								foreach($month as $thism) {
									echo "<option value=\"$thism\">$thism</option>";
								} 
							}
							?>
						</select>
						<label for="dd">Day</label>
						<select class="form-control" id="dd" name="dd">
							<option value="" selected>DD</option>
							<?php
								$day = range(1,31);
								
								foreach($day as $thisd) {
									echo "<option value=\"$thisd\">$thisd</option>";
								} 
							?>
						</select>
						<label for="yy">Year</label>
						<select class="form-control" id="yy" name="yy">
							<option value="" selected>YYYY</option>
							<?php
								$year = range(1940,2010);
								rsort($year);
								foreach($year as $thisy) {
									echo "<option value=\"$thisy\">$thisy</option>";
								} 
							?>
						</select>
					</div> <!-- end of inline form -->
				</div> <!-- end of birthday form group -->
				<div class="form-group">
					<label for="refer" class="col-sm-2 control-label">How did you find Low-Rent?</label>
					<div class="col-sm-10">
 						<label class="radio-inline">
						  <input type="radio" name="refer" id="search" value="search"> Search Engine
						</label>
						<label class="radio-inline">
						  <input type="radio" name="refer" id="radio" value="radio"> Radio
						</label>
						<label class="radio-inline">
						  <input type="radio" name="refer" id="tv" value="tv"> TV
						</label>
						<label class="radio-inline">
						  <input type="radio" name="refer" id="print" value="print"> Magazine
						</label>
						<label class="radio-inline">
						  <input type="radio" name="refer" id="other" value="other"> Other
						</label>
					</div>
				</div>
				<div class="form-group">
					<input type="checkbox" id="signUp1" checked >
					<label for="signUp1">Yes, please sign me up for the monthly newsletter.	</label>
				</div>
						<div class="form-group">
					<input type="checkbox" id="signUp2" checked >
					<label for="signUp2">Please also send me regular news and updates.</label>
				</div>
				<div class="form-group">
					<input type="checkbox" id="findMe" checked >
					<label for="findMe">Allow other users to find me by searching my email address.</label>
				</div>

				<input type="submit" name="submit" value="Submit" class="btn btn-primary btn-lg">
		</form>

		</div><!-- end container -->


		<!-- Bootstrap core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	</body>
</html>
