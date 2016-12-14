<?php
require_once('scripts/functions.php');
include('scripts/head.php');

if (!empty($error)){
  echo '<div class="alert alert-danger text-xs-center">';
  foreach($error as $err) {
    echo $err.'<br>';
  }
  echo '</div>';
} elseif (!empty($success)) {
  echo '<div class="alert alert-success text-xs-center">'.$success.'</div>';
}

#pagination

// Check if current page has already been determined.
if (isset($_GET['p']) && is_numeric($_GET['p'])) {
  // use + operator to ensure variable is cast as int
  $curpg = +$_GET['p'];
} else {
  // Current page isn't set, start at 1
  $curpg = 1;
}

// get the number of posts in database
$numposts = getCount($db, 'post');

// declare a variable to limit number of records on a page to 4
$limit = 4;
// declare a variable to track how many records were displayed on previous pages
$skipcnt = 0;

// Calculate the number of pages...
if ($numposts > $limit) {
  // If more than 1 page. Round up posts divided by limit to get pages
  $pgcount = ceil ($numposts/$limit);
  // We want to skip records shown on previous pages
  // the number of the previous page is the number of pages already seen and
  // we know that we've shown the limit on each page
  $skipcnt = ($curpg -1) * $limit;
} else {
  // if not more than one page, hardcode 1 page and no skips
  $pgcount = 1;
  $skipcnt = 0;
}
# end of pagination

# pull posts out of the database and loop through them
$q = 'SELECT p.id, p.title, p.subtitle, DATE_FORMAT(p.date, \'%M %e, %Y\') AS mdyDate, p.description, p.post FROM post p ORDER BY p.date DESC LIMIT '.$skipcnt.','.$limit;

$getposts = @mysqli_query($db, $q);
if ($getposts) {
  echo '
       <div class="row">
          <section class="col-sm">';


  while ($row = mysqli_fetch_array($getposts, MYSQLI_ASSOC)){
    echo '
                <article class="bgArea">
                  <header>
                    <h2>'.$row['title'].'</h2>
                  </header>
                  <p>'.substr(nl2br($row['post']),0,1000).' ...</p>
                  <footer>
                    <div class="row flex-items-xs-between">
                      <div class="col-xs-4 text-xs-center">
                        <p>'.$row['mdyDate'].'</p>
                      </div>
                      <div class="col-xs-4">
                        <a class="mybutton" href="viewPost.php?id='.$row['id'].'">Read Full Post <i class="fa fa-newspaper-o" aria-hidden="true"></i></a>
                      </div>';
                      $numcomments = getCount($db, 'comment', $row['id'], 'postid');
    echo '            <div class="col-xs-4">
                        <a class="mybutton" href="viewPost.php?id='.$row['id'].'#comments">'.$numcomments.' Comments <i class="fa fa-commenting" aria-hidden="true"></i></a>
                      </div>
                    </div>';
                    if ($status['admin']) {
    echo             '<div class="row flex-items-xs-around">
                        <div class="col-xs-6 text-xs-center">
                          <a href="createPost.php?eid='.$row['id'].'" class="mybutton">Edit Post <i class="fa fa-pencil" aria-hidden="true"></i></a>
                        </div>
                        <div class="col-xs-6 text-xs-center">
                          <a href="deletePost.php?dltid='.$row['id'].'" class="mybutton">Delete Post <i class="fa fa-exclamation-circle" aria-hidden="true"></i></a>
                        </div>
                      </div>';
                    }
    echo          '</footer>
                </article>';
  }
}


if ($pgcount > 1) {
  if ($curpg < $pgcount) {
    $nextpg = $curpg + 1;
    echo '<nav class="row flex-items-xs-middle">
      <div class="text-xs-left col-xs">
        <a class="mybutton mynavbrand" href="index.php?p='.$nextpg.'"><i class="fa fa-hand-o-left" aria-hidden="true"></i> Older Posts</a>
      </div>';
  }
  if ($curpg > 1) {
    $prevpg = $curpg - 1;
    echo '<div class="text-xs-right col-xs">
      <a class="mybutton mynavbrand" href="index.php?p='.$prevpg.'">Newer Posts <i class="fa fa-hand-o-right" aria-hidden="true"></i></a>
    </div>';
  }
  echo '  </nav>';
}

?>
  </section>
        <aside class="col-sm-3 flex-sm-first text-xs-center">
          <h2 class="h5 asideHead">About the Author: </h2>
          <img src="images/me.jpg" alt="Pauly hiking with his kids" class="img img-fluid img-circle">
          <p>My name is Pauly Russ, and I'm a Technical Analyst in Milwaukee, Wi. I studied at the University of Wisconsin-Milwaukee in the <a href="http://uwm.edu/informationstudies/">School of Information Science</a>. I coded this site as a final project
            for one of my courses, but intend to maintain an active blog to document my continued learning in web development, data science, information security, and personal growth topics.
          </p>
        </aside>
      </div>

      <?php
        include('scripts/foot.php');
      ?>
