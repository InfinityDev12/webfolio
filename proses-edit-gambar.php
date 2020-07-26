<?php
require_once "koneksi.php";
	$id= $_POST['id_image'];
	$nama_file = ucwords($_POST['nama_file']);
	$deskripsi = $_POST['deskripsi'];
	$kategori_file = $_POST['kategori_file'];
	$kueri = mysql_query ("UPDATE image set nama_file='$nama_file', deskripsi='$deskripsi', kategori_file='$kategori_file' WHERE id_image='$id'");
	if ($kueri)
	{
		echo "<script>window.alert('Berhasil diedit');window.location='home.php'</script>";
	}
	else
	{
		echo "gagal update".mysql_error();
	}
?>