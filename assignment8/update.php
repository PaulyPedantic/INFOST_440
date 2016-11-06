<?php
include("header.php");
include("update-action.php");
?>

<div class="container">
	<h1 class="header center cyan-text text-darken-1">Welcome to Pauly's Guestbook!</h1>

	<div class="row center">
		<p class="header col s12">Fill out the form below to edit a comment. The comment ID is on the Guestbook homepage and the email MUST match the email used to submit the comment.</p>
	</div>

	<div class="row">
		<form class="col s12" method="POST" action="update.php">
			<div class="row">
				<div class="input-field col s12">
					<input name="id" type="number" class="validate" value="<?php
					if ($_server["REQUEST_METHOD"] == "POST" && ($_POST['id'])) {			//Make values sticky
						 echo $_POST['id'];
					} else if ($prefill) {
						echo $prefill['id'];
					}
					?>">
					<label for="id">Comment ID to Edit:</label>
				</div>
			</div>
			<div class="row">	
				<div class="input-field col s12">
					<input name="email" type="email" class="validate" value="<?php
					if ($_server["REQUEST_METHOD"] == "POST" && ($_POST['email'])) {			//Make values sticky
						 echo $_POST['email'];
					}                                                                     //not prefilling email since it serves as validation
					?>">
					<label for="email">Email:</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12">
					<input name="displayname" type="text" class="validate" value="<?php
					if ($_server["REQUEST_METHOD"] == "POST" && ($_POST['displayname'])) {			//Make values sticky
						 echo $_POST['displayname'];
					} else if ($prefill) {
						echo $prefill['displayname'];
					}
					?>">
					<label for="displayname">Name to Display with Comment:</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12">
					<textarea name="comment" class="materialize-textarea"><?php
					if ($_server["REQUEST_METHOD"] == "POST" && ($_POST['comment'])) {			//Make values sticky
						 echo $_POST['comment'];
					} else if ($prefill) {
						echo $prefill['comment'];
					}
					?></textarea>
					<label for="comment">Comment:</label>
				</div>
			</div>

			<button class="btn waves-effect waves-light" type="submit" name="action">Submit
				<i class="material-icons right">send</i>
			</button>

		</form>
	</div>
</div>


<?php
include("footer.php");
?>
