<?php
include("header.php");
include("delete-action.php");
?>

<div class="container">
	<h1 class="header center deep-purple-text text-darken-2">Welcome to Pauly's Guestbook!</h1>

	<div class="row center">
		<h5 class="header col s12 light"></h5>
	</div>

	<div class="row">
		<form class="col s12" method="POST" action="delete.php">
			<div class="row">
				<div class="input-field col s12">
					<input name="id" type="number" class="validate">
					<label for="id">Comment ID to Delete:</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12">
					<input name="email" type="email" class="validate">
					<label for="displayname">Email used to leave comment:</label>
				</div>
			</div>

			<button class="btn waves-effect waves-light" type="submit" name="action" onclick="return confDelete()">Submit
				<i class="material-icons right">send</i>
			</button>

		</form>
	</div>
</div>


<?php
include("footer.php");
?>
