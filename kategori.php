 <?php
error_reporting(0);
session_start();
require_once "header.php";
require_once "koneksi.php";

if (!isset($_SESSION['username']))
{
	header_belum_login();
	modal();
	header_kategori_blm_login();
}
else 
{	
header_user();
header_kategori();
}
?>
    
	<a href="#" class="simple-back-to-top"></a>
	<br/>
	<div class='container-fluid custom-container'>
	<div class='row'>
<?php
		$select = mysql_query("SELECT * FROM image");
		$batas= 8;
		$jumlah_data=mysql_num_rows($select);
		$jumlah_halaman=ceil($jumlah_data/$batas);
		if (isset($_GET["halaman"]))
		{
		$halaman=$_GET["halaman"];			
		}
		else
		{
		$halaman=1;
		}
		$mulai=$halaman*$batas-$batas;
?>	
<?php
		$kategori_jur = $_GET["category"];
		$kueri = mysql_query("SELECT * FROM user WHERE username='$_SESSION[username]'");
		$data = mysql_fetch_array($kueri);
		$query = mysql_query("SELECT * FROM jurusan ORDER BY id ASC");
		
	/*	
	echo "
				<div class='col-md-2 left-feild'>
				<p class='text-center'>PENCARIAN</p>
				<hr>
					<form role='search' action='cari.php' method='post' class='input-search'>
						<input type='text' name='cari' placeholder='Cari..'>
							<i class='glyphicon glyphicon-search'></i>
							<input type='submit' name='kirim' value=''>
					</form>	
	*/
		echo'
					<div class="col-md-2 left-feild">
				
					<p class="text-center">KATEGORI</p>
					<hr>
					<div class="be-vidget">
						<div class="creative_filds_block" id="azz">
							<div class="form-group">
					<div class="az">
					<button class="btn btn-primary dropdown-toggle" type="button" id="drop1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
   					 kelas jurusan
 					 </button>
					<ul class="dropdown-menu" aria-labelledby="drop1">';
								
					if(mysql_num_rows($query)){
						while ($jur = mysql_fetch_array($query)) {
							echo '

					<li><a href="kategori.php?category='. $jur["jurusan"] .'">'.$jur[jurusan].'</a></li>
					
					';
						}
					}
					echo "</ul>
					</div>
					</div>					
	
						</div>
					</div>					
				</div>";
				
					
?>			

				<div class="col-md-10">
					<div class="row _post-container_">

<?php

		$sql = mysql_query("SELECT * FROM user JOIN image  USING(id_user) where image.status='sudah_vertifikasi' && user.jurusan = '$kategori_jur'order by id_image DESC LIMIT $mulai,$batas");
		
					if(mysql_num_rows($sql) > 0){
					while($data = mysql_fetch_array($sql)){
	
echo '
						<div class="custom-column-5" id='. $data['kategori_file'] .'>
							<div class="be-post">
							
								<a href="gambar.php?id='. $data["id_image"] .'" class="be-img-block">
								<img src="'. $data[file] .'" alt="">
								</a>
								<a href="gambar.php?id='. $data["id_image"] .'" class="be-post-title">' . $data[nama_file] . '</a>
								<span>
									<a class="be-post-tag">'. $data[jurusan] .'</a>
								</span>
								<div class="author-post">
									<img src="foto_profil/' . $data[foto_profil] . '" alt="" class="ava-author">
									<span>Oleh - <a href="profil.php?username='. $data[username] .'">' . $data[username] . '</a></span>
									<br/></br><span class="text-center">'. $data[tgl_upload] .'</span>
								</div>
								</div>
							</div>';
							}
						}
				else{
					echo '
					<tr bgcolor="#fff">
						<td align="center" colspan="4" align="center">Tidak ada data!</td>
					</tr>';}
						?>	
						</div>
				</div>
			</div>	


</div>	
<center>
	  <nav>
		  <ul class="pagination">
			<li ><a href="?halaman=1" aria-label="Previous">&laquo;</a></li>
			<?php for($hal=1;$hal<=$jumlah_halaman;$hal++)
			{
				if ($_GET["halaman"]=="$hal")
				{
					echo '<li class="active"><a href="?halaman='.$hal.'">'.$hal.'<span class="sr-only">(current)</span></a></li>';
				}
				else
				{
				    echo '<li><a href="?halaman='.$hal.'">'.$hal.'<span class="sr-only">(current)</span></a></li>';	
				}
			}				
			?>
			<li ><a href="?halaman=<?php echo$jumlah_halaman;?>" aria-label="Next">&raquo;</a></li>
		  </ul>
	  </nav> 
</center>
<script>

								$("#pilihan-kategori").on('change', function(){
									var data = $("#pilihan-kategori").val();
									if(data != "typography" && data != "semua")
										$("#typography").fadeOut();
									if(data != "cartoon" && data != "semua")
										$("#cartoon").fadeOut();
									if(data != "manipulation" && data != "semua")
										$("#manipulation").fadeOut();
									if(data != "popart" && data != "semua")
										$("#popart").fadeOut();
									if(data == "semua")
									{
										$("#typography").fadeIn();
										$("#cartoon").fadeIn();
										$("#manipulation").fadeIn();
										$("#popart").fadeIn();
									}
									else
										$("#"+data).fadeIn();
								});

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
																				
</script>
<?php
footer();
?>