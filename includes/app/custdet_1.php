<?php
session_start();
include_once 'dbh.php';

$Err="";
if (empty($_POST["bdate"])) {
    $dobErr = "Date is required";
  } else {
    $temp=$_POST['bdate'];
    echo $temp;
     $dob = strtotime($_POST["bdate"]);
  $dob = date('Y-m-d', $dob);
  echo $dob;
    
  }
  if (empty($_POST["fname"])) {
    $Err = "Firstname is required<br>";
  } else {
    $firstname = test_input($_POST["fname"]);
    
    if (!preg_match("/^[a-zA-Z ]*$/",$firstname)) {
      $Err .= "Only letters and white space allowed<br>"; 
    }
}
   if (empty($_POST["lname"])) {
    $Err .= "Lastname is required<br>";
  } else {
    $lastname = test_input($_POST["lname"]);
    
    if (!preg_match("/^[a-zA-Z ]*$/",$lastname)) {
      $Err .= "Only letters and white space allowed<br>"; 
    }
  }
 

  if (empty($_POST["address"])) {
    $Err .= "Address is required<br>";
  } else {
    $address = test_input($_POST["address"]);
  }

  if (empty($_POST["gender"])) {
    $Err .= "Gender is required<br>";
  } else {
    $gender = test_input($_POST["gender"]);
  }

  if (empty($_POST["phone"])) {
    $Err .= "Phone Number is required<br>";
  } else {
    $phone = ($_POST["phone"]);
    
    if (!preg_match("/^\d{10}$/",$phone)) {
      $Err .= "Please enter a valid phone number<br>"; 
      
    }
    
}
 if (empty($_POST["password_1"]) || empty($_POST["password_2"])) {
    $password=$_SESSION["password"];
  } else {
    $password_1=$_POST["password_1"];
    $password_2=$_POST["password_2"];
    if($password_1!=$password_2){
    $Err .= "Passwords do not match<br>";
  }else{
    $password=md5($password_1);
  }
  }
  

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
//echo $firstname,$lastname,$phone,$address,$gender,$password_1;
//UPDATE `customers` SET `firstname` = 'harshaa' WHERE `customers`.`id` = 54;
if (empty($Err)) {
  $customer_id=$_POST["customer_id"];
$sql="update customers set firstname = '$firstname',lastname = '$lastname',dob='$dob', phone = $phone,address = '$address',gender ='$gender',password='$password'  WHERE id=$customer_id;";
  
$_SESSION["firstname"]= $firstname;
$_SESSION["lastname"]= $lastname;
$_SESSION["dob"]= $dob;
$_SESSION["phone"]= $phone;
$_SESSION["address"]= $address;
$_SESSION["lastname"]= $lastname;
$_SESSION["gender"]= $gender;
$_SESSION["password"]= $password;

  
if (mysqli_query($conn,$sql)){
  echo "Account details updated successfuly";
  echo '<meta http-equiv = "refresh" content = "0; url = http://192.168.99.100/includes/login_n.php" />';
  
} else { 
  echo "Error: ".$sql."<br>".mysqli_error($conn);
}
}else{echo "<br>Error: Missing Fields <br>" .$Err;}
?>
