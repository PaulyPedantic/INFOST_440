<?php
require_once('dbConfig.php');

#define a variable to track the session status
$status = authenticate();

#script has a large switch statement to set variables for pgtitle, desc, etc.
include('scripts/titleSwitch.php');
 ?>

<!DOCTYPE html>
<html lang="en-US">

  <head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap-flex.min.css">
    <!-- Free Font and icon resources -->
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Cabin|Cabin+Sketch|Didact+Gothic" rel="stylesheet">
    <!-- My custom stylesheet last so I can override styles set above as needed -->
    <link rel="stylesheet" href="css/styles.css">

    <!-- figure out how to get title and description variable per page efficiently -->
    <title><?php echo $pgtitle; ?></title>
    <?php
    if ($description) {
      echo '<meta name="description" content="$description">';
    }
    ?>
  </head>

  <body>
    <div class="container">
      <header class="text-xs-center pg-head bgArea">
        <nav class="row flex-items-xs-middle">
          <?php if (!$home) {   ## only show home button on pages other than home
          echo '<div class="text-xs-left col-xs">
                  <a class="mybutton mynavbrand" href="index.php">Ok With Wrong</a>
                </div>';
          } ?>
          <div class="text-xs-right col-xs">
            <?php
            if ($status['user']) {
              echo 'Welcome '.$status['user'].' ';
              if ($status['admin']) {
                echo '<a class="mybutton mynav" href="createPost.php">Create Post</a>';
              }
              echo '<a class="mybutton mynav" href="logout.php">Logout</a>';
            } else {
              echo '<a class="mybutton mynav" href="register.php">Register</a>';
              echo '<a class="mybutton mynav" href="login.php">Login</a>';
            }
            ?>

          </div>
        </nav>
        <!-- header/subtitle will vary per page -->
        <h1 class="display-4"><?php echo $pgtitle; ?></h1>
        <p class="subtitle"><?php echo $subtitle; ?></p>
        <div class="text-xs-right">
          <p class="date"><?php echo $date; ?></p>
        </div>
      </header>
        <?php
              # I don't close container div above within the header
              # it gets closed at the start of foot.php
              # and ensures consistent formatting ?>
