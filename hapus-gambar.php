<?php
require_once "koneksi.php";
if (isset($_GET["id"]))
{
	$id = $_GET["id"];
	$data = mysql_query("SELECT `file` from `image` where `id_image`='$id'");
	$nama = mysql_fetch_array($data);
		if(is_file($nama['file']))
		unlink($nama['file']);
	$kueri = mysql_query("DELETE from image WHERE id_image='$id'");
	if ($kueri)
		echo "<script>window.alert('Berhasil dihapus!');window.location='home.php'</script>";
}
?>