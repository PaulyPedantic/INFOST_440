<?php
require_once('scripts/functions.php');
include('scripts/head.php');

if ($_SERVER['REQUEST_METHOD'] != 'GET' || !$status['user']) {
  echo '<div class="alert alert-danger">Unable to delete post. <br>
        You must be logged in to delete posts, and only admin accounts can do so.</div>';
  exit();
} else {
  $postid = filter_var($_GET['dltid'],FILTER_SANITIZE_NUMBER_INT);
  
  echo '<div class="text-xs-center">
    <p class="lead">Last chance to <br>
    <a href="viewPost.php?id='.$postid.'" alt="exit" class="btn btn-primary">Go Back</a>
    <p class="lead">If you click the red button, you can&apos;t take it back.</p>
    <a href="postAction.php?dltid='.$postid.'" class="btn btn-lg btn-danger" alt="delete post">Delete post</a>
    <small id="deleteHelp" class="form-text text-muted">Don&apos;t say I didn&apos;t warn you excessively. :)</small>';
}

include('scripts/foot.php');
 ?>
