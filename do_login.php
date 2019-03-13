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