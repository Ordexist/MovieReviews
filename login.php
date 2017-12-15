<?php
	include 'connection.php';
?>
<html>
<head>
	<title>Sign In</title>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
	<?php include 'nav.php' ?>
	<h1>Sign In</h1>
	<form action="signin.php" method="post">
		<p>
			<label for="username">Username:</label>
			<input type="text" name="username" id="username">
		</p>
		<p>
			<label for="password">Password:</label>
			<input type="password" name="password" id="password">
		</p>
		<input type="submit" value="Sign In">
	</form>
</body>
</html>
