<?php
session_start();

if(isset($_GET['reset_session'])) {
    session_destroy();
    unset($_SESSION);
    header("Location: http://localhost:8080/rush00/session.php");
    exit();
}

if(!isset($_SESSION['count'])) {
    $_SESSION['count'] = 0;
}

$_SESSION['count'] += 1;

echo "Count: " . $_SESSION['count'] . "<br />
        <a href='./session.php'>Refresh</a><br />
        <a href='./session.php?reset_session=1'>Reset</a><br />";