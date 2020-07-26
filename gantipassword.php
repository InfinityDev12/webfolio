<?php
require_once "header.php";
header_user();
session_start();
if ($_GET['username']==$_SESSION['username'])
{
if (isset($_GET['username']))
{
	if(strlen(trim($_GET['username'])) != 0)
	{
		$id = $_GET['username'];
		$kueri=mysql_query("SELECT * FROM user WHERE username='$_GET[username]'");
		$data=mysql_fetch_array($kueri);
		if(mysql_num_rows($kueri) > 0)
		{?>
			
<body style="background: url(img/confectionary/confectionary.png)">

    <div class="container">
        <form class="form-signin" action="prosespassword.php?username=<?php echo "$_SESSION[username]"; ?>" method="POST">
            <h2 class="form-signin-heading">Ubah Password</h2>
            <hr class="clearfix">
            <div class="form-group">
                <label for="inputPassword" class="sr-only">Password Lama</label>
                <input type="password" name="password_lama" class="form-control" placeholder="Password Lama">
            </div>
            <div class="form-group">
                <label for="inputPassword" class="sr-only">Password Baru</label>
                <input type="password" name="password_baru" class="form-control" placeholder="Password Baru">
            </div>
            <div class="form-group">
                <label for="inputPassword" class="sr-only">Ulangi Password</label>
                <input type="password" name="password_ulangi" class="form-control" placeholder="Ulangi Password">
            </div>			
            <button class="form-control btn btn-register" type="submit" name="kirim">Simpan</button>
			<hr class="clearfix">
        </form>
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
}
}
else 
{
	echo "Eror 404";
}
?>
<?php
footer();
?>
<?php
if ($_SESSION['username'] == $_GET['username']){
if (isset($_POST['kirim']))
{

echo "ak";
}
}
?>