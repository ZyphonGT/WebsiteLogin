<?php
	session_start();

	if(isset($_POST['login-submit'])) {
		$link = mysqli_connect("localhost","root","","brinets");
		if(!$link) {
			die("Connection Failed: ".mysqli_connect_error());
		}
		// mysqli_select_db($link, "brinets");

		$username 	= $_POST['username'];
		$password 	= $_POST['pwd'];
		
		$secretKey	= "6LfoIZYUAAAAANnkiYlM5Lc_yU7NLdUTd9rZFyD9";
		$responseKey= $_POST['g-recaptcha-response'];
		$userIP		= $_SERVER['REMOTE_ADDR'];
		$googleUrl	= "https://www.google.com/recaptcha/api/siteverify";

		// Google ReCaptcha V2
		$response = file_get_contents($googleUrl.'?secret='.$secretKey.'&response='.$responseKey.'&remoteip='.$userIP);
		$response = json_decode($response);

		if($response->success != 1) {
			header("Location: login.php?error=recaptcha&uid=".$username);
			exit();
		}

		if(empty($username) || empty($password)) {
			header("Location: login.php?error=emptyfields&uid=".$username);
			exit();
		} else {
			$sql  = "SELECT * FROM user WHERE username=?";
			$stmt = mysqli_stmt_init($link);
			if(!mysqli_stmt_prepare($stmt, $sql)) {
				header("Location: login.php?error=sqlerror");
				exit();
			} else {
				mysqli_stmt_bind_param($stmt,"s",$username);
				mysqli_stmt_execute($stmt);
				$result = mysqli_stmt_get_result($stmt);
				if($row = mysqli_fetch_assoc($result)) {
					$pwdCheck = password_verify($password, $row['password']);
					if($pwdCheck == true) {
						// session_start();
						$_SESSION['id'] 	= $row['id'];
						$_SESSION['uid'] 	= $row['username'];

						header('Location: menu.php');

					} else {
						header("Location: login.php?error=wrongpwd&uid=".$username);
						exit();
					}
				} else {
					//username NOT found
					header("Location: login.php?error=uidNotFound");
					exit();
				}

			}
		}


		/*
		$result = mysqli_query($link, "select * from user where username = '$username' and password = '$password'")
				or die("Failed to query database ".mysqli_error($link));

		$row = mysqli_fetch_array($result);

		if($row['username'] == $username && $row['password'] == $password ) {
			echo 'Welcome '.$row['username'];
			$_SESSION['username'] = $username;
			header('Location: menu.php');
		} else {
			echo 'Wrong Username or Password';
		}
		*/
	} else {
		header("Location: login.php");
		exit();
	}

	

?>