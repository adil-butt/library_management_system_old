<?php
	include("Files/config.php");

	if(isset($_POST['submit'])) {

		$firstname=$_POST['firstname'];
		$lastname=$_POST['lastname'];
		$username=$_POST['username'];
		$email=$_POST['email'];
		$password=$_POST['password'];
		
		
		$p="INSERT INTO client (firstname,lastname,username,email,password) values ('".$firstname."','".$lastname."','".$username."','".$email."','".$password."')";
		
		$result=mysqli_query($conn,$p);
		
		if($result) {
			$msg = "<div class='alert alert-primary' role='alert'>Account Successfully Created</div>";  //assign an error message
		}
		/*elseif(mysqli_errno($conn) === 1062) {
			$msg = "<div class='alert alert-warning' role='alert'>".mysqli_error($conn)."</div><div class='alert alert-secondary' role='alert'>Enter record again</div>";   //assign an error message
			//$msg.= mysqli_error($conn);
		}*/
		else {
			$msg2 = "<div class='alert alert-warning' role='alert'>".mysqli_error($conn)."</div>";  //assign an error message
		}
	}
	
?>

<!DOCTYPE html>
<html lang="en"/>
<head>
<meta charset="utf-8"/>
<title>
New Registration
</title>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="../styles.css">					
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
	
	
	<div class="container class-content">
		<p class="display-4 text-center" style="margin-top: 100px; margin-bottom: 100px;"><b>Registeration Form</b></p>
		
		<div class="form-group" style = "text-align: center">
			<?php 
			if(!empty($msg)){
				echo $msg;
				?>
				<a href="home.php" class="btn btn-outline-primary">Return to login page</a>
			<?php
			}
			elseif(!empty($msg2)){
				echo $msg2;
			}
			 ?>
		</div>

		<form method="POST" action="#" enctype="multipart/form-data">
			<div class="form-row">
				<div class="form-group col-md-6">
				<label>First Name</label>
				<input type="text" name="firstname" class="form-control" placeholder="Adil">
				</div>
				<div class="form-group col-md-6">
				<label>Last Name</label>
				<input type="text" name="lastname" class="form-control" placeholder="Butt">
				</div>
			</div>

			<div class="form-row">
				<div class="form-group col-md-6">
				<label>User Name</label>
				<input type="text" name="username" class="form-control" placeholder="adilbutt">
				</div>
				<div class="form-group col-md-6">
				<label for="inputEmail4">Email</label>
				<input type="email" name="email" class="form-control" id="inputEmail4" placeholder="Email">
				</div>
			</div>

			<div class="form-group">
				<label for="inputPassword4">Password</label>
				<input type="password" name="password" class="form-control" id="inputPassword4" placeholder="Password">
			</div>
			
			
			<button type="submit" name="submit" class="btn btn-outline-primary btn-primary btn-block">Sign Up</button>
		</form>

	</div>
	
</body>