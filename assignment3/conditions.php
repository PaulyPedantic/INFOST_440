<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>Conditions</title>

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
				<h1 class="text-center">Paul Russ Assignment 3 Conditions:</h1>
				<?php 
					echo '<p class="lead text-center">Conditions facilitate dynamic pages by allowing a script to react differently to different scenarios. The general structure is if statement evaluates to true, perform the code in the curly braces. If it does not evaluate to true, proceed to the end of the curly braces without executing the code. elseif behaves the same as if, but can only execute when the code in the original if evaluates to false. Code in an else block executes when all if and elseif statements evaluate to false. Case statements allow selecting an item, and repetetively checking its value against a list and performing the action within the block for which the original value met the criteria.</p>'; 
					$var1 = 3;
					$var2 = 14;
					$sum = $var1 + $var2;
					
					if ($sum == 17) {
						echo "<p>$var1 plus $var2 equals $sum. PHP can correctly do math!</p>";
					} else {
						echo "<p>You\'re telling me that $var1 plus $var2 is $sum and not 17?!? Apparently PHP cannot do math.</p>";
					};
					
					if (1 == 0) {
						echo "<p>This will never display</p>";
					} elseif (1 == 2) {
						echo "<p>This will also never display</p>";
					} else {
						echo "<p>This sentence is the result of a if/elseif/else statement. I set the if and else if statements to values that would never evaluate to true so I know this statement will display</p>";
					};
					
					switch ($var1) {
						case 1:
							echo '<p>$var1 = 1</p>';
							break;
						case 2:
							echo '<p>$var1 = 2</p>';
							break;
						case 3:
							echo '<p>$var1 = 3</p>';
							break;
					};
				?>
				<div class="text-center"><a href="http://paulruss.uwmsois.com/assignment3/" class="btn btn-lg btn-primary">Back to Index</a></div>
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
