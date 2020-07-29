<?php
	include 'connect_db.php';

	if ($_POST["id"] && $_POST["submit"] == "Delete Order")
	{
		$id = $_POST["id"];
		$sql="DELETE FROM orders WHERE id='$id'";
		$result = mysqli_query($connection, $sql);

		if (!mysqli_query($connection, $sql))
			echo "Error deleting order: " . mysqli_error($connection);
	}
	else
		echo "ERROR\n";

	mysqli_close($connection);
	header("Location: admin.php");
?>