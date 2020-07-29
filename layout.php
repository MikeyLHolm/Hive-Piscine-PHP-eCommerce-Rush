<?php

/*
	Contains HTML blocks of layout
 */
include ("./connect_db.php");

session_start();

$users = mysqli_query($connection, "SELECT * FROM users");

ob_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FT_Minishop</title>
    <link rel="stylesheet" type="text/css" href='style.css' />
</head>
<body>
	<div id="container">
		<div id="header">
			<h2 style='text-align:center;'>welcome to ft_minishop</h2>
			<nav style='text-align:center;'>
				<a href='./index.php'>Home</a>
				<a href='./index.php?view_cart=1'>View Cart</a>
				<a href='./index.php?login_page=1'>Login / Register</a>
				<?php
					if ($_SESSION['loggued_on_user']) {
						echo "<a href='./index.php?login_page=1'>Logged in (" . $_SESSION['loggued_on_user'] . ")</a>";
					}

					while ($row = mysqli_fetch_assoc($users)) {
						if ($_SESSION['loggued_on_user'] === $row['name']) {
							if ($row['admin'] == 1) {
								echo "<a href='./admin.php' target='_blank' >  admin page</a>";
							}
						}
					}

				?>
			</nav>
		</div>
		<div id="content">
</body>
</html>
<?php $header = ob_get_clean(); ?>

<?php ob_start(); ?>

<hr>
© taho & mlindhol 2020
		</div><!-- End content-->
	</div><!-- End container-->
</body>
</html>
<?php $footer = ob_get_clean(); ?>
