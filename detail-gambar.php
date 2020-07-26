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
if (isset($_GET["id"]))
{
	$kueri = mysql_query("SELECT * FROM image WHERE id_image='$_GET[id]'");
	$data = mysql_fetch_array($kueri);
	echo "
	<div class='container'>
	<div class='row'>
	<div class='col-md-3'>
	</div>
	<div class='col-md-6'>
		<div class='panel panel-default'>
		<div class='panel-heading'>
		&nbsp;
				<div class='btn-group pull-right'>
					<button type='button' class='btn btn-default btn-xs dropdown-toggle' data-toggle='dropdown'>
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
		 <div class='panel-body'>
		 <center><img src='$data[file]' width='250px' height='250px' class='thumbnail'/></center>
		  <table class='table'>
				  <ul class='list-group'>
					<li class='list-group-item '>Nama file : <b>$data[nama_file].$data[tipe_file]</b></li>
					<li class='list-group-item '>Ukuran file : <b>$data[ukuran_file]</b></li>
					<li class='list-group-item '>Kategori : <b>$data[kategori_file]</b></li>
					<li class='list-group-item '>Deskripsi : <b>$data[deskripsi]</b></li>
				  </ul>
		  </table>	
		</div>
		 </div>
	</div>
	  </div>
	<div class='col-md-'>
	</div>
	";
}
else
{
	echo "eror";
}
footer();
?>
