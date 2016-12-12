<?php
require_once('scripts/functions.php');
require_once('scripts/dbConfig.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  #load post values into an array for easier checking
  $info = array(
    'username' => filter_var($_POST['uname'],FILTER_SANITIZE_STRING),
    'firstname' => filter_var($_POST['fname'],FILTER_SANITIZE_STRING),
    'lastname' => filter_var($_POST['lname'],FILTER_SANITIZE_STRING),
    'email' => filter_var($_POST['email'],FILTER_SANITIZE_EMAIL),
    'password' => filter_var($_POST['pass'],FILTER_SANITIZE_STRING),
  );
    $emailopt = filter_var($_POST['optin'],FILTER_SANITIZE_NUMBER_INT);
  #set optin to zero manually, as passing a blank to mySQL when the box is
  #unchecked overrides the default and inserts the blank
  if (!$emailopt == '1') {
    $emailopt = '0';
  }
  
  # parse array elements into variables that can be used in the query and on other pages
  $uname = $info['username'];
  $fname = $info['firstname'];
  $lname = $info['lastname'];
  $email = $info['email'];


  foreach ($info as $key => $val) {
    if (empty($val)) {
      $err[] = $key.' is requred.';
      $err[] = $val;
    }
  }
  
  if (!empty($err)) {
    $error[] = 'Unable to register. Please check the following issues: <br>';
    foreach($err as $e){
      $error[] = $e.'<br>';
    }
    include('register.php');
    exit();
  }

  #hash password with bcrypt and built in PHP API for additional security
  $hashedpass = password_hash($info['password'],PASSWORD_BCRYPT);
  
  #use prepared statement to prevent sql injection
  #define query string
  $q = 'INSERT INTO user (usernm, fname, lname, email, passhash, emailopt) VALUES (?, ?, ?, ?, ?, ?)';
  #prepare query
  $register = mysqli_prepare($db, $q);
  #bind variables
  mysqli_stmt_bind_param($register, 'ssssss', $uname, $fname, $lname, $email, $hashedpass, $emailopt);
  #execute query
  if (mysqli_execute($register)) {
    $success = 'You have successfully registered. Please log in to post or manage comments';
    include('login.php');
    exit();
  } else {
    $error[] = 'Unable to register user. Please check your information and try again.';
    $error[] = mysqli_error($db);
    $error[] = 'If you already have an account, try to <a href="login.php">log in here</a>.';
    include('register.php');
    exit();
  }
} else {
  redirect();
}
?>
