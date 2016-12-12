<?php

#redirect function based on book script
#takes basename of a page as argument and converts to absolute url
#defaulting to login page because most redirects will involve the session

function redirect($targetpg = 'login.php') {

  // Build absolute url
  $url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);
  $url = rtrim($url, '/\\');
  $url .= '/' . $targetpg;

  // Redirect the user:
  header("Location: $url");

}   #end redirect function

# credentialCheck function is based on book check_login function
# function verifies the fields are filled in, and if present
# verifies them against the database

function credentialCheck($db, $username = '', $hashedpass = '') {

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

		$q = "SELECT id, usernm, passhash FROM user WHERE user='$username'";
		$r = @mysqli_query ($db, $q); // Run the query.

		$row = mysqli_fetch_array ($r, MYSQLI_ASSOC);

    #check password with password_verify more secure than sha1
    if (password_verify($hashedpass, $row['passhash']){

			return array(true, $row);

		} else { // Not a match!
			$errors[] = 'The email address and password entered do not match those on file.';
      return array(false, $errors);
		}

	}
}  #end of credentialCheck function

# authenticate function checks the session and redirects if user is not logged in
function authenticate() {
  if (!isset($_SESSION['loggedInUser'])) {
    redirect();
  }
}
?>
