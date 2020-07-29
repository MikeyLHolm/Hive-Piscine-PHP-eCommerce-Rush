<?php
	include 'connect_db.php';

	$sql = "SELECT * FROM products";
	$result = mysqli_query($connection, $sql);

	if (mysqli_num_rows($result) > 0)
	{
		echo "<table>";
		echo "<tr>";
		echo "<th>img</th>";
		echo "<th>id</th>";
		echo "<th>name</th>";
		echo "<th>category</th>";
		echo "<th>price</th>";
		echo "<th>description</th>";
		echo "<th>date</th>";
		echo "<th>delete</th>";
		echo "</tr>";

		while ($row = mysqli_fetch_assoc($result))
		{
			echo "<tr>";
			echo "<td><img src=\"img/" . $row["img"] . "\" style=\"width:100px;height:100px\" </td>";
			echo "<td>" . $row["id"] . "</td>";
			echo "<td>" . $row["name"] . "</td>";
			echo "<td>" . $row["category"] . "</td>";
			echo "<td>" . $row["price"] . "</td>";
			echo "<td>" . $row["description"] . "</td>";
			echo "<td>" . $row["date"] . "</td>";
			echo "<td><form action=\"delete_product.php\" method=\"POST\">";
			echo "<input type=\"text\" name=\"name\" value=\"" . $row["name"] . "\" style=\"display: none;\" />";
			echo "<input type=\"submit\" name=\"submit\" value=\"Delete Product\" />";
			echo "</form></td>";
			echo "</tr>";
		}
		echo "</table>";
	}
	else
		echo "0 results";

	mysqli_close($connection);
?> 