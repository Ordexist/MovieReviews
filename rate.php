<?php
	ob_start();
	include 'connection.php';
	session_start();

	// get info
	$userId = $_SESSION['userId'];
	$movieId = $_SESSION['movieId'];
	$rating = $_POST['rating'];

	// try to get current rating to determine whether to update or insert
	$query = "SELECT rating FROM Ratings WHERE userId = $userId AND movieId = $movieId";
	$result = mysqli_query($conn, $query);
	$exists = mysqli_fetch_assoc($result);
	$result = $exists['rating'];

	// if all necessary info and not existing rating
	if(!isset($result) and isset($userId) and isset($movieId) and isset($rating)) {
		// insert new rating
		$query = "INSERT INTO Ratings VALUES ('$userId', '$movieId', '$rating')";
		if(mysqli_query($conn, $query))
			//echo "Rated successfully.";
			// redirect to movie page
			header("Location: movie.php?movieId=$movieId");
		else
			echo "ERROR: Could not execute $query. ".mysqli_error($conn);
	// if rating exists
	} else if (isset($result)) {
		// update rating
		$query = "UPDATE Ratings SET rating=$rating WHERE userId=$userId AND movieId=$movieId";
		if(mysqli_query($conn, $query))
			//echo "Rate updated successfully.";
			// redirect to movie page
			header("Location: movie.php?movieId=$movieId");
		else
			echo "ERROR: Could not execute $query. ".mysqli_error($conn);
	}
	mysqli_close($conn);
?>
