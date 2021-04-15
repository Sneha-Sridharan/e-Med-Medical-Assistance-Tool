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
		$hospital=$_POST['hospital'];
		$date=$_POST['date'];
		$time=$_POST['time'];
		$name=$_SESSION['username'];
		$sql="insert into appointment(Hospital, Date, Time, Uname) values('$hospital','$date','$time','$name')";
		$result=mysqli_query($conn,$sql);
		if($result)
		{
			header('Location:UserHome.php');
		}
		else
		{
			$_SESSION['book_apptmnt_error'] = 1;				
			header('Location:BookAppointment.php');
		}
		
	}
?>