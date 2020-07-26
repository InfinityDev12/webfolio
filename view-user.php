<?php
if (isset($_GET["id"])){
require_once"header.php";
header_admin();
$kueri = mysql_query("SELECT * FROM user WHERE id_user='$_GET[id]'");
$data = mysql_fetch_array($kueri);
echo "<br><br><br>
<div class='container'>
<div class='col-md-3'>
</div>
	<div class='col-md-6'>
	<div class='panel panel-primary'>
	  <div class='panel-heading'><span class='glyphicon glyphicon-user'></span> $data[username]</div>
	  <div class='panel-body' style='background:#f0f0f0;'>
		<center><img src='foto_profil/$data[foto_profil]' width='150px' height='150px' class='img-circle'/></center>
		<br><table class='table'>
				  <ul class='list-group'>
					<li class='list-group-item '>Nama Profil : $data[nama_profil]</li>
					<li class='list-group-item '>Email : $data[email]</li>
					<li class='list-group-item '>Lokasi : $data[location]</li>
					<li class='list-group-item '>Keterangan : $data[keterangan]</li>
				  </ul>";
			$sql = mysql_query("SELECT * FROM image JOIN user USING(id_user) WHERE id_user='$_GET[id]' order by id_image DESC");	  
			while($data = mysql_fetch_array($sql)){
						echo '
						<div class="col-md-3">
							<div class="thumbnail">';
							echo '<a href="detail-gambar.php?id='.$data['id_image'].'"><img width="100px" height="100px" src="'.$data['file'].'"></a>
							</div>
						</div>';}				
			}
		echo "</table>
	</div>
<div class='col-md-3'>
</div>
</div>
";
?>