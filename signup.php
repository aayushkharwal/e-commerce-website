<!DOCTYPE html>
<html>
<head>
	<title>Signup Page</title>
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
      font-size: 16.5px;
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
    }
    button {
      background-color: white;
        color: black;
        border: 2px solid brown; 
      font-size: 17.5px;
      border-radius: 2px;
      font-family: trebuchet ms;
    }
    button:hover{
      background-color: brown;
      color: white;
    }
    div.c{
      display: inline-block;
    }
    body{
      background-image: url("pat.jpg");
      background-repeat: no-repeat;
      background-attachment: fixed;
        background-position: center center;
        background-size: cover;
        font-size: 19px;
        font-family: trebuchet ms;
    }
  </style>
  
</head>
<body>
  <ul>
    <li><a href="http://192.168.99.100/">LOGIN</a></li>
    <br>
  </ul>
  <div style="text-align: center;">
  <p style="color: white; font-family: Alegreya; font-size: 65px">Register</p><br>
 
 <div>
	<form action="includes/signup_1.php" method="Post">
  	<label for="fname">First Name:</label>
      <input type="text" placeholder="Enter First Name" name="fname" >
     <br><br>
     <label for="lname">Last Name:</label>
      <input type="text" placeholder="Enter Last Name" name="lname" >
     <br><br>
     <label for="bdate">Date of Birth:</label>
      <input style="color: gray;" type="date" placeholder="Enter Date of Birth" name="bdate" >
     <br><br>
     <label for="phone">Contact Number:</label>
      <input type="text" size="10" pattern="\d*" placeholder="Enter Contact Number" name="phone" >
     <br><br>
     <label for="email">Email:</label>
      <input type="text" placeholder="Enter Email" name="email" >
     <br><br>
     <label for="address">Address:</label>
      <input type="text" placeholder="Enter Address" name="address" >
     <br><br>
     <label for="gender">Gender:</label> <br>
      <label class="radio-inline"><input type="radio" name="gender" value="Male" checked>Male <br></label>
      <label class="radio-inline"><input type="radio" name="gender" value="Female">Female <br></label>
      <label class="radio-inline"><input type="radio" name="gender" value="Other">Other </label>
     <br><br>
     <label for="address">Password:</label>
      <input type="Password" placeholder="Enter Password" name="password_1" >
     <br><br>
     <label for="address">Verify Password:</label>
      <input type="Password" placeholder="Re-enter Password" name="password_2" >
     <br><br>
     <button type="submit" name="submit">Submit</button>
   </form>
 </div>
</body>
</html>