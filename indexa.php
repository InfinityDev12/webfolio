<?php
error_reporting(0);
session_start();
require_once "header.php";
require_once "koneksi.php";
if (!isset($_SESSION['username']))
{
	header_belum_login();
	modal();
}
else 
{	
header_user();
}
?>
    <div class="intro-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-message">
                        <h1>Webfolio</h1>
                        <h3>Web Portfolio Website</h3>
                        <hr class="intro-divider">
                        <ul class="list-inline intro-social-buttons">
                            <li>
                                <a href="login.php">
                                    <button type="button" class="btn btn-button-outline btn-lg">Login</button>
                                </a>
                                <a href="daftar.php">
                                    <button type="button" class="btn btn-button-outline btn-lg">Daftar</button>
                                </a>								
                            </li>
                            <li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<a href="#" class="simple-back-to-top"></a>
	<br/>
	<div class='container-fluid custom-container'>
	<div class='row'>
<?php
		$kueri = mysql_query("SELECT * FROM user WHERE username='$_SESSION[username]'");
		$data = mysql_fetch_array($kueri);
		$sql = mysql_query("SELECT * FROM image JOIN user USING(id_user) order by id_image DESC");
		
	echo "
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
				<br/><br/>					
						
						
						<fieldset id='foobar'>
								<button name ='foobar' class='buttonzz' value='semua'>Semua Kategori</button>
								<button name ='foobar' class='buttonzz' value='thypogtaphy'>Typography</button>
								<button name ='foobar' class='buttonzz' value='cartoon'>Cartoon</button>
								<button name ='foobar' class='buttonzz' value='manipulation'>Manipulation</button>
								<button name ='foobar' class='buttonzz' value='popart'>PopArt</button>
						</fieldset>
						</div>
					</div>					
				</div>";
?>			
				<div class="col-md-10">
					<div class="row _post-container_">

<?php
		$kueri = mysql_query("SELECT * FROM user WHERE username='$_SESSION[username]'");
		$data = mysql_fetch_array($kueri);
		$sql = mysql_query("SELECT * FROM image JOIN user USING(id_user) order by id_image DESC");
		
						if(mysql_num_rows($sql) > 0){
					while($data = mysql_fetch_array($sql)){
	
echo '
						<div class="custom-column-5">
							<div class="be-post">
							
								<a href="gambar.php?id='. $data["id_image"] .'" class="be-img-block">
								<img src="'. $data[file] .'" alt="">
								</a>
								<a href="gambar.php?id='. $data["id_image"] .'" class="be-post-title">' . $data[nama_file] . '</a>
								<span>
									<a href="#" class="be-post-tag">T</a>, 
									<a href="#" class="be-post-tag">UI/UX</a>,  
									<a href="#" class="be-post-tag">Web Design</a>
								</span>
								<div class="author-post">
									<img src="foto_profil/' . $data[foto_profil] . '" alt="" class="ava-author">
									<span>Oleh <a href="profil.php?username='. $data[username] .'">' . $data[username] . '</a></span>
								</div>
								<div class="info-block">
									<span><i class="glyphicon glyphicon-eye-open"></i> 789</span>
									<span><i class="glyphicon glyphicon-comment"></i> 20</span>
								</div>
								</div>
							</div>

';
				
							}
						}
						?>	
												</div>
						</div>
			</div>	
	</div>			
				

	
<div class="container">
<div class="row">
<?php
		$kueri = mysql_query("SELECT * FROM user WHERE username='$_SESSION[username]'");
		$data = mysql_fetch_array($kueri);
		 
				$sql = mysql_query("SELECT * FROM image JOIN user USING(id_user) order by id_image DESC");
				echo "
				<div class='row'>
					<div class='col-md-5'>
					<div class='form-group'>
					<label>Pilih Kategori</label>
					<select class='form-control' id='pilihan-kategori'>
					<option value='semua'>-- Semua Kategori --</option>
					<option value='thypogtaphy'>Typography</option>
					<option value='cartoon'>Cartoon</option>
					<option value='manipulation'>Manipulation</option>
					<option value='popart'>Pop Art</option>
				</select></div>
					</div>
					<div class='col-md-4'>
				</div>
					<div class='col-md-3'>
					</div>
				</div>
				<br/><br/>";
				if(mysql_num_rows($sql) > 0){
					while($data = mysql_fetch_array($sql)){
?>
							<div class="col-md-3"  id="<?php echo $data['kategori_file'] ?>">
						<font color="black">
								<div class="thumbnail">
									<a href="gambar.php?id=<?php echo $data["id_image"] ?>"><img src=" <?php echo "$data[file]";?>" width="140px" height="140px"/></a>
								<?php echo "<h2>$data[nama_file]</h2><p>by : <a href='profil.php?username=$data[username]'>$data[username]</a></p>
								<font color='black'>$data[tgl_upload]</font>
								"; ?>
								</div>
									  
						</font>
						   </div>
					<?php
					}
				}else{
					echo '
					<tr bgcolor="#fff">
						<td align="center" colspan="4" align="center">Tidak ada data!</td>
					</tr>
					';
				}
?>
							</div>
							</div>
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
								
								
								$('button').click(function(){
									var data = $("#azz").val();
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
<?php
footer();
?>