<?php
session_start();
include_once 'dbh.php';
$customer_id=$_SESSION["uid"];
echo $customer_id;
$sql="delete from customers where id='$customer_id';";
  	if(mysqli_query($conn,$sql)){
  	echo '<meta http-equiv = "refresh" content = "0; url = http://192.168.99.100/" />';
  }
  ?>