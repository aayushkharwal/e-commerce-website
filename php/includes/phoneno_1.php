<?php
session_start();
include_once 'dbh.php';
$customer_id=$_SESSION['uid'];
$phoneno=$_POST['phoneno'];
$sql="insert into phonenos values($customer_id,$phoneno);";
mysqli_query($conn,$sql);
echo '<meta http-equiv = "refresh" content = "0; url = https://mywebsite-ecommerce.herokuapp.com/includes/login_n.php" />';
?>
