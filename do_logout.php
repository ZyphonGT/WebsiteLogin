<?php
session_start();
session_unset();
session_destroy();

if (!empty($_SERVER['HTTP_REFERER'])) {
    header("Location: ".$_SERVER['HTTP_REFERER']);
} else {
    header("Location: menu.php");
}

exit();
