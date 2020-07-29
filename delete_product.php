<?php
	include 'connect_db.php';

	if ($_POST["name"] && $_POST["submit"] == "Delete Product")
	{
		$name = $_POST["name"];
		$sql="DELETE FROM products WHERE name='$name'";
		$result = mysqli_query($connection, $sql);
		if (!mysqli_query($connection, $sql))
			echo "Error deleting product: " . mysqli_error($connection);
	}
	else
		echo "ERROR\n";

	mysqli_close($connection);
	header("Location: admin.php");
?>