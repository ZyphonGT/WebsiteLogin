<?php
	session_start();

	$link = mysqli_connect("localhost","root","","brinets");
	// mysqli_select_db($link, "brinets");

	$email = $_POST['email'];
	$username = $_POST['username'];
	$password = $_POST['pwd'];
	$repassword = $_POST['confirmpwd'];

	/******************
	 * Error Handling *
	 ******************/

	//Empty Fields
	if(empty($email) || empty($username) || empty($password) || empty($repassword)) {
		header("Location: register.php?error=emptyfields&uid=".$username."&email=".$email);
		exit();
	}

	//Invalid Email and Username
	else if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
		header("Location: register.php?error=invalidemailusername");
		exit();
	}

	//Invalid Email
	else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		header("Location: register.php?error=invalidmail&uid=".$username);
		exit();
	}

	//Invalid Username
	else if(!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
		header("Location: register.php?error=invalidusername&email=".$email);
		exit();
	}

	//Re-entered Password doesnt match
	else if($password !== $repassword) {
		header("Location: register.php?error=passwordcheck&uid=".$username."&email=".$email);
		exit();
	} 

	//Username taken
	else {
		$sql = "SELECT username FROM users WHERE username=?";
		$stmt= mysqli_stmt_init($link);
		if(!mysqli_stmt_prepare($stmt, $sql)) {
			header("Location: register.php?error=sqlerror");
			exit();
		} else {
			mysqli_stmt_bind_param($stmt, "s", $username);
			mysqli_stmt_execute($stmt);

			
		}


	}

	/************************
	 * INSERT into Database *
	 ************************/

	$result = mysqli_query($link, "insert into user (email, username, password) values ('$email', '$username', '$password')")
				or die("Failed to query database ".mysqli_error($link));

	
	header("Location: login.php");


?>