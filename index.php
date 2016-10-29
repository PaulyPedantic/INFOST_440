	<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="UTF-8">
    <!-- Include Bootstrap Boilerplate and css supplied cdn-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>
    <title>Basic PHP Page</title>
    <meta name="description" content="Item 2 from wk 2 assignment">
    <!-- define some styling -->
    <style type="text/css">
     .container {
       padding-top: 40px;      /*make containers space out some*/
     }
     .row {
       border:1px solid black; /*add a border because why not*/
       border-radius:5px;      /*I find rounded cornders pleasing*/
     }
     body {
       background-color: #c1d0f0; /*a soft airy blue because I'm a fancy pants*/
     }
	 .btn {
		 margin-top: 15px;    /*give buttons some breathing room*/
	 }
    </style>
  </head>
 <body>
  <!-- use bootstrap classes/divs to style a header -->
  <div class="container">
   <div class="jumbotron">
    <?php echo '<h1 class="text-center">Pauly Russ SOIS Webspace</h1>';
    //this is a line comment noting I used echo instead of print
    ?>
   </div> <!-- end of jumbotron -->
  </div> <!-- end of container -->
  <div class="container">
    <div class="row"> <!-- col4 + col8 = bootstrap grid col12 -->
     <div class="col-md-4">
      <?php print '<h2 class="text-center">Hello <br />  World</h2>';
      //this is a line comment noting that this time I used print instead of echo
      ?>
     </div> <!-- end of 4 grid col -->
     <div class="col-md-8">
      <?php
       $var1 = 'variable #1';
       $var2 = 'variable #2';
       /*get ready, this next part is fun and explains itself*/
       echo "<p>This piece of text is made using double quotes to recognize $var1 and the concatenation operator to recognize " . $var2 . '</p>
<p>I did this because I found information online that said single quotes will show the text $var3 as-is while double quotes allow php to recogize the $ symbol delimiting the start of a variable within a string</p>'; ?>
     </div> <!-- end of 8 grid col -->
    </div> <!-- end of row -->
	<div class="row">
		<div class="col-md-4">
			<h2> Assignment Directories: </h2>
		</div> <!-- end of 4 grid col -->
		<div class="col-md-2">
			<a href="http://paulruss.uwmsois.com/assignment2/" class="btn btn-success">Assignment 2</a>
		</div> <!-- end of 2 grid col -->
		<div class="col-md-2">
			<a href="http://paulruss.uwmsois.com/assignment3/" class="btn btn-success">Assignment 3</a>
		</div> <!-- end of 2 grid col -->
		<div class="col-md-2">
			<a href="http://paulruss.uwmsois.com/assignment4/" class="btn btn-success">Assignment 4-5</a>
		</div> <!-- end of 2 grid col -->
		<div class="col-md-2">
			<a href="http://paulruss.uwmsois.com/assignment8/" class="btn btn-success">Assignment 8</a>
		</div> <!-- end of 2 grid col -->
	</div> <!-- end of row -->
  </div> <!-- end of container -->
 </body>
</html>
