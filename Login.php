<?php
	session_start();
	if(isset($_SESSION['login_error']))
	{	
		echo '<script type="text/javascript">window.onload = function(){alert("Please enter correct details")};</script>';
		unset($_SESSION['login_error']);
	}
?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400&display=swap" rel="stylesheet">
  <style>
	.column {
		width:80%;
		color:black;
		margin-left:80px;
	}
	body
	{
		background-color: #EEEEFF;
		background-image:url('stethoscope.jpg');
		background-attachment:fixed;
		background-size:50% 100%;
		background-repeat:no-repeat;
		font-family: 'Lato', sans-serif;
	}
	input{
		padding: 10px;
		margin: 5px 0 22px 0;
		border: none;
		background: #ffffff;
		font-size:18px;
	}
	input[type="submit"]{
		border-radius: 10px;
		height:50px;
		width: 100%;
		background-color:#00008b;
		color:white;
		font-size:22px;
	}
	input[type="submit"]:hover{
		border: #9932cc;
		background-color: #0000cd;
		cursor: pointer;
		transition:0.6s;
	}
	input, select{
		display:block;
        width: 100%;
        height: 50px;
        padding: 5px 1px;
        font-size:16px;
        border-radius:10px;
        outline:none;
    }
    input:focus, textarea:focus, select:focus{
        border: 2px solid #bbbbbb;
        background: #f5f5f5;
        transition: .6s; 
        outline:none;
    }
	form{
		font-size:20px;
	}
</style>
</head>
<body>
<div class="row">
	<div class="col-sm-6">
	</div>
	<div class="col-sm-6" style="position: fixed;top: 11%;left: 50%;">
		<div class="column">
			<h1 style="text-align:center;color:#00005b;">LOGIN</h1><br>
			<form method="POST" action="logintest.php">
				User Type
				<select id="type" name="type" required>
				<div class="dropdown-content">
					<option disabled selected value> ---- Select User Type ---- </option>
					<option value="patient">Patient</option>
					<option value="receptionist">Receptionist</option>
				</div>
				</select>
				<br>
				Username 
				<input type="text" name="username" required>
				Password
				<input type="password" name="password" required>
				<p style="display:inline-block">New User?</p>
				<a style="text-decoration:none" href="Registerpatient.php">Register as Patient</a>
				<p style="display:inline-block">or</p>
				<a style="text-decoration:none" href="Registerreceptionist.php">Register as Receptionist</a><br><br>
				<input type="submit" name="submit" value="LOGIN">
			</form> 
		</div>
	</div>
</div>
</body> 
</html>