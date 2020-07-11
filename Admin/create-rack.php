<?php
	include("../Files/config.php");
	if(isset($_POST['submit']))
	{
		$rackname=$_POST['rackname'];
		
		$p="INSERT INTO rack (rackname) values ('".$rackname."')";
		
		$result=mysqli_query($conn,$p);
		
		if($result) {
				$msg = "<div class='alert alert-primary' role='alert'>Rack Added Successfully</div>";
		}
		/*elseif(mysqli_errno($conn) === 1062) {
			$msg = "<div class='alert alert-warning' role='alert'>".mysqli_error($conn)."</div><div class='alert alert-secondary' role='alert'>Enter record again</div>";   //assign an error message
			//$msg.= mysqli_error($conn);
			//echo 'adilislambutt';
			//echo "Error". $p . "<br>" . mysqli_error($conn);
		}*/
		else {
			//$msg2 = "<div class='alert alert-danger' role='alert'>Oops something went wrong!</div>";   //assign an error message
			$msg = "<div class='alert alert-warning' role='alert'>".mysqli_error($conn)."</div>";  //assign an error message
		}
	}
	
?>

<!DOCTYPE html>
<html lang="en"/>
<head>
<meta charset="utf-8"/>
<title>
Create Rack
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
		<p class="display-4 text-center"><b>Create a new Rack</b></p>

		<?php 
			if(!empty($msg)){
				echo $msg;
			}
		?>
		
		<form class="form-inline" method="POST" action="#" enctype="multipart/form-data">
			<div class="form-group mb-2">
				<label class="sr-only">Rack Name</label>
				<input type="text" readonly class="form-control-plaintext" id="staticEmail2" value="Enter Rack Name">
			</div>
			<div class="form-group mx-sm-3 mb-2">
				<label class="sr-only">Rack Name</label>
				<input type="text" name="rackname" class="form-control" id="inputPassword2" placeholder="Eg: Computer Science" required>
			</div>
			<button type="submit" name="submit" class="btn btn-primary mb-2">Create</button>
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
