<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>Quotes</title>

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
				<h1>Paul Russ Assignment 3 Quotes</h1>

				<?php 
					$var = '<em>variable</em>';
					//using single quotes
					echo '<p class="lead">Text can be echoed or printed using quotes to identify the string.</p><p>This paragraph uses echo and the single quote to display the string. When using single quotes, only the singlequote(\') and backslash (\\) characters need to be escaped. For the most part, single quotes avoid parsing through characters inside the quotes for code, meaning typing in a dollar sign ($) doesn\'t trigger the ensuing characters being interpreted as a variable. $var displays as-is and I would have to use the concatenation operator to translate it to '.$var.'.</p>';
					
					//Using double quotes
					print "<p class=\"normal\">This text is printed using double quotes to identify the string. Inside of double quotes, I have to use the backslash (\\) to escape the dollar sign (\$) if I want to display the name of my variable \$var. if I include the variable name in my text, it gets replaced with $var </p>"; 
					
				?>
				
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
