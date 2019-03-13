<?php
	session_start();
	$username = $_POST['username'];
	$password = $_POST['pwd'];

	$link = mysqli_connect("localhost","root","");
	mysqli_select_db($link, "brinets");


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



?>