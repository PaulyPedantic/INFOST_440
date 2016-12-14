<?php
require_once('scripts/functions.php');
require_once('scripts/head.php');
  
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
  <form class="col-sm-8" action="loginAction.php" method="POST">
    <div class="form-group">
      <label for="uname">User Name</label>
      <input type="text" class="form-control form-control-lg" name="uname" placeholder="Username" <?php if ($uname) {echo 'value="'.$uname.'"';} ?>>
    </div>
    <div class="form-group">
      <label for="pass">Password</label>
      <input type="password" class="form-control form-control-lg" name="pass" placeholder="Password" <?php if ($pass) {echo 'value="'.$pass.'"';} ?>>
    </div>
    <div class="text-xs-center">
      <p class="form-text">Don&apos;t have an account? No problem. <a href="register.php" alt="register">Click here to register</a></p>
      <button type="submit" class="btn btn-primary btn-lg">Submit</button>
    </div>
  </form>
</div>

<?php
  include('scripts/foot.php');
?>
