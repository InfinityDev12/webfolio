<?php
session_start();
require_once "koneksi.php";
if ($_GET["id"])
{
$kueri=mysql_query("UPDATE user set status='non-aktifkan' WHERE id_user='$_GET[id]'");
$tampil = mysql_query("SELECT * FROM user WHERE id_user='$_GET[id]'");
$kueri=mysql_fetch_array($tampil);
if ($kueri)
	if ($_SESSION['status']==$data['status']='admin')
	{
		echo "<script>window.alert('Status telah diubah!');window.location='user.php'</script>";
	}
	else if ($_SESSION['status']==$data['status']='user')
	{
	unset($_SESSION['username']);
	unset($_SESSION['status']);
		echo "<script>window.alert('Akun ini telah Non-aktif!');window.location='index.php'</script>";
	}
}
?>