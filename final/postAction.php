<?php
require_once('scripts/dbConfig.php');
require_once('scripts/functions.php');
$status = authenticate();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $title = filter_var($_POST['title'],FILTER_SANITIZE_STRING);
  $subtitle = filter_var($_POST['subtitle'],FILTER_SANITIZE_STRING);
  $desc = filter_var($_POST['desc'],FILTER_SANITIZE_STRING);
  $post = $_POST['post'];
  $author = $status['uid'];
  
  $q = 'INSERT INTO post (title, subtitle, authorid, post, description) VALUES (?, ?, ?, ?, ?)';
  $insertpost = @mysqli_prepare($db, $q);
  @mysqli_stmt_bind_param($insertpost, 'ssiss', $title, $subtitle, $author, $post, $desc);
  if (@mysqli_execute($insertpost)) {
    $success = "Post has been successfully created.";
    include('index.php');
    exit();
  } else {
    $error[] = "Unable to insert post.";
    $error[] = mysqli_error($db);
    $error[] = $author. $status['uid']. $status['user'];
    include('createPost.php');
    exit();
  }
  
}
?>
