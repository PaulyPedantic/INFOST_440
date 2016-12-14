<?php
require_once('scripts/dbConfig.php');
require_once('scripts/functions.php');
$status = authenticate();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (empty($title = filter_var($_POST['title'],FILTER_SANITIZE_STRING))){
    $error[] = 'A title is required for all posts.';
  }
  if (empty($subtitle = filter_var($_POST['subtitle'],FILTER_SANITIZE_STRING))) {
    $error[] = 'A subtitle is required for all posts';
  }
  if (empty($desc = filter_var($_POST['desc'],FILTER_SANITIZE_STRING))) {
    $error[] = 'A description is required for all posts';
  }
  if (empty($post = $_POST['post'])) {
    $error[] = 'The post cannot be blank.';
  }
  $author = $status['uid'];
  
  if ($error) {
    $isedit = $edit;
    include('createPost.php');
    exit();
  }
  
  if ($_POST['source'] == 'create') {
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
      include('createPost.php');
      exit();
    }
  } elseif ($_POST['source'] == 'update' || $edit){
    $id = filter_var($_POST['editId'],FILTER_SANITIZE_NUMBER_INT);
    
    $q = 'UPDATE post SET
            title = ?,
            subtitle = ?,
            description = ?,
            post = ?
          WHERE id = ?';
    $updatepost = mysqli_prepare($db, $q);
    mysqli_stmt_bind_param($updatepost, 'ssssi', $title, $subtitle, $desc, $post, $id);
    
    if (mysqli_execute($updatepost) &&  mysqli_stmt_affected_rows($updatepost) == 1) {
      $success = "Post has been updated succesfully.";
      include('index.php');
    } else {
      $error[] = 'Something went wrong while updating.';
      $error[] = 'You can&apos;t exactly update a post if you didn&apos;t change anything.';
      $isedit = true;
      include('createPost.php');
    }
  }
} else if (isset($_GET['dltid']) && !empty($status['admin'])) {
  $id = filter_var($_GET['dltid'], FILTER_SANITIZE_NUMBER_INT);
  $q = 'DELETE FROM post WHERE id = ?';
  $deletepost = @mysqli_prepare($db, $q);
  @mysqli_stmt_bind_param($deletepost, 'i', $id);
  if (@mysqli_execute($deletepost)) {
    $success = 'This post has been deleted.';
    include('index.php');
  } else {
    $error[] = 'Something went wrong while deleting.';
    $error[] = 'mysqli_error($db)';
    include('createPost.php');
  }
}
?>