<?php
	include 'connect_db.php';

	if ($_POST["name"] && $_POST["submit"] == "Delete Category")
	{
		$name = $_POST["name"];
		$sql = "DELETE FROM categories WHERE name='$name'";
		$result = mysqli_query($connection, $sql);

		if (!mysqli_query($connection, $sql))
			echo "Error deleting category: " . mysqli_error($connection);

		// remove deleted category from all current products
		$sql = "UPDATE products SET category = REPLACE(category,'$name','')";

		if (!mysqli_query($connection, $sql))
			echo "Error updating product categories: " . mysqli_error($connection);
	}
	else
		echo "ERROR\n";

	mysqli_close($connection);
	header("Location: admin.php");
?>