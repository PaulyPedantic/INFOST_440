<?php
session_start();
require_once('scripts/dbConfig.php');
require_once('scripts/functions.php');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $comment = filter_var($_POST['comment'],FILTER_SANITIZE_STRING);
  $id = $_POST['id'];
  $uid = $_SESSION['uid'];

  $q = 'INSERT INTO comment (comment, postid, userid) values (?, ?, ?)';
  
  $postcomment = mysqli_prepare($db, $q);
  mysqli_stmt_bind_param($postcomment, 'sii', $comment, $id, $uid);
  mysqli_execute($postcomment);
  
  redirect('viewPost.php?id='.$id);
}
?>
