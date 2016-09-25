<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>Assignment 3 Index</title>

		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		
		<style>
			body {
				padding-top: 50px;
				background-color: #d4d4aa /*kind of a soft gray*/
			}
			.pg-head {
				padding: 40px 15px;
				text-align: center;
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
				<h1>Paul Russ Assignment 3 Documents:</h1>
				<?php 
					echo '<p class="lead">This is my homework for INFOST 440 for week three. The table below links to the php assignment pages</p>'; 
					//Using some php to echo some content because why not
				?>
			</div>
			<div class="table">
				<table class="table table-condensed table-striped">
					<thead>
						<tr>
							<th>Item #</th>
							<th>Desc.</th>
							<th>Link</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>4</td>
							<td>Escape</td>
							<td><a href="http://paulruss.uwmsois.com/assignment3/escape.php" class="btn btn-primary btn-block">Link</a></td>
						</tr>	
						<tr>
							<td>5</td>
							<td>Quotes</td>
							<td><a href="http://paulruss.uwmsois.com/assignment3/quotes.php" class="btn btn-primary btn-block">Link</a></td>
						</tr>
						<tr>
							<td>6</td>
							<td>Predefined</td>
							<td><a href="http://paulruss.uwmsois.com/assignment3/predefined.php" class="btn btn-primary btn-block">Link</a></td>
						</tr>
						<tr>
							<td>7</td>
							<td>Math</td>
							<td><a href="http://paulruss.uwmsois.com/assignment3/math.php" class="btn btn-primary btn-block">Link</a></td>
						</tr>
						<tr>
							<td>8</td>
							<td>Constant</td>
							<td><a href="http://paulruss.uwmsois.com/assignment3/constant.php" class="btn btn-primary btn-block">Link</a></td>
						</tr>
						<tr>
							<td>9</td>
							<td>Function</td>
							<td><a href="http://paulruss.uwmsois.com/assignment3/functions.php" class="btn btn-primary btn-block">Link</a></td>
						</tr>
						<tr>
							<td>10</td>
							<td>Condition</td>
							<td><a href="http://paulruss.uwmsois.com/assignment3/conditions.php" class="btn btn-primary btn-block">Link</a></td>
						</tr>
						<tr>
							<td>11</td>
							<td>Form</td>
							<td><a href="http://paulruss.uwmsois.com/assignment3/form.php" class="btn btn-primary btn-block">Link</a></td>
						</tr>
					</tbody>
			</div>

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
