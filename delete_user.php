<?php
	include 'connect_db.php';

	if ($_POST["name"] && $_POST["submit"] == "Delete User")
	{
		$name = $_POST["name"];
		$sql="DELETE FROM users WHERE name='$name'";
		$result = mysqli_query($connection, $sql);
		if (!mysqli_query($connection, $sql))
			echo "Error deleting user: " . mysqli_error($connection);
	}
	else
		echo "ERROR\n";

	mysqli_close($connection);
	header("Location: admin.php");
?>