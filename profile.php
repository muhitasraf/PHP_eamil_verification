<?php
session_start();

$con=mysqli_connect("localhost","root","","user_database");
if(mysqli_connect_errno()){
    echo "not connected";
}
?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
	<style>
		.button {
			background-color: #4CAF50; /* Green */
			border: none;
			color: white;
			padding: 6px 18px;
			border-radius: 15px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 16px;
			margin: 4px 2px;
			cursor: pointer;
			-webkit-transition-duration: 0.4s; /* Safari */
			transition-duration: 0.4s;
			box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
		}
	</style>
</head>
<body>
	<div class="header"style="width:100%;">
		<div class="logout" style="width:90%;background-color:#02ecd6;padding:20px;">
			
			<div class="user" style="width:90%; text-align:center;">
				<?php echo "<h2>muhit313 ," .$_SESSION['user_id']. " Welcome to your Profile.</h2>"; ?>
			</div>
			
			<div class="logout" style="width:90%; text-align:center;">
				<button class="button"><a style="color:white;text-decoration: none;" href="logout.php">Logout</a></button>
			</div>
			
		</div>
	</div>
</body>
</html>