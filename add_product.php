<?php
	include 'connect_db.php';

	if ($_POST["name"] && $_POST["category"] && $_POST["price"] && $_POST["description"] &&
	$_POST["img"] && $_POST["submit"] == "Add Product")
	{
		$name = $_POST["name"];
		$category = "";
		foreach($_POST['category'] as $check)
		{
            $category = $category . " " . $check; 
    	}
		$price = $_POST["price"];
		$description = $_POST["description"];
		$img = $_POST["img"];
		$check = mysqli_query($connection,"SELECT name FROM products WHERE name = '$name'");

		if (mysqli_num_rows($check) == 0)
		{
			$sql = 	"INSERT INTO products (name,category,price,description,img) VALUES
					('$name','$category','$price','$description','$img')";
			if (!mysqli_query($connection, $sql))
				echo "Error adding products: " . mysqli_error($connection);
		}
		else
			echo "ERROR: product exists\n";	
	}
	else
		echo "ERROR: missing data\n";	

	mysqli_close($connection);
	header("Location: admin.php");
?>