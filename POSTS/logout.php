<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('location: login.php');
    exit();
}
;
session_unset();

session_destroy();

header("location: login.php");

?>