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

			/*background-image: url("1111.jpg");
			/*background-repeat: no-repeat;*/
			background-attachment: fixed;
    		background-position: center center;
    		background-size: cover;
    		font-size: 20px;

		}
		div.column{
			flex:33.3%%;
			padding: 0 4px;

		}
		body{
			font-family: trebuchet ms;
			text-align: center;
			background-image: url("fef.jpg");
			
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
		table {
   			 border-collapse: collapse;
    		width: 90%;
    		float: center;

		}
		/*hr{
			border-color: black;
			color: black;
		}*/
		input{
			font-family: trebuchet ms;
			font-size: 18px;
		}

		th, td {
    		text-align: left;
    		padding: 8px;
    		text-align: center;
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

		/*tr:nth-child(even) {
			background-color: white ;}*/

	</style>
</head>
<body style="font-family: trebuchet ms;">
	<ul>
		<li style="float: left;"><a href="http://192.168.99.100/includes/login_n.php" class="a">HOME</a></li>
		<li><a href="http://192.168.99.100/includes/logout.php">LOGOUT</a></li>
		<li><a href="http://192.168.99.100/includes/cart2.php">MY CART</a></li>
		<li><a href="http://192.168.99.100/includes/checkout.php">ORDERS</a></li>
		<li><a href="http://192.168.99.100/includes/items.php">PRODUCTS</a></li>
		<br>
	</ul>
	<div>
	<!--<p style="color: orange; font-family: Alegreya; font-size: 45px; text-align: center;">Your Cart</p>
	<img src="cartsym.jpg">
</div>-->
			<br>
			<div style="color: orange; font-family: Alegreya; font-size: 55px;">Your Cart
				<img src="cartsym.png" width=50px" style="padding-top: 6px;">
			</div>
			














		
	<!--<div class="column">
		<img src="laptop7.jpg">
		<img src="board.jpg">
		<img src="laptop1.jpg">
	</div>-->
	
	<!--<img src="laptop5.jpg" style="float: right; padding-right: 20px;">-->



<?php
//include_once 'dbh.php';
//echo $uid."this";
$customer_id=$_SESSION['uid'];
//$customer_id=$_POST["customer_id"];
$tprice=0;
if(isset($_POST['remove_item'])){
$ditem_id=$_POST["remove_item"];
$sql="delete from cart where item_id='$ditem_id' and customer_id='$customer_id';";
mysqli_query($conn,$sql);
//echo $ditem;
	//$resultCheck=mysqli_num_rows($result);
}

if(isset($_POST['mybutton'])){
$item_id=$_POST['mybutton'];
//echo $item_id;
}else{
if(!empty($_POST["item_id"]))
	$item_id = $_POST["item_id"];
}


if (empty($item_id)) {
    //echo "<br>No new item added<br>";
    } else {
    
  //  $item_id = $_POST["item_id"];
//$_SESSION['itemid']=$item_id;
//echo $item_id;

		$sql="select * from items where id=$item_id and customer_id is null;";
		$result=mysqli_query($conn,$sql);
		$resultCheck=mysqli_num_rows($result);
		if($resultCheck>0)
		{
		//echo $item_id;
		
		    $sql="insert into cart values ('$customer_id','$item_id');";
			//$sql="UPDATE items SET customer_id = $customer_id WHERE items.id = $item_id AND customer_id is NULL;";
			 if(mysqli_query($conn,$sql))
				{
				//echo "<br><br>Items table updated<br>";
				$sql="select * from items where id=$item_id and customer_id is null;";
			  	$result=mysqli_query($conn,$sql);
				$resultCheck=mysqli_num_rows($result);
					if($resultCheck>0)
					{	
						$row=mysqli_fetch_assoc($result);
						echo "<br>Latest: ".$row['name']." ".$row['category']." has been added to your cart"."<br>";


						//header("Location: ../includes/items.php");

					}
			}else{echo "<br>Item already in cart<br>";}	

		
		}	else{	echo "No such item exists<br> ";
			//exit();
	}	
}
echo '<hr width="90%">';
			
	$sql=" select * from items inner join cart on items.id=cart.item_id where cart.customer_id='$customer_id';";// where items.id in (select item_id from cart where customer_id='$customer_id');";
	$result=mysqli_query($conn,$sql);
	$resultCheck=mysqli_num_rows($result);
	if($resultCheck>0)
	{	//echo "<br>Brand Category Price(Rs.)";
		while($row=mysqli_fetch_assoc($result))
				{
					$iimg=$row['image'];
					echo '<div class="card">';
					echo "<img src='data:image/jpeg;base64,".base64_encode($iimg)."'>";
					echo '<p class="price">'."Rs.".$row['price'].'</p>
					<p>'.$row['name']." ".$row['category'].'</p>';

					echo '<form action="cart2.php" method="post">';
					echo "<p><button value='".$row['id']."'  name='remove_item'>Remove</button></p>";
					echo '</form></div>';
		
	//echo "<br>".$row['id']." ".$row['name']." ".$row['category']." ".$row['price'];
		//$tprice=$tprice + $row['price'];
		//header("Location: ../includes/items.php");
}//echo "Total price=".$tprice;
		
		}else{echo "No items in your cart<br>";}	



     $sql="select sum(price) from items where items.id in(select item_id from cart where customer_id='$customer_id');";
     $result=mysqli_query($conn,$sql);
	//$resultCheck=mysqli_num_rows($result);
	$row=mysqli_fetch_assoc($result);
	if($row['sum(price)']==NULL){
		//echo '<hr width="90%">';
	//echo "Total price=". $row['sum(price)']."<br>";
	//echo '<hr width="90%">';
	$row['sum(price)']=0;
	}
	$_SESSION['price']= $row['sum(price)'];

?>













	<hr width="90%">


 <div style="float: right; padding-right: 72px;">
<form action="checkout.php" method="POST">
<label for="payment">Payment Option:</label> 
      <label class="radio-inline"><input type="radio" name="checkout" value="cash" checked>Cash</label>
      <label class="radio-inline"><input type="radio" name="checkout" value="card">Card</label>
      <button type="submit" name= "checkout_redirect">Checkout</button> 
      <?php echo 'Total: Rs.'.$row['sum(price)']; ?>
</form>
</div>


</body>
</html>
