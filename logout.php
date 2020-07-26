<?php
error_reporting(0);
session_start();
require_once "cssfungsi.php";
@css();
unset($_SESSION['username']);
echo "<script>swal({
					title: 'Terimakasih Sudah Login',
					type: 'success',
					showConfirmButton: false,
					timer: 2000,},function(){window.location.href = 'index.php';});
	  </script>";
?>