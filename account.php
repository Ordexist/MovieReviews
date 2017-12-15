<?php
session_start();
if(!isset($_SESSION['username']))
	header('Location: index.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Movie Reviews - Account</title>
	<link rel="stylesheet" type="text/css" href="main.css" />
</head>
<body>
	<?php include 'nav.php' ?>
	<div id="reviews">
	<p>
		<b><?php echo $_SESSION['username']; ?></b>
	</p>
	<p>
		<b>My Reviews:</b>
		<ul>
		<?php
			include 'connection.php';
			$query = "SELECT Movies.movieId, Name, review FROM Reviews LEFT JOIN Movies ON Reviews.movieId = Movies.movieId WHERE userId = ".$_SESSION['userId'];
			$result = mysqli_query($conn, $query);
			if(!$result)
				die('Query failed');
			
			while($movie = mysqli_fetch_assoc($result)){
				//echo "<li><a href=\"movie.php?movieId=$movie['movieId']\">$movie['Name']</a></li>";
				//echo "<li><a href="."movie.php?movieId=".$movie['movieId'];
				printf('<li><a href="movie.php?movieId=%s"', $movie['movieId']);
				echo ">".$movie['Name'];
				echo "</a>";
				echo "<br />";
				echo $movie['review'];
				echo "</li>";
			}
		?>
		</ul>
	</p>
	</div>
	<div id="settings">
		<p>
		<b>Change Username:</b>
		<form action="changeusername.php" method="post">
			<input type="text" name="username" id="username" placeholder="New Username">
			<br/>
			<input type="submit" value="Change Username">
		</form>
		</p>
		<p>
		<b>Change Password:</b>
		<form action="changepassword.php" method="post">
			<input type="password" name="password" id="password" placeholder="New Password">
			<br/>
			<input type="submit" value="Change Password">
		</form>
		</p>
	</div>
</body>
</html>
