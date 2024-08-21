<?php 
session_start();
include_once 'dbh.php'
;?>

<!DOCTYPE html>
 <html>
 <head>
 	<title>Items</title>
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
			font-family: trebuchet ms;
			background-image: url("fef.jpg");
			background-repeat: no-repeat;
			background-attachment: fixed;
    		background-position: center center;
    		background-size: cover;
		}
		button {
			background-color: rgb(235,235,235);
    		color: black;
    		border: 2px solid orange; 
			font-size: 17.3px;
			border-radius: 2px;
			font-family: trebuchet ms;
			font-style: italic;
		}
		button:hover{
			background-color: orange;
			color: white;
		}
		/*div.column{
			/*flex:50%;*/
			/*padding: 4px 4px;
			padding-right: 30px;
		}
		div.row{
/*			/display: flex;
*/  			/*flex-wrap: wrap;*/
  			/*padding: 4px 4px;
		}
		.column img {
  			margin-top: 11px;
  			vertical-align: middle;
  			margin-left: 34px;
		}
		.row img {
 			margin-left: 13px;
  			horizontal-align: middle;
		}*/*/*/
		/*table {
   			 border-collapse: collapse;
    		width: 55%;
    		float: center;
		}


		th, td {
    		text-align: left;
    		padding: 8px;
		}*/
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
 <body style="background-color: floralwhite; font-size: 18px;">
 	<ul>
		<li style="float: left;"><a href="http://192.168.99.100/includes/login_n.php" class="a">HOME</a></li>
		<li><a href="http://192.168.99.100/includes/logout.php">LOGOUT</a></li>
		<li><a href="http://192.168.99.100/includes/cart2.php">MY CART</a></li>
		<li><a href="http://192.168.99.100/includes/checkout.php">ORDERS</a></li>
		<li><a href="http://192.168.99.100/includes/items.php">PRODUCTS</a></li>
		
		<br>
	</ul>
	<!--
	<div class="but">
		<button class="wel" type="submit">ASUS</button><br>
		<button class="wel" type="submit">HP</button><br>
		<button class="wel" type="submit">COMPAQ</button><br>
	</div>
-->
<?php
	 	
$sql="select category from items where customer_id is NULL group by category;";
$result=mysqli_query($conn,$sql);
$resultCheck=mysqli_num_rows($result);
if($resultCheck>0){ 
	echo '<div class="but">';
	while($row=mysqli_fetch_assoc($result))
		{
			echo '<form action="items.php" method="post">
<button class="wel" type="submit" name="ur" value="'.$row['category'].'">'.$row['category'].'</button>
</form> ';
		}
	}else{echo 'No Items';} 
	echo '<form action="items.php" method="post"><button class="wel" type="submit" name="ali" value="ali">All Items</button></form></div>';
?>

<details style="float: right;">
  <summary>Search Bar</summary>
 	<form action="items.php" method="POST">
 		<label for="category">Category:</label>
 		<input type="text" name="category"><br>
 		<br>
 		<label for="brand">Brand:</label>
 		<input type="text" name="brand">



 		<!--
 		<label for="price">Max Range:</label>
 		<input type="range" min="500" max="20000" value="5000" name="price">
 		-->
 		<br><br>
       <button type="submit">Submit</button>
 	</form>
</details><br>
	<!-- <div class="column" style="float: left;">
		<div class="row">
		<img src="laptop7.jpg">
		<img src="laptop1.jpg">
		</div>
		<img src="abc.jpg">
		
	</div> -->
	<!-- <p style="color: orange; font-family: Alegreya; font-size: 48px; text-align: center;">Products</p> -->
<!-- </div> -->
	
 	
	<!-- <table>
		<tr>
			<th>ID</th>
			<th>Brand</th>
			<th>Category</th>
			<th>Price</th>
		</tr> -->
	<?php 
//include_once 'dbh.php';
	//echo "Account Created!<br>".$Row['firstname'].",Your Username is: ".$Row['id'];
	//echo $uid."this";

//$mtch=$_POST['ur'];
//	echo $mtch;

if(isset($_POST['ali'])){
	//$mtch=$_POST['ali'];
	//echo $mtch;
  $sql="select * from items where customer_id is NULL ;";

}else{

if(isset($_POST['ur'])){
	$mtch=$_POST['ur'];
	//echo $mtch;
  $sql="select * from items where category= '$mtch' and customer_id is NULL;";

}else{
	//echo 'yyy111';
if(empty($_POST["category"]) && empty($_POST["brand"]))
{
	//echo 'yyy111';
	/*$sql="create view aitems as select * from items where customer_id is NULL;";
	mysqli_query($conn,$sql);*/
	$sql="select * from items where customer_id is NULL;";
}
else{
	if (empty($_POST["brand"]))
	{
		$category=$_POST["category"];
		$sql="select * from items where customer_id is NULL and category='$category';";
	}else{
		if(empty($_POST["category"]))
			{
			$brand=$_POST["brand"];
			$sql="select * from items where customer_id is NULL and name='$brand';";
			}
			else {
				$brand=$_POST["brand"];
				$category=$_POST["category"];
				$sql="select * from items where customer_id is NULL and name='$brand'and category='$category';";
			}
		}
	}
}

}


	$result=mysqli_query($conn,$sql);
	$resultCheck=mysqli_num_rows($result);
	if($resultCheck>0){	
		//echo "<br>ID Brand Category Price(Rs.)<br>";
		while($row=mysqli_fetch_assoc($result))
				{
					 /*echo '<tr>';
					 echo '<td>'. $row['id'] .'</td>';
					 echo '<td>'. $row['name'] .'</td>';
					 echo '<td>'. $row['category'] .'</td>';
					 echo '<td>'. $row['price'] .'</td>';
					 echo '</tr>';*/
					//echo $row['id']." ".$row['name']." ".$row['category']." ".$row['price']."<br>";
					$iimg=$row['image'];

					echo '<div class="card">';
					echo "<img src='data:image/jpeg;base64,".base64_encode($iimg)."'>";
					echo '<p class="price">'."Rs.".$row['price'].'</p>
					<p>'.$row['name']." ".$row['category'].'</p>';

					echo '<form action="cart2.php" method="post">';
					echo "<p><button value='".$row['id']."'  name='mybutton'>Add to Cart</button></p>";
					echo '</form></div>';
				}
		}else{echo "No items available";}

		
 ?>
<br><br><hr>
<div style="float:right; padding-right: 50px;">
 	<!-- <b>Filters:<br><br></b>
 	<form action="items.php" method="POST">
 		<label for="category">Category:</label>
 		<input type="text" name="category"><br>
 		<br>
 		<label for="brand">Brand:</label>
 		<input type="text" name="brand">

 -->

 		<!--
 		<label for="price">Max Range:</label>
 		<input type="range" min="500" max="20000" value="5000" name="price">
 		-->
 		<!-- <br><br>
       <button type="submit">Submit</button>
 	</form> -->

 	

 <!-- </div>
 	<b>Add Item:<br><br></b>
 	<form action="cart.php" method="POST">

    <label for="item_id">Item ID:</label>
       <input type="text" pattern="\d*" placeholder="Enter Item Id" name="item_id" >
       <br>
       <input type="hidden" name="customer_id" value="<?php echo $_SESSION["uid"];?>" ><br>
       <button type="submit">Add to cart</button>
 	</form> -->
 	

 	
</body>
</html>