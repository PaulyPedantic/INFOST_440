<?php
	include("connect.php");
	$error = ''; //declare a variable to use for error messaging
	$success = ''; //declare a variable to use for a success message

	//define the username and pass for the session
	$id = $_POST['id'];
	$email = $_POST['email'];
		//Fname and Lname are being captured but not displayed, so not letting them be updated
	$dispname = $_POST['displayname'];
	$comment = $_POST['comment'];

	if (empty($dispname)) {
		$dispname = 'anonymous';  /*I set the db to default displayname to anonymous, but it seems php passes an empty string rather than NULL
		so the DB default doesn't work. Using if statement to set default here*/
	}

	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$check = $db->prepare("SELECT * FROM paulruss_assignment8.content WHERE id = ? AND email = ?");
		$check->bind_param("ss", $id, $email);
		$check->execute();
		$returned = $check->get_result();

		if(empty($_POST['email']) || empty($_POST['comment'])) {
			$error = "All posts must include an Email and a comment. Your Email will not be publicly visible.";
		} else if (!$returned){
			$error = "Sorry, we can\'t find a comment with that ID and Email combination. Please enter the exact ID and email used to submit the comment";
		} else {


			//using mysqli prepared statement object oriented style from php.net to avoid sql injection
			if ($update = $db->prepare("UPDATE paulruss_assignment8.content
				SET displayname = ? , comment = ?
				WHERE id = ? and email = ?")) {

			$update->bind_param("ssss", $dispname, $comment, $id, $email);

			if ($update->execute()) {
				$success = "Your comment has been updated. Return to the <a href=\"http://paulruss.uwmsois.com/assignment8\">Guesbook home page</a> to view.";
			} else {
				$error="Something went wrong while submitting. Please try again.";
			}

			mysqli_close($db);
		}
	}
	echo '<div class="container">';
	if ($success){
		echo "<p class=\"green-text text-darken-3\">$success</p>";
	} else {
		echo "<p class=\"red-text text-darken-3\">$error</p>";
	}
	echo '</div>';
};
?>
