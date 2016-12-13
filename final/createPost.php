<?php
require_once('scripts/functions.php');
$status = authenticate();

if (!$status['user']) {
  redirect();
} else {
  include('scripts/head.php');
  
}

if (!empty($error)){
  echo '<div class="alert alert-danger text-xs-center">';
  foreach($error as $err) {
    echo $err.'<br>';
  }
  echo '</div>';
} elseif (!empty($success)) {
  echo '<div class="alert alert-success text-xs-center">'.$success.'</div>';
}

if (isset($_GET['eid'])) {
  $edit = true;
  $editid = filter_var($_GET['eid'],FILTER_SANITIZE_NUMBER_INT);
  $editinfo = getPostInfo($db, $editid);
  $title = $editinfo['title'];
  $subtitle = $editinfo['subtitle'];
  $desc = $editinfo['description'];
  $post = $editinfo['post'];
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
              <textarea class="form-control" name="desc" rows="2" maxlength="150" placeholder="Describe the page in 150 characters or less. This description will be used for search optimization."><?php echo $desc; ?></textarea>
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
