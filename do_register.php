<?php
	session_start();
	$email = $_POST['email'];
	$username = $_POST['username'];
	$password = $_POST['pwd'];

	$link = mysqli_connect("localhost","root","");
	mysqli_select_db($link, "brinets");


	$result = mysqli_query($link, "insert into user (email, username, password) values ('$email', '$username', '$password')")
				or die("Failed to query database ".mysqli_error($link));

	
	header("Location: login.php");


?>