<?php
include('scripts/functions.php');
include('scripts/head.php');


echo '<article class="bgArea">';
echo '<p>'.nl2br($pi['post']).'</p>';
echo '  <div class="text-xs-right">
    <p>Written By: '.$pi['fname'].' '.$pi['lname'].'<br>
    '.$pi['date'].'</p>
  </div>';
if ($status['admin']) {
  echo '<div class="row flex-items-xs-around">
      <div class="col-xs-6 text-xs-center">
        <a href="createPost.php?eid='.$pi['id'].'" class="mybutton">Edit Post <i class="fa fa-pencil" aria-hidden="true"></i></a>
      </div>
      <div class="col-xs-6 text-xs-center">
        <a href="deletePost.php?dltid='.$pi['id'].'" class="mybutton">Delete Post <i class="fa fa-exclamation-circle" aria-hidden="true"></i></a>
      </div>
    </div>';
  }
echo '</article>';

echo '<div id="comments">';
if ($status['user']) {
  echo '<form action="submitComment.php" method="POST" id="comment" class="text-xs-center">
  <input type="hidden" name="id" value="'.$pi['id'].'">
  <div class="form-group row flex-items-xs-middle">
    <label for="comment" class="sr-only">Comment</label>
    <div class="col-xs-9">
      <textarea name="comment" rows="2" maxlength="500" placeholder="What do you think?" class="form-control">'.$comment.'</textarea>
    </div>
    <div class="col-xs-3">
      <button type="submit" form="comment" name="submit" value="Submit" class="btn btn-lg btn-primary">Leave comment</button>
    </div>
  </div>
</form>';
} else {
  echo '<div class="alert alert-info text-xs-center">Please <a href="login.php">log in</a> if you\'d like to post a comment</div>';
}

$q = "SELECT DATE_FORMAT(c.date, '%M %e %Y') AS date, DATE_FORMAT(c.date, '%l:%i %p') as time, c.id, c.comment, u.usernm FROM comment c
LEFT OUTER JOIN user u ON c.userid = u.id
WHERE c.postid = ".$pi['id'];

$commentinfo = mysqli_query($db, $q);
while ($row = mysqli_fetch_array($commentinfo, MYSQLI_ASSOC)){

  echo '<div class="bgArea comment">
  <div class="row commentHead flex-items-xs-middle">
    <div class="col-sm-4 text-xs-center">
      <p class="user noMargin">'.$row['usernm'].'</p>
    </div>
    <div class="col-sm-4 text-xs-center">
      <p class="date noMargin">'.$row['date'].'</p>
    </div>
    <div class="col-sm-4 text-xs-center">
      <p class="date noMargin">'.$row['time'].'</p>
    </div>
  </div>
  <div class="row flex-items-xs-middle">
    <div class="col-xs-12 pluspad">
      <p class="noMargin">'.$row['comment'].'</p>
    </div>
  </div>';
  if ($status['user'] == $row['usernm'] || !empty($status['admin'])) {
    echo '<div class="row flex-items-xs-around pluspad">
      <div class="col-xs-6 text-xs-center">
        <a href="submitComment.php?cid='.$row['id'].'" class="mybutton">Edit Comment <i class="fa fa-pencil" aria-hidden="true"></i></a>
      </div>
      <div class="col-xs-6 text-xs-center">
        <a href="deleteComment.php?dltcid='.$row['id'].'" class="mybutton">Delete Comment <i class="fa fa-exclamation-circle" aria-hidden="true"></i></a>
      </div>
    </div>';
  }
echo '</div>';
}
?>
</div>
<div class="bgArea mynavpages text-xs-center">
  View More Comments:

  <nav aria-label="Comment Pages">
    <ul class="pagination pagination-lg">
      <li class="page-item disabled">
        <a class="page-link" href="#" tabindex="-1" aria-label="Previous">
          <i class="fa fa-hand-o-left" aria-hidden="true"></i>
          <span class="sr-only">Previous</span>
        </a>
      </li>
      <li class="page-item active">
        <a class="page-link" href="#">1 <span class="sr-only">(current)</span></a>
      </li>
      <li class="page-item"><a class="page-link" href="#">2</a></li>
      <li class="page-item"><a class="page-link" href="#">3</a></li>
      <li class="page-item"><a class="page-link" href="#">4</a></li>
      <li class="page-item"><a class="page-link" href="#">5</a></li>
      <li class="page-item">
        <a class="page-link" href="#" aria-label="Next">
          <i class="fa fa-hand-o-right" aria-hidden="true"></i>
          <span class="sr-only">Next</span>
        </a>
      </li>
    </ul>
</div>

<?php
  include('scripts/foot.php');
?>
