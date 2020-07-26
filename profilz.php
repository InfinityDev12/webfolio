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
modal();
}
session_start();
if (isset($_GET['username']))
{
	if(strlen(trim($_GET['username'])) != 0)
	{
		$id = $_GET['username'];
		$kueri=mysql_query("SELECT * FROM user WHERE username='$_GET[username]'");
		$data=mysql_fetch_array($kueri);
		if(mysql_num_rows($kueri) > 0)
		{
?>

		<div class="container be-detail-container">
			<div class="row">
				<div class="col-xs-12 col-md-4 left-feild">
					<div class="be-user-block style-3">
						<div class="be-user-detail">
							<a class="be-ava-user style-2">
								<img src="<?php echo "foto_profil/$data[foto_profil]" ?>" class='img-circle' alt=""> 
							</a>
								<div class="share-buttons">
									<a class="color-1" href="blog-detail-2.html"><i class="fa fa-facebook"></i> 278</a>
									<a class="color-2" href="blog-detail-2.html"><i class="fa fa-twitter"></i> 180</a>
									<a class="color-3" href="blog-detail-2.html"><i class="fa fa-pinterest-p"></i> 78</a>
									<a class="color-4" href="blog-detail-2.html"><i class="fa fa-linkedin"></i> 53</a>
								</div>
							<p class="be-use-name"><?php echo "$data[nama_profil]" ?></p>
							<div class="be-user-info">
							<?php echo "$data[username]" ?>
							<?php echo "$data[email]" ?>
							</div>
							<div class="be-text-tags style-2">
								<a href="#"><?php echo "$data[location]" ?></a>,
							</div>
							<a class="be-user-site" href="http:"><i class="fa fa-link"></i><?php echo "$data[keterangan]" ?></a>
						</div>
						<div class="be-user-statistic">
							<div class="stat-row clearfix"><i class="glyphicon glyphicon-eye-open"></i><span class="stat-counter">218098</span></div>
						</div>
					</div>

					<a class="btn full color-1 size-1 hover-1"><i class="fa fa-plus"></i>Edit Profil</a>										
				</div>
				
			<?php
 			$sql = mysql_query("SELECT * FROM image JOIN user USING(id_user) WHERE username='$_GET[username]' order by id_image DESC");
			while($data = mysql_fetch_array($sql)){
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
					}
			?>			
			
				
							
			</div>
		</div>

<div class="col-md-2">
</div>
<div class="col-md-8">
<div class="panel panel-default">
<div class="panel-heading">
<span class="glyphicon glyphicon-user"></span> <?php echo $data['username'] ?>
<?php
if (isset($_SESSION['username'])){
?>
                            <div class="btn-group pull-right">
                                <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                    <span class="glyphicon glyphicon-cog"></span> Profil
                                </button>
                                <ul class="dropdown-menu slidedown">
                                    <li>
                                        <a href="upload_karya.php?id=<?php echo"$data[id_user]"; ?>">
                                           <span class="glyphicon glyphicon-upload"></span> Upload Karya
                                        </a>
                                    </li>
                                    <li>
                                        <a href = "info.php?username=<?php echo "$_SESSION[username]";?>">
                                            <span class="glyphicon glyphicon-edit"></span> Edit Profil
                                        </a>
                                    </li>
                                </ul>
                            </div>
<?php
		}
?>
</div>
<div class="panel-body">
<?php
echo "
		<div class='col-md-5'>
			<img src='foto_profil/$data[foto_profil]' width='200px' height='200px' class='img-circle'/>
		</div>
		<div class='col-md-7'>
			<h1>$data[nama_profil]</h1>
			$data[username] . $data[email]<br>
			$data[keterangan]<br>
			$data[location]<br>";
			if (isset($_SESSION['username']) && $_SESSION['username']=="$data[username]")
			{
			echo "<a href='upload_karya.php?id=$data[id_user]';><button class='btn btn-success'><span class='glyphicon glyphicon-upload'></span> Upload Karya</button></a>";
			}
		}
?>
</div>
</div>
</div>
			<?php
			echo "<h2>Upload : </h2>";
 			$sql = mysql_query("SELECT * FROM image JOIN user USING(id_user) WHERE username='$_GET[username]' order by id_image DESC");
			while($data = mysql_fetch_array($sql)){
						echo '
						<div class="col-md-3">
							<div class="thumbnail"><a href="'.$data['file'].'"><img width="100px" height="100px" src="'.$data['file'].'"></a></div>Tanggal : '.$data['tgl_upload'].'<br>kategori : '.$data['kategori_file'].'
						</div>
						';
					}
			?>
</div>
<div class="col-md-2">
</div>

<?php
		}
		else 
		{
			echo "User Tidak ada";
		}
	}
	else
	{
		echo "<script>window.location='index.php'</script>";
	}
footer();
?>
