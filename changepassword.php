<?php
	ob_start();
	include 'connection.php';
	session_start();

	// Get userId from SESSION and new password from POST
	$userId = $_SESSION['userId'];
	$password = $_POST['password'];

	// Update password
	$query = "UPDATE Users SET password=MD5('$password') WHERE userId=$userId";
	if(mysqli_query($conn, $query))
		//echo "Password updated successfully.";
		// Logout so the user can sign in with new password
		header('Location: logout.php');
	else
		echo "ERROR: Could not execute $query. ".mysqli_error($conn);

	mysqli_close($conn);
?>
