<?php
session_start();

# Unset all of the session variables.
$_SESSION = array();

# This is code from the PHP documentation to destroy the session cookie
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

# destroy the session.
session_destroy();

# set a success message
$success = "You have been successfully logged out.";

# instead of redirecting, include the index script so the success variable
# gets echoed out to the user

include('index.php');
?>
