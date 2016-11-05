<?php
include("header.php");
include("leave-action.php");
?>

	<div class="container">
		<h1 class="header center cyan-text text-darken-1">Welcome to Pauly's Guestbook!</h1>

		<div class="row center">
			<h5 class="header col s12 light">Fill out the form below to leave a comment</h5>
		</div>

  	<div class="row">
    	<form class="col s12" method="POST" action="leave.php">
      	<div class="row">
        	<div class="input-field col s6">
          	<input name="fname" type="text" class="validate" value="<?php
						if ($_server["REQUEST_METHOD"] == "POST" && ($_POST['fname'])) {			//Make values sticky
						   echo $_POST['fname'];
						}
						?>">
          	<label for="fname">First Name:</label>
        	</div>
        	<div class="input-field col s6">
          	<input name="lname" type="text" class="validate" value="<?php
						if ($_server["REQUEST_METHOD"] == "POST" && ($_POST['lname'])) {			//Make values sticky
						   echo $_POST['lname'];
						}
						?>">
          	<label for="lname">Last Name:</label>
        	</div>
      	</div>
				<div class="row">
        	<div class="input-field col s12">
          	<input name="email" type="email" class="validate" value="<?php
						if ($_server["REQUEST_METHOD"] == "POST" && ($_POST['email'])) {			//Make values sticky
						   echo $_POST['email'];
						}
						?>">
          	<label for="email">Email:</label>
        	</div>
      	</div>
      	<div class="row">
        	<div class="input-field col s12">
          	<input name="displayname" type="text" class="validate" value="<?php
						if ($_server["REQUEST_METHOD"] == "POST" && ($_POST['displayname'])) {			//Make values sticky
						   echo $_POST['displayname'];
						}
						?>">
          	<label for="displayname">Name to Display with Comment:</label>
        	</div>
      	</div>
      	<div class="row">
      		<div class="input-field col s12">
        		<textarea name="comment" class="materialize-textarea" value="<?php
						if ($_server["REQUEST_METHOD"] == "POST" && ($_POST['comment'])) {			//Make values sticky
						   echo $_POST['comment'];
						}
						?>"></textarea>
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
