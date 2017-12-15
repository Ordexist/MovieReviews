<header>
	<h1>Movie Reviews</h1>
</header>
<nav id="nav">
<ul>
	<li><a href="index.php">Home</a></li>
	<?php
		session_start();
		if(isset($_SESSION['username'])) {
			printf('
			<li><a href="account.php">Account</a></li>
			<li><a href="logout.php">Logout</a></li>
			');
		} else {
			printf('
			<li><a href="login.php">Log in</a></li>
			<li><a href="signup.php">Sign Up</a></li>
			');
		}
	?>
	<li><a href="about.php">About</a></li>
	<li><a href="contact.php">Contact</a></li>
	<li>
		<form action="search.php" method="get">
			<input type="text" name="search" id="search" placeholder="Search">
		</form>
	</li>
</ul>
</nav>
