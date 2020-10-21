<?php
ob_start(); 
session_start();
require '../../lib/dbCon.php';
require '../../lib/quantri.php';
?>

<?php 
$idLT=$_GET['idLT']; 
settype($idLT, "int");
$conn=myConnect();
		$qr="
	DELETE 
	FROM loaitin
	WHERE idLT='$idLT'							
	";
	mysqli_query($conn,$qr);
	header ("location:index.php");
?>