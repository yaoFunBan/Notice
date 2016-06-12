<?php
//	 $host = "202.12.97.33";
//	 $user = "cad";
//	 $password = "acsxblqb";
//	 $dbname = "cad";

$host = "localhost";
$user = "root";
$password = "";
$dbname = "cad";

$conn = mysqli_connect($host, $user, $password, $dbname);
if (!$conn) {
    die("Can not connect Ddatabase: " . mysqli_connect_errno());
}
mysqli_query($conn, "SET NAMES UTF8");

//$conn = mysql_connect($host, $user, $password) or die("Can not connect Database");
//$db = mysql_select_db($dbname) or die("Disconnect");
//mysql_query("SET NAMES UTF8");

?>