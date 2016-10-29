<?php
include("header.php");
include("connect.php");
?>

<div class="container">
	<h1 class="header center deep-purple-text text-darken-2">Welcome to Pauly's Guestbook!</h1>

	<div class="row center">
		<h5 class="header col s12 light">Fill out the form below to edit a comment</h5>
	</div>

	<div class="row">
		<form class="col s12" method="POST" action="update-action.php">
			<div class="row">
				<div class="input-field col s12">
					<input name="id" type="text" class="validate">
					<label for="id">Comment ID to Edit:</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s6">
					<input name="fname" type="text" class="validate">
					<label for="fname">First Name:</label>
				</div>
				<div class="input-field col s6">
					<input name="lname" type="text" class="validate">
					<label for="lname">Last Name:</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12">
					<input name="email" type="text" class="validate">
					<label for="displayname">Email:</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12">
					<input name="displayname" type="text" class="validate">
					<label for="displayname">Name to Display with Comment:</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12">
					<textarea name="comment" class="materialize-textarea"></textarea>
					<label for="comment">Comment:</label>
				</div>
			</div>
		</form>
	</div>
</div>


<?php
include("footer.php");
?>
