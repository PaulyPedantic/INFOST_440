<?php
require_once('scripts/functions.php');
require_once('scripts/head.php');


#if the script including the page has set an error or success, echo those out as alerts
if (!empty($error)){
  echo '<div class="alert alert-danger text-xs-center">';
  foreach($error as $err) {
    echo $err.'<br>';
  }
  echo '</div>';
} elseif (!empty($success)) {
  echo '<div class="alert alert-success text-xs-center">'.$success.'</div>';
}
 ?>

      <div class="row flex-items-xs-center">
        <form class="col-sm-8" action="registerAction.php" method="POST" id="register">
          <div class="form-group">
            <label for="uname">Choose a User Name</label>
            <input type="text" class="form-control" name="uname" placeholder="Username" value="<?php echo $uname;?>">
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="fname">First Name</label>
                <input type="text" class="form-control" name="fname" placeholder="First Name" value ="<?php echo $fname; ?>">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="lname">Last Name</label>
                <input type="text" class="form-control" name="lname" placeholder="Last Name" value ="<?php echo $lname; ?>">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Email" value ="<?php echo $email; ?>">
            <small id="emailHelp" class="form-text text-muted">I'll never share your email with anyone else.</small>
          </div>
          <div class="form-group">
            <label for="pass">Create a Password</label>
            <input type="password" class="form-control" name="pass" placeholder="Password" value ="<?php echo $_POST['pass']; ?>">
          </div>
          <div class="form-check">
            <label class="form-check-label">
              <input type="checkbox" class="form-check-input" name="optin" value="1" checked>
              Leave this box checked if it's ok for me to email you blog updates. I'll never send more than one a week.
            </label>
          </div>
          <button type="submit" form="register" value="Submit" class="btn btn-primary btn-lg">Sign Up</button>
        </form>
      </div>

      <?php
        include('scripts/foot.php');
      ?>
