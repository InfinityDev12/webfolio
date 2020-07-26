<?php
session_start();
require_once "header.php";
header_admin();
if (isset($_SESSION['username']))
{
	echo "<br><br><br><br><h2><center>Welcome Admin</center></h2>";
}
?>
</body>
</html>