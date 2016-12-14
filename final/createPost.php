<?php
require_once('scripts/functions.php');
$status = authenticate();

if (!$status['user']) {
  redirect();
}

require_once('scripts/head.php');

if (!empty($error)){
  echo '<div class="alert alert-danger text-xs-center">';
  foreach($error as $err) {
    echo $err.'<br>';
  }
  echo '</div>';
} elseif (!empty($success)) {
  echo '<div class="alert alert-success text-xs-center">'.$success.'</div>';
}

# when edit post link is clicked, navigates to this page with get method
# and header sets $edit
if (isset($edit) && $_SERVER['REQUEST_METHOD'] == 'GET') {
  $editid = filter_var($_GET['eid'],FILTER_SANITIZE_NUMBER_INT);
  $editinfo = getPostInfo($db, $editid);
  $title = $editinfo['title'];
  $subtitle = $editinfo['subtitle'];
  $desc = $editinfo['description'];
  $post = $editinfo['post'];
}

# if an error is encountered, this page gets redirected to using the post method
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  # check the edit flag and pull the id from the hidden field of the post method
  # and get existing post info from database
  if ($edit){
    $editid = filter_var($_POST['editId'],FILTER_SANITIZE_NUMBER_INT);
    $editinfo = getPostInfo($db, $editid);
    $title = $editinfo['title'];
    $subtitle = $editinfo['subtitle'];
    $desc = $editinfo['description'];
    $post = $editinfo['post'];
  } else {
    # if creating a new post failed with errors, get the posted info and set the
    # variables to be used for making the form sticky
    $title = $_POST['title'];
    $subtitle = $_POST['subtitle'];
    $desc = $_POST['desc'];
    $post = $_POST['post'];
  }
}
 ?>

      <div class="row flex-items-xs-center">
        <form class="col-sm-8" action="postAction.php" method="POST">
          <input type="hidden" name="source" value="<?php
          if ($edit) {
            echo 'update';
          } else {
            echo 'create';
          } ?>">
          <input type="hidden" name="editId" value="<?php
            echo $editid;
          ?>">
          <div class="form-group">
            <label for="title">Post Title</label>
            <input type="text" class="form-control" name="title" placeholder="Title" value="<?php echo $title; ?>">
          </div>
            <div class="form-group">
              <label for="subtitle">Subtitle</label>
              <input type="text" class="form-control" name="subtitle" placeholder="Subtitle" value="<?php echo $subtitle; ?>">
            </div>
            <div class="form-group">
              <label for="desc">Description</label>
              <textarea class="form-control" name="desc" rows="2" maxlength="150" placeholder="Enter a page description"><?php echo $desc; ?></textarea>
              <small class="form-text text-muted" id="descHelp">Describe the page in 150 characters or less. This won&apos;t be seen by site visitors, but presented to search engines for optimization.</small>
            </div>
            <div class="form-group">
              <label for="post">Post</label>
              <textarea class="form-control" name="post" rows="18" placeholder="Write your post here."><?php echo $post; ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
          </div>
        </form>
      </div>

      <?php
        include('scripts/foot.php');
      ?>
