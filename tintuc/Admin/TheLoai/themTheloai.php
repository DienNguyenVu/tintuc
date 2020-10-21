<?php
ob_start(); 
session_start();

//require '../../lib/dbCon.php';
require '../../lib/quantri.php';
?>
<?php 
if(isset($_POST['btnThem']) )
{
	$TenTL 			=$_POST["TenTL"];
	$TenTL_KhongDau	=changeTitle($TenTL);
	$ThuTu 			=$_POST["ThuTu"];
	settype($ThuTu, "int");
	$AnHien 		=$_POST["AnHien"];
	settype($AnHien, "int");


	$conn=myConnect();
	$qr="insert into theloai
		values(null,'$TenTL1', '$TenTL_KhongDau','$ThuTu','$AnHien')  ";
	mysqli_query($conn,$qr);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="layout.css">
	<style>
	table,td
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
						<td>Tên Thể Loại</td>
						<td><input type="text" id="TenTL" name="TenTL" value=""></td>
					</tr>
					<tr>
						<td>Thứ Tự</td>
						<td><input type="text" id="ThuTu" name="ThuTu" value=""></td>
					</tr>
					<tr>
						<td>Ẩn Hiện</td>
						<td>
							<input type="radio" id="AnHien" name="AnHien" value="1" checked>Hiện<br>
  							<input type="radio" id="AnHien" name="AnHien" value="0">Ẳn
  						</td>
					</tr>
					<tr>
						<td></td>
						<td><button type="submit" id="btnThem" name="btnThem">Thêm</button></td>
					</tr>

				
			</tr>
		</table>
		</form>
		<a href="index.php" title="">Về Trang chủ nếu bạn không muốn thêm.</a>
	</div>

</body>
</html>