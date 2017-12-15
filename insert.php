<?php
	ob_start();
	include 'connection.php';

	// get info from POST
	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);

	// add username and passowrd with auto incremented userid to Users table
	$query = "INSERT INTO Users VALUES (DEFAULT, '$username', MD5('$password'))";
	if(mysqli_query($conn, $query))
		//echo "Account created successfully.";
		// redirect to login page
		header('Location: login.php');
	else
		echo "ERROR: Could not execute $query. ".mysqli_error($conn);
	mysqli_close($conn);
?>
