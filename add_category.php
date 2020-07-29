<?php
	include 'connect_db.php';

	if ($_POST["name"] && $_POST["submit"] == "Add Category")
	{
		$name = $_POST["name"];
		$check = mysqli_query($connection,"SELECT name FROM categories WHERE name = '$name'");

		if (mysqli_num_rows($check) == 0)
		{
			$sql = "INSERT INTO categories (name) VALUES
					('$name')";
			if (!mysqli_query($connection, $sql))
				echo "Error adding category: " . mysqli_error($connection);
		}
		else
			echo "ERROR: category exists\n";	
	}
	else
		echo "ERROR: missing data\n";

	mysqli_close($connection);
	header("Location: admin.php");
?>