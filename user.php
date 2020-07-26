<?php
require_once"header.php";
header_admin();
echo "<br><Br><br><br>";
	if (isset($_SESSION['username']))
	{
?>
<?php
$kueri = mysql_query ("SELECT * FROM user");
$byk = mysql_num_rows($kueri);
echo "
<div class='container'>
<div class='panel panel-primary'>
			<div class='panel-heading'>
			<h3 class='panel-title'> User : $byk </h3>
	 </div>
	 	<table class='table table-bordered text-center tabelcoy'>
		<thead style='font-family:Oswald Regular; text-transform: uppercase;'>
		<tr>
		<td><h6>No</h6></td>
		<td><h6>Username</h6></td>
		<td><h6>Email</h6></td>
		<td><h6>Nama Profil</h6></td>
		<td><h6>Status</h6></td>
		<td></td>
		</tr>
		</thead>
			";
$kueri = mysql_query ("SELECT * FROM user");
$byk = mysql_num_rows($kueri);
$no=0;
while ($data=mysql_fetch_array($kueri))
{
	$no++;
	echo '
		<tbody>
			<tr>
		<td><h6>'.$no.'</h6></td>
		<td><h6>'.$data[username].'</h6></td>
		<td><h6>'.$data[email].'</h6></td>
		<td><h6>'.$data[nama_profil].'</h6></td>
		<td>';
			if ($data["status"]=="user")
			{
		    echo'
			<div class="btn-group">
				 <button type="button" class="btn btn-success btn-lg dropdown-toggle" data-toggle="dropdown" aria-expanded="false" style="margin-left:25px;">
					'.$data[status].' 
				  </button>
			<ul class="dropdown-menu" role="menu">
					<li><a href="akun-admin.php?id='.$data[id_user].'">Admin</a></li>
					<li><a href="akun-banned.php?id='.$data[id_user].'">Banned</a></li>
					<li class="divider"></li>
					<li><a href="hapus-user.php?id='.$data[id_user].'">Hapus</a></li>
				  </ul>
			 </div>';
			}
			else if ($data["status"]=="admin")
			{
		    echo'
			<div class="btn-group">
				<button type="button" class="btn btn-info btn-lg dropdown-toggle" data-toggle="dropdown" aria-expanded="false" style="margin-left:25px;">
					'.$data[status].' <!-- <span class="caret"></span> -->
				  </button>
		    <ul class="dropdown-menu" role="menu">
					<li><a href="akun-user.php?id='.$data[id_user].'">User</a></li>
					<li><a href="akun-banned.php?id='.$data[id_user].'">Banned</a></li>
					<li class="divider"></li>
					<li><a href="hapus-user.php?id='.$data[id_user].'">Hapus</a></li>
				  </ul>
			 </div>';
			}
			else  if ($data["status"]=="banned")
			{
		    echo'
			<div class="btn-group">
			<button type="button" class="btn btn-danger btn-lg dropdown-toggle" data-toggle="dropdown" aria-expanded="false" style="margin-left:25px;">
					'.$data[status].'
				  </button>
		    <ul class="dropdown-menu" role="menu">
					<li><a href="akun-user.php?id='.$data[id_user].'">User</a></li>
					<li><a href="akun-admin.php?id='.$data[id_user].'">Admin</a></li>
					<li class="divider"></li>
					<li><a href="hapus-user.php?id='.$data[id_user].'">Hapus</a></li>
				  </ul>
			 </div>';
			}
			else
			echo '<div class="btn-group">
			<button type="button" class="btn btn-warning btn-lg dropdown-toggle" data-toggle="dropdown" aria-expanded="false" style="margin-left:25px;">
					'.$data[status].'
				  </button>
		    <ul class="dropdown-menu" role="menu">
					<li><a href="akun-user.php?id='.$data[id_user].'">User</a></li>
					<li><a href="akun-admin.php?id='.$data[id_user].'">Admin</a></li>
					<li><a href="akun-banned.php?id='.$data[id_user].'">Banned</a></li>
					<li class="divider"></li>
					<li><a href="hapus-user.php?id='.$data[id_user].'">Hapus</a></li>
				  </ul>
			 </div>';
			   echo'
		</td>
		<td><a href="view-user.php?id='.$data[id_user].'"><h6 style="font-family:Oswald Regular; text-transform: uppercase;">Lihat</h6></a></td>
		</tr>
		</tbody>
		
	'
	;
	}
	echo "</div>
		</table>";
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
		echo "<script>alert('udah di hapuss');window.location='hapus_foto.php'</script>";
		
	}
	}
?>
</div>
<?php
	}
else
{
	echo "<script>alert('belum login');window.location='index.php'</script>";
}
?>
</div>

<?php
footer();
?>