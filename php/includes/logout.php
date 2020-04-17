<?php
session_start();
include_once 'dbh.php';
session_unset();
session_destroy();
//echo $_SESSION["uid"]."dbh<br>";
echo '<meta http-equiv = "refresh" content = "0; url = http://192.168.99.100/" />';

?>