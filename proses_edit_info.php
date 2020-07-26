<?php
require_once "koneksi.php";
	$id= $_POST['id_user'];
	$nama_profil = ucwords($_POST['nama_profil']);
	$ket = $_POST['keterangan'];
	$location = $_POST['location'];
	$kueri = mysql_query ("UPDATE user set nama_profil='$nama_profil', keterangan='$ket', location='$location' WHERE id_user='$id'");
	if ($kueri)
	{
		echo "<script>window.alert('Berhasil diupdate');window.location='home.php'</script>";
	}
	else
	{
		echo "gagal update".mysql_error();
	}
?>