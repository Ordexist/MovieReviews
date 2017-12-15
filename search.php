<?php
	include 'connection.php';

	// select movies that contain search term in name
	$query = "SELECT * FROM Movies WHERE Name LIKE '%".$_GET['search']."%'";
	$result = mysqli_query($conn, $query);
	if(!$result)
		die('Query to show fields from table failed.');

	//$movie = mysqli_fetch_assoc($result);
?>
<html>
<head>
	<title>
	Search - 
	<?php
		// echo search term to page title
		echo $_GET['search'];
	?>
	</title>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
	<?php include 'nav.php'; // include header and nav ?>
	<h1>
		Search - 
		<?php
			echo $_GET['search'];
		?>
	</h1>
	<p>
		<ul>
		<?php
			while($movie = mysqli_fetch_assoc($result)) {
				// print a list of matching movies
				printf('<li><a href="movie.php?movieId=%s">%s</a></li>', $movie['movieId'], $movie['Name']);
			}
		?>
		</ul>
	</p>
</body>
</html>
