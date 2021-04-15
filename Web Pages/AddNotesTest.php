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
		$notes=$_POST['notes'];
		$name=$_SESSION['username'];
		$sql="select * from notes WHERE Uname = '$name'";
		$result=$conn->query($sql);
		if(mysqli_num_rows($result)==0)
		{
			$sql1="insert into notes values('$notes','$name')";
			$result1=mysqli_query($conn,$sql1);
			if($result1)
			{
				header('Location:AddNotes.php');
			}
			else
			{
				$_SESSION['add_notes_error'] = 1;
				header('Location:AddNotes.php');
			}
		}
		else
		{
			$sql1="update notes set Notes='$notes' where Uname='$name'";
			$result1=mysqli_query($conn,$sql1);
			if($result1)
			{
				header('Location:AddNotes.php');
			}
			else
			{
				$_SESSION['add_notes_error'] = 1;
				header('Location:AddNotes.php');
			}
		}
		
	}
?>