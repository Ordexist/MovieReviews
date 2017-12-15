<?php
	include 'connection.php';
?>
<html>
<head>
	<title>Sign Up</title>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
	<?php include 'nav.php' ?>
	<h1>Sign Up</h1>
	<form action="insert.php" method="post">
		<p>
			<label for="username">Username:</label>
			<input type="text" name="username" id="username">
		</p>
		<p>
			<label for="password">Password:</label>
			<input type="password" name="password" id="password">
		</p>
		<input type="submit" value="Sign Up">
	</form>
</body>
</html>
