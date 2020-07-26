<?php
require"header.php";
session_start();
if ($_SESSION['username'])
{
header_user();
}
else 
{
	modal();
	header_belum_login();
}
?>
<br><br>
<center>
<?php
$kueri = mysql_query("SELECT * FROM image WHERE id_image='$_GET[id_image]'");
$data = mysql_fetch_array($kueri);
echo "$data[nama_file]";
?>