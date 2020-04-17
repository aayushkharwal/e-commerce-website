<!DOCTYPE html>
<html>
<head>
	<title>Add Contact</title>
	<link href='https://fonts.googleapis.com/css?family=Alegreya' rel='stylesheet'>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <style>
  li {
      float: right;
    }
    li a {
      color: white;
      text-decoration: none;
      display: block;
      font-family: trebuchet ms;
      font-size: 15.5px;
      text-align: center;
      padding-left: 15px;
      padding-right: 15px;
      padding-top: 9px;
      padding-bottom: 11px;
    }

    li a:hover:not(.a) {
      background-color: #111;
      color:orange;
      text-decoration: none;
    }

    ul{
      list-style-type: none;
      margin-right: 0;
      padding-left: 0;
      overflow: hidden;
      background-color: #333;
      margin-top:16px;
      margin-left:7px;
      margin-right: 7px;
      margin-bottom: 13px;
      
    }
    .a:hover{
      background-color: orange;
      color: black;
      text-decoration: none;
    }
    body{
      font-family: trebuchet ms;
      font-size: 15px;
      background-image: url("fef.jpg");
    }
    button {
      background-color: white;
        color: black;
        border: 2px solid orange; 
      font-size: 17.5px;
      border-radius: 2px;
      font-family: trebuchet ms;
    }
    button:hover{
      background-color: orange;
      color: white;
    }
    div.c{
      display: inline-block;
    }
  </style>
  
</head>
<body  style="background-color: rgb(240,240,240); font-size: 18px;">
	<ul>
    <li style="float: left;"><a href="http://192.168.99.100/includes/login_n.php" class="a">HOME</a></li>
    <li><a href="http://192.168.99.100/includes/logout.php">LOGOUT</a></li>
    <li><a href="http://192.168.99.100/includes/cart.php">MY CART</a></li>
    <br>
  </ul>
  <div style="text-align: center;"><br>
  <p style="color: orange; font-family: Alegreya; font-size: 45px">Add Phone Number</p><br>
<form action="phoneno_1.php" method="post">
	<label for="phoneno">Phone no:</label>
      <input type="text" placeholder="Enter no" name="phoneno" ><br><br>
         <button type="submit" name="submit">Submit</button>
</form>
</body>
</html>