<?php
	include("../files/config.php");
	$qq="SELECT * FROM rack";
	
	$result=mysqli_query($conn,$qq);
?>

<!DOCTYPE html>
<html lang="en"/>
<head>
<meta charset="utf-8"/>

<title>
View Racks
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
		<p class="display-4 text-center"><b>View All Racks</b></p>
		
		<div>
			<table class="table table-striped">
				<thead>
					<tr>
						<th scope="col">Rack ID</th>
						<th scope="col">Rack Name</th>
						<th scope="col">Total Books</th>
					</tr>
				</thead>
				
				<?php	
								
					if($result) {
						while($row=mysqli_fetch_array($result)) {
						?>
							<tbody>
							<tr>
								<td><?php echo $row['id'];?></td>
								<td><?php echo $row['rackname'];?></td>
								<?php
								$rackid=$row['id'];
								$results=mysqli_query($conn,"SELECT * from book WHERE rackid = '$rackid'");
				
								$count = mysqli_num_rows($results);
								?>
								<td><?php echo $count;?></td>
								<td>
								<td>
								<?php
									echo '<a class="btn btn-outline-primary" href="rack-detail.php?id='.$row["id"].'">View Details</a>'; 
								?></td>
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
							</tr>
							</tbody>
					<?php
					}
					?>
			</table>
		</div>
	</div>
	<?php 
		include("../files/footer.php");
	}
	else {
		header("Location:../home.php");
	}
	?>
</body>

