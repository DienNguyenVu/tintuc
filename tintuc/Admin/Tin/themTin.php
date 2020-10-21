<?php
ob_start(); 
session_start();

require '../../lib/dbCon.php';
require '../../lib/quantri.php';
?>
<?php 
if(isset($_POST['btnThem']))
{
	$TieuDe= 			$_POST['TieuDe'];
	$TieuDe_khongDau=	changeTitle($TieuDe);
	$TomTat=			$_POST['TomTat'];
	$UrlHinh=			$_FILES['urlHinh']['name'];
	$Ngay=				date("Y-m_d");
	$idUser=			$_SESSION['idUser'];
	$Content=			$_POST['ConTent'];
	$idLT=				$_POST['idLT'];
	$idTL=				$_POST['idTL'];
	$solanxem=			0;
	$tinNB=				$_POST['tinNB'];
	$AnHien=			$_POST['AH'];

		$conn=myConnect();
		$qr="
	INSERT INTO tin VALUES 
	(
		null,
		'$TieuDe',
		'$TieuDe_khongDau',
		'$TomTat',
		'$UrlHinh',
		'$Ngay',
		'idUser'
		'$Content',
		'$idLT',
		'$idTL',
		'$solanxem',
		'$tinNB',
		'$AnHien'
		)
	";
	move_uploaded_file($_FILES['urlHinh']['tmp_name'], "../..upload/tintuc/$urlHinh");
	mysqli_query($conn,$qr);
	echo $qr;
	exit;
	header("location:index.php");
}

 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="layout.css">
		<style>
	table
{
	width: 1000px;
	height: 50px;
    border: 2px solid black;
    color: black;
}
	</style>
</head>
<body>
<form action="themTin.php" method="post" accept-charset="utf-8" enctype="multipart/form-data">
	<table>
		<tr>
			<tr>
				<td>Tiêu Đề</td>
				<td><input type="text" name="TieuDe" value="" placeholder=""></td>	
			</tr>
			<tr>
				<td>Tóm Tắt</td>
				<td><textarea name="TomTat"></textarea></td>
			</tr>
			<tr>
				<td>UrlHinh</td>
				<td><input type="file" name="urlHinh" value="" placeholder=""></td>
				
			</tr>
			<tr>
				<td>content</td>
				<td><textarea name="ConTent"></textarea></td>
			</tr>
			<tr>
				<td>idTL</td>
				<td><label for="idTL"></label>
					<select name="idTL" id="idTL" >
					<?php
					$theloai=DanhSachTheLoai();
					while ( $row_theloai=mysqli_fetch_array($theloai)) {
						
					?>
						<option value='<?php echo $row_theloai['idTL'] ?>'>
							<?php echo $row_theloai["TenTL"] ?>
						</option>
					<?php 
					}
					?>
					</select>
				</td>
				
			</tr>
			<tr>
				<td>idLT</td>
				<td>
					<label for="idLT"></label>
					<select name="idLT" id="idLT" >
					<?php
					$loaitin=DanhSachLoaiTin();
					while ( $row_theloai=mysqli_fetch_array($loaitin)) {
						
					?>
						<option value='<?php echo $row_theloai['idLT'] ?>'>
							<?php echo $row_theloai["Ten"] ?>
						</option>
					<?php 
					}
					?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Tin Nổi Bậc</td>
				<td>
					<input type="radio" name="tinNB" value="" placeholder="">NB
					<input type="radio" name="tinNB" value="" placeholder="">BT
				</td>
				
			</tr>
			<tr>
				<td>AnHIEN
				</td>
				<td>
					<input type="radio" name="AH" value="" placeholder="">Ản
					<input type="radio" name="AH" value="" placeholder="">Hiện
				</td>
			</tr>
			<tr>
				<td></td>
				<td><button type="" name="btnThem">Thêm</button></td>
				
			</tr>
		</tr>
	</table>
</form>
</body>
</html>