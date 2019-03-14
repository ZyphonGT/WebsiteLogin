<?php
session_start();
?>
<!DOCTYPE HTML>

<html lang="en">

<head>
    <title>BAS Demo </title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B"
        crossorigin="anonymous">
</head>

<body>

<?php
if(!isset($_SESSION['uid'])){
	$username = "Please relogin";
} else{
	$username = $_SESSION['uid'];
}

/******************
 * Session Expiry *
 ******************/

if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 300)) {
    // last request was more than 5 minutes ago
    session_unset();     // unset $_SESSION variable for the run-time 
    session_destroy();   // destroy session data in storage
    header("Location: login.php?error=inactivity");
    exit();
}
$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp


?>

    <div class="container my-4">
        <div class="row">
            <div class="col-12">
                <h1 class="display-4">BAS Demo</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <h4 class="card-header">Welcome <?php echo $username; ?>!</h4>
                    <div class="card-body">
                        <h4 class="card-title"><a href="menu.php">Link #1</a></h4>
                    </div>
					<div class="card-body">
                        <h4 class="card-title"><a href="menu.php">Link #2</a></h4>
                    </div>
					<div class="card-body">
                        <h4 class="card-title"><a href="do_logout.php">Logout</a></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em"
        crossorigin="anonymous"></script>
</body>

</html>