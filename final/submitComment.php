<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  if (!isset($_POST['editflag']) && !isset($_POST['deleteflag'])) {
    $comment = filter_var($_POST['comment'],FILTER_SANITIZE_STRING);
    $id = $_POST['id'];
    $uid = $_SESSION['uid'];

    $q = 'INSERT INTO comment (comment, postid, userid) values (?, ?, ?)';
    
    $postcomment = @mysqli_prepare($db, $q);
    @mysqli_stmt_bind_param($postcomment, 'sii', $comment, $id, $uid);
    if (@mysqli_execute($postcomment)) {
      $success = "Your comment has been posted successfully.";
      #clear out comment field after successfully posting, it's sticky otherwise
      $comment = '';
    } else {
      $error[] = 'Something went wrong while posting.';
      $error[] = mysqli_error($db);
    }
  } elseif (isset($_POST['editflag'])) {
    $comment = filter_var($_POST['comment'],FILTER_SANITIZE_STRING);
    $commentid = filter_var($_POST['id'],FILTER_SANITIZE_NUMBER_INT);
    
    $q = 'UPDATE comment SET comment = ? WHERE id = ?';
    
    $updatecomment = @mysqli_prepare($db, $q);
    @mysqli_stmt_bind_param($updatecomment, 'si', $comment, $commentid);
    if (@mysqli_execute($updatecomment) &&  mysqli_stmt_affected_rows($updatecomment) == 1) {
      $success = "Your comment has been updated.";
      $comment = '';
    } else {
      $error[] = 'Something went wrong while updating.';
      $error[] = 'Unable to find a comment to edit. Please be sure the desired post exists.';
    }
  } elseif (isset($_POST['deleteflag'])) {
    $commentid = filter_var($_POST['id'],FILTER_SANITIZE_NUMBER_INT);
    
    $q = 'DELETE FROM comment WHERE id = ?';
    $deletecomment = @mysqli_prepare($db, $q);
    @mysqli_stmt_bind_param($deletecomment, 'i', $commentid);
    if (@mysqli_execute($deletecomment) &&  mysqli_stmt_affected_rows($deletecomment) == 1) {
      $success = "Your comment has been deleted. And may God have mercy on your soul XD";
    } else {
      $error[] = 'Something went wrong while deleting.';
      $error[] = 'Unable to find a comment to delete. Please be sure the desired post exists.';
    }
    
  }
}
?>
