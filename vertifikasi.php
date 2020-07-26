<?php
session_Start();
require_once "header.php";
header_admin();
	if (isset($_SESSION['username']))
	{
?>
<br>
<div class='container'>
<table class='table table-striped'>
<thead>
	<th>NO</th>
	<th>SN Id</th>
	<th>Username</th>
	<th>Email</th>
	<th>Tanggal Lahir</th>
	<th>Jenis Kelamin</th>
	<th>Konfigurasi</th>
	<tr>
</thead>
</table>
</div>
<?php
	}
else
{
	echo "<script>window.alert('anda belum login');window.location='login.php'";
}
?>