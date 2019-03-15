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
    <h1>New Page</h1>
</main>

<?php
    require 'footer.php';
?>