<?php
	session_start();
	$servername="localhost";
	$username="root";
	$password="";
	$dbname="e-med";
	$conn=new mysqli($servername,$username,$password,$dbname);
	if (!$conn)
	{
		die('Could not connect: ' . mysql_error());
	}
	$id=$_GET['id'];
	$status=$_GET['status'];
	$sql="update appointment set Status='$status' where AppointmentID=$id";
	$result=mysqli_query($conn,$sql);
	if($result)
	{
		header('Location:ReceptionistHome.php');
	}
	else
	{
		$_SESSION['status_error'] = 1;				
		header('Location:ReceptionistHome.php');
	}
?>