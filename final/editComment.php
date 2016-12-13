<?php
require_once('scripts/functions.php');
include('scripts/head.php');

if ($_SERVER['REQUEST_METHOD'] != 'GET' || !$status['user']) {
  redirect(index.php);
} else {
  $commentid = filter_var($_GET['ecid'],FILTER_SANITIZE_NUMBER_INT);
  
  $commentinfo = getCommentInfo($db, $commentid);
  
  $comment = $commentinfo['comment'];
  
  echo '<form action="viewPost.php?id='.$commentinfo['postid'].'" method="POST" id="editcomment" class="text-xs-center">
  <input type="hidden" name="id" value="'.$commentid.'">
  <input type="hidden" name="editflag" value="editThisBeast">
  <div class="form-group row flex-items-xs-middle">
    <label for="comment" class="sr-only">Comment</label>
    <div class="col-xs-9">
      <textarea name="comment" rows="2" maxlength="500" placeholder="What do you think?" class="form-control">'.$comment.'</textarea>
    </div>
    <div class="col-xs-3">
      <button type="submit" form="editcomment" name="submit" value="Submit" class="btn btn-lg btn-primary">Update comment</button>
    </div>
  </div>
</form>';
}

include('scripts/foot.php');
 ?>
