<?php
error_reporting(0);
session_start();
require_once "cssfungsi.php";
@css();
?>
<?php
require_once "header.php";
require_once "koneksi.php";
if (isset($_POST['kirim']))
{
	if (!isset($_POST['check']))
	{
echo "<script>swal({
					title: 'Setujui Terlebih Dahulu!',
					type: 'error',
					showConfirmButton: false,
					timer: 2000,},function(){window.location.href = 'daftar.php';});
	  </script>";
	}
	else 
	{
		$username=$_POST['username'];
		$password=$_POST['password'];
		$email=$_POST['email'];
		$nama_profil = ucwords($_POST['nama_profil']);
		
		$cekuser = mysql_query("SELECT * from user where username='$username'");
if (strlen($_POST['username']) < 5 || strlen($_POST['username']) > 12 )
	{
echo "<script>swal({
					title: 'Username 5 - 12 Huruf!',
					type: 'error',
					showConfirmButton: false,
					timer: 2000,},function(){window.location.href = 'daftar.php';});
	  </script>";
	}
else if (!filter_var($email, FILTER_VALIDATE_EMAIL))
	{
echo "<script>swal({
					title: 'Format E-mail Salah!',
					type: 'error',
					showConfirmButton: false,
					timer: 2000,},function(){window.location.href = 'daftar.php';});
	  </script>";
	}
else if (strlen($_POST['password']) < 5 || strlen($_POST['password']) > 12 )
	{
echo "<script>swal({
					title: 'Password 5 - 12 Huruf!',
					type: 'error',
					showConfirmButton: false,
					timer: 2000,},function(){window.location.href = 'daftar.php';});
	  </script>";
	}
else
	{
		if (mysql_num_rows($cekuser) <> 0)
		{
echo "<script>swal({
					title: 'Username Telah Terdaftar!',
					text: 'Silahkan Pilih Username Lain!',
					type: 'error',
					showConfirmButton: false,
					timer: 2000,},function(){window.location.href = 'daftar.php';});
	  </script>";
		}

		else {
		$anjng=mysql_query("insert into user values(NULL,'$username','$email','$password','$nama_profil','','','user','default.jpg')");
		if ($anjng)
		{
		echo "<script>swal({
					title: 'Pendaftaran Sukses!',
					text: 'Terima Kasih Telah Mendaftar!',
					type: 'success',
					showConfirmButton: false,
					timer: 2000,},function(){window.location.href = 'index.php';});
	  </script>";
		}
		else 
		{
			echo "<center><b>Gagal</b></center>";
		}
		
		}
	}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
<head>
<title>Pendaftaran Member</title>
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7; IE=EmulateIE9">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <link rel="stylesheet" type="text/css" href="style.css" media="all" />
    <link rel="stylesheet" type="text/css" href="demo.css" media="all" />
	<link rel="stylesheet" href="Bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="Bootstrap/css/landing-page.css">
</head>
<body style="background: url(img/confectionary/confectionary.png)">

    <div class="container">
        <form class="form-signin" action="" method="POST">
            <h2 class="form-signin-heading">Pendaftaran Member</h2>
            <hr class="clearfix">
            <div class="form-group">
                <label for="inputEmail" class="sr-only">Username</label>
                <input type="text" id="name" name="username" class="form-control" placeholder="Username" autofocus>
            </div>
            <div class="form-group">
                <label for="inputPassword" class="sr-only">Password</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Password">
            </div>
			<div class="form-group">
                <label for="inputPassword" class="sr-only">Email</label>
                <input type=email" id="email" name="email" class="form-control" placeholder="Email Address" >
            </div>
			<div class="form-group">
                <label for="inputPassword" class="sr-only">Profile Name</label>
                <input type="text" id="username" name="nama_profil" class="form-control" placeholder="Profile Name">
            </div>
			<div class="form-group">
				<input type="checkbox" name="check"><small> Setuju</small></input>
			</div>
            <button class="form-control btn btn-register" name="kirim" id="submit" type="submit">Daftar</button>
        </form>
    </div>

</body>
</html>
