<?php
session_start();
?>
<?php
require_once "header.php";
require_once "koneksi.php";
if (isset($_POST['kirim']))
{
	if (!isset($_POST['check']))
	{
		echo "	<div class='container'>
	<div class='alert alert-danger'>
	<a href='register.php' class='close'>&times;</a>
	Setujui dulu
	</div>
	</div>";
	}
	else 
	{
		$username=$_POST['username'];
		$password=$_POST['password'];
		$email=$_POST['email'];
		$nama_profil = ucwords($_POST['nama_profil']);
		$tgl=$_POST['tgl'];
		$bln=$_POST['bln'];
		$thn=$_POST['thn'];
		
		$cekuser = mysql_query("SELECT * from user where username='$username'");
if (strlen($_POST['username']) < 5 || strlen($_POST['username']) > 12 )
	{
	echo "
	<div class='container'>
	<div class='alert alert-warning'>
	<a href='register.php' class='close'>&times;</a>
	Username harus 5-12 huruf
	</div>
	</div>";
	}
else if (!filter_var($email, FILTER_VALIDATE_EMAIL))
	{
	echo "	<div class='container'>
	<div class='alert alert-warning'>
	<a href='register.php' class='close'>&times;</a>
	Format e-mail salah
	</div>
	</div>";
	}
else if (strlen($_POST['password']) < 5 || strlen($_POST['password']) > 12 )
	{
	echo "	<div class='container'>
	<div class='alert alert-warning'>
	<a href='register.php' class='close'>&times;</a>
	Password harus 5-12 huruf
	</div>
	</div>";
	}
else
	{
		if (mysql_num_rows($cekuser) <> 0)
		{
			echo "	<div class='container'>
	<div class='alert alert-danger'>
	<a href='register.php' class='close'>&times;</a>
	Username ini udah terdaftar
	</div>
	</div>";
		}

		else {
		$anjng=mysql_query("insert into user values(NULL,'$username','$email','$password','$nama_profil',NULL,NULL,NULL,NULL,'belum','default.jpg','$tgl-$bln-$thn')");
		if ($anjng)
		{
			echo "<div class='container'>
	<div class='alert alert-success'>
	<a href='login.php' class='close'>&times;</a>
	Udah terkirim
	</div>
	</div>";
		}
		else 
		{
			echo "<b>Gagal</b>";
		}
		
		}
	}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Pendaftaran Member</title>
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7; IE=EmulateIE9">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <link rel="stylesheet" type="text/css" href="style.css" media="all" />
    <link rel="stylesheet" type="text/css" href="demo.css" media="all" />
</head>
<body>
<div class="container">
			<header>
				<h1>Pendaftaran Member</h1>
            </header>       
      <div  class="form">
    		<form id="contactform" action="" method="POST"> 
    			<p class="contact"><label for="name">Username</label></p> 
    			<input id="name" name="username" required="" tabindex="1" type="text"> 
    			
				<p class="contact"><label for="password">Password</label></p> 
    			<input type="password" id="password" name="password" required=""> 
					
    			<p class="contact"><label for="email">Email</label></p> 
    			<input id="email" name="email"  type="email"> 
                
                <p class="contact"><label for="username">Nama Profil</label></p> 
    			<input id="username" name="nama_profil" placeholder="username" required="" tabindex="2" type="text"> 
    			 

        
               <fieldset>
			   <label>Tanggal <input class="birthday" maxlength="2" name="tgl" required=""></label>
                 <label>Bulan</label>
                  <label class="month"> 
                  <select class="select-style" name="bln">
                  <option value="">Tahun</option>
                  <option  value="01">January</option>
                  <option value="02">February</option>
                  <option value="03" >March</option>
                  <option value="04">April</option>
                  <option value="05">May</option>
                  <option value="06">June</option>
                  <option value="07">July</option>
                  <option value="08">August</option>
                  <option value="09">September</option>
                  <option value="10">October</option>
                  <option value="11">November</option>
                  <option value="12" >December</option>
                  </label>
                 </select>    
                
                <label>Tahun <input class="birthyear" maxlength="4" name="thn"></label>
              </fieldset>
  
			<input type="checkbox" name="check"/>Setujui dulu! <br>
            <input class="buttom" name="kirim" id="submit" tabindex="5" value="Sign me up!" type="submit"> 
   </form> 
</div>      
</div>

</body>
</html>
