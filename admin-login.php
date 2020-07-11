<?php
session_start();


include("Files/config.php");


if(isset($_POST['submit'])) {

	$username = $_POST['username'];
	$password = $_POST['password'];
	$_SESSION['username']=$username;
	
	$sql = "select * from admin where username = '".$username."' and password = '".$password."'";
	
	$result = mysqli_query($conn,$sql);

	
	$count = mysqli_num_rows($result);
	
	if($count >= 1){
		   
			session_start();
			
		    $_SESSION['admin-credentials']=$username;
			header("location:Admin/home.php");
			exit();
	}
	else {
		$msg = "<div class='alert alert-warning' role='alert'>Invalid Login Credentials</div>";   //assign an error message
		//echo "<script>alert('Invalid login details');</script>";
	}
}

?>

<!DOCTYPE html>
<html lang="en"/>
<head>
<meta charset="utf-8"/>

<title>Admin Login</title>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="styles.css">					
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>

        <div class="container class-content-login">
			<p class="display-4 text-center"><b>Welcome to Login</b></p> 
			<div class="login-form">
			
				<form action="#" method="post">
					<h2 class="text-center">Login</h2>       
					<div class="form-group">
						<input type="text" name="username" class="form-control" placeholder="User Name" required="required">
					</div>
					<div class="form-group">
						<input type="password" name="password" class="form-control" placeholder="Password" required="required">
					</div>
					<div class="form-group" style = "text-align: center">
						<?php if(!empty($msg)) echo $msg; ?>
					</div>
					<div class="form-group">
						<button type="submit" name="submit" value="yes" class="btn btn-outline-primary btn-primary btn-block">Log in</button>
					</div>
				</form>
			</div>
		</div>
</body>
                                		                            