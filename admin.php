<?php
	session_start();
	// https://stackoverflow.com/questions/60174/how-can-i-prevent-sql-injection-in-php
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Verkkokauppa</title>
		<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="main.css">
	</head>
	<body>
		<h1>Admin</h1>
		<hr>

		<h3>List Users</h3>
		<?php include 'list_users.php'; ?>

		<h4>Add New User</h4>
		<form action="add_user.php" method="POST">
			Name: <input type="text" name="name" value="" /> &nbsp;
			Password: <input type="text" name="password" value="" /> &nbsp;
			<input type="checkbox" name="admin" value="true">
			<label for="true">Admin</label> &nbsp;
			<input type="submit" name="submit" value="Add User" />
		</form>
		<hr>

		<h3>List Products</h3>
		<?php include 'list_products.php'; ?>

		<h4>Add New Product</h4>
		<form action="add_product.php" method="POST">
			Name: <input type="text" name="name" value="" /> &nbsp;
			Price: <input type="number" name="price" min="1" max="9999" value="" />
			<br /><br />
			Categories:
			<br />
			<?php
				include 'connect_db.php';

				$sql = "SELECT name FROM categories";
				$result = mysqli_query($connection, $sql);
			
				while ($row = mysqli_fetch_assoc($result))
				{
					echo "<input type=\"checkbox\" name=\"category[]\" value=" . $row["name"] . ">";
					echo "<label>" . $row["name"] . "</label><br>";
				}
			?>
			<br />
			Description:
			<br />
			<textarea name="description" rows="4" cols="50" value="">Insert description</textarea>
			<br /><br />
			Image name: <input type="text" name="img" value="" />
			<?php
				echo "<p><small>";
				foreach (glob('img/*.*') as $file)
					echo $file . "<br />";
				echo "</small></p>";
			?>
			<input type="submit" name="submit" value="Add Product" />
		</form>
		<br />

		<form action="upload_image.php" method="post" enctype="multipart/form-data">
			Upload Image to Server:
			<input type="file" name="fileToUpload" id="fileToUpload">
			<input type="submit" value="Upload Image" name="submit">
		</form>
		<hr>

		<h3>List Categories</h3>
		<?php include 'list_categories.php'; ?>

		<h4>Add New Category</h4>
		<form action="add_category.php" method="POST">
			Name: <input type="text" name="name" value="" /> &nbsp;
			<input type="submit" name="submit" value="Add Category" />
		</form>
		<hr>

		<h3>List Orders</h3>
		<?php include 'list_orders.php'; ?>
		<hr>
		
		<p class="copyright">© mlindhol & taho 2020</p>
	</body>
</html>