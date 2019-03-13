<?php
	
	include_once '../connection.php';

	if (!(isset($_POST['user_id']) )) {
 	   	header('HTTP/1.1 400 Bad Request');
   	 	echo '{';
   		echo '"error": "Bad request!"';
  		echo '}';
    	exit;
	}

	$user_id = htmlspecialchars($_POST['user_id'], ENT_QUOTES, 'UTF-8');
	$firstname = htmlspecialchars($_POST['firstname'], ENT_QUOTES, 'UTF-8');
	$lastname = htmlspecialchars($_POST['lastname'], ENT_QUOTES, 'UTF-8');
	$role = htmlspecialchars($_POST['role'], ENT_QUOTES, 'UTF-8');
	$email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');

	$password = htmlspecialchars($_POST['password'], ENT_QUOTES, 'UTF-8');
	$password_hash = password_hash($password, PASSWORD_DEFAULT);



	$args = array(
		'user_id' => $user_id , 
		'firstname' => $firstname ,
		'lastname' => $lastname ,
		'role' => $role ,
		'email' => $email
		);

	try {
  
	    $executed = $conn->update_user($user_id, $args);
	  
	    if ($executed):
	        echo '{';
	        echo '"result": 0';
	        echo '}';
	    else:
	        header('HTTP/1.1 400 Bad Request');
	        echo '{';
	        echo '"error": "Bad form request"';
	        echo '}';
	    endif;


	} catch (Exception $e) {
    	header('HTTP/1.1 500 Internal Server Error');
    	echo '{';
    	echo '"error": "' . $e->getMessage() . '"';
    	echo '}';
	} catch (TypeError $e) {
	    header('HTTP/1.1 400 Bad Request');
	    echo '{';
	    echo '"error": "Bad request!"';
	    echo '}';
	} catch (Error $e) {
	    header('HTTP/1.1 500 Internal Server Error');
	    echo '{';
	    echo '"error": "Fatal error!"';
	    echo '}';
	}




?>