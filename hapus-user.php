<?php
require_once "koneksi.php";
if ($_GET["id"])
{
$kueri = mysql_query("DELETE from user WHERE id_user='$_GET[id]'");
if ($kueri)
echo "<script>window.alert('User ini telah dihapus!');window.location='user.php'</script>";
}
?>