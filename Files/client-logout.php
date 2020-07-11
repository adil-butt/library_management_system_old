<?php
session_start();

	unset($_SESSION['client-credentials']);
	session_destroy($_SESSION['client-credentials']);
	header("Location:..\home.php");

?>
