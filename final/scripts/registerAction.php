<?php
include('functions.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  #load post values into variables
  $uname = filter_var($_POST['uname'],FILTER_SANITIZE_STRING);
  $fname = filter_var($_POST['fname'],FILTER_SANITIZE_STRING);
  $lname = filter_var($_POST['lname'],FILTER_SANITIZE_STRING);
  $email = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
  $optin = trim(filter_var($_POST['optin'],FILTER_SANITIZE_NUMBER_INT));
  
  if (!$optin == '1') {
    $optin = '0';
  }
  
  #hash password with bcrypt and built in PHP API for additional security
  $hashedpass = password_hash(trim(filter_var($_POST['pass'],FILTER_SANITIZE_STRING)),PASSWORD_BCRYPT);
  
  #use prepared statement to prevent sql injection
  #define query string
  $q = 'INSERT INTO user (usernm, fname, lname, email, passhash, emailopt) VALUES (?, ?, ?, ?, ?, ?)';
  #prepare query
  $register = mysqli_prepare($db, $q);
  #bind variables
  mysqli_stmt_bind_param($register, 'ssssss', $uname, $fname, $lname, $email, $hashedpass, $optin);
  #execute query
  if (mysqli_execute($register)) {
    $success = 'You have successfully registered. Please <a href ="login.php">log in</a> to post or manage comments';
  } else {
    $error[] = 'Unable to register user. Please check your information and try again.';
    $error[] = mysqli_error($db);
    $error[] = 'If you already have an account, try to <a href="login.php">log in here</a>.';
  }
} else {
}
?>
