<?php


	include("../files/config.php");

	if (isset($_GET['id']) && isset($_GET['id2'])) {
		
		$id=$_GET['id'];
		$id2=$_GET['id2'];
		
		$qq="SELECT * FROM book where id='".$id."'";
		$result=mysqli_query($conn,$qq);
		$count=mysqli_num_rows($result);

		while($row=mysqli_fetch_array($result))
		{
			$booktitle=$row['booktitle'];
			$authorname=$row['authorname'];
			$publishedyear=$row['publishedyear'];
		}

		if($_POST)
		{
			$booktitle=$_POST['booktitle'];
			$authorname=$_POST['authorname'];
			$publishedyear=$_POST['publishedyear'];
		
			$s1 = "UPDATE book SET booktitle='".$booktitle."',authorname='".$authorname."',publishedyear='".$publishedyear."' WHERE id='".$id."'";
			
			$result=mysqli_query($conn,$s1);
			
			if ($result)
			{
				header("location:rack-detail.php?id=".$id2);
			} 
			else 
			{
				$msg = "<div class='alert alert-danger' role='alert'>".mysqli_error($conn)."</div>";   //assign an error message
			}
		}	
		
	}
	else {
		$booktitle='';
		$authorname='';
		$publishedyear='';
	}

?>

<!DOCTYPE html>
<html lang="en"/>
<head>
<meta charset="utf-8"/>
<title>
Edit Book
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
		<p class="display-4 text-center"><b>Edit Book</b></p>
		<?php
		if(!empty($msg)){
			echo $msg;
		}
		?>
		<form method="POST" action="#" enctype="multipart/form-data">
			<div class="form-row">
				<div class="col-md-4 mb-3">
					<label>Book Title</label>
					<input type="text" name="booktitle" placeholder="Operating Systems" value="<?php echo $booktitle;?>" required>
				</div>
				<div class="col-md-4 mb-3">
					<label>Author Name</label>
					<input type="text" name="authorname" placeholder="Avi Silberschatz" value="<?php echo $authorname;?>" required>
				</div>
				<div class="col-md-4 mb-3">
					<label>Published Year</label>
					<input type="number" name="publishedyear" placeholder="1982" value="<?php echo $publishedyear;?>" required>
				</div>
			</div>
			<button class="button btn-outline-primary btn btn-primary btn-lg btn-block" name="submit" type="submit">Update</button>
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
