<?php
error_reporting(0);
require_once "header.php";
if (isset($_SESSION['username']))
{
header_user();
}
else
{
header_belum_login();
}
session_start();
if (isset($_POST['kirim']))
{
	$cari = $_POST['cari'];
	$kueri = mysql_query("SELECT * FROM image JOIN user USING(id_user) where nama_file like '%$cari%' && image.status='sudah_vertifikasi'");
	$hasil = mysql_num_rows($kueri);
	if ($hasil ==0)
	{
		echo '    <div class="intro-header">
             <h3>Hasil Pencarian Dari "'.$cari.'" Tidak Ditemukan. </h3>
    </div>';
	}
	else
	{
	$no=0;

		echo '<div class="intro-header">
             <h3>Hasil Pencarian Dari "'.$cari.'"</h3>
    </div>';
	echo "				
	<hr>	
	<div class='col-md-2 left-feild'>
				<p class='text-center'>PENCARIAN</p>
				<hr>
					<form role='search' action='cari.php' method='post' class='input-search'>
						<input type='text' name='cari' placeholder='Cari..'>
							<i class='glyphicon glyphicon-search'></i>
							<input type='submit' name='kirim' value=''>
					</form>	
					
					<p class='text-center'>KATEGORI</p>
					<hr>
					<div class='be-vidget'>
						<div class='creative_filds_block' id='azz'>
								

					<div class='form-group'>
					<div class='az'>
					<select id='pilihan-kategori'>
					<option value='semua'>All Categories</option>
					<option value='thypogtaphy'>Typography</option>
					<option value='cartoon'>Cartoon</option>
					<option value='manipulation'>Manipulation</option>
					<option value='popart'>Pop Art</option>
				</select></div></div>				
	
						</div>
					</div>					
				</div>";
				echo '				
				<div class="col-md-10">
					<div class="row _post-container_">';
	while ($data=mysql_fetch_array($kueri))
	{
		$nama = str_replace($cari,'<b>'.$cari.'</b>',$data['nama_file']);
		$no++;
?>
<?php
echo '
						<div class="custom-column-5" id='. $data['kategori_file'] .'>
							<div class="be-post">
								<a href="gambar.php?id='. $data["id_image"] .'" class="be-img-block">
								<img src="'. $data[file] .'" alt="">
								</a>
								<a href="gambar.php?id='. $data["id_image"] .'" class="be-post-title">' . $data[nama_file] . '</a>
								<span>
									<a class="be-post-tag">'. $data[kategori_file] .'</a>
								</span>
								<div class="author-post">
									<img src="foto_profil/' . $data[foto_profil] . '" alt="" class="ava-author">
									<span>Oleh - <a href="profil.php?username='. $data[username] .'">' . $data[username] . '</a></span>
									<br/></br><span class="text-center">'. $data[tgl_upload] .'</span>
								</div>
								<div class="info-block">
									<span><i class="glyphicon glyphicon-eye-open"></i> 789</span>
									<span><i class="glyphicon glyphicon-comment"></i> 20</span>
								</div>
								</div>
							</div>'; 
?>
	<?php
	}
	echo '</div>
</div>';
	}
}
?>

<script>
$('body').prepend('<a href="#" class="back-to-top">Back to Top</a>');

var amountScrolled = 600;

$(window).scroll(function() {
	if ( $(window).scrollTop() > amountScrolled ) {
		$('a.back-to-top').fadeIn('slow');
	} else {
		$('a.back-to-top').fadeOut('slow');
	}
});

$('a.back-to-top, a.simple-back-to-top').click(function() {
	$('html, body').animate({
		scrollTop: 0
	}, 700);
	return false;
});							
							
								$("#pilihan-kategori").on('change', function(){
									var data = $("#pilihan-kategori").val();
									if(data != "thypogtaphy" && data != "semua")
										$("#thypogtaphy").fadeOut();
									if(data != "cartoon" && data != "semua")
										$("#cartoon").fadeOut();
									if(data != "manipulation" && data != "semua")
										$("#manipulation").fadeOut();
									if(data != "popart" && data != "semua")
										$("#popart").fadeOut();
									if(data == "semua")
									{
										$("#thypogtaphy").fadeIn();
										$("#cartoon").fadeIn();
										$("#manipulation").fadeIn();
										$("#popart").fadeIn();
									}
									else
										$("#"+data).fadeIn();
								});
								
															
							</script>
</div>							
