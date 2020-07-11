<?php
include("../files/config.php");
if($_GET) {
	$id=$_GET['id'];
	echo $id;
	$sql = "DELETE from rack WHERE id='$id'";
	if(mysqli_query($conn,$sql)) {
		//echo "deleted";
		header("location: view-all-racks.php");
	}
	else {
		//echo "Product Not Deleted Successfully";
		header("location: view-all-racks.php");
	}
	mysqli_close($conn);
}
?>