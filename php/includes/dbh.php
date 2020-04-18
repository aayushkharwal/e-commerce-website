<?php


//echo $_SESSION["uid"]."dbh<br>";
//gives error first time for reasons unknown to me,works fine if the page is refreshed once
	$host = 'ec2-176-34-97-213.eu-west-1.compute.amazonaws.com';
	$user = 'zgvgapjagddovz';
	$password = 'a266d3681f854db006391c59798d0583bd67ddf0ed27844b6f78f6e6d57858d5';
	$db = 'dckbu2aghbqmsk';
	$port = 5432;

	$conn = new mysqli($host,$user,$password,$db,$port);
	if ($conn->connect_error){
		echo "Failed";
	}?>	
