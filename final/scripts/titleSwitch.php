<?php
#define variables to handle header content that varies by page
$date = '';
$subtitle = '';
$pgname = basename($_SERVER['PHP_SELF'],'.php');

#adjust page behavior based on page location
switch ($pgname) {
  case 'postAction':
    if (!empty($error)) {
      #if an error is set, the script stays on create post page
      $pgtitle = 'Write New Post';
      #if the user isn't logged in to an admin session, redirect to login page
      if (!$status['admin']) {
        redirect();
        exit();
      }
      break;
    } else {
      #if no errors, let fall through to index
    }
  case 'logout':
    #let logout fall through to index
  case 'loginAction':
    #let loginaction fall through to index
  case 'index':
    $pgtitle = 'Okay with wrong';
    $subtitle = 'What I know, what I don\'t, and how being wrong makes me better.';
    $description = 'Okay With Wrong is a blog written by Pauly Russ that focuses on information science concepts, continuous learning, and personal growth.';
    $home = true;
    break;
  case 'registerAction':
    if (!empty($error)){
      #if an error is set, let fall through to register page
    } else {
      $pgtitle='Log In';
      $subtitle = 'Login to leave a comment.';
      break;
    }
  case 'register':
    $pgtitle = 'Register';
    $subtitle = 'You must have an account to leave comments. Register below or <a href="login.php" class="decorateLink">log in.</a>';
    $description = 'Register for an account to post comments on Ok With Wrong.';
    break;
  case 'login':
    $pgtitle = 'Log In';
    $subtitle = 'Login to leave a comment.';
    break;
  case 'createPost':
    #if not admin, redirect to login page
    if (!$status['admin']) {
      redirect();
      exit();
    }
    $pgtitle = 'Write New Post';
    break;
  case 'leaveComment':
    #if not user, redirect to login page
    if (!$status['user']) {
      redirect();
      exit();
    }
    $pgtitle = 'Leaving a comment';
    break;
  case 'viewPost':
    $pi = getpostinfo($db, $_GET['id']);
    $pgtitle = $pi['title'];
    $subtitle = $pi['subtitle'];
    $description = $pi['description'];
    break;
  case 'editComment':
    $pgtitle = 'Editing Comment';
    break;
  case 'deleteComment':
    $pgtitle = 'Are you Sure?';
    $subtitle = 'As in: Absolutely. Positively. 100% sure you want to do this?';
    break;
  default:
    $pgtitle = $pgname;
}
?>
