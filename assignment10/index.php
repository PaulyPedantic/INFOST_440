<?php
##########  this script is the homepage/landing page for the site  ##########
$title = "Departure - You've Arrived";
include("includes/header.php");       //html header file also includes session_start()
?>

    <div class="container-fluid">
      <div class="jumbotron text-center">
        <div class="page-header">
          <h1>You've Arrived</h1>
        </div>
        <p>Departure is the premiere destination for all things movement. To start taking advantage of all that we have to offer,</p>
        <a href="register.php" class="btn btn-lg btn-warning">Register Now</a>
      </div>
    </div>

<?php
include("includes/footer.php");
?>
