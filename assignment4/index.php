<?php include("/home/paulruss/public_html/assignment4/header.php") ?>
		<div class="container">

			<div class="pg-head">
				<h1 class="text-center">Welcome to Low-Rent Social Media!</h1>
			</div>
			<p class="lead">Please fill in your profile information below</p>

			<!-- begin form -->
			<form id="lrform" action=<?php
/*Validate fields populated and direct to thanks or back to index*/
					if ($_SERVER['REQUEST_METHOD'] != "POST") {   //on initial load, don't validate
						echo '"http://paulruss.uwmsois.com/assignment4/index.php" method="POST" class="form-horizontal">';
					} else {        //validate fields and change submit action or show error
						if (($_POST['name']) != "" &&
							($_POST['email'] != "") &&
							($_POST['phone'] != "") &&
							($_POST['password'] != "") &&
							($_POST['confirmPass'] != "") &&
							($_POST['about'] != "") &&
							($_POST['mm'] != "") &&
							($_POST['dd'] != "") &&
							($_POST['yy'] != "") &&
							($_POST['confirmPass']) == ($_POST['password'])) {
								echo '"http://paulruss.uwmsois.com/assignment4/thanks.php" method="POST" class="form-horizontal">';
								$submit = true;
							} else {
								echo '"http://paulruss.uwmsois.com/assignment4/index.php" method="POST" class="form-horizontal">';
								echo '<p id="help" class="text-danger">Please be sure all fields are filled in before submitting</p>';
							}
						}
				?>

						<!-- it would make more sense to use javascript or jquery to display bootstrap form contexts and only use php to validate form input before sending to the server
						     but doing it with php because this assignment is focused on working with php -->
				<div class="form-group <?php
//Validate name and show error
					if ($_SERVER['REQUEST_METHOD'] == "POST") { //add this to each conditional formatting statement to make form pretty on initial load
						if (($_POST['name']) == "") {
							echo 'has-error has-feedback';
						} else {
							echo 'has-success has-feedback';
						}
					}
					?>">
					<label for="name" class="col-sm-2 control-label">Full Name</label>
					<div class="col-sm-10">
						<input name="name" type="text" class="form-control" id="name" placeholder="Full Name" value="<?php
//Make sticky
						if (isset($_POST['name'])) {
							echo $_POST['name'];
						}
						?>">
						<?php		//add error icon and message text for screen reader if validation fails
					if ($_SERVER['REQUEST_METHOD'] == "POST") {
						if (($_POST['name']) == "") {
							echo '<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>';
							echo '<span id="nameError" class="sr-only">(error)</span>';
						} else {
							echo '<span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>';
							echo '<span id="nameSuccess" class="sr-only">(success)</span>';
						}
					}
					?>
					</div>
				</div>
				<div class="form-group <?php
//Validate email and show error
					if ($_SERVER['REQUEST_METHOD'] == "POST") {
						if (($_POST['email']) == NULL) {
							echo 'has-error has-feedback';
						} else {
							echo 'has-success has-feedback';
						}
					}
					?>">
					<label for="email" class="col-sm-2 control-label">Email address</label>
					<div class="col-sm-10">
						<input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php
//Make sticky
						if (isset($_POST['email'])) {
							echo $_POST['email'];
						}
						?>">
						<?php		//add error icon and message text for screen reader if validation fails
					if ($_SERVER['REQUEST_METHOD'] == "POST") {
						if (($_POST['email']) == "") {
							echo '<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>';
							echo '<span id="nameError" class="sr-only">(error)</span>';
						} else {
							echo '<span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>';
							echo '<span id="nameSuccess" class="sr-only">(success)</span>';
						}
					}
					?>
					</div>
				</div>
				<div class="form-group <?php
				//Validate phone and show error
					if ($_SERVER['REQUEST_METHOD'] == "POST") {
						if (($_POST['phone']) == NULL) {
							echo 'has-error has-feedback';
						} else {
							echo 'has-success has-feedback';
						}
					}
					?>">
					<label for="phone" class="col-sm-2 control-label">Phone Number</label>
					<div class="col-sm-10">
						<input type="phone" class="form-control" id="phone" name="phone" placeholder="Phone" value="<?php
				//Make sticky
						if (isset($_POST['phone'])) {
							echo $_POST['phone'];
						}
						?>">
						<?php		//add error icon and message text for screen reader if validation fails
					if ($_SERVER['REQUEST_METHOD'] == "POST") {
						if (($_POST['phone']) == "") {
							echo '<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>';
							echo '<span id="nameError" class="sr-only">(error)</span>';
						} else {
							echo '<span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>';
							echo '<span id="nameSuccess" class="sr-only">(success)</span>';
						}
					}
					?>
					</div>
				</div>
				<div class="form-group <?php
//Validate password and show error
					if ($_SERVER['REQUEST_METHOD'] == "POST") {
						if (($_POST['password']) == NULL) {
							echo 'has-error has-feedback';
						} else {
							echo 'has-success has-feedback';
						}
					}
					?>">
					<label for="password" class="col-sm-2 control-label">Password</label>
					<div class="col-sm-10">
						<input type="password" class="form-control" id="password" name="password" placeholder="Password" value="<?php
