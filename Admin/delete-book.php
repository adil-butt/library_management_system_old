<?php
include("../files/config.php");
if (isset($_GET['id']) && isset($_GET['id2'])) {
		
	$id=$_GET['id'];
	$id2=$_GET['id2'];
	
	$sql = "DELETE from book WHERE id='$id'";
	if(mysqli_query($conn,$sql)) {
		//echo "deleted";
		header("location:rack-detail.php?id=".$id2);
	}
	else {
		//echo "Product Not Deleted Successfully";
		header("location: view-all-racks.php");
	}
	mysqli_close($conn);
}
?>