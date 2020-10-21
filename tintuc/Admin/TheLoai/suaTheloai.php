<?php
ob_start(); 
session_start();
require '../../lib/dbCon.php';
require '../../lib/quantri.php';
?>
<?php

$idTL=$_GET["idTL"];
settype($idTL, "int");
$row_theloai=ChiTietTheLoai($idTL);

?>
<?php
if (isset($_POST["btnSua"]) )
{
	$TenTL=$_POST["TenTL"];
	$TenTL_KhongDau=changeTitle($TenTL);
	$ThuTu=$_POST["ThuTu"];
		settype($ThuTu, "int");
	$AnHien=$_POST["AnHien"];
		settype($AnHien, "int");

		$conn=myConnect();
		$qr ="
			UPDATE theloai SET 
			TenTL='$TenTL',
			TenTL_KhongDau='$TenTL_KhongDau',
			ThuTu='$ThuTu',
			AnHien='$AnHien'
			WHERE idTL='$idTL'

		";
		$result=mysqli_query($conn,$qr);
header("location:index.php");
}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="layout.css">
	<style>
	table,tr,td
{
	width: 1000px;
	height: 50px;
    border: 2px solid black;
    color: black;
}
	</style>
</head>
<body>
	<div>
		<form action="" method="POST" accept-charset="utf-8">
			
			<table>
			<tr>
					<tr>
						<td>tenTL</td>
						<td><input value="<?php echo $row_theloai['TenTL'] ?>" type="text" id="TenTL" name="TenTL" ></td>
					</tr>
					<tr>
						<td>ThuTu</td>
						<td><input value="<?php echo $row_theloai['ThuTu'] ?>" type="text" id="TenTL"  name="ThuTu" ></td>
					</tr>
					<tr>
						<td>AnHien</td>
						<td>
							<input <?php if( ($row_theloai['AnHien']) ==1) echo 'checked' ?>  type="radio" id="AnHien" name="AnHien" value="1" >Hiện<br>
  							<input  <?php if( ($row_theloai['AnHien']) ==0 ) echo ' ' ?> type="radio" id="AnHien" name="AnHien" value="0">Ẳn
  						</td>
					</tr>
					<tr>
						<td></td>
						<td><button type="submit" id="btnSua"  name="btnSua">Sửa</button></td>
					</tr>

				
			</tr>
		</table>
		</form>
		
	</div>

</body>
</html>