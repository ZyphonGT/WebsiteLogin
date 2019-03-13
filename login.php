<!doctype html>
<html lang="en">
  <head>
	<title>Title</title>
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

					<div class="text-container">
						<h1 class="title">Login</h1>
						<h5 class="subtitle">Please input your account credential.</h5>
					</div>

					<form method="POST" action="do_login.php">
		
						<div class="form-group">
							<label for="username"></label>
							<input type="text" class="form-control" name="username" id="username" aria-describedby="helpId" placeholder="">
							<small id="helpId" class="form-text text-muted">Username</small>
						</div>

						<div class="form-group">
							<input type="password" class="form-control" name="pwd" id="pwd" placeholder="">
							<small id="helpId" class="form-text text-muted">Password</small>
						</div>

						<button type="submit" class="btn btn-primary" id="submit" name="submit">Submit</button>
		
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