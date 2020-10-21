


<?php
ob_start(); 
session_start();
// if(!isset($_SESSION['idUser'])&&$_SESSION['idGroup']!=1)
// {
// 	header('location:../index.php');
// }
require '../../lib/dbCon.php';
require '../../lib/quantri.php';
?>
<?php 

$idLT=$_GET['idLT']; settype($idLT, "int");
$row_loaitin=ChiTietLoaTin($idLT);

?>


<?php 
if (isset($_POST['btnSua']))
{
	$Ten 			=$_POST['txtThem'];
	$Ten_KhongDau	=changeTitle($Ten);
	$ThuTu 			=$_POST['txtThuTu']; 	settype($ThuTu, "int");
	$AnHien 		=$_POST['AnHien']; 		settype($AnHien, "int");
	$idTL 			=$_POST['idTL']; 		settype($idTL, "int");

	$conn=myConnect();
		$qr="
	UPDATE  loaitin SET
		Ten 		='$Ten',
		Ten_KhongDau='$Ten_KhongDau',
		ThuTu 		='$ThuTu',
		AnHien		='$AnHien',
		idTL 		='$idTL'
	Where idLT='$idLT'							
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
<form action="" method="POST" accept-charset="utf-8">
<table>
	<tr>
		<tr>
			<td colspan="2">Sửa Thể Loại</td>
		</tr>
		<tr>
			<td>Ten</td>
			<td>
				<input value="<?php echo $row_loaitin['Ten'] ?>" type="text" name="txtThem" id="txtThem">
			</td>
		</tr>
		<tr>
			<td>ThuTu</td>
			<td>
				<input value="<?php echo $row_loaitin['ThuTu'] ?>" type="text" name="txtThuTu" id="txtThuTu" >
			</td>
		</tr>
		<tr>
			<td>AnHien</td>
			<td>
				<input <?php if( $row_loaitin["AnHien"]==1) echo "checked='checked'" ?> type="radio" name="AnHien" id="AnHien" value='1' >Hiện
				<input <?php if( $row_loaitin["AnHien"] ==0) echo " "?> type="radio" name="AnHien" id="AnHien" value="0">Ẩn
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

				<option <?php if($row_theloai["idTL"] == $row_loaitin["idTL"]) echo "selected='selected'" ?>
				value="<?php echo $row_theloai['idTL'] ?>">
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
				<button type="submit" name="btnSua" id="btnSua">Sửa
				</button>
			</td>
		</tr>
	</tr>
</table>		
</form>

</body>
</html>