<?php

/*
    Stores product information
*/

function view_product($products, $product_id) {

	while ($row = mysqli_fetch_assoc($products)) {
		if ($row["id"] === $product_id) {
			echo "<p>
            <a href='./index.php'>ft_minishop</a> &gt; <a href='./index.php?view_" . $row["category"] . "=1'>" .
            $row["category"] . "</a></p>";

			// display product
			echo "<img src='img/" . $row['img'] . "' width='50%'/>";
			echo "<p>
				<span style='font-weight:bold;'>" . $row["name"] . "</span><br />
				<span> $" . $row['price'] . "</span><br />
				<span>" . $row['description'] . "</span><br />
				<p>
					<form action='./index.php?view_product=$product_id' method='post'>
						<select name='quantity'>
							<option value='1'>1</option>
							<option value='2'>2</option>
							<option value='3'>3</option>
						</select>
						<input type='hidden' name='product_id' value='$product_id'/>
						<input type='submit' name='add_to_cart' value='Add to cart' />
					</form>
				</p>
			</p>";
		}
	}
}

function view_categ ($prods, $categories, $cat) {

	echo "<p><a href='./index.php'>ft_minishop</a></p>";

	echo "<h3>Our products</h3>";

	// category variables

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
		if (strstr($product['category'], $cat)) {
			echo "<tr>
				<td style='border-bottom: 1px solid #000000;'><a href='./index.php?view_product=" . $product['id'] . "'>" . $product['name'] . "</a></td>
				<td style='border-bottom: 1px solid #000000;'>$" . $product['price'] . "</td>
				<td style='border-bottom: 1px solid #000000;'>" . $product['category'] . "</td>
			</tr>";
		}
    }
    echo "</table>";
}