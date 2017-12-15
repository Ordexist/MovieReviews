<?php
	include 'connection.php';

	// get movie information
	$query = "SELECT * FROM Movies WHERE movieId =".$_GET['movieId'];
	$result = mysqli_query($conn, $query);
	if(!$result)
		die('Query to show fields from table failed.');

	$movie = mysqli_fetch_assoc($result);
?>
<html>
<head>
	<title>
	<?php
		echo $movie['Name'];
	?>
	</title>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
	<?php include 'nav.php'; //include header and nav ?>
	<h1>
		<?php
			echo $movie['Name'];
		?>
	</h1>
	<p>
		<b>Rating</b>: 
		<?php
			echo $movie['Rating']; // print rating
		?>
	</p>
	<div id="container">
	<p id="imageurl">
		<img src="<?php echo $movie['imageurl']; //echo imageurl ?>" height="350px">
	</p>
	<div id="movieinfo">
	<p>
		<b>Description:</b>
		<p>
		<?php
			echo $movie['Description'];
		?>
		</p>
	</p>
	<p>
		<b>People:</b>
		<?php
			// get people for specified movie
			$query = "SELECT * FROM People WHERE movieId = ".$_GET['movieId'];
			$result = mysqli_query($conn, $query);
			if(!$result)
				die('Query to show fields from table failed.');
			// print people in movie
			while($people = mysqli_fetch_assoc($result)) {
				echo "<p>";
				echo $people['Name'];
				echo ": ";
				echo $people['Role'];
				echo "</p>";
			}
		?>
	</p>
	<?php
		// if the user is logged in
		// show rating and review forms
		if(isset($_SESSION['username'])) {
			$_SESSION['movieId'] = $_GET['movieId'];
			printf('
			<p>
			Rate:
			<form action="rate.php" method="post">
			<select name="rating" id="rating">
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
			</select>
			<input type="submit" value="Rate">
			</form>
			<br/>
			Review:
			<br/>
			<form action="review.php" method="post">
				<textarea name="review" id="review" rows="4" cols="40"></textarea>
				<br/>
				<input type="submit" value="Review">
			</form>
			</p>');
		}
	?>
	</div>
	</div>
	<p>
		<b>Reviews:</b>
		<?php
			// Select reviews, ratings, and usernames using left joins
			$query = "SELECT * FROM Reviews LEFT JOIN Ratings ON Reviews.movieId = Ratings.movieId AND Reviews.userId = Ratings.userId LEFT JOIN Users ON Reviews.userId = Users.userId WHERE Reviews.movieId =".$_GET['movieId'];
			$result = mysqli_query($conn, $query);
			if(!$result)
				die('Query to show fields from table failed.');

			// Shows information in list form
			while($review = mysqli_fetch_assoc($result)) {
				echo "<p>";
				echo $review['username'];
				echo "<br />";
				if (isset($review['rating'])) {
					echo "Rating: ";
					echo $review['rating'];
					echo "<br />";
				}
				if (isset($review['review'])) {
					echo $review['review'];
				}
				echo "</p>";
			}

			mysqli_free_result($result);
			mysqli_close($conn);
		?>
	</p>
</body>
</html>
