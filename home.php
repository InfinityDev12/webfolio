<?php
error_reporting(0);
session_start();
require_once "koneksi.php";
if (isset($_SESSION['username']))
{
	if (isset($_SESSION["status"]))
	{
		if ($_SESSION["status"]=="user")
			{
				require_once "tampilan_user.php";
			}
		else if ($_SESSION["status"]=="admin")
		{
			require_once "user.php";
		}
	}
}
else 
{
	echo "<script>window.alert('Anda Belum Login');window.location='login.php'</script>";
}
?>