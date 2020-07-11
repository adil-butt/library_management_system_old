<?php
session_start();


include("Files/config.php");


if(isset($_POST['username/email']))
{	
	$username_email = $_POST['username/email'];	
	$password = $_POST['password'];
		
	
	$sql = "select * FROM `client` where username = '".$username_email."' and password = '".$password."'";	// for username
	$sql2 = "select * FROM `client` where email = '".$username_email."' and password = '".$password."'";		// for email
	
	$result = mysqli_query($conn,$sql);		// for username
	$result2 = mysqli_query($conn,$sql2);	// for email
	
	
	$count = mysqli_num_rows($result);
	$count2 = mysqli_num_rows($result2);
	
	if($count == 1 || $count2 == 1){
		if($count == 1){
			$row=mysqli_fetch_array($result);
			$id = $row['id'];
			$username = $row['username'];
		}
		else{
			$row=mysqli_fetch_array($result2);
			$id = $row['id'];
			$username = $row['username'];
		}
		
		$_SESSION['client-credentials']= $username_email;	
		header("location:client/home.php?id=".$id."&username=".$username);
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

<title>Login</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="styles.css">					
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
        <div class="container class-content-login">
			<p class="display-4 text-center"><b>Welcome to Login</b></p> 
			<div class="login-form">
       
				<form method="POST" action="#" enctype="multipart/form-data">
					<h2 class="text-center">Log in</h2>       
					<div class="form-group">
						<input type="text" name="username/email" class="form-control" placeholder="User Name or Email" required="required">
					</div>
					<div class="form-group">
						<input type="password" name="password" class="form-control" placeholder="Password" required="required">
					</div>
					<div class="form-group" style = "text-align: center">
						<?php if(!empty($msg)) echo $msg; ?>
					</div>

					<div class="form-group">
						<button type="submit" name="yes" value="yes" class="btn btn-outline-primary btn-primary btn-block">Log in</button>
					</div>

					<div>
						<p>Don't have Account?<br><a href="create-client.php">Click here for sign up</a></p>
					</div>
				</form>
			</div>
		</div>
</body>
                                		                            