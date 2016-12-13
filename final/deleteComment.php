<?php
require_once('scripts/functions.php');
include('scripts/head.php');

if ($_SERVER['REQUEST_METHOD'] != 'GET' || !$status['user']) {
  redirect(index.php);
} else {
  $commentid = filter_var($_GET['dltcid'],FILTER_SANITIZE_NUMBER_INT);
  
  $commentinfo = getCommentInfo($db, $commentid);
  
  $comment = $commentinfo['comment'];
  echo '<div class="text-xs-center">';
  echo '<p class="lead">There is no going back</p>';
  echo '<form action="viewPost.php?id='.$commentinfo['postid'].'" method="POST" id="deletecomment" class="text-xs-center">
    <input type="hidden" name="id" value="'.$commentid.'">
    <input type="hidden" name="deleteflag" value="killThisBeast">
    <div class="form-group">
      <button type="submit" form="deletecomment" name="submit" value="Submit" class="btn btn-lg btn-danger">Delete comment</button>
      <small id="deleteHelp" class="form-text text-muted">Don\'t say I didn\t warn you excessively. :)</small>
    </div>
  </form>
</div>';
}

include('scripts/foot.php');
 ?>
