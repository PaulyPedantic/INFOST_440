<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>Form</title>

		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		
		<style>
			body {
				padding-top: 50px; /*make space for bootstrap navbar*/
				background-color: #d4d4aa /*kind of a soft gray*/
			}
			/*I borrowed this spacing from one of the starter templates at getbootstrap.com*/
			.pg-head {
				padding: 40px 15px;
			}	
			}	
		</style>
		
	</head>

	<body>

		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container">
				<div class="navbar-header"> <!-- Standard code for responsive navbar -->
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">Pauly Russ</a>
				</div>
				<div id="navbar" class="collapse navbar-collapse navbar-right">
					<ul class="nav navbar-nav">
						<li class="active"><a href="http://paulruss.uwmsois.com">Home</a></li>
					</ul>
				</div><!--/.nav-collapse -->
			</div>
		</nav>
	
		<div class="container"> 

			<div class="pg-head">
				<h1 class="text-center">Paul Russ Assignment 3 Form</h1>
			</div>
			<div class="text-center"><a href="http://paulruss.uwmsois.com/assignment3/" class="btn btn-lg btn-primary">Back to Index</a></div>
			<form action="http://paulyruss.net">
				<p class="lead">Create an account</p>
				<div class="form-group">
					<label for="Email1">Email address</label>
					<input type="email" class="form-control" id="Email1" placeholder="Email">
				</div>
				<div class="form-group">
					<label for="password1">Password</label>
					<input type="password" class="form-control" id="password1" placeholder="Password">
				</div>
				<div class="form-group">
					<label for="confirmPassword">Re-enter to Confirm Password</label>
					<input type="password" class="form-control" id="confirmPassword" placeholder="Confirm Password">
				</div>

				<div class="form-group">
					<label for="about">Bio</label>
					<textarea class="form-control" id="about" maxlength="3000" placeholder="Tell us about yourself"></textarea>
					<p class="help-block">Limit 3000 characters</p>
				</div>
				<div class="form-group">
					<label for="refer">How did you hear about us?</label>
					<select class="form-control" id="refer">
						<option>Google</option>
						<option>Radio/TV</option>
						<option>Magazine</option>
						<option>Other</option>
					</select>
				</div>
				<div class="form-group">
					<input type="checkbox" id="signUp1" checked > 
					<label for="signUp1">Yes, please sign me up for the monthly newsletter.	</label>
				</div>
				<div class="form-group">
					<input type="checkbox" id="signUp2" checked > 
					<label for="signUp2">Please also send me regular news and updates.</label>
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
