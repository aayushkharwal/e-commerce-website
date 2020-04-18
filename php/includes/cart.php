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

		/*tr:nth-child(even) {
			background-color: white ;}*/

	</style>
</head>
<body style="font-family: trebuchet ms;">
	<ul>
		<li style="float: left;"><a href="https://mywebsite-ecommerce.herokuapp.com/includes/login_n.php" class="a">HOME</a></li>
		<li><a href="https://mywebsite-ecommerce.herokuapp.com/includes/logout.php">LOGOUT</a></li>
		<li><a href="https://mywebsite-ecommerce.herokuapp.com/includes/cart.php">MY CART</a></li>
		<li><a href="https://mywebsite-ecommerce.herokuapp.com/includes/checkout.php">ORDERS</a></li>
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


	<table align="center">
		<tr>
			<th>ID</th>
			<th>Brand</th>
			<th>Category</th>
			<th>Price</th>
		</tr>
<?php
//include_once 'dbh.php';
//echo $uid."this";
$customer_id=$_SESSION['uid'];
//$customer_id=$_POST["customer_id"];
$tprice=0;

if(!empty($_POST["ditem_id"])){
$ditem_id=$_POST["ditem_id"];
$sql="delete from cart where item_id='$ditem_id' and customer_id='$customer_id';";
mysqli_query($conn,$sql);
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
	echo $item_id;
	
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
	}else{echo "<br>Failed to add item<br>";}	

	
	}	else{	echo "No such item id exists<br> ";
		//exit();
}	
}

//$item_id=$_SESSION['itemid'];
if(!empty($_POST["item_id"]))
{
		$sql="select count(item_id) from cart where item_id='$item_id';";
		$result=mysqli_query($conn,$sql);
		$row=mysqli_fetch_assoc($result);
		//echo "<br><br>".$row['count(item_id)'];
		if($row['count(item_id)']>=3){
			//echo "increase price";
			$sql="call priceInc($item_id);";
			mysqli_query($conn,$sql);
		}
 }
	$sql=" select * from items inner join cart on items.id=cart.item_id where cart.customer_id='$customer_id';";// where items.id in (select item_id from cart where customer_id='$customer_id');";
	$result=mysqli_query($conn,$sql);
	$resultCheck=mysqli_num_rows($result);
	if($resultCheck>0)
	{	//echo "<br>Brand Category Price(Rs.)";
		while($row=mysqli_fetch_assoc($result))
				{
					 echo '<tr>';
					 echo '<td>'. $row['id'] .'</td>';
					 echo '<td>'. $row['name'] .'</td>';
					 echo '<td>'. $row['category'] .'</td>';
					 echo '<td>'. $row['price'] .'</td>';
					 echo '</tr>';
		
		//echo "<br>".$row['id']." ".$row['name']." ".$row['category']." ".$row['price'];
		//$tprice=$tprice + $row['price'];
		//header("Location: ../includes/items.php");
}//echo "Total price=".$tprice;
		
		}else{echo "No items in your cart<br>";}	

     $sql="select sum(price) from items where items.id in(select item_id from cart where customer_id='$customer_id');";
     $result=mysqli_query($conn,$sql);
	//$resultCheck=mysqli_num_rows($result);
	$row=mysqli_fetch_assoc($result);
	if($row['sum(price)']!=NULL){
		echo '<hr width="90%">';
	echo "Total price=". $row['sum(price)']."<br>";
	echo '<hr width="90%">';
	$_SESSION['price']= $row['sum(price)'];
	}

?>
</table>

	<hr width="90%">

	<div style="float: right; padding-right: 50px;">
	Remove from cart:<br><br>
	<form action="cart.php" method="POST">
<label for="ditem_id">Item ID:</label>
       <input type="text" pattern="\d*" placeholder="Enter Item Id" name="ditem_id" >
       <br>
              <input type="hidden" name="customer_id" value="<?php echo $_SESSION["uid"];?>" ><br>

 		<button type="submit">Remove item</button>
 	</form><br>
 </div>
 <div style="float: left; padding-left: 72px;">
<form action="checkout.php" method="POST">
<label for="payment">Payment Option:</label> <br>
      <label class="radio-inline"><input type="radio" name="checkout" value="cash" checked>Cash<br></label>
      <label class="radio-inline"><input type="radio" name="checkout" value="card">Card<br></label>

     <br>
      		<button type="submit" name= "checkout_redirect">Checkout</button>
</form>
</div>
<br>

<br><br><br><br><br>
<hr width="90%">
<div style="text-align: center;">
	
<button onclick="location.href = 'items.php';">Back to items</button>
</div>

</body>
</html>
