<?php
session_start();
require_once "header.php";
header_user();
$kueri = mysql_query("SELECT * FROM user WHERE username='$_SESSION[username]'");
$data = mysql_fetch_array($kueri);
$id = $_GET['id'] == $data['id_user'];
if ($id)
{
if (isset($_POST['ok']))
	{  
				$ekstensi	= array('jpeg','jpg','png');
				$ekstensi2	= array('rar','zip');
				$file_name		= $_FILES['file']['name'];
				$file_ext		= strtolower(end(explode('.', $file_name)));
				$file_tmp		= $_FILES['file']['tmp_name'];
				$nama			= $_POST['nama'];
				$file_size		= $_FILES['file']['size'];
				$kategori		= $_POST['kategori'];
				$deskripsi 		= $_POST['deskripsi'];
				$tgl			= date("Y-m-d H:i:s");
				if ($kategori=="pilih")
				{
					echo "<script>alert('blm memilih');window.location='profil.php'</script>";
				}
				else
				{	
				if (empty($_POST['nama']))
				{
					echo "isi titlenya";
				}
				else if (empty($_FILES['file']['name']))
				{
					echo "upload gambarnya";
				}
				else
				{	
				if(in_array($file_ext, $ekstensi) === true){
					if($file_size < 1044070){
						$tgl2 = date("Y_m_d_H_i_s");
						$lokasi = 'file_karya/'.$nama.'_'.$tgl2.'.'.$file_ext;
						move_uploaded_file($file_tmp, $lokasi);
						$in = mysql_query("INSERT INTO image VALUES(NULL,'$data[id_user]', '$tgl', '$nama', '$file_ext', '$lokasi','$file_size','$kategori','$deskripsi','vertifikasi')");
						if($in){
							echo '
							<script>window.alert("Berhasil tunggu konfirmasi admin!");window.location="home.php"</script>
							';
						}else{
							echo '<b>gagal!</b>';
						}
					}
					else
					{
						echo "<b>Besar ukuran file maksimal 1 Mb!</b>";
					}
				}else{
					echo '<b>Ekstensi tidak di izinkan!</b>';
				}
	}
	}
	}
else
{	
?>
<head>
<script type="text/javascript" src="js_crop/jquery-pack.js"></script>
	<script type="text/javascript" src="js_crop/jquery.imgareaselect.min.js"></script>
</head>
<body>
</br>
<div class="container">

<div class="col-md-2">
</div>
<div class="col-md-8">
<div class="panel panel-default">
<div class="panel-heading">
<span class="glyphicon glyphicon-user"></span> <?php echo "<small>$data[username]</small>"; ?>
                         
</div>
<form action="" method="POST" enctype="multipart/form-data">
<div class="panel-body">
	<div class="form-group">
		<label>Nama Karya</label>
		<input class="form-control" placeholder="" name="nama"/>
	</div>
	<div class="form-group">
		<label>Upload Karya</label>
	</div>
	<div class="btn-group">
	<div class="fileUpload btn btn-success">
		<span>Upload</span>
		<input type="file" class="upload" name="file"/>
	</div>
	</div>
	<div class="form-group">
		<label>Pilih Kategori</label>
		<select class="form-control" name="kategori">
			<option value="pilih">Pilih</option>
			<option value="popart">Pop Art</option>
			<option value="manipulation">Manipulation</option>
			<option value="cartoon">Cartoon</option>
			<option value="thypogtaphy">Typhography</option>
		</select>
	</div>
	<div class="form-group">
		<label for="comment">Deskripsi</label>
			<textarea class="form-control" rows="5" name="deskripsi"></textarea>
	</div>
	<div class="form-group">
	<button class="form-control btn btn-register" name="ok">Upload</button>
	</div>
</div>
</form>
</div>
</div>
<div class="col-md-2">
</div>
<script type="text/javascript">
function preview(img, selection) { 
	var scaleX = <?php echo $thumb_width;?> / selection.width; 
	var scaleY = <?php echo $thumb_height;?> / selection.height; 
	
	$('#thumbnail + div > img').css({ 
		width: Math.round(scaleX * <?php echo $current_large_image_width;?>) + 'px', 
		height: Math.round(scaleY * <?php echo $current_large_image_height;?>) + 'px',
		marginLeft: '-' + Math.round(scaleX * selection.x1) + 'px', 
		marginTop: '-' + Math.round(scaleY * selection.y1) + 'px' 
	});
	$('#x1').val(selection.x1);
	$('#y1').val(selection.y1);
	$('#x2').val(selection.x2);
	$('#y2').val(selection.y2);
	$('#w').val(selection.width);
	$('#h').val(selection.height);
} 

$(document).ready(function () { 
	$('#save_thumb').click(function() {
		var x1 = $('#x1').val();
		var y1 = $('#y1').val();
		var x2 = $('#x2').val();
		var y2 = $('#y2').val();
		var w = $('#w').val();
		var h = $('#h').val();
		if(x1=="" || y1=="" || x2=="" || y2=="" || w=="" || h==""){
			alert("You must make a selection first");
			return false;
		}else{
			return true;
		}
	});
}); 

$(window).load(function () { 
	$('#thumbnail').imgAreaSelect({ aspectRatio: '1:<?php echo $thumb_height/$thumb_width;?>', onSelectChange: preview }); 
});

</script>
</div>
</body>		
<?php
}
}
footer();
?>