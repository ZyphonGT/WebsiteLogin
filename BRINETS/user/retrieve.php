<?php
include_once '../connection.php';
 try {
    $data = Array();
    if (isset($_POST['user_id'])) {
        $user_id = htmlspecialchars($_POST['user_id'], ENT_QUOTES, 'UTF-8');
        $data = $conn->retrieve_user($user_id);
        foreach($data as $key => $row) {
            $data[$key]['name'] = sprintf("%s %s", $row['firstname'], $row['lastname']);
        }
    } else {
        $data = $conn->retrieve_users();
        foreach($data as $key => $row) {
            $data[$key]['name'] = sprintf("%s %s", $row['firstname'], $row['lastname']);
        }
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