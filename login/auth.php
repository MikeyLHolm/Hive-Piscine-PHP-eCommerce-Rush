<?php

// return TRUE if the "login/passwd" combina- tion does match an account in /private/passwd and FALSE if it doesn’t.

function auth($login, $passwd) {

	include ("../connect_db.php");

	$connection = mysqli_connect($servername, $username, $password, $dbname);
	if (!$connection)
		die("Connection failed: " . mysqli_connect_error());
	$user = mysqli_real_escape_string($connection, $login);
	$password = hash("whirlpool", mysqli_real_escape_string($connection, $passwd));

	$resLogQuery = mysqli_query($connection, "SELECT * FROM `users` WHERE name = '$user'");
	$row = mysqli_fetch_array($resLogQuery);
	if ($row) {
		if ($row['password'] == $password) {
			$_SESSION['loggued_on_user'] = $user;
			return true;
		} else {
			echo "WRONG PASSWD";
			return false;
		}
	} else {
		echo "WRONG login";
		return false;
	}
}
