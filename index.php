<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
		<link href='https://fonts.googleapis.com/css?family=Alegreya' rel='stylesheet'>
		<meta name="viewport" content="width=device-width, initial-scale=1">
	<style type="text/css">
		li {
			float: right;
		}
		li a,.popup {
			color: white;
			text-decoration: none;
			display: block;
			font-family: trebuchet ms;
			text-align: center;
			padding-left: 15px;
			padding-right: 15px;
			padding-top: 10px;
			padding-bottom: 11px;
			 
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
			font-family: trebuchet ms;
		}
		button {
			background-color: white;
    		color: black;
    		border: 2px solid brown; 
			font-size: 19.5px;
			border-radius: 2px;
			font-family: trebuchet ms;
		}
		button:hover{
			background-color: brown;
			color: white;
		}
		body{
			background-image: url("pat.jpg");
			background-repeat: no-repeat;
			background-attachment: fixed;
    		background-position: center center;
    		background-size: cover;

		}
		input{
			font-family: trebuchet ms;
			font-size: 20px;
			color: darkslategray;
		}
		.popup {
   			 position: relative;
    		display: inline-block;
    		cursor: pointer;
    		-webkit-user-select: none;
   			 -moz-user-select: none;
    		-ms-user-select: none;
    		user-select: none;
    		float: right;
		}

		/* The actual popup */
		.popup .popuptext {
		    visibility: hidden;
		    width: 160px;
		    background-color: #555;
		    color: #fff;
		    text-align: center;
		    border-radius: 6px;
		    padding: 8px 0;
		    position: absolute;
		    z-index: 1;
		    bottom: 125%;
		    left: 50%;
		    margin-left: -80px;
		}

		/* Popup arrow */
		.popup .popuptext::after {
		    content: "";
		    position: absolute;
		    top: 100%;
		    left: 50%;
		    margin-left: -5px;
		    border-width: 5px;
		    border-style: solid;
		    border-color: #555 transparent transparent transparent;
		}

		/* Toggle this class - hide and show the popup */
		.popup .show {
		    visibility: visible;
		    -webkit-animation: fadeIn 1s;
		    animation: fadeIn 1s;
		}

		/* Add animation (fade in the popup) */
		@-webkit-keyframes fadeIn {
		    from {opacity: 0;} 
		    to {opacity: 1;}
		}

		@keyframes fadeIn {
		    from {opacity: 0;}
		    to {opacity:1 ;}

	</style>
</head>
		<body style="background-color: rgb(240,240,240); font-size: 20px;">
			<ul>
			<!-- <li><a href="#home">MY CART</a></li> -->
				<li><a href="http://192.168.99.100/signup.php">SIGNUP</a></li>
			</ul>
			<div style="text-align: center;">
			<p style="color: white; font-family: Alegreya; font-size: 78px">Sign In</p>


		<script>
		// When the user clicks on div, open the popup
		function myFunction() {
		    var popup = document.getElementById("myPopup");
		    popup.classList.toggle("show");
		}
		</script>

	
	
	
	<form action="includes/login_1.php"method="POST">
	<label for="username">Username:</label>
	<input type="text" name="username" placeholder="Enter e-mail" required>
	<br><br>
	<label>Password:</label>
	<input type="password" name="password" placeholder="Enter Password" required> 
	<br><br><br>
	<div >
		<button type="submit">Login</button>
		<br><br>
		<a href="signup.php" style="text-decoration: none; color: black;" >Not registered? Click here to signup!</a>
	</div>

</form>

</div>
</body>
</html>

