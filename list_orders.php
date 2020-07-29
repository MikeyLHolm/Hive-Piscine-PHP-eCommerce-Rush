<?php
	include 'connect_db.php';

	$sql = "SELECT * FROM orders";
	$result = mysqli_query($connection, $sql);

	if (mysqli_num_rows($result) > 0)
	{
		echo "<table>";
		echo "<tr>";
		echo "<th>id</th>";
		echo "<th>client</th>";
		echo "<th>products</th>";
		echo "<th>amount</th>";
		echo "<th>delete</th>";
		echo "</tr>";

		while ($row = mysqli_fetch_assoc($result))
		{
			echo "<tr>";
			echo "<td>" . $row["id"] . "</td>";
			echo "<td>" . $row["client"] . "</td>";
			echo "<td>" . $row["products"] . "</td>";
			echo "<td>" . $row["amount"] . "</td>";
			echo "<td><form action=\"delete_order.php\" method=\"POST\">";
			echo "<input type=\"text\" name=\"id\" value=\"" . $row["id"] . "\" style=\"display: none;\" />";
			echo "<input type=\"submit\" name=\"submit\" value=\"Delete Order\" />";
			echo "</form></td>";
			echo "</tr>";
		}
		echo "</table>";
	}
	else
		echo "0 results";

	mysqli_close($connection);
?> 

