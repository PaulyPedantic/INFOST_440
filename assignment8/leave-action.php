<?php
	include("connect.php");
	$error = ''; //declare a variable to use for error messaging
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		if(empty($_POST['email']) || empty($_POST['comment'])) {
			$error = 'All posts must include an Email and a comment. Your Email will not be publicly visible.';
		} else {
			//define the username and pass for the session
			$email = mysqli_escape_string($_POST['email']);
			$fname = mysqli_escape_string($_POST['fname']);
			$lname = mysqli_escape_string($_POST['lname']);
			$dispname = mysqli_escape_string($_POST['displayname']);
			$comment = mysqli_escape_string($_POST['comment']);

			//using mysqli prepared statement object oriented style from php.net to avoid sql injection
			if ($leave = $db->prepare("INSERT INTO paulruss_assignment8.content (id ,email ,fname ,lname ,commentdate ,displayname ,comment)
VALUES (null,?,?,?,CURRENT_TIMESTAMP,?,?)")) {

			$leave->bind_param("sssss", $email, $fname, $lname, $dispname, $comment);

			$leave->execute();

			//if insert runs successfully, redirect to index.php so user can see the comment on the page
			if ($leave->execute()) {
    header("Location: index.php");
	} else {
		$error = 'Something went wrong. Please try again.';
		header("Location: leave.php");
	};
			mysqli_close($leave);
			mysqli_close($db);
		};
	};
	echo "<p class=\"red-text text-darken-3\">
	$error
	</p>"
?>
