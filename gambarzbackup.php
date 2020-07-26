<?php
error_reporting(0);
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
function tambah_pengunjung($id)
{
	$data = 0;
	$nama = date("d_M_Y").$id;
	if(!is_file("log/".$nama.".txt"))
	{
		$file = fopen("log/".$nama.".txt", "w+");
		fwrite($file, "0");
		fclose($file);
	}
	$file = fopen("log/".$nama.".txt", "r+");
	$data = fread($file, 10);
	fseek($file, 0);
	(int) $data = $data + 1;
	fwrite($file, $data);
	fclose($file);
}
if ($id = $_GET['id'])
{	
	tambah_pengunjung($id);
	$kueri = mysql_query("SELECT * FROM image JOIN user USING(id_user) WHERE id_image='$id'");
	$data = mysql_fetch_array($kueri);
	$nama = date("d_M_Y").$id;
	$file = (file_exists("log/".$nama.".txt")) ? fopen("log/".$nama.".txt", "r+") : "";
	$total = fread($file, 1024);
	
	echo "
	<div class='container'><hr></div>

<div class='container'>  
    <div class='row'>
	
	<div class='col-md-6'>
			<div class='img'>
			<img src='$data[file]' class='gambarpost' alt=''>
			<h2>$data[nama_file]</h2>
			<hr>
			<div class='btn-group' role='group'>
  <button type='button' class='btn btn-button-outlined btn-lg'><span class='glyphicon glyphicon-eye-open'></span> - $total</button>			
  <button type='button' class='btn btn-button-outlined btn-lg'><span class='glyphicon glyphicon-pushpin'></span> - $data[kategori_file]</button>		
</div>  
	<hr>
		</div>
    </div>
		
		<div class='col-md-6'>
  <div class='media'>
  <div class='media-left'>
    <a href='profil.php?username=$id'>
      <img class='media-object' src='foto_profil/$data[foto_profil]' width='70px' height='70px' alt='...'>
    </a>
  </div>
    <div class='media-body'>
    <p class='media-heading'><a href='profil.php?username=$data[username]'>$data[nama_profil]</a></p>
	<p class='media-heading'>Diupload Pada : $data[tgl_upload]</p>
  </div>
  				<div class='btn-group pull-right'>
					<button type='button' class='btn btn-success btn-xs dropdown-toggle' data-toggle='dropdown'>
						<span class='glyphicon glyphicon-picture'></span> Gambar
					</button>
					<ul class='dropdown-menu slidedown'>
						<li>
						  <a href='edit-gambar.php?id=$data[id_image]'><span class='glyphicon glyphicon-edit'></span> Edit</a>
						</li>
						<li>
						<a href='hapus-gambar.php?id=$data[id_image]'><span class='glyphicon glyphicon-trash'></span> Hapus</a>

						</li>
					</ul>
				</div>
</div>						
			
<hr> 
		
			<p>$data[deskripsi]</p>
		
		<hr>
	
			<div class='panel panel-default'>		
				<div class='panel-heading'>
				<small>Komentar</small>
				</div>
				<div class='panel-body'>";
				
	
					echo "
					<form action='?id_image=$data[id_image]' method='POST'>
					<div class='form-group'>
						<div class='textareas'>
							<textarea class='form-control' rows='6' name='komentar'></textarea>	
						</div>
						<hr>
						<button class='form-control btn btn-register' type='submit'>Post</button>
					</div>
					</form>
					<hr>";
	$komn = mysql_query("SELECT * FROM komentar JOIN user USING(id_user) WHERE id_image='$id'");
	while ($dz = mysql_fetch_array($komn))
	{			
				echo"<img src='foto_profil/$dz[foto_profil]' width='40px' height='40px' class='anu img-circle'/> <a href='profil.php?username=$dz[username]'> $dz[username]</a> - On $dz[tanggal_komen]
				<br><p class='top'>$dz[komentar]</p><hr>";}
				echo "</div>
			</div>
        </div>
		
    </div>
</div>

	<div class='container'><hr></div>";

	echo "
	</div>
	</div>";	
	
}
$kueriz = mysql_query("SELECT * FROM user WHERE username='$_SESSION[username]'");
$dataz = mysql_fetch_array($kueriz);
$id = $_GET['id'] == $data['id_user'];
if ($id)
{
$id_image = $_GET["id_image"];
$komentar = $_POST["komentar"];
$kueri = mysql_query("insert into komentar values(null,'$id_image','$dataz[id_user]','$komentar',now())");
if ($kueri)
{
	echo "<script>
	    location.replace('gambar.php?id=$_GET[id_image]')</script>";
}
else
	echo "gagal";
}
footer();
?>
