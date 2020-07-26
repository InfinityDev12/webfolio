<?php
require_once"header.php";
header_admin();
echo "<br><Br><br><br>";
?>
<?php
$kueri = mysql_query ("SELECT * FROM image WHERE status='vertifikasi'");
$byk = mysql_num_rows($kueri);
echo "
<div class='container'>
<div class='col-md-3'>
</div>

<div class='panel panel-primary'>
			<div class='panel-heading'>
			<h3 class='panel-title'> Gambar : $byk </h3>
	 </div>
		<table class='table'>
			";
$kueri = mysql_query ("SELECT * FROM image WHERE status='vertifikasi'");
$no=0;
while ($data=mysql_fetch_array($kueri))
	{
	$no++;
	echo "
		<tr>
		<td><center>$no</center></td>
		<td><center>$data[username] ($data[id_user])</center></td>
		<td><center><img src='$data[file]' width='150px' height='150px' class='img img-thumbnail'/></center></td>
		<td><br><br><br>
		<br><a href='?id=$data[id_image]' ><button class='btn btn-info'><span class='glyphicon glyphicon-check'></span> Vertifikasi</button></a></td>
		</tr>
	"
	;
	}
	echo"
			</table>

		<div class='col-md-3'>
		</div>
		</div>";	
	if (isset($_GET['id']))
	{	
	$id=$_GET['id'];
	$hapus = mysql_query("UPDATE image set status='sudah_vertifikasi' WHERE id_image='$id'");
	if ($hapus)
	{
		echo "<script>alert('Gambar Telah diizinkan!');window.location='vertifikasi-gambar.php'</script>";
		
	}
	}
?>
</div>