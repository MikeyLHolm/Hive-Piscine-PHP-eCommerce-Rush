<?php
	$servername = "localhost";
	$username = "root";
	$password = "123";
	$dbname = "onlineshop";

	// Create connection
	$connection = mysqli_connect($servername, $username, $password);
	if (!$connection)
		die("Connection failed: " . mysqli_connect_error());

	// Create database
	$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
	if (!mysqli_query($connection, $sql))
		echo "Error creating database: " . mysqli_error($connection);

	mysqli_close($connection);

	// Connect to database
	$connection = mysqli_connect($servername, $username, $password, $dbname);
	if (!$connection)
		die("Connection failed: " . mysqli_connect_error());

	// Create table for users
	$sql = "CREATE TABLE IF NOT EXISTS users (
		id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		name VARCHAR(30) NOT NULL,
		password VARCHAR(300) NOT NULL,
		admin INT(1) NOT NULL,
		date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
		)";
	if (!mysqli_query($connection, $sql))
		echo "Error creating table: " . mysqli_error($connection);
	// Add users to table
	$sql = 	"INSERT INTO users (name,password,admin) VALUES
			('admin','gsdgsg34jrsjjdgjndgjngdjndgjdgdgndgj', 1),
			('matti','3524tgwgsrjdjerjdjjrdydryfhryfjjtjdt', 0),
			('liisa','hfb34twrgsgdshsfhgsdgnsdghedghsdfhsf', 0)";
	if (!mysqli_query($connection, $sql))
		echo "Error adding users: " . mysqli_error($connection);

	// Create table for products
	$sql = "CREATE TABLE IF NOT EXISTS products (
		id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		name VARCHAR(30) NOT NULL,
		price INT(6) UNSIGNED NOT NULL,
		category VARCHAR(30) NOT NULL,
		description VARCHAR(120) NOT NULL,
		img VARCHAR(30) NOT NULL,
		date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
		)";
	if (!mysqli_query($connection, $sql))
		echo "Error creating table: " . mysqli_error($connection);
	// Add products to table
	$sql = 	"INSERT INTO products (name,price,category,description,img) VALUES
			('Black T-Shirt','19','clothes shirts','this is a description','black_shirt.jpg'),
			('Jeans','79','clothes pants','this is a description','jeans.jpg'),
			('Cool Hat','49','clothes hats','this is a description','hat.jpg'),
			('Leather Shoes','85','clothes shoes','this is a description','shoes.jpg'),
			('Water Bottle','3','other','this is a description','water_bottle.jpg')";
	if (!mysqli_query($connection, $sql))
		echo "Error adding products: " . mysqli_error($connection);

	// Create table for categories
	$sql = "CREATE TABLE IF NOT EXISTS categories (
		id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		name VARCHAR(30) NOT NULL,
		date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
		)";
	if (!mysqli_query($connection, $sql))
		echo "Error creating table: " . mysqli_error($connection);
	// Add categories to table
	$sql = 	"INSERT INTO categories (name) VALUES
			('clothes'),
			('shirts'),
			('pants'),
			('hats'),
			('shoes'),
			('other')";
	if (!mysqli_query($connection, $sql))
		echo "Error adding categories: " . mysqli_error($connection);

	// Create table for orders
	$sql = "CREATE TABLE IF NOT EXISTS orders (
		id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		client VARCHAR(30) NOT NULL,
		products VARCHAR(300) NOT NULL,
		amount int(6) NOT NULL,
		date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
		)";
	if (!mysqli_query($connection, $sql))
		echo "Error creating table: " . mysqli_error($connection);
	// Add orders to table
	$sql = 	"INSERT INTO orders (client,products,amount) VALUES
			('matti', 'Cool Hat, Leather Shoes','134'),
			('liisa', 'Jeans, Black T-Shirt, Water Bottle','54')";
	if (!mysqli_query($connection, $sql))
		echo "Error adding orders: " . mysqli_error($connection);

	mysqli_close($connection);
?>