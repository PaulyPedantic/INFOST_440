<?php include("/home/paulruss/public_html/assignment4/header.php") ?>

		<div class="container">

			<div class="pg-head">
				<?php
				echo '<h1 class="text-center">Welcome to Low-Rent Social Media '.$_POST['name'].'!</h1>';
				?>
			</div>
			<?php
				echo '<p class="lead text-center">We have received your information and will send a confirmation email to '.$_POST['email'].'</p>';
			?>

			<h2>Profile information:</h2>
			<ul class="list-group">
			<?php
			$html = '<li class="list-group-item">';

			echo $html . 'Name: ' . $_POST['name'] . '</li>';
			echo $html . 'Email: ' . $_POST['email'] . '</li>';
			echo $html . 'Phone: ' . $_POST['phone'] . '</li>';
			echo $html . 'Birthdate: ' . $_POST['mm'] . '/' . $_POST['dd'] . '/' . $_POST['yy'] . '</li>';
			if ($_POST['signup1'] == "on") {
				$newsletter = "OPT-IN";
			} else {
				$newsletter = "OPT-OUT";
			}

			echo $html . 'Monthly Newsletter?: ' . $newsletter . '</li>';

			if ($_POST['signup2'] == "on") {
				$updates = "OPT-IN";
			} else {
				$updates = "OPT-OUT";
			}

			echo $html . 'Regular Updates?: ' . $updates . '</li>';
			?>
		</div><!-- end container -->


		<?php include("/home/paulruss/public_html/assignment4/footer.php") ?>
