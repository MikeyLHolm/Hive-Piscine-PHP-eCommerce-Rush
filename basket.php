<?php

/*
    Shopping cart biz here
*/

function view_cart($products) {

	session_start();
	echo "<p><a href='./index.php'>ft_minishop</a>";

    echo "<h3>Your Cart</h3>
    <p>
        <a href='./index.php?empty_cart=1'>Empty cart</a>
    </p>";

    if(empty($_SESSION['shopping_cart'])) {
        echo "Your cart is empty.<br />";
    }
    else {
        echo "<form action='./index.php?view_cart=1' method='post'>
        <table style='width:500px;' cellspacing='0'>
			<tr>
				<th style='border-bottom: 1px solid #000000;'>Name</th>
				<th style='border-bottom: 1px solid #000000;'>Price</th>
				<th style='border-bottom: 1px solid #000000;'>Category</th>
				<th style='border-bottom: 1px solid #000000;'>Quantity</th>
			</tr>";

				while ($row = mysqli_fetch_assoc($products))
					$array[] = $row;
                foreach ($_SESSION['shopping_cart'] as $id => $product) {
                    $product_id = $product['product_id'];
					foreach ($array as $line) {
						if ($line["id"] === $product_id) {
							echo "<tr>
								<td style='border-bottom: 1px solid #000000;'><a href='./index.php?view_product=$id'>" .
									$line["name"] . "</a></td>
								<td style='border-bottom: 1px solid #000000;'>$" . $line["price"] . "</td>
								<td style='border-bottom: 1px solid #000000;'>" . $line["category"] . "</td>
								<td style='border-bottom: 1px solid #000000;'>
									<input type='text' name='quantity[$product_id]' value='" . $product["quantity"] . "' /></td>
							</tr>";
						}
					}
                }
        echo "</table>
        <input type='submit' name='update_cart' value='Update' />
        </form>
        <p><a href='./index.php?checkout=1'>Checkout</a></p>
        ";
    }
}
