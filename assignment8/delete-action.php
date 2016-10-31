<?php
	include("connect.php");
	$error = ''; //declare a variable to use for error messaging
	$success = ''; //declare a variable to use for a success message

	//define the username and pass for the session
	$id = $_POST['id'];
	$email = $_POST['email'];
	//I'm requiring id and email for deletion and not displaying email so that theoretically, the only person who can delete
	//a comment is the person who posted it or a site admin with DB access. Cheaper than having login sessions control it
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$check = $db->prepare("SELECT * FROM paulruss_assignment8.content WHERE id = ? AND email = ?");
		$check->bind_param("ss", $id, $email);
		$check->execute();
		$result = $check->get_result();
		$numberrows = $result->num_rows;

		if(empty($_POST['email']) || empty($_POST['id'])) {
			$error = "You must provide a comment ID and the email used when it was submitted to delete.";
		} else if ($numberrows == 0){
			$error = "Sorry, we can't find a comment with that ID and Email combination. Please enter the exact ID and email used to submit the comment";
		} else {

			//using mysqli prepared statement object oriented style from php.net to avoid sql injection
			if ($delete = $db->prepare("DELETE FROM paulruss_assignment8.content WHERE id = ? AND email = ?")) {

				$delete->bind_param("ss", $id, $email);

				if ($delete->execute()) {
					$success = "Your comment has been deleted. Return to the <a href=\"http://paulruss.uwmsois.com/assignment8\">Guestbook home page</a> to confirm.";
				} else {
					$error="Something went wrong while deleting. Please try again.";
				}
			}
		}
		mysqli_close($db);
		echo '<div class="container">';
		if ($success){
			echo "<p class=\"green-text text-darken-3\">$success</p>";
		} else {
			echo "<p class=\"red-text text-darken-3\">$error</p>";
		}
		echo '</div>';
	}
?>
