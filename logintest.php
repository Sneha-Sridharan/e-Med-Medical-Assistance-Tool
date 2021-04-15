<html>
<body>
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
	$utype=$_POST['type'];
	$uname=$_POST['username'];
	$pwd=$_POST['password'];
	if($utype=="patient")
	{
		$sql="select * from patientlogin WHERE Uname = '$uname' and Password = '$pwd'";
		$result=$conn->query($sql);
		if(mysqli_num_rows($result)==1)
		{
			$_SESSION['username'] = $uname;
			header('Location:UserHome.php');
		}
		else
		{
			$_SESSION['login_error'] = 1;
			header('Location:Login.php');
		}
	}
	else
	{
		$sql="select * from receptionistlogin WHERE Hospital = '$uname' and Password = '$pwd'";
		$result=$conn->query($sql);
		if(mysqli_num_rows($result)==1)
		{
			$_SESSION['username'] = $uname;
			header('Location:ReceptionistHome.php');
		}
		else
		{
			$_SESSION['login_error'] = 1;
			header('Location:Login.php');
		}
	}
}
$conn->close();
?>
</body>
</html>

