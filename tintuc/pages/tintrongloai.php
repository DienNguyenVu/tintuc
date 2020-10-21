<?php
$idLT=$_GET["idLT"];
settype($idLT, "int");// khi lấy là kiểu string ép vè kiểu số nguyên int 
?>


<?php 
$bc =breadCrumb($idLT);
$row_bc=mysqli_fetch_array($bc);
?>

<div>
Trang Chủ >> <?php echo $row_bc['TenTL'] ?> >> <?php echo $row_bc['Ten'] ?>
</div>


<?php
$sotin1trang=4;
    if (isset($_GET['trang']))
    {
        $trang=$_GET['trang'];
        settype($trang, int);
    }else
    {
        $trang=1;
    }
$from=($trang-1)*$sotin1trang;
$tin =Tin_TheoLoaiTin_PhanTrang($idLT,$from,$sotin1trang);
while ($row_tin=mysqli_fetch_array($tin))
{
    
?>
<div class="box-cat">
	<div class="cat1">
        <div class="clear"></div>
        <div class="cat-content">
        	<div class="col0 col1">
            	<div class="news">
                    <h3 class="title" ><a href="index.php?p=chitiettin&idTin=<?php echo $row_tin['idTin'] ?>"><?php echo $row_tin['TieuDe'] ?></a></h3>
                    <img class="images_news" src="upload/tintuc/<?php echo $row_tin['urlHinh'] ?>" align="left" />
                    <div class="des"><?php echo $row_tin['TomTat'] ?></div>
                    <div class="clear"></div>
				</div>
            </div>
        </div>
    </div>
</div>
<?php 
}
?>


<!-- box cat-->


<?php 
$t=Tin_TheoLoaiTin($idLT);//b2 đếm xem có bao nhiêu tin 
$tongsotin=mysqli_num_rows($t);// từ số tin tính ra tổng số ting
$tongsotrang =ceil($tongsotin/$sotin1trang);// tông số tin tính số trang
for ($i = 1; $i <=$tongsotrang; $i++)
{
?>
<a href="index.php?p=tintrongloai&idLT=<?php echo $idLT ?>&trang=<?php echo $i ?>"><?php echo $i ?></a>
<?php } ?>

