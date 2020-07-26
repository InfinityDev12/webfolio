<?php
require_once "header.php";
header_user();
if ($id = $_GET['id'])
{
	$kueri = mysql_query("SELECT * FROM image WHERE id_image='$id'");
	$data = mysql_fetch_array($kueri);
	echo "<br>
	<form action='proses-edit-gambar.php' method='POST'>
	<div class='container'>
		<div class='col-md-1'>
			</div>
	<div class='col-md-5'>
			<div class='img'>
			<img src='$data[file]' class='gambarpost' alt=''>
		</div>
    </div>
				<div class='col-md-5'>
					<input type='hidden' value='$id' name='id_image'/>
						<div class='form-group'>
								<label>Nama file</label>
								<input class='form-control' value='$data[nama_file]' name='nama_file'/>
						</div>
						<div class='form-group'>
							<label>Keterangan</label>
							<textarea class='form-control' rows='3' value='$data[deskripsi]' name='deskripsi'>$data[deskripsi]</textarea>
						</div>
						 <div class='form-group'>
								<label>Kategori</label>
								<select class='form-control' name='kategori_file'>";
									if ($data['kategori_file']=='Popart')
									{
										echo "
											<option value='Popart' selected>Pop Art</option>
											<option value='Popart'>Manipulation</option>
											<option value='Popart'>Cartoon</option>
											<option value='Popart'>Typhography</option>
										";
									}
									else if ($data['kategori_file']=='Manipulation')
									{
										echo "
											<option value='Popart'>Pop Art</option>
											<option value='Popart'selected>Manipulation</option>
											<option value='Popart'>Cartoon</option>
											<option value='Popart'>Typhography</option>
										";
									}
									else if ($data['kategori_file']=='Cartoon')
									{
										echo "
											<option value='Popart'>Pop Art</option>
											<option value='Popart'>Manipulation</option>
											<option value='Popart' selected>Cartoon</option>
											<option value='Popart'>Typhography</option>
										";
									}
									else
									{
										echo "
											<option value='Popart'>Pop Art</option>
											<option value='Popart'>Manipulation</option>
											<option value='Popart'>Cartoon</option>
											<option value='Popart' selected>Typhography</option>
										";
									}
								echo"</select>
						</div>
						<div class='form-group'>
							<button class='btn btn-success'>Ubah</button>
						</div>
				</div>
			</div>
		<br>
	</div>
	</form>
	";
}
footer();
?>