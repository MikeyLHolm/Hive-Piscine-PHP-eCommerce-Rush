<?php
	$target_dir = "img/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$error = 0;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

	// Check file size
	if ($_FILES["fileToUpload"]["size"] > 500000)
		$error = 1;

	// Checkl file format
	if ($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png")
		$error = 1;

	// Check if $error is set to 0 by an error
	if ($error == 0)
		move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
	header("Location: admin.php");
?>