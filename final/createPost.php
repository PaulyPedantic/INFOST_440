<?php
include('scripts/functions.php');
$status = authenticate();

if (!$status['user']) {
  redirect();
} else {
  include('scripts/head.php');
}
 ?>

      <div class="row flex-items-xs-center">
        <form class="col-sm-8">
          <div class="form-group">
            <label for="title">Post Title</label>
            <input type="text" class="form-control" name="title" placeholder="Title">
          </div>
            <div class="form-group">
              <label for="subtitle">Subtitle</label>
              <input type="text" class="form-control" name="subtitle" placeholder="Subtitle">
            </div>
            <div class="form-group">
              <label for="desc">Description</label>
              <textarea class="form-control" name="descc" rows="3" maxlength="150"></textarea>
            </div>
            <div class="form-group">
              <label for="post">Post</label>
              <textarea class="form-control" name="post" rows="18"></textarea>
            </div>
            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
          </div>
        </form>
      </div>

      <?php
        include('scripts/foot.php');
      ?>
