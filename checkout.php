<?php


include 'connect_db.php';

if(isset($_POST['submit_order'])) {

	$client = $_SESSION['loggued_on_user'];
	$products = $_POST['str'];
	$amount = $_POST['sum'];

	$sql = 	"INSERT INTO orders (client,products,amount) VALUES ('$client','$products','$amount')";
	if (!mysqli_query($connection, $sql))
		echo "Error adding products: " . mysqli_error($connection);

	header('Location: ./index.php?empty_cart=1');
}





function checkout($products) {

	echo "<p><a href='./index.php'>ft_minishop</a>";

	echo "<h3>Checkout</h3>
	<p>
		<a href='./index.php?empty_cart=1'>Empty cart</a>
	</p>";

	if(empty($_SESSION['shopping_cart'])) {
		echo "Your cart is empty.<br />";
	}
	else {
		echo "<form action='./index.php?checkout=1' method='post'>
		<table style='width:500px;' cellspacing='0'>
			<tr>
				<th style='border-bottom: 1px solid #000000;'>Name</th>
				<th style='border-bottom: 1px solid #000000;'>Item Price</th>
				<th style='border-bottom: 1px solid #000000;'>Quantity</th>
				<th style='border-bottom: 1px solid #000000;'>Cost</th>
			</tr>";

		$order_array[] = array() ;
		$order_str = "";
		$total_price = 0;
		while ($row = mysqli_fetch_assoc($products))
			$array[] = $row;
		foreach ($_SESSION['shopping_cart'] as $id => $product) {
			$product_id = $product['product_id'];
			foreach ($array as $line) {
				$i = 0;
				if ($line["id"] === $product_id) {
					$total_price += $line['price'] * $product['quantity'];
					while ($i++ < $product['quantity']) {
						$order_str .= $line['name'] . ", ";
					}
					echo "<tr>
						<td style='border-bottom: 1px solid #000000;'><a href='./index.php?view_product=$id'>" .
							$line['name'] . "</a></td>
						<td style='border-bottom: 1px solid #000000;'>$" . $line['price'] . "</td>
						<td style='border-bottom: 1px solid #000000;'>" . $product['quantity'] . "</td>
						<td style='border-bottom: 1px solid #000000;'>$" . ($line['price'] * $product['quantity']) . "</td>
					</tr>";
				}
			}
		}
		echo "</table>
		<p>Total price: $" . $total_price . "   ";

		$order_str = substr($order_str, 0, -2);
		$order_array[] = $_SESSION['loggued_on_user'];
		$order_array[] = $order_str;
		$order_array[] = $total_price;

		if ($_SESSION['loggued_on_user']) {
			echo "
			<form action='./checkout.php?submit_order=1' method='post'>";
			echo '<input type="hidden" name="str" value="'. $order_str. '">';
			echo '<input type="hidden" name="sum" value="'. $total_price. '">';
			echo "<input type='submit' name='submit_order' value='Submit order' />
			</form>";
		}
		echo "<p/>";


	}
}