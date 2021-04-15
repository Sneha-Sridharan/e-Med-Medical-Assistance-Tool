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
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
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
		position: absolute;
		top: 67%;
		z-index: 2;
		padding: 20px;
	}
	.bg-image
	{
		height: 65%;
		background-image:url('Homepage.jpg');
		background-size:100% 100%;
		background-repeat:no-repeat;
		filter: blur(0px);
	}
	input,textarea{
		padding: 10px;
		margin: 5px 0 22px 0;
		border: none;
		background: #ffffff;
		font-size:18px;
	}
	input[type="submit"]{
		border-radius: 10px;
		height:50px;
		width: 100px;
		background-color:#00008b;
		color:white;
		font-size:22px;
		display: inline-block;
	}
	input[type="submit"]:hover{
		border: #9932cc;
		background-color: #0000cd;
		cursor: pointer;
		transition:0.6s;
	}
	input{
        display:block;
        width: 90%;
        height: 50px;
        padding: 5px 1px;
        font-size:16px;
        border-radius:10px;
        outline:none;
    }
	textarea
	{
	    display:block;
        width: 90%;
		height:520px;
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
	h1{
		color:#00005b;
		text-align: center;
		font-family: 'Josefin Sans', sans-serif;
		font-size: 60px;
		display: inline-block;
		margin-right:50px;
	}
	h2{
		color:#00005b;
		text-align: center;
		font-family: 'Josefin Sans', sans-serif;
		font-size: 40px;
		display: inline-block;
	}
	h3{
		text-align: center; 
		font-size: 35px; 
		margin-top: 130px; 
		font-family: 'Josefin Sans', sans-serif;
		color: #00005b; 
	}
	.centered{
		text-align: center;
	}
	.card{
		background-color: #aaaaaa;
		padding: 20px;
		border-radius: 10px;
		height: 150px;
		width: 285px;
		box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
		transition: 0.3s;
		display:inline-block;
		margin-left:47px;
		margin-right:33px;
	}
	.card:hover {
		box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
		background-color: #cccccc;
	}
	.card-text {
		margin-top: 40px;
		font-size: 20px;
		color: #33335b;
		
	}
	a{
		text-decoration: none;
	}
	footer {
		text-align: center;
		padding: 3px;
		font-size: 17px;
		background-color: #aaaaaa;
		color: white;
	}
</style>
</head>
<body>
	<a href="Logout.php" role="button" class="btn btn-link" style="margin-left:95%;">Logout</a>
	<div class="centered">
	<h1>e-Med</h1>
	<h2>Your personal health partner</h2>
	</div>
<div class="bg-image"></div>
<div class="bg-text">
  <a href="AddNotification.php">
    <div class="card text-center stretched-link text-decoration-none">
      <div class="card-body">
        <p class="card-text">Add Notification</p>
      </div>
    </div>
  </a>
  <a href="BookAppointment.php">
    <div class="card text-center stretched-link text-decoration-none">
      <div class="card-body">
        <p class="card-text">Book Appointment</p>
      </div>
    </div>
  </a>
  <a href="ViewAppointments.php">
    <div class="card text-center stretched-link text-decoration-none">
      <div class="card-body">
        <p class="card-text">View Appointments</p>
      </div>
    </div>
  </a>
  <a href="AddNotes.php">
    <div class="card text-center stretched-link text-decoration-none">
      <div class="card-body">
        <p class="card-text">Medical Notes</p>
      </div>
    </div>
  </a>
 </div>
	<h3>Your Notifications</h3><br>
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
		$sql = "SELECT Notification FROM notification WHERE Uname='$name' and Remdate=CURDATE()";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result)>0)
        {
			while($row = mysqli_fetch_assoc($result))
			{
				echo '<div style="margin-left: 15%; width: 70%;">';
				echo '<ul class="list-group list-group-flush" style="font-size:19px;">';
				echo '<li class="list-group-item">'.$row['Notification'].'</li>';
				echo '</ul></div>';
			}
		}
        else
        {
            echo '<div style="margin-left: 15%; width: 70%;">';
			echo '<ul class="list-group list-group-flush" style="font-size:19px;">';
			echo '<li class="list-group-item">No Notifications</li>';
			echo '</ul></div>';
        }
	?><br><br><br>
<footer>
  <p>&copy; Author: Sneha Sridharan<br>
  Contact Number: 2382378271</p>
</footer>
</body> 
</html>
</html>