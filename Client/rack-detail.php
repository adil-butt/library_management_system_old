<?php
	include("../files/config.php");

	if (isset($_GET['id'])){

		$id = $_GET['id'];

		$qq="SELECT * FROM book WHERE rackid = '$id'";
	
		$result=mysqli_query($conn,$qq);

		$qq2="SELECT * FROM rack WHERE id = '$id'";
	
		$result2=mysqli_query($conn,$qq2);

		$row2=mysqli_fetch_array($result2);
	}
	else{
		$message = "<div class='alert alert-danger' role='alert'>Page not found</div>";
	}
?>

<!DOCTYPE html>
<html lang="en"/>
<head>
<meta charset="utf-8"/>

<title>
Rack Details
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

		<?php
		if(!empty($message)){
			echo $message;
		}
		else{
			?>
			<p class="display-4 text-center">Rack Detail</p>

			<p class="display-5 text-center"><b>Rack Name: <?php echo $row2['rackname']; ?></b></p>
		
		<div>
			<table class="table table-striped">
				<thead>
					<tr>
						<th scope="col">Book ID</th>
						<th scope="col">Book Name</th>
						<th scope="col">Author Name</th>
						<th scope="col">Published Year</th>
					</tr>
				</thead>
				
				<?php	
								
					if($result) {
						while($row=mysqli_fetch_array($result)) {
						?>
							<tbody>
							<tr>
								<td><?php echo $row['id'];?></td>
								<td><?php echo $row['booktitle'];?></td>
								<td><?php echo $row['authorname'];?></td>
								<td><?php echo $row['publishedyear'];?></td>
							</tr>
							</tbody>
						<?php
						}
					}
					else {
						?>
						<tbody>
							<tr>
								<td><?php echo mysqli_error($conn); ?></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							</tbody>
					<?php
					}
					?>
			</table>
		</div>
		<?php
		}
		?>
	</div>
	<?php 
		include("../files/footer.php");
	}
	else {
		header("Location:../home.php");
	} 
	?>

</body>