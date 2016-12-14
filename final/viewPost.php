<?php
include('scripts/functions.php');
include('scripts/head.php');
include('submitComment.php');

if (!empty($error)){
  echo '<div class="alert alert-danger text-xs-center">';
  foreach($error as $err) {
    echo $err.'<br>';
  }
  echo '</div>';
} elseif (!empty($success)) {
  echo '<div class="alert alert-success text-xs-center">'.$success.'</div>';
}

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

# this is the id for hyperlinks to the comments section on the index page
echo '<div id="comments">';

# check if there is a user session variable ($status gets set to session in head.php)
if ($status['user']) {
  echo '<form action="viewPost.php?id='.$pi['id'].'" method="POST" id="comment" class="text-xs-center">
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
  # if the viewer is not a logged in user, show an alert prompting to log in
  # instead of the text area for leaving a comment.
  echo '<div class="alert alert-info text-xs-center">Please <a href="login.php">log in</a> if you\'d like to post a comment</div>';
}

# comment pagination

// Check if current page has already been determined.
if (isset($_GET['p']) && is_numeric($_GET['p'])) {
  // use + operator to ensure variable is cast as int
  $curpg = +$_GET['p'];
} else {
  // Current page isn't set, start at 1
  $curpg = 1;
}

// get the number of posts in database
$numcomments = getCount($db, 'comment', $pi['id'], 'postid');

// declare a variable to limit number of comments on a page to 10
$limit = 10;
// declare a variable to track how many records were displayed on previous pages
$skipcnt = 0;

// Calculate the number of pages...
if ($numcomments > $limit) {
  // If more than 1 page. Round up posts divided by limit to get pages
  $pgcount = ceil ($numcomments/$limit);
  // We want to skip records shown on previous pages
  // the number of the previous page is the number of pages already seen and
  // we know that we've shown the limit on each page
  $skipcnt = ($curpg -1) * $limit;
} else {
  // if not more than one page, hardcode 1 page and no skips
  $pgcount = 1;
  $skipcnt = 0;
}
# end of comment pagination

# get the comments from the database for the current post
$q = "SELECT DATE_FORMAT(c.date, '%M %e %Y') AS date, DATE_FORMAT(c.date, '%l:%i %p') as time, c.id, c.comment, u.usernm FROM comment c
LEFT OUTER JOIN user u ON c.userid = u.id
WHERE c.postid = ".$pi['id']."
ORDER BY c.date DESC
LIMIT ".$skipcnt.','.$limit;

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
      <p class="noMargin">'.nl2br($row['comment']).'</p>
    </div>
  </div>';
  # if session username matches the username of the comment, or the user is
  # logged in as an admin, show edit/delete comment buttons
  if ($status['user'] == $row['usernm'] || ($status['admin'])) {
    echo '<div class="row flex-items-xs-around pluspad">
      <div class="col-xs-6 text-xs-center">
        <a href="editComment.php?ecid='.$row['id'].'" class="mybutton">Edit Comment <i class="fa fa-pencil" aria-hidden="true"></i></a>
      </div>
      <div class="col-xs-6 text-xs-center">
        <a href="deleteComment.php?dltcid='.$row['id'].'" class="mybutton">Delete Comment <i class="fa fa-exclamation-circle" aria-hidden="true"></i></a>
      </div>
    </div>';
  }
echo '</div>';
}

#if more than one page, include pagination section
if ($pgcount > 1) {
  # set variables to handle previous and next links
  # bootstrap docs recommend using class disabled, null link, and tabindex -1
  # to make sure link is unavailable to assistive technologies
  $prevclass = '';
  $nextclass = '';
  $prevpg = $curpg - 1;
  $nextpg = $curpg + 1;
  $prevtab = '';
  $nexttab = '';

  if ($curpg == 1) {
    $prevclass = 'disabled';
    $prevpg = '#';
    $prevtab = 'tabindex="-1"';
  }
  if ($curpg == $pgcount) {
    $nextclass = 'disabled';
    $nextpg = '#';
    $nexttab = 'tabindex="-1"';
  }
  # define pagination section, bootstrap group, and previous button
  echo'<div class="bgArea mynavpages text-xs-center">
    View More Comments:

    <nav aria-label="Comment Pages">
      <ul class="pagination pagination-lg">
        <li class="page-item '.$prevclass.'">
          <a class="page-link" href="viewPost.php?id='.$pi['id'].'&p='.$prevpg.'" '.$prevtab.'" aria-label="Previous">
            <i class="fa fa-hand-o-left" aria-hidden="true"></i>
            <span class="sr-only">Previous</span>
          </a>
        </li>';
  # use loop to generate links to all possible Pages
  for ($i = 1; $i <= $pgcount; $i++) {
    $active = '';
    $srActiveSpan = '';
    if ($i == $curpg) {
      $active = 'active';
      $srActiveSpan = '<span class="sr-only">(current)</span>';
    }
    echo '<li class="page-item '.$active.'"><a class="page-link" href="viewPost.php?id='.$pi['id'].'&p='.$i.'">'.$i.' '.$srActiveSpan.'</a></li>';
  }

  # define next button and close button group and pagination section
  echo '<li class="page-item '.$nextclass.'">
        <a class="page-link" href="viewPost.php?id='.$pi['id'].'&p='.$nextpg.'" '.$nexttab.' aria-label="Next">
          <i class="fa fa-hand-o-right" aria-hidden="true"></i>
          <span class="sr-only">Next</span>
        </a>
      </li>
    </ul>
  </div>';
}
?>

<?php
  include('scripts/foot.php');
?>
