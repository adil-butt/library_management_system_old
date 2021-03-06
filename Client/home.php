
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>
Client Panel
</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="../styles.css">					
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>

	<?php 
	session_start();
	if($_SESSION['client-credentials']) {	
		include("../files/client-header.php");
	?>
		<div class="container class-content">
		<p class="display-4 text-center"><b>Client Panel</b></p> 
		<div class="list-group">
		<a href="list-of-racks.php" class="list list-group-item list-group-item-action list-group-item-secondary">List of Racks</a>
		<a href="search-book.php" class="list list-group-item list-group-item-action list-group-item-secondary">Search Book</a>
     </div>

	</div>
	<?php 
		include("../files/footer.php");
	}
	else
	{
		header("Location:../home.php");
	} ?>
</body>