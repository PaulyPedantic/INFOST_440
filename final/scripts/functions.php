<?php

#redirect function based on book script
#takes basename of a page as argument and converts to absolute url
#defaulting to login page because most redirects will involve the session

function redirect($targetpg = 'login.php') {

  // Build absolute url
  $url = 'http://' . $_SERVER['HTTP_HOST'] . '/final';
  $url .= '/' . $targetpg;

  // Redirect the user:
  header("Location: $url");

}   #end redirect function

# credentialCheck function is based on book check_login function
# function verifies the fields are filled in, and if present
# verifies them against the database

function credentialCheck($db, $username = '', $pass = '') {

	$error = array();

	# Check for username
	if (empty($username)) {
		$error[] = 'Please enter a username.';
	}

	# Check for password
	if (empty($pass)) {
		$error[] = 'Please enter a password.';
	}
  
	if (empty($error)) {

		$q = "SELECT id, usernm, passhash, admin FROM user WHERE usernm='$username'";
		$r = mysqli_query ($db, $q); // Run the query.

		$row = mysqli_fetch_array ($r, MYSQLI_ASSOC);

    #check password with password_verify more secure than sha1
    if (password_verify($pass, $row['passhash'])) {

			return array(true, $row);

		} else { // Not a match!
			$errors[] = 'The email address and password entered do not match those on file.';
      return array(false, $error);
		}

	}
  return array(false, $error);
}  #end of credentialCheck function

# authenticate function checks the session and returns an array with variables
# indicating whether the current session is logged on at the user or admin level
function authenticate() {
  session_start();
  $user = false;
  $admin = false;
  
  if (isset($_SESSION['loggedInUser'])){
    $user = $_SESSION['loggedInUser'];
    if (isset($_SESSION['admin'])){
      $admin = true;
    }
  }
  return array('user' => $user, 'admin' => $admin);
}
?>
