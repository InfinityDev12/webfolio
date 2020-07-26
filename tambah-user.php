<?php
require_once"header.php";
header_admin();
echo "<br><Br><br><br>";
if (isset($_POST["kirim"]))
{
		$username=$_POST['username'];
		$password=$_POST['password'];
		$email=$_POST['email'];
		$status=$_POST['status'];
		$nama_profil = ucwords($_POST['nama_profil']);
		if (empty($username) && empty($password) && empty($email) && empty($nama_profil))
		{
			echo '
				<div class="row">
				<div class="col-md-2">
				</div>
				<div class="col-md-8">
				<div class="alert alert-danger alert-dismissible" role="alert">
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					  <strong>Perhatian!</strong> Anda harus isi semua datanya.
				</div>
				</div>
				<div class="col-md-2">
				</div>
				</div>';
		}
		else
		{
		$cekuser = mysql_query("SELECT * from user where username='$username'");
		$anjng=mysql_query("insert into user values(NULL,'$username','$email','$password','$nama_profil','','','$status','default.jpg')");
		if ($anjng)
		{
			echo "<script>window.alert('Telah ditambahkan!');window.location='user.php'</script>";
		}
		else 
		{
			echo "<center><b>Gagal</b></center>";
		}
		}
}
?>
<div class="container">
<div class="row">
	<div class='col-md-3'>
	</div>
		<div class='col-md-6'>
		<div class='panel panel-info'>
			<div class='panel-heading'>
			<h3 class='panel-title'>Tambah Data</h3>
	 </div>
<table class='table'>
				  <ul class='list-group'>
				  <form action="" method="POST">
					<li class='list-group-item '><label>Username</label><input type="text" name="username" class="form-control"></li>
					<li class='list-group-item '><label>Password</label><input type="password" name="password" class="form-control"></li>
					
					<li class='list-group-item '><label>Email</label><input type="text" name="email" class="form-control"></li>
					<li class='list-group-item '><label>Nama Profil</label><input type="text" name="nama_profil" class="form-control"></li>
					<li class='list-group-item '><label>Status</label>
					<select class="form-control" name="status">
						<option value="user">User</option>
						<option value="admin">Admin</option>
					</select></li>
					<li class="list-group-item"><button class="btn btn-success" name="kirim">Tambah Data</button></li>
				  </form>
				  </ul>
</table>
</div>
	</div>
	<div class='col-md-3'>
	</div>
</div>
</div>