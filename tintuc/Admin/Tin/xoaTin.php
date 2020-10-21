<?php
ob_start(); 
session_start();
require '../../lib/dbCon.php';
require '../../lib/quantri.php';
?>

<?php 
$idTin=$_GET['idTin']; 
settype($idTin, "int");
$conn=myConnect();
		$qr="
	DELETE 
	FROM tin
	WHERE idTin='$idTin'							
	";
	mysqli_query($conn,$qr);
	header ("location:index.php");
?>