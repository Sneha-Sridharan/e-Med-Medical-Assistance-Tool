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
	$uname=$_POST['username'];
	$pwd=$_POST['password'];
	$conf=$_POST['conf-pass'];
	if($pwd==$conf)
	{
		$sql="insert into patientlogin(Uname, Password) values('$uname','$pwd')";
		$result=$conn->query($sql);
		$error1="Failed to register";
		$error2="Password and confirm password does not match";
		if($result)
		{
			$_SESSION['username'] = $uname;
			header('location:UserHome.php');
		}
		else
		{
			$_SESSION['register_error']=$error1;
			header('location:Registerpatient.php');
		}
	}
	else
	{
		$_SESSION['register_error']=$error2;
		header('location:Registerpatient.php');
	}
}
$conn->close();
?>