<?php
	ob_start();
	include 'connection.php';

	// get info from POST
	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);

	// get userid and password for specified username
	$query = "SELECT userId, password FROM Users WHERE username = '$username'";
	$result = mysqli_query($conn, $query);
	if($row = mysqli_fetch_assoc($result)) {
		// if valid password
		if($row['password'] == MD5($password)) {
			//echo "Successfully logged in";
			// create session cookie for 1 day
			session_start(['cookie_lifetime' => 86400,]);
			// set session variables
			$_SESSION['username'] = $username;
			$_SESSION['userId'] = $row['userId'];
			// redirect to home page
			header('Location: index.php');
		}
		else
			//echo "Incorrect log in information";
			header('Location: login.php');
	}
	mysqli_close($conn);
?>
