<?php 
session_start();
include_once 'dbh.php'
;?>


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

			background-image: url("mel.jpg");
			/*background-repeat: no-repeat;*/
			background-attachment: fixed;
    		background-position: center center;
    		background-size: cover;

		}
		div.column{
			flex:33.3%%;
			padding: 0 4px;

		}
		body{
			font-family: trebuchet ms;
			text-align: center;
		}
		button {
			background-color: rgb(230,230,230);
    		color: black;
    		border: 2px solid orange; 
			font-size: 18px;
			border-radius: 2px;
			font-family: trebuchet ms;
		}
		button:hover{
			background-color: orange;
			color: white;
		}
		body{
			font-family: trebuchet ms;
			text-align: center;
		}
		button {
			background-color: rgb(230,230,230);
    		color: black;
    		border: 2px solid orange; 
			font-size: 18px;
			border-radius: 2px;
			font-family: trebuchet ms;
		}
		button:hover{
			background-color: orange;
			color: white;
		}
		hr{
			width:50%; 
		}
		div.card{
 				display: inline-block;
 				text-align: center;
 				padding-left: 24px;
 				padding-right: 24px;
 				padding-bottom: 24px;
 				padding-top: 24px;
 			}
 		.card,img {
				box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
			  	max-width: 250px;
			  	max-height: 400px;
			  	margin: auto;
			  	text-align: center;
			  	font-family: trebuchet ms;
			}

		.price {
				  color: grey;
				  font-size: 16px;
		}

			.card button {
			  border: none;
			  outline: 0;
			  padding: 12px;
			  color: white;
			  background-color:  #333;
			  text-align: center;
			  cursor: pointer;
			  width: 100%;
			  font-size: 18px;
			  font-style: normal;
			}

			.card button:hover {
			  background-color: #111;
			color:orange;
			}
			div.but{
				float: left;
				height: 1000px;
				display: block;
				margin: 0 auto;

			}
			button.wel{
				
				background-color: #333;
				color: white;
				border: none;
				width: 300px;
				height: 60px;
				font-size: 18px;
				border-color: transparent;
				border-width: 6px;
				display: block;
				margin: 0 auto;
				float: left;
			}
			.wel button:hover {
			 background-color: #111;
			color:orange;
			}


	</style>
</head>
<body style="font-size: 19px;">
	<div>
	<ul>
		<li style="float: left;"><a href="http://192.168.99.100/includes/login_n.php" class="a">HOME</a></li>
		<li><a href="http://192.168.99.100/includes/logout.php">LOGOUT</a></li>
		<li><a href="http://192.168.99.100/includes/cart2.php">MY CART</a></li>
		<li><a href="http://192.168.99.100/includes/checkout.php">ORDERS</a></li>
		<li><a href="http://192.168.99.100/includes/items.php">PRODUCTS</a></li>
		
	
	</ul>
	<p style="color: orange; font-family: Alegreya; font-size: 55px;">Checkout</p>
	</div>
	<!--<div class="column">
		<img src="laptop7.jpg">
		<img src="board.jpg">
		<img src="laptop1.jpg">
	</div>-->
		<!-- <table align="center">
		<tr>
			<th>ID</th>
			<th>Brand</th>
			<th>Category</th>
			<th>Price</th>
		</tr> -->










<?php
$customer_id=$_SESSION['uid'];

echo "Past order :<br> ";
$sql="select * from items where customer_id = $customer_id";
$result=mysqli_query($conn,$sql);
$resultCheck=mysqli_num_rows($result);
	if($resultCheck>0)
	{	//echo "<br>Brand Category Price";
		while($row=mysqli_fetch_assoc($result))
				{ 
			//echo "<br>"." ".$row['name']." ".$row['category']." - Rs.".$row['price'];
			$iimg=$row['image'];
					echo '<div class="card">';
					echo "<img src='data:image/jpeg;base64,".base64_encode($iimg)."'>";
					echo '<p class="price">'."Rs.".$row['price'].'</p>
					<p>'.$row['name']." ".$row['category'].'</p>';
					echo '</div>';
				}
	}else{echo "No items bought yet!<br>";}






//include_once 'dbh.php';
if(isset($_POST['checkout_redirect'])){

	$price=$_SESSION['price'];
	if($_POST['checkout']=='cash'){
	$sql="insert into orders_cash(customer_id,price) values($customer_id,$price);";
	}else{
	$sql="insert into orders_card(customer_id,price) values($customer_id,$price);";
	}
mysqli_query($conn,$sql);
echo "<br><hr>Current order :<br> ";
$sql=" select * from items where items.id in (select item_id from cart where customer_id='$customer_id');";
	$result=mysqli_query($conn,$sql);
	$resultCheck=mysqli_num_rows($result);
	if($resultCheck>0)
	{	//echo "<br>Brand Category Price<br>";
		while($row=mysqli_fetch_assoc($result))
				{
					//echo " ".$row['name']." ".$row['category']." - Rs.".$row['price']."<br>";
					$iimg=$row['image'];
					echo '<div class="card">';
					echo "<img src='data:image/jpeg;base64,".base64_encode($iimg)."'>";
					echo '<p class="price">'."Rs.".$row['price'].'</p>
					<p>'.$row['name']." ".$row['category'].'</p>';
					echo '</div>';
					
					/* echo '<tr>';
					 echo '<td>'. $row['id'] .'</td>';
					 echo '<td>'. $row['name'] .'</td>';
					 echo '<td>'. $row['category'] .'</td>';
					 echo '<td>'. $row['price'] .'</td>';
					 echo '</tr>';*/
					$iid=$row['id'];

			
					
					$sqll="";
					$sqll="update items set customer_id='$customer_id' where id=$iid;";
					mysqli_query($conn,$sqll);



					$sqlll="";
					$sqlll="delete from cart where item_id=$iid;";
					mysqli_query($conn,$sqlll);
					//$tprice=$tprice + $row['price'];
					//header("Location: ../includes/items.php");
					}//echo "Total price=".$tprice;
					//echo "asa";
		
		}else{echo "Nothing new ordered ";}	

}
		
?>


	</body>
</html>