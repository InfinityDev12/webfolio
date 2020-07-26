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
			
			<div class='container'>
				<div class='row'>
					<br>
					<div class='col-md-2'>
						<div class='row'>
								<div class='col-lg-12'>
									<div class='panel panel-default'>
									<div class='panel-heading'>
									<center><h4 class="wawz"><?php echo "$data[nama_profil]";?></h4></center>
									</div>
									<div class='panel-body'>
										<img src='foto_profil/<?php echo "$data[foto_profil]"; ?>' class='img-responsive'/>
											<a href='edit_info.php?id_user=<?php echo $data['id_user'] ?>'>									
									</div>
									<div class='panel-footer'>
										<button class='btn btn-success btn-sm'><span class='glyphicon glyphicon-ok'></span> Sunting Profil</button></a>
									</div>
									</div>
								</div>
						 </div>
						
					 </div>
					 <div class='col-md-10'>			
								<div class='row'>
									<div class='col-md-12'>
										<div class="panel panel-info">
										<div class="panel-heading">
										<h4 class="wawz"><span class="glyphicon glyphicon-cog"></span> Edit Profil</h4>
										</div>
										<div class="panel-body">
											<table width="100%">
											
												<tr>
												<td><strong>Username :</strong></td>
												<td><?php echo "$data[username]";?></td>
												</tr>
												<tr> 
												<td><strong>Email :</strong></td>
												<td><?php echo "$data[email]";?></td>
												</tr>
												<tr>
												<td><strong>Keterangan :</strong></td>
												<td><?php echo "$data[keterangan]";?></td>
												</tr>
												<tr>
												<td><strong>Location :</strong></td>
												<td><?php echo "$data[location]";?></td>
												</tr>

											
										</table>
										</div>
										</div>
										
									</div>
								</div>
					 </div>
				</div>
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
		echo "<script>window.location='info.php?username='''</script>";
	}
}
}
else 
{
	echo "Eror 404";
}
?>
<?php
footer2();
?>