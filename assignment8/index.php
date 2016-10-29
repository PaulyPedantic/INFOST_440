<?php
include("header.php");
include("connect.php");
?>
  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
      <h1 class="header center deep-purple-text text-darken-2">Welcome to Pauly's Guestbook!</h1>
      <div class="row center">
        <h5 class="header col s12 light">Let me know what you think, eh?</h5>
      </div>
      <div class="row center">
        <a href="leave.php" class="btn-large waves-effect waves-light deep-purple white-text">Comment</a>
      </div>
      <br><br>

    </div>
  </div>


  <div class="container">
    <div class="section">

      <!-- display posts -->
      <div class="row">
        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center deep-purple-text text-darken-2"><i class="material-icons">verified_user</i></h2>
            <h5 class="center">JohnCena</h5>

            <p class="light">I am what ever I say I am, sucka.</p>
						<p class="light">CommentID: 1</p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center deep-purple-text text-darken-2"><i class="material-icons">perm_identity</i></h2>
            <h5 class="center">Anonymous</h5>

            <p class="light">This is an anonymous comment</p>
						<p class="light">CommentID: 2</p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center deep-purple-text text-darken-2"><i class="material-icons">verified_user</i></h2>
            <h5 class="center">UserName</h5>

            <p class="light">I'm a verified user who provided a username</p>
						<p class="light">CommentID: 3</p>
          </div>
        </div>
      </div>

    </div>
    <br><br>

    <div class="section">

    </div>
  </div>

<?php
include("footer.php");
?>
