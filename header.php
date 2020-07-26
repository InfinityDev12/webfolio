<?php
error_reporting(0);
session_start();
require_once "koneksi.php";
function header_admin()
{
	if (isset($_SESSION['username']))
	{
?>
<head>
    <script src="Bootstrap/js/jquery-2.1.4.js"></script>
    <script src="Bootstrap/js/bootstrap.js"></script>
    <script src="Bootstrap/js/npm.js"></script>
	<script src="Bootstrap/sweetalert/sweetalert-dev.js"></script>
	<script src="Bootstrap/js/custom-file-input.js"></script>
	<script src="Bootstrap/js/jquery.custom-file-input.js"></script>
	
	<link rel="stylesheet" href="Bootstrap/css/inputfile.css"> 
	<link rel="stylesheet" href="Bootstrap/css/stylesheet.css"> 
	<link rel="stylesheet" href="Bootstrap/sweetalert/sweetalert.css">
	<link rel="stylesheet" href="Bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="Bootstrap/css/landing-page.css">

	
  <link rel="shortcut ico" href="favicon.ico">
</head>
<body>
<nav id="myNavbar" class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="navbarCollapse">
			<ul class="nav navbar-nav">
				<li><a href="user.php"><span class="glyphicon glyphicon-user"></span>  Data</a></li>
				<li><a href="hapus_foto.php"><span class="glyphicon glyphicon-picture"></span> Hapus Gambar</a></li>      
				<li><a href="tambah-user.php"><span class="glyphicon glyphicon-plus"></span> Tambah Data</a></li>    
				<li><a href="vertifikasi-gambar.php"><span class="glyphicon glyphicon-check"></span> Vertifikasi Gambar</a></li>    
			</ul>
		<?php
		$kueri= mysql_query("SELECT foto_profil from user where username='$_SESSION[username]'");
		$data = mysql_fetch_array($kueri);
		?>
              <ul class="nav navbar-nav navbar-right">
				 <li><a  class="navbar-brand" href="logout.php">Logout</a></li>
			</ul>
            </div>
        </div>
    </nav>
</body>
<?php
}
}
function header_user ()
{
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script src="Bootstrap/js/jquery-2.1.4.js"></script>
    <script src="Bootstrap/js/bootstrap.js"></script>
    <script src="Bootstrap/js/npm.js"></script>
	<script src="Bootstrap/sweetalert/sweetalert-dev.js"></script>
	<script src="Bootstrap/js/custom-file-input.js"></script>
	<script src="Bootstrap/js/jquery.custom-file-input.js"></script>	
	
	<link rel="stylesheet" href="Bootstrap/css/inputfile.css"> 
	<link rel="stylesheet" href="Bootstrap/css/stylesheet.css"> 
	<link rel="stylesheet" href="Bootstrap/sweetalert/sweetalert.css">
	<link rel="stylesheet" href="Bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="Bootstrap/css/landing-page.css">
	
  <link rel="shortcut ico" href="favicon.ico">
</head>
<body style="white">

    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="home.php">
                    <img class="img-responsive2" src="img/header2.png"></img>
                </a>
            </div>
			  <?php
			  	$kueri= mysql_query("SELECT foto_profil from user where username='$_SESSION[username]'");
				$data = mysql_fetch_array($kueri);
			  ?>			
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
				 <li><a class="navbar-brand" href="profil.php?username=<?php echo"$_SESSION[username]"; ?>"><img class="img-responsive2 img-circle" src="foto_profil/<?php echo "$data[foto_profil]";?>" width="50px" height="50px"/><li><?php echo "$_SESSION[username]"; ?></li></a></li>
                <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#"><b class="caret"></b></a>
                	<ul role="menu" class="dropdown-menu">
                  	<li><a href = "info.php?username=<?php echo "$_SESSION[username]";?>">Edit Profil</a></li>
                	<li><a href="gantifoto.php?username=<?php echo"$_SESSION[username]"; ?>">Ganti Foto</a></li>
                    <li><a href="gantipassword.php?username=<?php echo "$_SESSION[username]"; ?>">Ganti Password</a></li>
               	 	<li class="divider"></li>
                	<li><a href="logout.php"><span class="glyphicon glyphicon-off"></span> Logout</a></li>
                	</ul>
            	</li>
                </ul>
            </div>
        </div>
    </nav>	
	
	
	
<?php
}
?>
<?php
function header_belum_login(){
?>	
<!DOCTYPE html>
<html lang="en">
<head>
    <script src="Bootstrap/js/jquery-2.1.4.js"></script>
    <script src="Bootstrap/js/bootstrap.js"></script>
    <script src="Bootstrap/js/npm.js"></script>
	<script src="Bootstrap/sweetalert/sweetalert-dev.js"></script>
	<script src="Bootstrap/js/custom-file-input.js"></script>
	<script src="Bootstrap/js/jquery.custom-file-input.js"></script>	
	
	<link rel="stylesheet" href="Bootstrap/css/inputfile.css"> 
	<link rel="stylesheet" href="Bootstrap/css/stylesheet.css"> 
	<link rel="stylesheet" href="Bootstrap/sweetalert/sweetalert.css">
	<link rel="stylesheet" href="Bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="Bootstrap/css/landing-page.css">
	
  <link rel="shortcut ico" href="favicon.ico">
</head>
<body>

    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">
                    <img class="img-responsive2" src="img/header2.png"></img>
                </a>
           <!-- <form role="search" class="navbar-form navbar-left" action="cari.php" method="post">
					<div class="form-group">
						<input type="text" placeholder="Search" class="form-control" name="cari">
						<button name="kirim" type="submit" class="btn btn-success"><span class="glyphicon glyphicon-search"></span></button>
					</div>
				</form>		-->		
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="daftar.php">Sign Up</a>
                    </li>
                    <li>
                        <a href="#modal-success" data-toggle="modal">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

<?php	
}
?>
<?php
function modal(){
?>
<!-- <div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h2 class="modal-title">Login Disini</h2>
            </div>
            <div class="modal-body">
                <form action="proses_login.php" method="post">
   				 <div class="form-group">
        			<label for="inputEmail">Username/Email</label>
        			<input type="text" class="form-control" id="inputEmail" placeholder="Username atau Email" name="username">
    			 </div>
    			 <div class="form-group">
        			<label for="inputPassword">Password</label>
        			<input type="password" class="form-control" id="inputPassword" placeholder="Password" name="password">
    			  </div>
    			<button type="submit" class="btn btn-primary">Login</button>
                <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
				</form>
                
            </div>
			<div class="modal-footer">
			<center>Jangan Pernah Memberitahukan Email dan Password Anda pada Orang Lain.</center>
			</div>
        </div>
    </div>
</div> -->

    <div id="modal-success" class="modal modal-message modal-success fade" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="testmodal">
                <div class="modal-header">
                    <h2 class="modalhead">SIGN IN</h2>
                </div>
                <div class="modal-body">
        <form action="proses_login.php" class="form-signin" method="POST">
            <hr class="clearfix">
            <div class="form-group">
                <label for="inputEmail" class="sr-only">Username</label>
                <input type="text" id="name" name="username" class="form-control" placeholder="Username" required autofocus>
            </div>
            <div class="form-group">
                <label for="inputPassword" class="sr-only">Password</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
            </div>
                              <button class="form-control btn btn-register" id="submit" type="submit">Login</button>
             <hr class="clearfix">
        </form>
                </div>

            </div>
        </div> 
    </div>

<?php	
}
?>
<?php
function footer(){
	?>
    <div class="blog-footer">
        <h4 class="text-uppercase"><img class="img-responsive2" src="img/header2.png"></img></h4>
    </div>
    <?php
}
?>
<?php
function footer2(){
?>
    <div class="blog-footer aza">
        <h4 class="text-uppercase"><img class="img-responsive2" src="img/header2.png"></img></h4>
    </div>
<?php
}
?>