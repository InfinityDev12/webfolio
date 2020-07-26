<?php
require_once "koneksi.php";
if ($_GET["id"])
{
$kueri = mysql_query("UPDATE user SET status='user' WHERE id_user='$_GET[id]'");
if ($kueri)
echo "<script>window.alert('Status telah diubah!');window.location='user.php'</script>";
}
?>