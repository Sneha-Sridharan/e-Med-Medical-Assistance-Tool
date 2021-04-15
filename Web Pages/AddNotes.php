<?php
	session_start();
	if(isset($_SESSION['add_notes_error']))
	{	
		echo '<script type="text/javascript">window.onload = function(){alert("Error while saving notes. Please try again")};</script>';
		unset($_SESSION['add_notes_error']);
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
	</style>
</head>
<body>
<div class="bg-image"></div>
	<div class="bg-text">
		<form method="POST" action="AddNotesTest.php">
		<div class="row">
			<h1 style="color:#00005b;margin:40px 410px 0px 15px;display:inline-block;">MEDICAL NOTES</h1>
			<input type="submit" name="submit" value="SAVE">
		</div><br>
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
		$sql = "SELECT Notes FROM notes WHERE Uname='$name'";
		$result = mysqli_query($conn, $sql);
		if($result)
			$row = $result->fetch_assoc();
		?>
		<textarea id="notes" name="notes" required><?php if($result){echo $row['Notes'];}?></textarea><br>
		</form> 
	</div>
</body> 
</html>