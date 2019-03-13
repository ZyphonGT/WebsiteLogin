<?php
 	include_once '../connection.php';

	if (!(isset($_POST['trx_id']) )) {
 	   	header('HTTP/1.1 400 Bad Request');
   	 	echo '{';
   		echo '"error": "Bad request!"';
  		echo '}';
    	exit;
	}


	try {

		$data = array();

		if(isset($_POST['trx_id'])) {
			
			$trx_id = htmlspecialchars($_POST['trx_id'], ENT_QUOTES, 'UTF-8');
	    	$data = $conn->retrieve_pendingTransaction($trx_id);
		}
 
		
		echo json_encode($data);

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