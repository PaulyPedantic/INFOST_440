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
 ?>

      <div class="row flex-items-xs-center">
        <form class="col-sm-8" action="createPost.php" method="POST">
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
              <textarea class="form-control" name="desc" rows="3" maxlength="150" placeholder="Describe the page in 150 characters or less. This description will be used for search optimization."><?php echo $desc; ?></textarea>
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
