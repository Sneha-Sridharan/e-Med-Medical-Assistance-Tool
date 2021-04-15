<?php
	session_start();
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
	body, html {
		height: 100%;
		font-family: 'Lato', sans-serif;
	}

	* {
		box-sizing: border-box;
	}

	.bg-text {
		background-color: #EEEEFF;
		position: absolute;
		top: 50%;
		left: 67.5%;
		transform: translate(-50%, -50%);
		z-index: 2;
		width: 65%;
		padding: 20px;
		height:100%;
	}
	.bg-image
	{
		height:100%;
		background-image:url('medical.jpg');
		background-size:100% 100%;
		background-repeat:no-repeat;
		filter: blur(0px);
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
		width: 90%;
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
        width: 90%;
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
		margin-left:70px;
	}
	.card{
		background-color: #f3f3f3;
		padding: 20px;
		border-radius: 10px;
		width: 90%;
		box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
		transition: 0.3s;
		display:inline-block;
		margin-left:47px;
		margin-top:33px;
	}
	.card-text {
		font-size: 20px;
		
	}
</style>
</head>
<body>
<div class="bg-image"></div>
	<div class="bg-text">
		<h1 style="margin-left: 5%; color: #00008b;">View Appointments</h1>
		<div class="card">
			<div class="card-body">
				<div class="card-text">
				<?php
				$name=$_SESSION['username'];
				$servername = "localhost";
				$username = "root";
				$password = "";
				$dbname = "e-med";
				$conn = new mysqli($servername, $username, $password, $dbname);
				if (!$conn)
				{
					die("Connection failed: ".mysql_error());
				}
				$sql = "SELECT * FROM appointment WHERE Uname='$name'";
				$result = mysqli_query($conn, $sql);
				if (mysqli_num_rows($result)>0)
				{
					while($row = mysqli_fetch_assoc($result))
					{
						echo '<p>Hospital: '.$row['Hospital'].'</p>';
						echo '<p>Date: '.date("d-m-Y", strtotime($row['Date'])).'</p>';
						echo '<p>Time: '.$row['Time'].'</p>';
						echo '<p>Status: '.$row['Status'].'</p>';
					}
				}
				?>
				</div>
			</div>
		</div>
	</div>
</body> 
</html>