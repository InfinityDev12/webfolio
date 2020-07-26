<?php
require_once "cssfungsi.php";
@css();
session_start();
require_once "koneksi.php";
if ($_GET['username']== $_SESSION['username'])
{
if (isset($_GET['username']))
{
	$password_lama=$_POST['password_lama'];
	$password_baru=$_POST['password_baru'];
	$password_ulangi=$_POST['password_ulangi'];
	
	$kueri = mysql_query ("SELECT * from user WHERE username='$_GET[username]'");
	$hasil = mysql_fetch_array($kueri);
	
	if(empty($password_baru) && empty($password_ulangi))
	{
	echo "<script>swal({
					title: 'Isi Password Baru!',
					text: '',
					type: 'error',
					showConfirmButton: false,
					timer: 2000,},function(){window.location.href = 'home.php';});
	  </script>";		
	}
	else
	{
	if(!empty($password_lama))
	{
	if ($password_lama != $hasil['password'])
	{
	echo "<script>swal({
					title: 'Password Lama Salah!',
					text: '',
					type: 'error',
					showConfirmButton: false,
					timer: 2000,},function(){window.location.href = 'home.php';});
	 	 </script>";
	}
	else if ($password_baru != $password_ulangi)
	{
		echo "<script>swal({
					title: 'Ulangi Password Dengan Benar!',
					text: '',
					type: 'error',
					showConfirmButton: false,
					timer: 2000,},function(){window.location.href = 'home.php';});
	  </script>";
	}
	
	$update = mysql_query ("UPDATE USER set password='$password_baru' WHERE username='$_GET[username]'");
	if ($update)
	{
	echo "<script>swal({
					title: 'Password Berhasil Diubah',
					text: '',
					type: 'success',
					showConfirmButton: false,
					timer: 2000,},function(){window.location.href = 'home.php';});
	  </script>";
	}
	else 
	{
		echo "gagal";
	}
	}
	else
	{
		echo "<script>swal({
					title: 'Isi Password Lama!',
					text: '',
					type: 'error',
					showConfirmButton: false,
					timer: 2000,},function(){window.location.href = 'home.php';});
	  </script>";		
	}
	}
}
}
?>