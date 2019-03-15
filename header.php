<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>Website Login </title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B"
        crossorigin="anonymous">
    <link rel="stylesheet" href="style/header.css">
</head>
<header>
    <h1 class="display-4" style="font-size: 40px;"><a href="menu.php">Website Login</a></h1>
    <nav>
        <ul>
            <li class="lead"><a href="#">Link 1</a></li>
            <li class="lead"><a href="#">Link 2</a></li>
            <li class="lead"><a href="#">Link 3</a></li>
            <li class="lead"><a href="#">Link 4</a></li>
        </ul>

        <?php
            if(!isset($_SESSION['uid'])) {
                echo    '<a href="login.php"><button type="button" class="btn btn-warning">Login</button></a><span id="or">or</span><span class="Register"><a href="register.php">Register</a></span>';
            } else {
                $uid=$_SESSION['uid'];
                $uid=strtoupper($uid);
                echo    '<span id="or">Welcome back, '.$_SESSION['uid'].'!</span>';
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
