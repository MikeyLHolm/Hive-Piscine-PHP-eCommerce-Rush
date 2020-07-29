<?php
	$servername = "localhost";
	$username = "root";
	$password = "123";
	$dbname = "onlineshop";

	$connection = mysqli_connect($servername, $username, $password, $dbname);
	if (!$connection)
		die("Connection failed: " . mysqli_connect_error());
?>