<?php
	// session_start();

	if(isset($_POST['register-submit'])) {
		$link = mysqli_connect("localhost","root","","brinets");
		if(!$link) {
			die("Connection Failed: ".mysqli_connect_error());
		}
		
		// mysqli_select_db($link, "brinets");

		$email = $_POST['email'];
		$username = $_POST['username'];
		$password = $_POST['pwd'];
		$repassword = $_POST['confirmpwd'];

		$secretKey	= "6LfoIZYUAAAAANnkiYlM5Lc_yU7NLdUTd9rZFyD9";
		$responseKey= $_POST['g-recaptcha-response'];
		$userIP		= $_SERVER['REMOTE_ADDR'];
		$googleUrl	= "https://www.google.com/recaptcha/api/siteverify";

		// Google ReCaptcha V2
		$response = file_get_contents($googleUrl.'?secret='.$secretKey.'&response='.$responseKey.'&remoteip='.$userIP);
		$response = json_decode($response);

		/******************
		 * Error Handling *
		 ******************/

		 //Recaptcha failed
		if($response->success != 1) {
			header("Location: register.php?error=recaptcha&uid=".$username."&email=".$email);
			exit();

		//Empty Fields
		} else if(empty($email) || empty($username) || empty($password) || empty($repassword)) {
			header("Location: register.php?error=emptyfields&uid=".$username."&email=".$email);
			exit();

		//Invalid Email and Username
		} else if(!filter_var($email, FILTER_VALIDATE_EMAIL) && (!preg_match("/^[a-zA-Z0-9]*$/", $username) || strlen($username) < 3 || strlen($username) > 10)) {
			header("Location: register.php?error=invalidemailusername&uid=".$username."&email=".$email);
			exit();

		//Invalid Email
		} else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			header("Location: register.php?error=invalidmail&uid=".$username."&email=".$email);
			exit();
			
		//Invalid Username
		} else if(preg_match("/^[a-zA-Z0-9]*$/", $username) == false || strlen($username) < 3 || strlen($username) > 10 ) {	
			header("Location: register.php?error=invalidusername&uid=".$username."&email=".$email);
			exit();

		//Password too short
		} else if(isPwdNotSafe($password)) {
			header("Location: register.php?error=invalidpassword&uid=".$username."&email=".$email);
			exit();

		// Re-entered Password doesnt match
		} else if($password !== $repassword) {
			
			header("Location: register.php?error=passwordcheck&uid=".$username."&email=".$email);
			exit();

		// is Username taken?
		} else {
			$sql = "SELECT username FROM user WHERE username=?";
			$stmt= mysqli_stmt_init($link);
			if(!mysqli_stmt_prepare($stmt, $sql)) {
				header("Location: register.php?error=sqlerror1");
				exit();
			} else {
				mysqli_stmt_bind_param($stmt, "s", $username);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_store_result($stmt);
				$resultCheck = mysqli_stmt_num_rows($stmt);

				if($resultCheck > 0) {
					header("Location: register.php?error=usernameTaken&uid=".$username."&email=".$email);
					exit();
				} else {
					$sql = "INSERT INTO user (email, username, password) VALUES (?, ?, ?)";
					$stmt= mysqli_stmt_init($link);
					if(!mysqli_stmt_prepare($stmt, $sql)) {
						header("Location: register.php?error=sqlerror2");
						exit();
					}
					else {
						// Hash password with BCRYPT
						$hashedPwd = password_hash($password, PASSWORD_DEFAULT);

						// Hash password with SHA512
						// $hashedPwd = hash("sha512", $password);
						

						/************************
						 * INSERT into Database *
						 ************************/
						mysqli_stmt_bind_param($stmt, "sss", $email, $username, $hashedPwd);
						mysqli_stmt_execute($stmt);
						header("Location: register.php?register=success");
						exit();
					}
				}

			}


		}
		/*
		$result = mysqli_query($link, "insert into user (email, username, password) values ('$email', '$username', '$password')")
					or die("Failed to query database ".mysqli_error($link));
		header("Location: login.php");
		*/
	} else {
		//If user tried accessing this PHP without form submission
		header("Location: register.php");
		exit();
	}
	
	function isPwdNotSafe($pwd) {
		// preg_match('/\s/',$pwd) || 
		if( strpos($pwd, " ") !== false || strlen($pwd) < 5 ) {
			return true;
		} else {
			return false;
		}
	}

?>