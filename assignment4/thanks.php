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
			<form action="http://paulruss.uwmsois.com/assignment4/index.phpnet" method="POST" class="form-horizontal">
				<div class="form-group">
					<label for="name" class="col-sm-2 control-label">Full Name</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="name" placeholder="Full Name">
					</div>
				</div>
				<div class="form-group">
					<label for="Email1" class="col-sm-2 control-label">Email address</label>
					<div class="col-sm-10">
						<input type="email" class="form-control" id="Email1" placeholder="Email">
					</div>
				</div>
				<div class="form-group">
					<label for="password1" class="col-sm-2 control-label">Password</label>
					<div class="col-sm-10">
						<input type="password" class="form-control" id="password1" placeholder="Password">
					</div>
				</div>
				<div class="form-group">
					<label for="confirmPassword" class="col-sm-2 control-label">Re-enter to Confirm </label>
					<div class="col-sm-10">
						<input type="password" class="form-control" id="confirmPassword" placeholder="Confirm Password">
					</div>
				</div>

				<div class="form-group">
					<label for="about" class="col-sm-2 control-label">Bio</label>
					<div class="col-sm-10">
						<textarea class="form-control" id="about" maxlength="3000" placeholder="Tell us about yourself"></textarea>
						<p class="help-block">Limit 3000 characters</p>
					</div>
				</div>
				<div class="form-group">
					<label for="bday" class="col-sm-2 control-label">Birthday</label>
					<div class="form-inline col-sm-10" id="bday">
						<label for="mm">Month</label>
						<select class="form-control" id="mm">
							<option>1</option>
							<?php
								//use php array later to generate all possible options
							?>
						</select>
						<label for="dd">Day</label>
						<select class="form-control" id="dd">
							<option>1</option>
							<?php
								//use php array later to generate all possible options
							?>
						</select>
						<label for="yy">Year</label>
						<select class="form-control" id="yy">
							<option>2016</option>
							<?php
								//use php array later to generate all possible options
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
		
				<button type="submit" class="btn btn-primary btn-lg">Submit</button>
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
