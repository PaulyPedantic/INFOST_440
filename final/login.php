<?php
  include('scripts/head.php');
?>
<div class="row flex-items-xs-center">
  <form class="col-sm-8" action="scripts/loginAction.php" method="POST">
    <div class="form-group">
      <label for="uname">User Name</label>
      <input type="text" class="form-control form-control-lg" name="uname" placeholder="Username" <?php if ($uname) {echo 'value="'.$uname.'"';} ?>>
    </div>
    <div class="form-group">
      <label for="pass">Password</label>
      <input type="password" class="form-control form-control-lg" name="pass" placeholder="Password" <?php if ($pass) {echo 'value="'.$pass.'"';} ?>>
    </div>
    <button type="submit" class="btn btn-primary btn-lg">Submit</button>
  </form>
</div>

<?php
  include('scripts/foot.php');
?>
