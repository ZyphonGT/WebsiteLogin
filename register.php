 <!doctype html>
 <html lang="en">
   <head>
     <title>Register</title>
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
          <form method="POST" action="do_register.php">
          
            <div class="text-container">
              <h1 class="title" id="title">Registration</h1>
              <h5 class="subtitle" id="subtitle">Here you can fill out your registration information.</h5> 
            </div>

            <div class="form-group">
              <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelpId" placeholder="e.g. johndoe123@mail.com">
              <small id="emailHelpId" class="form-text text-muted small-label">Email</small>
            </div>

            <div class="form-group">
              <input type="text" class="form-control" name="username" id="username" aria-describedby="username-help" placeholder="e.g. johndoe123">
              <small id="helpId" class="form-text text-muted small-label">Username</small>
            </div>

            <div class="form-group"> 
              <input type="password" class="form-control" name="pwd" id="pwd" placeholder="Password">
            </div>

            <div class="form-group">
              <input type="password" class="form-control" name="confirmpwd" id="confirmpwd" placeholder="Confirm Password">
            </div>

            <button type="submit" class="btn btn-primary" id="submit" name="submit">Submit</button>
        
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