//Make sticky
						if (isset($_POST['password'])) {
							echo $_POST['password'];
						}
						?>">
						<?php		//add error icon and message text for screen reader if validation fails
					if ($_SERVER['REQUEST_METHOD'] == "POST") {
						if (($_POST['password']) == "") {
							echo '<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>';
							echo '<span id="nameError" class="sr-only">(error)</span>';
						} else {
							echo '<span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>';
							echo '<span id="nameSuccess" class="sr-only">(success)</span>';
						}
					}
					?>
					</div>
				</div>
				<div class="form-group <?php
//Validate confirmPass and show error
					if ($_SERVER['REQUEST_METHOD'] == "POST") {
						if (($_POST['confirmPass']) == NULL || ($_POST['confirmPass']) != ($_POST['password'])) {
							echo 'has-error has-feedback';
						} else {
							echo 'has-success has-feedback';
						}
					}
					?>">
					<label for="confirmPass" class="col-sm-2 control-label">Re-enter to Confirm </label>
					<div class="col-sm-10">
						<input type="password" class="form-control" id="confirmPass" name="confirmPass" placeholder="Confirm Password" value="<?php
//Make sticky
						if (isset($_POST['confirmPass'])) {
							echo $_POST['confirmPass'];
						}
						?>">
						<?php		//add error icon and message text for screen reader if validation fails
					if ($_SERVER['REQUEST_METHOD'] == "POST") {
						if (($_POST['confirmPass']) == "" || ($_POST['confirmPass']) != ($_POST['password'])) {
							echo '<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>';
							echo '<span id="nameError" class="sr-only">(error)</span>';
						} else {
							echo '<span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>';
							echo '<span id="nameSuccess" class="sr-only">(success)</span>';
						}
					}
					?>
					</div>
				</div>

				<div class="form-group <?php
//Validate about and show error
					if ($_SERVER['REQUEST_METHOD'] == "POST") {
						if (($_POST['about']) == NULL) {
							echo 'has-error has-feedback';
						} else {
							echo 'has-success has-feedback';
						}
					}
					?>">
					<label for="about" class="col-sm-2 control-label">Bio</label>
					<div class="col-sm-10">
						<textarea class="form-control" id="about" maxlength="3000" name="about" placeholder="Tell us about yourself"><?php
//Make sticky
						if (isset($_POST['about'])) {
							echo $_POST['about'];
						}
						?></textarea>
						<p class="help-block">Limit 3000 characters</p>
						<?php		//add error icon and message text for screen reader if validation fails
					if ($_SERVER['REQUEST_METHOD'] == "POST") {
						if (($_POST['about']) == "") {
							echo '<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>';
							echo '<span id="nameError" class="sr-only">(error)</span>';
						} else {
							echo '<span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>';
							echo '<span id="nameSuccess" class="sr-only">(success)</span>';
						}
					}
					?>
					</div>
				</div>
				<div class="form-group <?php
