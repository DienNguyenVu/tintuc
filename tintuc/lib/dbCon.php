<?php
function myConnect() {
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "tintuc";
	$conn = mysqli_connect($servername, $username, $password);
	mysqli_select_db($conn, $dbname);
	mysqli_query($conn," SET NAMES'utf8'");
	
	return $conn;
}
define("URL", "http://localhost/tintuc/")
?>