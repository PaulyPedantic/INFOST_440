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

#credentialCheck function is based on book check_login function
#function verifies the fields are filled in, and if present
#verifies them against the database

function credentialCheck($db, $uname = '', $pass = '', $salt) {

	$error = array();

	// Validate the email address:
	if (empty($uname)) {
		$error[] = 'Please enter a username.';
	}

	// Validate the password:
	if (empty($pass)) {
		$error[] = 'Please enter a password.';
	}

	if (empty($error)) { // If everything's OK.

		$q = "SELECT id, usernm FROM user WHERE user='$uname' AND pass=SHA1('$p')";
		$r = @mysqli_query ($dbc, $q); // Run the query.
		
		// Check the result:
		if (mysqli_num_rows($r) == 1) {

			// Fetch the record:
			$row = mysqli_fetch_array ($r, MYSQLI_ASSOC);
	
			// Return true and the record:
			return array(true, $row);
			
		} else { // Not a match!
			$errors[] = 'The email address and password entered do not match those on file.';
		}
		
	} // End of empty($errors) IF.
	
	// Return false and the errors:
	return array(false, $errors);

} // End of check_login() function.
?>
