<?php 
function TinMoiNhat_MotTin(){
	$conn=myConnect();
	$qr="
		select * from Tin 
		order by idTin desc
		limit 0,1;
	";
	$result=mysqli_query($conn,$qr);

return $result;
}
function TimKiem($tukhoa){
	$conn=myConnect();
	$qr="
		select * from Tin 
		where TieuDe REGEXP '$tukhoa'
		order by idTin desc
	";
	$result=mysqli_query($conn,$qr);

return $result;
}
	
function TinMoiNhat_BonTin(){
	$conn=myConnect();
	$qr="
		select * from Tin 
		order by idTin desc
		limit 1,6;
	";
	$result=mysqli_query($conn,$qr);

return $result;
}
function TinXemNhieuNhat(){
	$conn=myConnect();
	$qr="
		select * from Tin 
		order by solanxem desc
		limit 0,6;
	";
	$result=mysqli_query($conn,$qr);

return $result;
}
function TinMoiNhat_TheoLoaiTin_MotTin($idLT){
	$conn=myConnect();
	$qr="
		select * from Tin 
		where idLT=$idLT
		order by idTin desc
		limit 0,1;
	";
	$result=mysqli_query($conn,$qr);

return $result;
}
function TinMoiNhat_TheoLoaiTin_BonTin($idLT){
	$conn=myConnect();
	$qr="
		select * from Tin 
		where idLT=$idLT
		order by idTin desc
		limit 1,6;
	";
	$result=mysqli_query($conn,$qr);

return $result;
}
function TenLoaiTin($idLT)
{
	$conn=myConnect();
	$qr="
		select Ten from Loaitin
		where idLT=$idLT
	";
	$loaitin=mysqli_query($conn,$qr);
	$row=mysqli_fetch_array($loaitin);
	
	return $row['Ten'];
}
function QuangCao($vitri)
{
	$conn=myConnect();
	$qr="
		select * from quangcao 
		where vitri=$vitri
		
	";
	$result=mysqli_query($conn,$qr);

return $result;
}
function DanhSachTheLoai()
{
	$conn=myConnect();
	$qr="
		select * from Theloai 
	";
	$result=mysqli_query($conn,$qr);

return $result;
}
function DanhSachLoaiTin_Theo_TheLoai($idTL)
{
	$conn=myConnect();
	$qr="
		select * from loaitin
		where idTL=$idTL
	";
	$result=mysqli_query($conn,$qr);

return $result;
}
function TinMoi_BenTrai($idTL)
{
	$conn=myConnect();
	$qr="
		select * from tin
		where idTL=$idTL
		order by idTin desc
		limit 0,1
	";
	$result=mysqli_query($conn,$qr);

return $result;
}
function TinMoi_BenPhai($idTL)
{
	$conn=myConnect();
	$qr="
		select * from tin
		where idTL=$idTL
		order by idTin desc
		limit 1,2
	";
	$result=mysqli_query($conn,$qr);

return $result;
}
function Tin_TheoLoaiTin($idLT)// cần biết hiện tin theo laoij nào
{
	$conn=myConnect();
	$qr="
		select * from tin
		where idLT=$idLT
		order by idTin desc

	";
	$result=mysqli_query($conn,$qr);
return $result;
}
function breadCrumb($idLT)// cần biết hiện tin theo laoij nào
{
	$conn=myConnect();
	$qr="
		select TenTL,Ten 
		from theloai,loaitin
		where theloai.idTL=loaitin.idTL
		and idLT=$idLT
	";
	$result=mysqli_query($conn,$qr);
return $result;
}
function Tin_TheoLoaiTin_PhanTrang($idLT,$from,$sotin1trang)// cần biết hiện tin theo laoij nào
{
	$conn=myConnect();
	$qr="
		select * from tin
		where idLT=$idLT
		order by idTin desc
		limit $from,$sotin1trang

	";
	$result=mysqli_query($conn,$qr);
return $result;
}
function ChiTietTin($idTin)// cần biết hiện tin theo laoij nào
{
	$conn=myConnect();
	$qr="
		select *
		from tin
		where idTin=$idTin
	";
	$result=mysqli_query($conn,$qr);
return $result;
}
function TinCungLoaiTin($idTin,$idLT)// cần biết hiện tin theo laoij nào
{
	$conn=myConnect();
	$qr="
		select *
		from tin
		where idTin<>$idTin and idLT=$idLT
		order by rand()
		limit 0,3
	";//tin cung loai khac tin đang xem
	$result=mysqli_query($conn,$qr);
return $result;
}

function CapNhatSoLanXem($idTin)
{
	$conn=myConnect();
	$qr="
		UPDATE tin
		SET solanxem =SoLanXem + 1
		where idTin=$idTin
	";//tin cung loai khac tin đang xem
	$result=mysqli_query($conn,$qr);

}
?>