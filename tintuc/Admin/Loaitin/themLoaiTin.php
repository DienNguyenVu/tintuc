<?php
ob_start(); 
session_start();

require '../../lib/dbCon.php';
require '../../lib/quantri.php';
?>
<?php 
if (isset($_POST['btnThem']))
{
	$Ten 			=$_POST['txtThem'];
	$Ten_KhongDau	=changeTitle($Ten);
	$ThuTu 			=$_POST['txtThuTu']; 	settype($ThuTu, "int");
	$AnHien 		=$_POST['AnHien']; 		settype($AnHien, "int");
	$idTL 			=$_POST['idTL']; 		settype($idTL, "int");

	$conn=myConnect();
		$qr="
	INSERT INTO loaitin VALUES (
		null,
		'$Ten',
		'$Ten_KhongDau',
		'$ThuTu',
		'$AnHien',
		'$idTL'
								)
	";
	mysqli_query($conn,$qr);
	header("location:index.php");

}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="layout.css">
		<style>
	table,tr
{
	width: 1000px;
	height: 50px;
    border: 1px solid black;
    color: black;
}
	</style>
</head>
<body>
<form action="" method="POST" accept-charset="utf-8">
<table>


	<tr >
		<tr>
			<td colspan="2">Thêm Thể Loại</td>
		</tr>
		<tr>
			<td>Tên</td>
			<td>
				<input type="text" name="txtThem" id="txtThem" placeholder=" ko dc bỏ trống">
			</td>
		</tr>
		<tr>
			<td>Thứ Tự</td>
			<td>
				<input type="text" name="txtThuTu" id="txtThuTu" placeholder=" ko dc bỏ trống">
			</td>
		</tr>
		<tr>
			<td>Ẩn Hiện</td>
			<td>
				<input type="radio" name="AnHien" id="AnHien" value="1" checked>Hiện
				<input type="radio" name="AnHien" id="AnHien" value="0">Ẩn
			</td>
		</tr>
		<tr>
			<td>idTL</td>
			<td>
				<select name="idTL" id="idTL" >
				<?php 
				$theloai=DanhSachTheLoai();
				while ($row_theloai=mysqli_fetch_array($theloai)) {
				
				 ?>
				<option value="<?php echo $row_theloai['idTL'] ?>">
					<?php echo $row_theloai['TenTL'] ?>
				</option>
				<?php 
				}
				?>
			</select></td>
		</tr>
		<tr>
			<td>1</td>
			<td>
				<button type="submit" name="btnThem" id="btnThem">Thêm</button>
			</td>
		</tr>
	</tr>
</table>		
</form>

</body>
</html>