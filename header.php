<?php
        session_start();

        $link = mysqli_connect("localhost","root","","brinets");
            if(!$link) {
                die("Connection Failed: ".mysqli_connect_error());
            }
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
?>


<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>WL Forum</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B"
        crossorigin="anonymous">
    <link rel="stylesheet" href="style/header.css">
</head>
<header>
    <h1 class="display-4" style="font-size: 40px;"><a href="menu.php">WL Forum</a></h1>
    <nav>
        <ul>
            <li class="lead"><a href="menu.php">Home</a></li>
            <li class="lead"><a href="chat.php">Chat Room</a></li>
            <?php
                if(isset($_SESSION['uid'])){
                    echo '<li class="lead"><a href="do_logout.php">Log Out</a></li>';
                }
            ?>
        </ul>

        <?php
            if(!isset($_SESSION['uid'])) {
                echo    '<a href="login.php"><button type="button" class="btn btn-warning">Login</button></a><span id="or">or</span><span class="Register"><a href="register.php">Register</a></span>';
            } else {
                $uid=$_SESSION['uid'];
                $uid=strtoupper($uid);
                echo    '<span id="or">Welcome back, '.$uid.'!</span>';
            }
        ?>


        <!--
        <a href="login.php"><button type="button" class="btn btn-warning">Login</button></a>
        <span id="or">or</span>
        <span class="Register"><a href="register.php">Register</a></span>
        -->

        <!--
        <span id="or">Welcome back, USERNAME!</span>
        -->

        
     </nav>
</header>
<body>
