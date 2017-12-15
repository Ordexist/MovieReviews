<!DOCTYPE html>
<html>
<head>
	<title>Movie Reviews</title>
	<link rel="stylesheet" type="text/css" href="main.css" />
</head>
<body>
	<?php include 'nav.php'; //include header and nav ?>
	<p>
		List of movies in alphabetical order (the search box can also be used):
		<ul>
		<?php
			include 'connection.php';
			// get all movies in alphabetical order
			$query = "SELECT movieId, Name FROM Movies ORDER BY Name";
			$result = mysqli_query($conn, $query);
			if(!$result)
				die('Query failed');
			
			while($movie = mysqli_fetch_assoc($result)){
				//echo "<li><a href=\"movie.php?movieId=$movie['movieId']\">$movie['Name']</a></li>";
				//echo "<li><a href="."movie.php?movieId=".$movie['movieId'];
				// print movies to the page as links
				printf('<li><a href="movie.php?movieId=%s"', $movie['movieId']);
				echo ">".$movie['Name'];
				echo "</a></li>";
			}
		?>
		</ul>
	</p>
</body>
</html>
