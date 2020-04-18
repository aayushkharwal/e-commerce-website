<?php
session_start();
	include_once 'dbh.php';
	$firstname=$_SESSION["firstname"];
	$email=$_SESSION["email"];

	/*echo "<br>"."Your Username is: ".$email;*/
?>
<!DOCTYPE html>
<html>
<head>
	<title>LogIn</title>
	<link href='https://fonts.googleapis.com/css?family=Alegreya' rel='stylesheet'>
	<style type="text/css">
		li {
			float: right;
		}
		li a {
			color: white;
			text-decoration: none;
			display: block;
			font-family: trebuchet ms;
			text-align: center;
			padding-left: 15px;
			padding-right: 15px;
			padding-top: 8px;
			padding-bottom: 8px;
		}

		li a:hover:not(.a) {
			background-color: #111;
			color:orange;
		}

		ul{
			list-style-type: none;
			margin-right: 0;
			padding-left: 0;
			overflow: hidden;
			background-color: #333;
			font-size: 18px;
					
		}
		.a:hover{
			background-color: orange;
			color: black;

		}
		body{

			background-image: url("board.jpg");
			/*background-repeat: no-repeat;*/
			background-attachment: fixed;
    		background-position: center center;
    		background-size: cover;

		}
		div.column{
			flex:33.3%%;
			padding: 0 4px;

		}

	</style>
</head>
<body>
	<div style="background-color: white;">
	<ul>
		<li style="float: left;"><a href="https://mywebsite-ecommerce.herokuapp.com/login_n.php" class="a">HOME</a></li>
		<li><a href="https://mywebsite-ecommerce.herokuapp.com/includes/logout.php">LOGOUT</a></li>
		<li><a href="https://mywebsite-ecommerce.herokuapp.com/includes/cart2.php">MY CART</a></li>
		<li><a href="https://mywebsite-ecommerce.herokuapp.com/includes/checkout.php">ORDERS</a></li>
		<li><a href="https://mywebsite-ecommerce.herokuapp.com/includes/items.php">PRODUCTS</a></li>
	</ul>
</div>
<?php 	echo "<br>".$firstname.",you have successfully logged in!"; ?>
	<title>LogIn</title>
	<link href='https://fonts.googleapis.com/css?family=Alegreya' rel='stylesheet'>
	<style type="text/css">
		
		body{
			font-family: trebuchet ms;
			text-align: center;
		}
		button {
			background-color: rgb(230,230,230);
    		color: black;
    		border: 2px solid indianred; 
			font-size: 18px;
			border-radius: 2px;
			font-family: trebuchet ms;
		}
		button:hover{
			background-color: indianred;
			color: white;
		}

	</style>
</head>
<body style="font-size: 24px; text-align: center;">
	
<div style="float: right; padding-right: 240px;">
	<br><br><br><br><br><br>
<!-- <button onclick="location.href = 'items.php';" >View Products</button><br><br><br> -->
<button onclick="location.href = 'custdet.php';" >Change Account Details</button><br><br><br>
<button onclick="location.href = 'delcust.php';" >Delete Account</button><br><br><br>
<button onclick="location.href = 'phoneno.php';" >Add Phone No.</button><br><br><br>
</div>
</body>
</html>
