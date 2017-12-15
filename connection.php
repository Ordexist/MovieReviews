<!DOCTYPE html>
<?php
	// Fill in the following information for the appropriate database
	define('DB_HOST', '');
	define('DB_USER', '');
	define('DB_PASSWORD', '');
	define('DB_NAME', '');

	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if(!$conn)
		die('Could not connect: '.mysqli_error());
?>
