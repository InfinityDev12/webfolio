<?php
error_reporting(0);
session_start();
require_once "koneksi.php";
$id_user=$_GET['id_user'];
if (isset($id_user))
{	
 $folder = "foto_profil/";
 $folder = $folder . basename( $_FILES['gmb']['name']);
 $gambar = ($_FILES['gmb']['name']);
 if(is_file($nama['file']))
 unlink($nama['file']);
 $kueri = mysql_query ("UPDATE USER set foto_profil='$gambar' WHERE id_user='$id_user'");
 if ($kueri) {
move_uploaded_file($_FILES['gmb']['tmp_name'], $folder);
echo "
<script>alert('Foto Berhasil Diupload');window.location='index.php'</script>
";
 }
 else { 
echo "gagal";}
}
 ?>