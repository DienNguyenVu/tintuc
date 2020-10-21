
<?php
ob_start(); 
session_start();

require '../../lib/dbCon.php';
require '../../lib/quantri.php';
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
<table>
	<tr>
		
		<tr>
			<td>Tiêu Đề</td>
			<td><input type="text" name="" value="" placeholder=""></td>
			
		</tr>
		<tr>
			<td>Tóm Tắt</td>
			<td><textarea name=""></textarea></td>
		</tr>
		<tr>
			<td>UrlHinh</td>
			<td><input type="file" name="" value="" placeholder=""></td>
			
		</tr>
		<tr>
			<td>content</td>
			<td><textarea name=""></textarea></td>
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
			<td><button type="">Thêm</button></td>
			
		</tr>
		
		
	</tr>
</table>
</body>
</html>