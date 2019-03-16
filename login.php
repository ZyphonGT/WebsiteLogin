<?php
	$uid = "";

	if(isset($_GET['uid'])) {
		$uid = $_GET['uid'];
	}
?>

<!doctype html>
<html lang="en">
  <head>
	<title>Login</title>
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
  </head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="style/login.css">
  <body>
	  <div class="container">
		
			<div class="row">
		
				<div class="col"> 

					<!-- Alert Box -->
          <?php 
					//Error Handling
          if(isset($_GET['error'])) {
            if($_GET['error'] == "recaptcha") {
              echo '<div class="alert alert-warning"><strong>Warning! </strong>Please solve the Captcha!</div>';
            } elseif($_GET['error'] == "emptyfields") {
              echo '<div class="alert alert-warning"><strong>Warning! </strong>Please complete the form!</div>';
            } else if($_GET['error'] == "uidNotFound") {
              echo '<div class="alert alert-warning"><strong>Warning! </strong>Username not found. Click <a href="register.php" class="alert-link">here</a> to register.</div>';
            } else if($_GET['error'] == "wrongpwd") {
              echo '<div class="alert alert-warning"><strong>Warning! </strong>Wrong Password!</div>';
            } else if($_GET['error'] == "inactivity") {
              echo '<div class="alert alert-warning">Logged out due to inactivity. Please re-login.</div>';
            } else {
              echo '<div class="alert alert-danger">Uncatched Error! Contact developers.</div>';
            }
          }
          ?>

					<div class="text-container">
						<h1 class="title">Login</h1>
						<h5 class="subtitle">Please input your account credential.</h5>
					</div>

					<form method="POST" action="do_login.php">
		
						<div class="form-group">
							<label for="username"></label>
							<input type="text" class="form-control" name="username" id="username" aria-describedby="helpId" placeholder="" value="<?php echo $uid ?>">
							<small id="helpId" class="form-text text-muted">Username</small>
						</div>

						<div class="form-group">
							<input type="password" class="form-control" name="pwd" id="pwd" placeholder="">
							<small id="helpId" class="form-text text-muted">Password</small>
						</div>

						<!-- Google ReCaptcha -->
						<div class="g-recaptcha" data-sitekey="6LfoIZYUAAAAAC2_5OE2KD45MdjAjD48Z4OrkI-k"></div>

						<button type="submit" class="btn btn-primary" id="submit" name="login-submit">Log in</button>
						
						<div style="text-align:center;">
							or <br> Click here to <a href="register.php">register</a> or <a href="index.php">continue as Guest</a>.
            </div>
					</form>

				</div>
		
			</div>
		
		</div>
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>