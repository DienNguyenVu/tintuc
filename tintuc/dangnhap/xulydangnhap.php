


 <?php 
if(isset($_POST['username'])){
	$un=$_POST['username'];
	$pa=$_POST['password'];
	$ps=md5($pa);
	$conn=myConnect();
		$qr="
		SELECT * FROM users 
		where Uername='$un' and Password='$pa'
	";
	mysqli_query($conn,$qr);
	if(mysqli_num_rows($user)==1)
	{
		$row=mysqli_fetch_arra($user);
		$_SESSION["idUser"]=$row['idUser'];
		$_SESSION["usernam"]=$row['Username'];
		$_SESSION["HoTen"]=$row['HoTen'];
		$_SESSION["idGroup"]=$row['idGroup'];

	}
}
 ?>

