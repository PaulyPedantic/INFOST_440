<?php
include("header.php");
include("connect.php");
?>
  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <h1 class="header center deep-purple-text text-darken-2">Welcome to Pauly's Guestbook!</h1>
      <div class="row center">
        <h5 class="header col s12 light">Let me know what you think, eh?</h5>
      </div>
      <div class="row center">
        <a href="leave.php" class="btn-large waves-effect waves-light">Leave a Comment</a>
      </div>

    </div>
  </div>


  <div class="container">
    <div class="section">
      <!-- display posts -->

			<?php
			$sel = "SELECT id, displayname, comment, DATE_FORMAT(commentdate,'%h:%i %p %c/%d/%Y') AS commentdate FROM paulruss_assignment8.content ORDER BY commentdate DESC";

			//This issues our command to the database server
			$result = $db->query($sel);
				/*as I've been working and turning to Google U for help, I've noticed my code is inconsistent between object oriented and procedural styles
				of PHP writing. It all seems to work, but if I wanted prettier code, I should clean this up and consistently use either style*/
			$numberrows = $result->num_rows; //define variable to hold total number of rows in my query result

			if ($numberrows > 0) {
				$rownum = 1;  //declare a variable to keep track of number for each result row
    		// use fetch_assoc to create array and loop through array to output results future state, use modulus operator to paginate results
    		while($row = $result->fetch_assoc()) {
					if ($rownum % 3 == 1) {								//if row mod 3 = 1, this is the first element in a row (rows hold three comments)
						$htmlnewrow = '<div class="row">';
					} else {
						$htmlnewrow = '';
					}

					if ($rownum % 3 == 0 || $rownum == $numberrows){  /*if row mod 3 = 0, this is the last element in a row,
																														if rownum=numberrows, it's the last result on the page and ends the row*/
						$htmlendrow = '</div>';
					} else {
						$htmlendrow = '';
					}
					if ($htmlnewrow) {
						echo $htmlnewrow;
					}
		        echo '<div class="col s12 m4">';
		          echo '<div class="icon-block">';
								//if user provided a displayname, use verified_user icon, otherwise use perm_identity icon
								if (strtoupper($row["displayname"]) == "ANONYMOUS" || $row["displayname"] == "") {
		            	echo '<h2 class="center deep-purple-text text-darken-2 myicon"><i class="material-icons">perm_identity</i></h2>';
								} else {
									echo '<h2 class="center deep-purple-text text-darken-2 myicon"><i class="material-icons">verified_user</i></h2>';
								}
		            echo '<h5 class="center">'.$row["displayname"].'</h5>';

		            echo '<p>'.$row["comment"].'</p>';
								echo '<p class="light mylight">CommentID: '.$row["id"].'</br>';
								echo 'Posted: '.$row["commentdate"].'</p>';
		          echo '</div>';
		        echo '</div>';
					if ($htmlendrow){
						echo $htmlendrow;
					}
					$rownum++;
    		}
			} else {
    		echo "0 results";
			}
			mysqli_close($db);
			?>
    </div>
  </div>


<?php
include("footer.php");
?>
