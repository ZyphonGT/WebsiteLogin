<?php
session_start();

/******************
 * Take Username  *
 ******************/

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

require 'header.php';

?>


<main>
    <div class="container my-4">
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
</main>    

<?php
    require 'footer.php';
?>