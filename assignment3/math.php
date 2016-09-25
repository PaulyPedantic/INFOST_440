<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>Math</title>

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
				<h1>Paul Russ Assignment Math</h1>
				<?php 
					$n1 = 3; /*declare n1 variable*/
					$n2 = 14; /*declare n2 variable*/
					$product = $n1*$n2; /*calculate product of n1 and n2*/
					$quotient = $n1/$n2; /*calculate quotient of n1 and n2*/
					$sum = $n1+$n2; /*calculate sum of n1 and n2*/
					echo '<p class="lead">PHP includes math functions!</p> 
				</div>
				<div>';
					echo "<p> For this page, I have two variables \$n1 and \$n2 set to 3 and 14 respectively. I will use these numbers to demonstrate how several PHP math operators function.</P>";
					echo "<p>If I want to increment my first variable by one, I would use ++\$n1 and my result would be ". ++$n1 ." (if I used \$n1++, PHP would display the current value of \$n1 then increment the value stored in my variable, while ++\$n1 increments first, then displays.)</p>";
					
					echo "<p>If I want to decrement my first variable by one, I would use --\$n1 and my result would be ". --$n1 ." (if I used \$n1--, PHP would display the current value of \$n1 then decrement the value stored in my variable, while --\$n1 decrements first, then displays.)</p>";
					
					echo "<p>I can also do basic arithmetic. For example:
						<ul>
							<li>Multiplication: 3 x 14 = $product.</li>
							<li>Division: 14 ÷ 3 = $quotient.</li>
							<li>Addition: 14 + 3 = $sum.</li>
						</ul>
						</p>";
					
				?>
				</div>
				<div class = "pg-head">
				<a href="http://paulruss.uwmsois.com/assignment3/" class="btn btn-lg btn-primary">Back to Index</a>
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
