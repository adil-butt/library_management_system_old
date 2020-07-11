<?php
	include("../Files/config.php");
	
	$count1 = 0;
	$count2 = 0;
	$count3 = 0;
	
	if(isset($_POST['submit']))
	{
		$search = $_POST['search'];
		
		$p1="select * FROM `book` where booktitle = '".$search."'";
		
		$p2="select * FROM `book` where authorname = '".$search."'";
		
		$p3="select * FROM `book` where publishedyear = '".$search."'";
		
		$result1=mysqli_query($conn,$p1);
		
		$result2=mysqli_query($conn,$p2);
		
		$result3=mysqli_query($conn,$p3);
		
		$count1 = mysqli_num_rows($result1);
		
		$count2 = mysqli_num_rows($result2);
		
		$count3 = mysqli_num_rows($result3);
		
	}
	else{
		$row=0;
	}
	
?>

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
		<p class="display-4 text-center"><b>Search Book</b></p> 
		<form method="POST" action="#" enctype="multipart/form-data">
		  <div class="form-row">
			<div class="form-group col-md-6">
			  <label	>Enter<br><b>Book Title/Author Name/Published Year</b><br>to search a book</label>
			  <input type="text" name="search" class="form-control" placeholder="Example: Operating Systems">
			</div>
		  </div>
		  <button type="submit" name="submit" class="btn btn-primary">Search</button>
		</form>
		
		<div>
			<table class="table table-striped">
				<thead>
					<tr>
						<th scope="col">Book ID</th>
						<th scope="col">Book Name</th>
						<th scope="col">Author Name</th>
						<th scope="col">Published Year</th>
						<th scope="col">Rack</th>
					</tr>
				</thead>
				
				<?php	
								
					if($count1 >= 1 || $count2 >= 1 || $count3 >= 1){
						if($count1 >= 1){
							while($row=mysqli_fetch_array($result1)) {
								$p="select rackname FROM `rack` where id = '".$row['rackid']."'";
		
								$result=mysqli_query($conn,$p);
								
								$rows=mysqli_fetch_array($result);
							?>
							<tbody>
							<tr>
								<td><?php echo $row['id'];?></td>
								<td><?php echo $row['booktitle'];?></td>
								<td><?php echo $row['authorname'];?></td>
								<td><?php echo $row['publishedyear'];?></td>
								<td><?php echo $rows['rackname'];?></td>
							</tr>
							</tbody>
							<?php
							}
						}
						elseif($count2 >= 1){
							while($row=mysqli_fetch_array($result2)) {
								$p="select rackname FROM `rack` where id = '".$row['rackid']."'";
		
								$result=mysqli_query($conn,$p);
								
								$rows=mysqli_fetch_array($result);
							?>
							<tbody>
							<tr>
								<td><?php echo $row['id'];?></td>
								<td><?php echo $row['booktitle'];?></td>
								<td><?php echo $row['authorname'];?></td>
								<td><?php echo $row['publishedyear'];?></td>
								<td><?php echo $rows['rackname'];?></td>
							</tr>
							</tbody>
							<?php
							}
						}
						elseif($count3 >= 1){
							while($row=mysqli_fetch_array($result3)) {
								$p="select rackname FROM `rack` where id = '".$row['rackid']."'";
		
								$result=mysqli_query($conn,$p);
								
								$rows=mysqli_fetch_array($result);
							?>
							<tbody>
							<tr>
								<td><?php echo $row['id'];?></td>
								<td><?php echo $row['booktitle'];?></td>
								<td><?php echo $row['authorname'];?></td>
								<td><?php echo $row['publishedyear'];?></td>
								<td><?php echo $rows['rackname'];?></td>
							</tr>
							</tbody>
							<?php
							}
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

	</div>
	<?php 
		include("../files/footer.php");
	}
	else
	{
		header("Location:../home.php");
	} 
	?>
</body>