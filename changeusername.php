<?php
	ob_start();
	include 'connection.php';
	session_start();

	// Get userId from SESSION and new username from POST
	$userId = $_SESSION['userId'];
	$username = $_POST['username'];

	// Update username in Users table
	$query = "UPDATE Users SET username='$username' WHERE userId=$userId";
	if(mysqli_query($conn, $query)) {
		// Update username in SESSION
		$_SESSION['username'] = $username;
		// Redirect to account page
		header('Location: account.php');
	}
	else
		echo "ERROR: Could not execute $query. ".mysqli_error($conn);

	mysqli_close($conn);
?>
