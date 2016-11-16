<?php

##########  This script establishes a connection to the database using constants and creates a connection variable to be used by other scripts  ##########

// Set the database access information as constants:
DEFINE ('DB_USER', 'paulruss_wk10');
DEFINE ('DB_PASSWORD', 'JIz.L+ZmkPao');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'paulruss_assignment10');

// Make the connection:
$conn = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die ('Could not connect to MySQL: ' . mysqli_connect_error() );

// Set the encoding...
mysqli_set_charset($conn, 'utf8');
