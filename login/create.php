<?php

include ("../connect_db.php");

if ($_POST['login'] && $_POST['passwd'] && $_POST['submit'] && $_POST['submit'] === "OK") {

	$connection = mysqli_connect($servername, $username, $password, $dbname);
	if (!$connection)
		die("Connection failed: " . mysqli_connect_error());
	$user = mysqli_real_escape_string($connection, $_POST['login']);
	$password = hash('whirlpool', mysqli_real_escape_string($connection, $_POST['passwd']));

	$logQuery = mysqli_query($connection, "SELECT * FROM `users`");
	$flag = 1;
	while ($row = mysqli_fetch_array($logQuery)) {
		if ($row['login'] == $user) {
			echo "Login is already in use";
			$flag = 0;
		}
	}
	if ($flag === 1) {
		$Query = mysqli_query($connection, "INSERT INTO `users` (name, password, admin) VALUES ('$user', '$password', 0)");
		$_SESSION['loggued_on_user'] = $user;
		header("location: ../index.php");
	}
}
