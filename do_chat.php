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

	if(isset($_POST['chat-submit'])) {
		$link = mysqli_connect("localhost","root","","brinets");
		if(!$link) {
			die("Connection Failed: ".mysqli_connect_error());
		}
		
		// mysqli_select_db($link, "brinets");

		$postTitle = $_POST['InputPostTitle'];
		$postContent = $_POST['InputPostContent'];


		/******************
		 * Error Handling *
		 ******************/

		//Empty Fields
		if(empty($postTitle) || empty($postContent)) {
			header("Location: chat.php?error=emptyfields&title=".$postTitle."&content=".$postContent);
			exit();

		//Invalid Title
		} else if(strlen($postTitle) < 5 || strlen($postTitle) > 100) {
			header("Location: chat.php?error=invalidTitle&title=".$postTitle."&content=".$postContent);
			exit();
			
		//Invalid Content
		} else if(strlen($postContent) < 10 || strlen($postContent) > 5000) {	
			header("Location: chat.php?error=invalidContent&title=".$postTitle."&content=".$postContent);
			exit();

		// Insert into DB
		} else {
			
            $sql = "INSERT INTO post_table (uid, post_title, post_content) VALUES (?, ?, ?)";
            $stmt= mysqli_stmt_init($link);
            if(!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: chat.php?error=sqlerror");
                exit();
            }
            else {
                /************************
                 * INSERT into Database *
                 ************************/
                mysqli_stmt_bind_param($stmt, "sss", $username, $postTitle, $postContent);
				mysqli_stmt_execute($stmt);
				
				//Updating User's num_of_posts
				$sql ="UPDATE user SET num_of_posts = num_of_posts+1 WHERE username=?";
				$stmt= mysqli_stmt_init($link);
				if(!mysqli_stmt_prepare($stmt, $sql)) {
					header("Location: chat.php?error=sqlerrorUpdatingNumPost");
                exit();
				} else {
					mysqli_stmt_bind_param($stmt, "s", $username);
					mysqli_stmt_execute($stmt);
				}
				
				
                header("Location: chat.php?chat=success");
                exit();
            }
				

		}


		
		/*
		$result = mysqli_query($link, "insert into user (email, username, password) values ('$email', '$username', '$password')")
					or die("Failed to query database ".mysqli_error($link));
		header("Location: login.php");
		*/
	} else {
		//If user tried accessing this PHP without form submission
		header("Location: chat.php");
		exit();
	}