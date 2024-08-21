<?php 
session_start();
include_once 'dbh.php';

if(isset($_POST['checkout_redirect']) and $_SESSION['price']>=10){
	$_SESSION['bool']=True;
}
//include_once 'dbh.php';
// if(isset($_POST['checkout_redirect'])){

// 	$price=$_SESSION['price'];
// 	$customer_id=$_SESSION['uid'];
// 	$price=(int)$price;
// 	$sql="insert into orders_card(customer_id,price) values($customer_id,$price);";
// 	 $sql="insert into orders_cash(customer_id,price) values($customer_id,$price);";

// mysqli_query($conn,$sql);

// $sql=" select * from items where items.id in (select item_id from cart where customer_id='$customer_id');";
// 	$result=mysqli_query($conn,$sql);
// 	$resultCheck=mysqli_num_rows($result);
// 	if($resultCheck>0)
// 	{	//echo "<br>Brand Category Price<br>";
// 		while($row=mysqli_fetch_assoc($result))
// 				{
// $iid=$row['id'];

			
					
// 					$sqll="";
// 					$sqll="update items set customer_id='$customer_id' where id=$iid;";
// 					mysqli_query($conn,$sqll);



// 					$sqlll="";
// 					$sqlll="delete from cart where item_id=$iid;";
// 					mysqli_query($conn,$sqlll);

// } } }




include 'src/Instamojo.php';
$api = new Instamojo\Instamojo('test_6fda4a142c17c5cda5dc6ff92ba', 'test_29584b543095eec7c717e1d93be','https://test.instamojo.com/api/1.1/');
try {
    $response = $api->paymentRequestCreate(array(
        "purpose" => "Order_122345678890",
        "amount" => $_SESSION['price'],
        "send_email" => True,
        "email" => $_SESSION["email"],
        "send_sms"=> False,
        "phone"=> $_SESSION["phone"],
        "redirect_url" => "http://192.168.99.100/includes/checkout.php"
        ));
    //print_r($response);

    $pay_url=$response['longurl'];
    header("Location: $pay_url");
}
catch (Exception $e) {
    print('Error: ' . $e->getMessage());
}





;?>
