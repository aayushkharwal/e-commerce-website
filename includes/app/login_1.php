<?php

session_start();
include_once 'dbh.php';

$username=mysqli_escape_string($conn,$_POST['username']);
$password=mysqli_escape_string($conn,$_POST['password']);
$password=md5($password);

$sqll="select * from customers where email='$username' and password='$password';";
$result=mysqli_query($conn,$sqll);
$resultCheck=mysqli_num_rows($result);

if($resultCheck>0){
	$Row=mysqli_fetch_assoc($result);
		//$uid=$Row['id'];
	//$_SESSION["uid"]=$Row['id'];
	
	$_SESSION["uid"] = $Row['id'];
	$_SESSION["firstname"] = $Row['firstname'];
	$_SESSION["lastname"] = $Row['lastname'];
	$_SESSION["dob"] = $Row['dob'];
	$_SESSION["phone"] = $Row['phone'];
	$_SESSION["address"] = $Row['address'];
	$_SESSION["password"] = $password;
	$_SESSION["email"] = $Row['email'];
	$_SESSION['price']= '10';
	$_SESSION['bool']=False;

	echo '<meta http-equiv = "refresh" content = "0; url = http://192.168.99.100/includes/login_n.php" />';
		//echo "<br>".$Row['firstname'].",you have successfully logged in<br>Your Username is: ".$Row['email'];
		//header("Location: ../includes/items.php");
		
	//include_once 'items.php';
	}
	else{echo '<meta http-equiv = "refresh" content = "0; url = http://192.168.99.100/" />';}
?><!--
<!DOCTYPE html>
<html>
<head>
	<title>LogIn</title>
</head>
<body>
	<br><br>
<button onclick="location.href = 'items.php';" >to items</button>
<button onclick="location.href = 'custdet.php';" >change account details</button>
<button onclick="location.href = 'delcust.php';" >delete account</button>
<button onclick="location.href = 'phoneno.php';" >add phone no.</button>
</body>
</html>
-->