<?php
	include("../Files/config.php");

	if(isset($_GET['id'])){
		$id = $_GET['id'];

		$p="SELECT rackname from rack WHERE id = '$id'";
			
		$result = mysqli_query($conn,$p);

		$row=mysqli_fetch_array($result);
	
		if(isset($_POST['submit'])) {

			$results=mysqli_query($conn,"SELECT count(*) as total from book WHERE rackid = '$id'");
				
			$data=mysqli_fetch_assoc($results);

			if($data['total'] < 10){
				
				$booktitle=$_POST['booktitle'];

				$authorname=$_POST['authorname'];
					
				$publishedyear=$_POST['publishedyear'];
					
				$p2="INSERT INTO book (rackid,booktitle,authorname,publishedyear)values('".$id."','".$booktitle."','".$authorname."','".$publishedyear."')";

				$result2=mysqli_query($conn,$p2);
					
				if($result) {
					$messageforaddedsuccessfully = "<div class='alert alert-primary' role='alert'>Book Added Successfully</div>";
				}
				else {
					$errormessage = "<div class='alert alert-warning' role='alert'>".mysqli_error($conn)."</div>";  //assign an error message
				}
			}
			else{
				$messageforlimitexeeds = "<div class='alert alert-warning' role='alert'>Sorry there are already 10 books added in Rack<br>You cannot add more than 10 books</div>";
			}

		}

	}
	else{
		$pagenotfounderror = "<div class='alert alert-success' role='alert'>Page not found!</div>";
	}
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>
Add New Book
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
		<p class="display-4 text-center"><b>Add Book in <?php echo $row['rackname'] ?> Rack</b></p>
		<?php
		if(!empty($messageforlimitexeeds)){
			echo $messageforlimitexeeds;
			echo '<a href="view-all-racks.php" style="margin: 10px" class="btn btn-outline-primary">Return to Rack Page</a>';
		}
		elseif(!empty($messageforaddedsuccessfully)){
			echo $messageforaddedsuccessfully;
			echo '<a href="view-all-racks.php" style="margin: 10px" class="btn btn-outline-primary">Return to Rack Page</a>';
		}
		?>
		<form method="POST" action="#" enctype="multipart/form-data">
			<div class="form-row">
				<div class="col-md-4 mb-3">
					<label>Book Title</label>
					<input type="text" name="booktitle" placeholder="Operating Systems" required>
				</div>
				<div class="col-md-4 mb-3">
					<label>Author Name</label>
					<input type="text" name="authorname" placeholder="Avi Silberschatz" required>
				</div>
				<div class="col-md-4 mb-3">
					<label>Published Year</label>
					<input type="number" name="publishedyear" placeholder="1982" required>
				</div>
			</div>
			<button class="button btn-outline-primary btn btn-primary btn-lg btn-block" name="submit" type="submit">Add</button>
		</form>
	</div>
	<?php 
		include("../files/footer.php");
	}
	else
	{
		header("Location:../admin-login.php");
	} ?>
</body>