<?php
session_start();
require_once "cssfungsi.php";
@css();
require_once"koneksi.php";
$username = $_POST['username'];
$pass = $_POST['password'];
$cekuser = mysql_query("SELECT * FROM user WHERE username = '$username' || email = '$username'");
$jumlah = mysql_num_rows($cekuser);
$hasil = mysql_fetch_array($cekuser);
if (empty($_POST['username']) || empty ($_POST['password']))
{
	echo "<script>alert('Masukan username dan password');window.location='login.php'</script>";
}
else if($jumlah == 0) 
{
echo "<script>swal({
					title: 'Username Belum Terdaftar!',
					text: 'Silahkan Mendaftar Terlebih Dahulu!',
					type: 'error',
					showConfirmButton: false,
					timer: 2000,},function(){window.location.href = 'daftar.php';});
	  </script>";
}
else if ($pass <> $hasil['password'])
{
	echo "<script>swal({
					title:'Username / Password Salah!',
					text: 'Silahkan Cek Kembali!',
					type: 'error',
					showConfirmButton: false,
					timer: 2000,},function(){window.location.href = 'login.php';});
	  </script>";
}
else 
{
	$_SESSION['status'] =$hasil ['status'];
	$_SESSION['username'] = $hasil['username'];
	if ($_SESSION["status"]=="banned")
	{
		unset($_SESSION['username']);
		unset($_SESSION['status']);
	echo "<script>swal({
					title:'Akun Ini Dibanned!',
					text: '',
					type: 'error',
					showConfirmButton: false,
					timer: 2000,},function(){window.location.href = 'index.php';});
	  </script>";
	}
	else
	{
	echo "<script>swal({
					title:'Anda Berhasil Login!',
					text: 'Selamat Datang!',
					type: 'success',
					showConfirmButton: false,
					timer: 2000,},function(){window.location.href = 'home.php';});
	  </script>";
	}
}
?>
