<?php
session_start();

include ("connect_db.php");
require ("basket.php");
require ("products.php");
require ("layout.php");
require ("login_page.php");
require ('checkout.php');

// ** GET STUFF FROM DB **

$categories = mysqli_query($connection, "SELECT * FROM categories");
$prods = mysqli_query($connection, "SELECT * FROM products");

// ** Cart **

// initialize cart
if(!isset($_SESSION['shopping_cart'])) {
    $_SESSION['shopping_cart'] = array();
}
// empty cart
if($_GET['empty_cart']) {
    $_SESSION['shopping_cart'] = array();
}

// ** PROCESS FORM DATA **

$message = '';

// add product to cart
if(isset($_POST['add_to_cart'])) {
	$product_id = $_POST['product_id'];

    // Check for valid item
    if(!isset($products[$product_id])) {
        $message = "Invalid item!<br />";
    }
    // if item is already in cart
    if(isset($_SESSION['shopping_cart'][$product_id])) {
        $message = "item is already in the cart!<br />";
    }
    // otherwise add to cart
    else {
        $_SESSION['shopping_cart'][$product_id]['product_id'] = $_POST['product_id'];
        $_SESSION['shopping_cart'][$product_id]['quantity'] = $_POST['quantity'];
        $message = "Added to cart!";
    }
}
// update cart
if (isset($_POST['update_cart'])) {
    $quantities = $_POST['quantity'];
    foreach($quantities as $id => $quantity) {
        $_SESSION['shopping_cart'][$id]['quantity'] = $quantity;
    }
    if(!$message) {
        $message = "Cart updated!<br />";
    }
}

// ** DISPLAY PAGE **
echo $header;

echo $message;

// view a product
if(isset($_GET['view_product'])) {
	$product_id = $_GET['view_product'];
	view_product($prods, $product_id);
}
// view cart
else if(isset($_GET['view_cart'])) {
	view_cart($prods);
}
// Checkout
else if(isset($_GET['checkout'])) {
	checkout($prods);
}
// view login page
else if(isset($_GET['login_page'])) {
	login_page();
}
// clothes
else if(isset($_GET['view_clothes'])) {
	view_categ($prods, $categories, "clothes");
}
// pants
else if(isset($_GET['view_pants'])) {
	view_categ($prods, $categories, "pants");
}
// hats
else if(isset($_GET['view_hats'])) {
	view_categ($prods, $categories, "hats");
}
// other
else if(isset($_GET['view_other'])) {
	view_categ($prods, $categories, "other");
}
//view category: shirts
else if(isset($_GET['view_shirts'])) {
	view_categ($prods, $categories, "shirts");
}
// view category: shoes
else if(isset($_GET['view_shoes'])) {
	view_categ($prods, $categories, "shoes");
}
// view all products
else {
    // display site links
    echo "<p><a href='./index.php'>ft_minishop</a></p>";

	echo "<h3>Our products</h3>";

	echo "
	<tr>
		<td style='padding-right: 5px;' ><a href='./index.php'>Show all</a></td>";
		while ($row = mysqli_fetch_assoc($categories)) {
			echo "<td><a href='./index.php?view_" . $row['name'] ."=1'>&nbsp; | &nbsp; " . $row['name'] . "</a></td>";
		}
	echo "</tr><br /><br />


    <table style='width:500px;' cellspacing='0'>
    <tr>
        <th style='border-bottom: 1px solid #000000;'>Name</th>
        <th style='border-bottom: 1px solid #000000;'>Price</th>
        <th style='border-bottom: 1px solid #000000;'>Category</th>
    </tr>";

    foreach ($prods as $id => $product) {
        echo "<tr>
            <td style='border-bottom: 1px solid #000000;'><a href='./index.php?view_product=" . ($id + 1) ."'>" . $product['name'] . "</a></td>
            <td style='border-bottom: 1px solid #000000;'>$" . $product['price'] . "</td>
            <td style='border-bottom: 1px solid #000000;'>" . $product['category'] . "</td>
        </tr>";

    }
    echo "</table>";
}

echo $footer;
