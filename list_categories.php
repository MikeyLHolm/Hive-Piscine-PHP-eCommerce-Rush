<?php
	include 'connect_db.php';

	$sql = "SELECT * FROM categories";
	$result = mysqli_query($connection, $sql);

	if (mysqli_num_rows($result) > 0)
	{
		echo "<table>";
		echo "<tr>";
		echo "<th>id</th>";
		echo "<th>name</th>";
		echo "<th>date</th>";
		echo "<th>delete</th>";
		echo "</tr>";

		while ($row = mysqli_fetch_assoc($result))
		{
			echo "<tr>";
			echo "<td>" . $row["id"] . "</td>";
			echo "<td>" . $row["name"] . "</td>";
			echo "<td>" . $row["date"] . "</td>";
			echo "<td><form action=\"delete_category.php\" method=\"POST\">";
			echo "<input type=\"text\" name=\"name\" value=\"" . $row["name"] . "\" style=\"display: none;\" />";
			echo "<input type=\"submit\" name=\"submit\" value=\"Delete Category\" />";
			echo "</form></td>";
			echo "</tr>";
		}
		echo "</table>";
	}
	else
		echo "0 results";

	mysqli_close($connection);
?> 

