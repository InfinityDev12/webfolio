<?php
require_once"header.php";
header_admin();
echo "<br><Br><br><br>";
if (isset($_POST["kirim"]))
{
	$color = $_POST["color"];
	$font_color = $_POST["font_color"];
	$font_style = $_POST["font_style"];
	$background = $_POST["background"];
	$ukuran = $_POST["ukuran"];
	$kueri = mysql_query("UPDATE style set header='$color',font_color='$font_color',font_style='$font_style',background='$background',ukuran=''$ukuran");
	if ($kueri)
		echo "<script>header.location='style.php'</script>";
}
?>
<div class="container">
<div class="row">
	<div class='col-md-2'>
	</div>
		<div class='col-md-8'>
		<div class='panel panel-default'>
			<div class='panel-heading'>
			<h3 class='panel-title'>Ubah Tampilah User</h3>
	 </div>
	 
<table class='table'>
<form action="" method="POST">
				  <ul class='list-group'>
				  
					<li class='list-group-item '><span class="glyphicon glyphicon-header"></span> Header Color : <input type="color" name="color" value="red"/></li>
					<li class='list-group-item '><span class="glyphicon glyphicon-text-color"></span> Text Color : <input type="color" name="font_color" value="red"/></li>
					<li class='list-group-item '><span class="glyphicon glyphicon-font"></span> Font Syle : <select name="font_style">
																													<option value="arial"><font face="Arial">Arial</font></option>
																													<option value="times new roman"><font face="Times New Roman">Times New Roman</font></option>
																													<option value="nyala"><font face="Nyala">Nyala</font></option>
																													<option value="calibri"><font face="Calibri">Calibri</font></option>
																													<option value="tahoma"><font face="tahoma">Tahoma</font></option>
																											</select>		</li>
					<li class='list-group-item '><span class="glyphicon glyphicon-pencil"></span> Background Color : <input type="color" name="background"/> </li>
				  <li class='list-group-item '><span class="glyphicon glyphicon-text-height"></span> Ukuran Font : <select name="ukuran">
																													<option value='1px'>Small</option>
																													<option value='2px'>Medium</option>
																													<option value='3px'>Large</option>
																									
																											</select></li>
				  <li class="list-group-item"><button class="btn btn-success" name="kirim">Ubah</button></li>
				  </ul>
				 </form>
</table>
</div>
	</div>
	<div class='col-md-2'>
	</div>
</div>
</div>	