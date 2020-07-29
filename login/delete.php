<?php

/*
	Delete account
*/

include ("../connect_db.php");

if (!$_POST['login'] || !$_POST['passwd'] || !$_POST['submit'] || $_POST['submit'] !== "OK")
	exit ("ERROR: incorrect input\n");

$connection = mysqli_connect($servername, $username, $password, $dbname);
if (!$connection)
	die("Connection failed: " . mysqli_connect_error());
$user = mysqli_real_escape_string($connection, $_POST['login']);
$password = hash("whirlpool", mysqli_real_escape_string($connection, $_POST['passwd']));

$resLogQuery = mysqli_query($connection, "SELECT * FROM `users` WHERE name = '$user'");
$row = mysqli_fetch_array($resLogQuery);
if ($row) {
	if ($row['password'] === $password) {
		$query = mysqli_query($connection, "DELETE FROM `users` WHERE name = '$user'");
		$_SESSION['loggued_on_user'] = "";
		header("location: ./logout.php");
	} else {
		echo "<h3 style='color: red'>Wrong password</h3>";
	}
} else {
	echo "<h3 style='color: red'>Wrong login</h3>";
}
