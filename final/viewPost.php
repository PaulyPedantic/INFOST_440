<?php
include('scripts/functions.php');
include('scripts/head.php');


echo '<article class="bgArea">';
echo '<p>'.nl2br($pi['post']).'</p>';
echo '  <div class="text-xs-right">
    <p>Written By: '.$pi['fname'].' '.$pi['lname'].'<br>
    '.$pi['date'].'</p>
  </div>
</article>';

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

$q = "SELECT DATE_FORMAT(c.date, '%M %e %Y') AS date, c.comment, u.usernm FROM comment c
LEFT OUTER JOIN user u ON c.userid = u.id
WHERE c.postid = ".$pi['id'];

$commentinfo = mysqli_query($db, $q);
while ($row = mysqli_fetch_array($commentinfo, MYSQLI_ASSOC)){

  echo '<div class="bgArea comment">
  <div class="row">
    <div class="col-sm-3">
      <p class="user">'.$row['usernm'].'</p>
      <p class="date">'.$row['date'].'</p>
    </div>
    <div class="col-sm-9">
      <p>'.$row['comment'].'</p>
    </div>
  </div>
</div>';
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
