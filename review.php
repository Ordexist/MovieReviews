<?php
	ob_start();
	include 'connection.php';
	session_start();

	// get info
	$userId = $_SESSION['userId'];
	$movieId = $_SESSION['movieId'];
	$review = $_POST['review'];

	// try to get current review to determine whether to update or insert
	$query = "SELECT review FROM Reviews WHERE userId = $userId AND movieId = $movieId";
	$result = mysqli_query($conn, $query);
	$exists = mysqli_fetch_assoc($result);
	$result = $exists['review'];

	// if all info and not existing review
	if(!isset($result) and isset($userId) and isset($movieId) and isset($review)) {
		// insert new review
		$query = "INSERT INTO Reviews VALUES ('$userId', '$movieId', '$review')";
		if(mysqli_query($conn, $query))
			//echo "Reviewed successfully.";
			header("Location: movie.php?movieId=$movieId");
		else
			echo "ERROR: Could not execute $query. ".mysqli_error($conn);
	// if review already exists
	} else if (isset($result)) {
		// update review
		$query = "UPDATE Reviews SET review=$review WHERE userId=$userId AND movieId=$movieId";
		if(mysqli_query($conn, $query))
			//echo "Review updated successfully.";
			header("Location: movie.php?movieId=$movieId");
		else
			echo "ERROR: Could not execute $query. ".mysqli_error($conn);
	}
	mysqli_close($conn);
?>