//Validate birthdate and show error
					if ($_SERVER['REQUEST_METHOD'] == "POST") {
						if (($_POST['mm']) == NULL||($_POST['dd']) == NULL || ($_POST['yy']) == NULL) {
							echo 'has-error has-feedback';
						} else {
							echo 'has-success has-feedback';
						}
					}
					?>">
					<label for="bday" class="col-sm-2 control-label">Birthday</label>
					<div class="form-inline col-sm-10" id="bday">
						<label for="mm">Month</label>
						<select class="form-control" id="mm" name="mm">
						<?php
							if (!isset($_POST['mm'])) {

								$headm[] = "MM";         //define dropdown header as array
								$month = range(1,12);    //use range function to build array of possible months

								$monthlist=array_merge($headm,$month);    //use array_merge function to combine header and array

								foreach($monthlist as $thism) {     //loop through array to create an option for the header and each year
									if ($thism == "MM"){            //since $_post is not set, select the header
										echo "<option value=\"\" selected>$thism</option>";
									} else {
										echo "<option value=\"$thism\">$thism</option>";
									}
								}
								} else {

								$headm[] = "mm";	     //define dropdown header as array
								$month = range(1,12);    //use range function to build array of possible years

								$monthlist=array_merge($headm,$month);  //use array_merge function to combine header and array

								foreach($monthlist as $thism) {   //loop through array to create an option for the header and each year
									if ($_POST['mm'] == $thism && $_POST['mm'] == "MM") {   //check each array item against the $_post value
										echo "<option value=\"\" selected>$thism</option>";   //when $_post value matches and its the header, use selected to make sticky with no value
									} else if ($_POST['mm'] == $thism) {
										echo "<option value=\"$thism\" selected>$thism</option>";   //when $_post value matches, use selected to make sticky
									} else {
										echo "<option value=\"$thism\">$thism</option>";   //when $_post doesn't match, echo array option unselected so it can be changed
									}
								}
							}
							?>
						</select>
						<label for="dd">Day</label>
						<select class="form-control" id="dd" name="dd">
							<?php
								if (!isset($_POST['dd'])) {

									$headd[] = "DD";       //define dropdown header as array
									$day = range(1,31);    //use range function to build array of possible days

									$daylist=array_merge($headd,$day);    //use array_merge function to combine header and array

									foreach($daylist as $thisd) {     //loop through array to create an option for the header and each day
										if ($thisd == "DD"){            //since $_post is not set, select the header
											echo "<option value=\"\" selected>$thisd</option>";
										} else {
											echo "<option value=\"$thisd\">$thisd</option>";
										}
									}
								} else {

									$headd[] = "dd";	     //define dropdown header as array
									$day = range(1,31);    //use range function to build array of possible days

									$daylist=array_merge($headd,$day);  //use array_merge function to combine header and array

									foreach($daylist as $thisd) {   //loop through array to create an option for the header and each day
										if ($_POST['dd'] == $thisd && $_POST['dd'] == "DD") {   //check each array item against the $_post value
											echo "<option value=\"\" selected>$thisd</option>";   //when $_post value matches and its the header, use selected to make sticky with no value
										} else if ($_POST['dd'] == $thisd) {
											echo "<option value=\"$thisd\" selected>$thisd</option>";   //when $_post value matches, use selected to make sticky
										} else {
											echo "<option value=\"$thisd\">$thisd</option>";   //when $_post doesn't match, echo array option unselected so it can be changed
										}
									}
								}
								?>
						</select>
						<label for="yy">Year</label>
						<select class="form-control" id="yy" name="yy">
							<option value="" selected>YYYY</option>
							<?php
								if (!isset($_POST['yy'])) {

									$heady[] = "YY";       //define dropdown header as array
									$year = range(1940,2010);    //use range function to build array of possible years

									rsort($year);

									$yearlist=array_merge($heady,$year);    //use array_merge function to combine header and array

									foreach($yearlist as $thisy) {     //loop through array to create an option for the header and each year
										if ($thisy == "YY"){            //since $_post is not set, select the header
											echo "<option value=\"\" selected>$thisy</option>";
										} else {
											echo "<option value=\"$thisy\">$thisy</option>";
										}
									}
									} else {

									$heady[] = "yy";	     //define dropdown header as array
									$year = range(1940,2010);    //use range function to build array of possible years

									rsort($year);

									$yearlist=array_merge($heady,$year);  //use array_merge function to combine header and array

									foreach($yearlist as $thisy) {   //loop through array to create an option for the header and each year
										if ($_POST['yy'] == $thisy && $_POST['yy'] == "YY") {   //check each array item against the $_post value
											echo "<option value=\"\" selected>$thisy</option>";   //when $_post value matches and its the header, use selected to make sticky with no value
										} else if ($_POST['yy'] == $thisy) {
											echo "<option value=\"$thisy\" selected>$thisy</option>";   //when $_post value matches, use selected to make sticky
										} else {
											echo "<option value=\"$thisy\">$thisy</option>";   //when $_post doesn't match, echo array option unselected so it can be changed
										}
									}
								}
								?>
						</select>
					</div> <!-- end of inline form -->
				</div> <!-- end of birthday form group -->
				<div class="form-group">
					<label for="refer" class="col-sm-2 control-label">How did you find Low-Rent?</label>
					<div class="col-sm-10">
 						<label class="radio-inline">
						  <input type="radio" name="refer" id="search" value="search"> Search Engine
						</label>
						<label class="radio-inline">
						  <input type="radio" name="refer" id="radio" value="radio"> Radio
						</label>
						<label class="radio-inline">
						  <input type="radio" name="refer" id="tv" value="tv"> TV
						</label>
						<label class="radio-inline">
						  <input type="radio" name="refer" id="print" value="print"> Magazine
						</label>
						<label class="radio-inline">
						  <input type="radio" name="refer" id="other" value="other"> Other
						</label>
					</div>
				</div>
				<div class="form-group">
					<input type="checkbox" id="signUp1" name="signup1" value="yes" checked >
					<label for="signUp1">Yes, please sign me up for the monthly newsletter.	</label>
				</div>
						<div class="form-group">
					<input type="checkbox" id="signUp2" name="signup2" checked >
					<label for="signUp2">Please also send me regular news and updates.</label>
				</div>
				<div class="form-group">
					<input type="checkbox" id="findMe" name="findme" value="yes" checked >
					<label for="findMe">Allow other users to find me by searching my email address.</label>
				</div>

				<?php
					if ($submit) {  //Submit form if all required fields are filled out
    				echo"<script>document.getElementById('lrform').submit();</script> ";
					}
				?>
				<input type="submit" name="submit" value="Submit" class="btn btn-primary btn-lg">
		</form>

		</div><!-- end container -->

<?php include("/home/paulruss/public_html/assignment4/footer.php") ?>
