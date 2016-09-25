<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="UTF-8">
    <!-- Include Bootstrap Boilerplate and css supplied cdn-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>
    <title>Index Page</title>
    <meta name="description" content="Item 4 from wk 2 assignment page">
    <!-- use the same styling as item 2 -->
    <style type="text/css">
     .container {
       padding-top: 40px;      /*make containers space out some*/
     }
     .table {
       background-color: #fff; /*make table color cover page bg*/
	   box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 8px 20px 0 rgba(0, 0, 0, 0.15);
     }
     tr {
       border:1px solid gray; /*add a border because why not*/
       border-radius:5px;      /*I find rounded cornders pleasing*/
     }
     body {
       background-color: #ffffb3; /*a lemony sunshine-y yellow this week/
     } 

    </style>
  </head>
  <body>
  <!-- use bootstrap classes/divs to style a header -->
   <div class="container">
    <div class="jumbotron">
     <?php echo '<h1 class="text-center">Pauly Russ Assignment 3 Index</h1>';
     //this is a line comment noting I used echo instead of print
     ?>
    </div> <!-- end of jumbotron -->
   </div> <!-- end of container -->
   <div class="container">
    <table class="table table-condensed table-hover"> <!-- mouthful of classes makes the table look bootstrap pretty -->
     <tr>
      <th>
      </th>
      <th>
       Item 2
      </th>
      <th>
       Item 3
      </th>
     </tr>
     <tr>
      <td>
        <?php print '<h2 class="text-center">Links:</h2>';
       //this is a line comment noting that this time I used print instead of echo
       ?>
      </td>
      <td>
       <a href="http://paulruss.uwmsois.com" class="btn btn-primary btn-lg">Page1</a>
      </td>
      <td>
       <a href="http://paulruss.uwmsois.com/assignment2/phpinfo.php" class="btn btn-primary btn-lg">Page2</a>
      </td>
     </tr>
    </table>
   </div> <!-- end of container -->
  </body>
</html>
