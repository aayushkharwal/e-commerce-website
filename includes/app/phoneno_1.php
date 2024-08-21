<?php
session_start();
include_once 'dbh.php';
$customer_id=$_SESSION['uid'];
$phoneno=$_POST['phoneno'];
$sql="insert into phonenos values($customer_id,$phoneno);";
mysqli_query($conn,$sql);
echo '<meta http-equiv = "refresh" content = "0; url = http://192.168.99.100/includes/login_n.php" />';
?>