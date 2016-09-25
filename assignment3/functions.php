<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>Functions</title>

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
				<h1 class="text-center">Paul Russ Assignment 3 Functions</h1>
				<?php 
					echo '<p class="lead text-center">Functions are essentially little, callable code pieces. They can generate powerful effects. Two large groupings of functions include built-in and user-defined. As the name suggests, the built in function have their code included in the PHP engine and simply including their name into a script allows PHP to know what to do. User-defined functions are places where the person writing a script can define a piece of functioning code that they\'d like to use over and over, and instead define it as a function to avoid writing out what it does.</p>';
					
					$var = 3.14;
					$var2 = ceil($var);
					
					echo "<p>My variable is $var . With normal rounding rules, the .14 would get rounded down. If I want to force it to round up, I can use the built in function ceil() and I get $var2 .</p>";
					
					function echoParagraphTwo($paragraph) {
						echo "<p>$paragraph</p>";
					};
					
					echoParagraphTwo("Here I've built a simple function to echo whatever I feed into the variable as a paragraph and I'm calling it with this text.");
					echoParagraphTwo("I can call this over and over with as many different values as I'd like in the \$paragraph variable and each time it will echo that value between <code><p></code> and </code></p></code> tags as a new paragraph in my document.");
					
				?>
				<div class="text-center"><a href="http://paulruss.uwmsois.com/assignment3/" class="btn btn-lg btn-primary">Back to Index</a></div>
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
