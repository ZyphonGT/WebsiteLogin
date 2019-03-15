<?php
session_start();

$link = mysqli_connect("localhost","root","","brinets");
    if(!$link) {
        die("Connection Failed: ".mysqli_connect_error());
    }
/******************
 * Take Username  *
 ******************/

if(!isset($_SESSION['uid'])){
	$username = "Please relogin";
} else{
	$username = $_SESSION['uid'];
}

/******************
 * Session Expiry *
 ******************/

if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 300)) {
    // last request was more than 5 minutes ago
    session_unset();     // unset $_SESSION variable for the run-time 
    session_destroy();   // destroy session data in storage
    header("Location: login.php?error=inactivity");
    exit();
}
$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp

require 'header.php';

?>

<main>
    <h1>New Page</h1>
    <?php
        $sql  = "SELECT username, email FROM user";
        $stmt = mysqli_stmt_init($link);
        if(!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: chat.php?error=sqlerror1");
            exit();
        } else {
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            $datas = array();


            //If username is found
            if(mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
                    array_push($datas, $row);
                }

                print_r($datas);

                foreach($datas as $line) {
                    // print_r($uid." ");
                    foreach($line as $x)
                    {
                        print_r($x."<br>");
                    }    
                }
                print_r(count($datas)."<br>");
            } 
            else {
                //username NOT found
                header("Location: login.php?error=uidNotFound&uid=".$username);
                exit();
            }

        }
    ?>
</main>

<?php
    require 'footer.php';
?>