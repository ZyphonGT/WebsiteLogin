<?php
 	include_once '../connection.php';

	if (!(isset($_POST['trxID']) && isset($_POST['spvID']) )) {
 	   	header('HTTP/1.1 400 Bad Request');
   	 	echo '{';
   		echo '"error": "Bad request!"';
  		echo '}';
    	exit;
	}

	$trx_id = htmlspecialchars($_POST['trxID'], ENT_QUOTES, 'UTF-8');
	$spvID = htmlspecialchars($_POST['spvID'], ENT_QUOTES, 'UTF-8');

	try {
  
	    $executed = $conn->reject_transaction($trx_id,$spvID);
	  
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