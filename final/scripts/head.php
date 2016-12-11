<?php
session_start();
include('dbConfig.php');

$date = '';
$subtitle = '';
$pgname = basename($_SERVER['PHP_SELF'],'.php');
switch ($pgname) {
  case 'index':
    $title = 'Okay with wrong';
    $subtitle = 'What I know, what I don\'t, and how being wrong makes me better.';
    $description = 'Okay With Wrong is a blog written by Pauly Russ that focuses on information science concepts, continuous learning, and personal growth.';
    $home = true;
    break;
  case 'register':
    $title = 'Register';
    $subtitle = 'You must have an account to leave comments. Register below or <a href="login.php" class="decorateLink">log in.</a>';
    break;
  case 'login':
    $title = 'Log In';
    $subtitle = 'Login to leave a comment.';
    break;
  case 'createPost':
    $title = 'Write New Post';
    break;
  case 'leaveComment':
    $title = 'Leaving a comment';
    break;
  case 'viewPost':
    # write a query to retrieve post information and include it here
    break;
  default:
    $title = $pgname;
}
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
    <title><?php echo $title; ?></title>
    <?php
    if ($description) {
      echo '<meta name="description" content="$description">';
    }
    ?>
  </head>

  <body>
    <div class="container">
      <header class="text-xs-center pg-head">
        <nav class="row flex-items-xs-middle">
          <?php if ($home) {   ## only show home button on pages other than home
          echo '<div class="text-xs-left col-xs">
                  <a class="mybutton mynavbrand" href="index.php">Ok With Wrong</a>
                </div>';
          } ?>
          <div class="text-xs-right col-xs">
            <a class="mybutton mynav" href="register.php">Register</a>
            <a class="mybutton mynav" href="login.php">Login</a>
          </div>
        </nav>
        <!-- header/subtitle will vary per page -->
        <h1 class="display-4"><?php echo $title; ?></h1>
        <p class="subtitle"><?php echo $subtitle; ?></p>
        <div class="text-xs-right">
          <p class="date"><?php echo $date; ?></p>
        </div>
      </header>
        <?php # don't close container div above
              # it gets closed at the start of foot.php
              # and ensures consistent formatting ?>
