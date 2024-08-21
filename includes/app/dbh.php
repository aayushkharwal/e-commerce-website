<?php


//echo $_SESSION["uid"]."dbh<br>";
//gives error first time for reasons unknown to me,works fine if the page is refreshed once
	$host = 'db';
	$user = 'devuser';
	$password = 'devpass';
	$db = 'test_db';

	$conn = new mysqli($host,$user,$password,$db);
	if ($conn->connect_error){
		echo "Failed";
	}?>