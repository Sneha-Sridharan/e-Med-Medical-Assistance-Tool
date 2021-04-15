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
	$hospital=$_POST['hospname'];
	$pwd=$_POST['password'];
	$conf=$_POST['conf-pass'];
	if($pwd==$conf)
	{
		$sql="insert into receptionistlogin(Hospital, Password) values('$hospital','$pwd')";
		$result=$conn->query($sql);
		if($result)
		{
			$_SESSION['username'] = $uname;
			header('location:ReceptionistHome.php');
		}
		else
		{
			$_SESSION['register_error1']=1;
			header('location:Registerreceptionist.php');
		}
	}
	else
	{
		$_SESSION['register_error2']=1;
		header('location:Registerreceptionist.php');
	}
}
$conn->close();
?>