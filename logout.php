<?php
session_start();
unset($_SESSION['username']);
unset($_SESSION['userId']);
unset($_SESSION['movieId']);
session_destroy();
header('Location: index.php');
?>
