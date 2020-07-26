<?php
session_start();
require_once"koneksi.php";
if (isset($_GET["id"]))
{
	$id = $_GET["id"];
	$kueri = mysql_query("DELETE from komentar WHERE id_komentar='$id'");
	if($kueri)
	echo "<script>window.location='home.php'</script>";
}
?>