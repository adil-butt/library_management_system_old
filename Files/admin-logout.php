<?php
session_start();

	unset($_SESSION['admin-credentials']);
	session_destroy($_SESSION['admin-credentials']);
	header("Location:..\admin-login.php");

?>
