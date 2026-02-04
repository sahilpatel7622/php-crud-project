<?php 
	$con= mysqli_connect("localhost","root","", "school");
	$id= $_GET['id'];
	$delete=mysqli_query($con,"DELETE  FROM `student` WHERE id ='$id'");

	if($delete){
		header("location:select.php");
	}
	else{
		echo "fail";
	}
?>