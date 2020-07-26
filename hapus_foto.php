<?php
require_once"header.php";
header_admin();
echo "<br><Br><br><br>";
?>
<?php
$kueri = mysql_query ("SELECT * FROM image WHERE status='sudah_vertifikasi'");
$byk = mysql_num_rows($kueri);
echo "
<div class='container'>
<div class='panel panel-primary'>
			<div class='panel-heading'>
			<h3 class='panel-title'> Gambar : $byk </h3>
	 </div>
	 <div class='panel-body'>
		<table class='table table-bordered text-center'>
		<tr>
			<td>No</td>
			<td>Username</td>
			<td>Gambar</td>
			<td>Opsi</td>
		</tr>
			";
$kueri = mysql_query ("SELECT * FROM image JOIN user USING(id_user) WHERE image.status='sudah_vertifikasi' ORDER by id_image DESC");
$no=0;
while ($data=mysql_fetch_array($kueri))
{
	$no++;
	echo "
		<tr>
		<td>$no</td>
		<td>$data[username]</td>
		<td><img src='$data[file]' width='150px' height='150px' class='img img-thumbnail'/></td>
		<td><br><a href='?id=$data[id_image]' ><button class='btn btn-danger'><span class='glyphicon glyphicon-trash'></span> Hapus</button></a></td>
		</tr>
	"
	;
	}
	echo"
			</table>
		</div>";	
	if (isset($_GET['id']))
	{	
	$id=$_GET['id'];
	$data = mysql_query("SELECT `file` from `image` where `id_image`='$id'");
	$nama = mysql_fetch_array($data);
	if(is_file($nama['file']))
		unlink($nama['file']);
	$hapus = mysql_query("DELETE from image WHERE id_image='$id'");
	if ($hapus)
	{
		echo "<script>swal({
					title:'Data Berhasil Dihapus',
					text: '',
					type: 'success',
					showConfirmButton: false,
					timer: 2000,},function(){window.location.href = 'hapus_foto.php';});
	  </script>";
		
	}
	}
?>
</div>
</div>