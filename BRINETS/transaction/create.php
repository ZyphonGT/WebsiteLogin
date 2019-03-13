<?php
	
	include_once '../connection.php';

	if (!(isset($_POST['trxID']) )) {
 	   	header('HTTP/1.1 400 Bad Request');
   	 	echo '{';
   		echo '"error": "Bad request!"';
  		echo '}';
    	exit;
	}

	$trx_id = htmlspecialchars($_POST['trxID'], ENT_QUOTES, 'UTF-8');
	$custID = htmlspecialchars($_POST['custID'], ENT_QUOTES, 'UTF-8');
	$tellerID = htmlspecialchars($_POST['tellerID'], ENT_QUOTES, 'UTF-8');
	$trxAmount = htmlspecialchars($_POST['trxAmount'], ENT_QUOTES, 'UTF-8');

	$args = array(
		'custID' => $custID , 
		'tellerID' => $tellerID ,
		'trxAmount' => $trxAmount
		);

	try {
  
	    $executed = $conn->create_transaction($trx_id, $args);
	  
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