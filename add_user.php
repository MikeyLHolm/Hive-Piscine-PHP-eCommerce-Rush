<?php
	include 'connect_db.php';

	if ($_POST["name"] && $_POST["password"] && $_POST["submit"] == "Add User")
	{
		$name = $_POST["name"];
		$password = hash("whirlpool", $_POST["password"]);
		$admin = $_POST["admin"] == 'true' ? 1 : 0;
		$check = mysqli_query($connection,"SELECT name FROM users WHERE name = '$name'");

		if (mysqli_num_rows($check) == 0)
		{
			$sql = "INSERT INTO users (name,password,admin) VALUES
					('$name','$password','$admin')";
			if (!mysqli_query($connection, $sql))
				echo "Error adding users: " . mysqli_error($connection);
		}
		else
			echo "ERROR: user exists\n";
	}
	else
		echo "ERROR: missing data\n";

	mysqli_close($connection);
	header("Location: admin.php");
?>