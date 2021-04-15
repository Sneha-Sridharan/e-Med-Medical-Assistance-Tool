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
	if(isset($_POST['submit']))
	{
		$notification=$_POST['notification'];
		$name=$_SESSION['username'];
		$date=$_POST['date'];
		$sql="insert into notification(Notification, Remdate, Uname) values('$notification','$date','$name')";
		$result=mysqli_query($conn,$sql);
		if($result)
		{
			header('Location:UserHome.html');
		}
		else
		{				
			$_SESSION['add_notification_error'] = 1;
			header('Location:AddNotification.php');
		}
	}
?>