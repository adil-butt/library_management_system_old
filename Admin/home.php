
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>
Admin Panel
</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="../styles.css">					
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
	<?php 
	session_start();
	if($_SESSION['admin-credentials']) {	
		include("../files/admin-header.php");
	?>
		<div class="container class-content">
		<p class="display-4 text-center"><b>Admin Panel</b></p> 
		<div class="list-group">
		<a href="create-rack.php" class="list list-group-item list-group-item-action list-group-item-secondary">Create a new Rack</a>
		<a href="view-all-racks.php" class="list list-group-item list-group-item-action list-group-item-secondary">View all Racks</a>
		<a href="add-book2.php" class="list list-group-item list-group-item-action list-group-item-secondary">Add a New Book</a>
     </div>

	</div>
	<?php
		include("../files/footer.php");
	}
	else
	{
		header("Location:../admin-login.php");
	} ?>
</body>