<?php
ob_start(); 
session_start();
require '../../lib/dbCon.php';
require '../../lib/quantri.php';
?>

<?php 
$idTL=$_GET['idTL']; 
settype($idTL, "int");
$conn=myConnect();
	$qr="
		DELETE 
		FROM theloai
		WHERE idTL='$idTL'							
 	";
	mysqli_query($conn,$qr);
	header("location:index.php");
?>

