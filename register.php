<?php
  $email="";
  $uid = "";

  if(isset($_GET['email'])) {
		$email = $_GET['email'];
	}

	if(isset($_GET['uid'])) {
		$uid = $_GET['uid'];
	}
?>
 
 <!doctype html>
 <html lang="en">
   <head>
     <title>Register</title>
     <script src="https://www.google.com/recaptcha/api.js" async defer></script>
     <!-- Required meta tags -->
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 
     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
     <link rel="stylesheet" href="style/register.css">

   </head>
   <body>
    <div class="container">
      <div class="row">
        <div class="col">
          
          <!-- Alert Box -->
          <?php 
          //Error Handling
          if(isset($_GET['error'])) {
            if($_GET['error'] == "recaptcha") {
              echo '<div class="alert alert-danger"><strong>Error! </strong>Please solve the Captcha!</div>';
            } elseif($_GET['error'] == "emptyfields") {
              echo '<div class="alert alert-danger"><strong>Error! </strong>Please complete the form!</div>';
            } else if($_GET['error'] == "invalidemailusername") {
              echo '<div class="alert alert-danger"><strong>Error! </strong>Please enter a valid email!</div>';
              echo '<div class="alert alert-danger"><strong>Error! </strong>Username must be between 3-10 characters! (AlphaNumeric Only!)</div>';
            } else if($_GET['error'] == "invalidmail") {
              echo '<div class="alert alert-danger"><strong>Error! </strong>Please enter a valid email!</div>';
            } else if($_GET['error'] == "invalidusername") {
              echo '<div class="alert alert-danger"><strong>Error! </strong>Username must be between 3-10 characters! (AlphaNumeric Only!)</div>';
            } else if($_GET['error'] == "invalidpassword") {
              echo '<div class="alert alert-danger"><strong>Error! </strong>Password must be at least 5 characters and contains NO whitespaces</div>';
            } else if($_GET['error'] == "passwordcheck") {
              echo '<div class="alert alert-danger"><strong>Error! </strong>Re-entered password doesn\'t match!</div>';
            } else if($_GET['error'] == "usernameTaken") {
              echo '<div class="alert alert-danger"><strong>Username taken!</strong> Please choose another username.</div>';
            } else {
              echo '<div class="alert alert-danger">Uncatched Error! Contact developers.</div>';
            }
            //Registration Successful.
          } else if(isset($_GET['register'])) {
            if($_GET['register'] == 'success') {
              echo '<div class="alert alert-success"><strong>Registration Successful!</strong> Click <a href="login.php" class="alert-link">here</a> to login now.</div>';
            }
          }
          ?>

          <form method="POST" action="do_register.php">

            <div class="text-container">
              <h1 class="title" id="title">Registration</h1>
              <h5 class="subtitle" id="subtitle">Here you can fill out your registration information.</h5> 
            </div>

            <div class="form-group">
              <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelpId" placeholder="e.g. johndoe123@mail.com" value="<?php echo $email ?>">
              <small id="emailHelpId" class="form-text text-muted small-label">Email</small>
            </div>

            <div class="form-group">
              <input type="text" class="form-control" name="username" id="username" aria-describedby="username-help" placeholder="e.g. johndoe123" value="<?php echo $uid ?>">
              <small id="helpId" class="form-text text-muted small-label">Username</small>
            </div>

            <div class="form-group"> 
              <input type="password" class="form-control" name="pwd" id="pwd" placeholder="Password">
            </div>

            <div class="form-group">
              <input type="password" class="form-control" name="confirmpwd" id="confirmpwd" placeholder="Confirm Password">
            </div>

            <div class="g-recaptcha" data-sitekey="6LfoIZYUAAAAAC2_5OE2KD45MdjAjD48Z4OrkI-k"></div>

            <button type="submit" class="btn btn-primary" id="submit" name="register-submit">Register</button>
            
            <div style="text-align:center;">
            or <br> Click here to <a href="login.php">login</a> or <a href="index.php">continue as Guest</a>.
            </div>
          </form>
        </div>
      </div>
    </div>
       
     <!-- Optional JavaScript -->
     <!-- jQuery first, then Popper.js, then Bootstrap JS -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
   </body>
 </html>