<?php
session_start();
if (isset($_SESSION['username']))
{
	header("location:home.php");
}
else
?>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Login </title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">  
	<link rel="stylesheet" href="Bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="Bootstrap/css/landing-page.css">	
  </head>

<body style="background: url(img/confectionary/confectionary.png)">

    <div class="container">
        <form class="form-signin" action="proses_login.php" method="POST">
            <h2 class="form-signin-heading">Halaman Login</h2>
            <hr class="clearfix">
            <div class="form-group">
                <label for="inputEmail" class="sr-only">Username</label>
                <input type="text" id="name" name="username" class="form-control" placeholder="Username" required autofocus>
            </div>
            <div class="form-group">
                <label for="inputPassword" class="sr-only">Password</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
            </div>
            <button class="form-control btn btn-register" type="submit">LOGIN</button>
        </form>
    </div>

  <!--  <div class="wrap">
		<div class="avatar">
      <a href="index.php"><img src="logo.png"></a>
		</div>
		<form action="proses_login.php" method="POST">
		<input type="text" placeholder="username" name="username">
		<div class="bar">
			<i></i>
		</div>
		<input type="password" placeholder="password" name="password">
		<a href="" class="forgot_link">forgot ?</a>
		<button>Sign in</button>
		</form>
	</div> -->
    
        <script src="js/index.js"></script> 
  </body>
</html>
