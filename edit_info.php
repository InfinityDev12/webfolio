<?php
require_once "header.php";
header_user();
if ($id = $_GET['id_user'])
{
	$kueri = mysql_query("SELECT * FROM user WHERE id_user='$id'");
	$data = mysql_fetch_array($kueri);
echo "
    <div class='container'>
        <form action='proses_edit_info.php' class='form-signin' method='POST'>
            <h2 class='form-signin-heading'>Edit Info</h2>
            <hr class='clearfix'>
			<input type='hidden' value='$id' name='id_user'/>
            <div class='form-group'>
                <label class='sr-only'>Username</label>
                <input name='nama_profil' class='form-control' placeholder='Username' value='$data[username]' disabled>
            </div>
            <div class='form-group'>
                <label class='sr-only'>Nama Profil</label>
                <input name='nama_profil' class='form-control' placeholder='Nama Profil' value='$data[nama_profil]'>
            </div>
            <div class='form-group'>
                <label class='sr-only'>Nama Profil</label>
                <textarea class='form-control' value='$data[keterangan]' name='keterangan'>$data[keterangan]</textarea>
            </div>	
            <div class='form-group'>
                <label class='sr-only'>Lokasi</label>
                <input name='location' class='form-control' placeholder='Lokasi' value='$data[location]'>
            </div>			
            <button class='form-control btn btn-register'>Update</button>
			<hr class='clearfix'>
        </form>
    </div>
	
        <script src='js/index.js'></script> ";
}
footer(); 
?>