<?php

session_start();
require_once 'auth.php';

$_SESSION['loggued_on_user'] = "";
if (!$_POST || !isset($_POST['login']) || empty($_POST['login']) || !isset($_POST['passwd']) || empty($_POST['passwd']))
    exit("ERROR\n");
if (!auth($_POST['login'], $_POST['passwd']))
    exit("ERROR\n");
$_SESSION['loggued_on_user'] = $_POST['login'];
header('Location: ../index.php');
