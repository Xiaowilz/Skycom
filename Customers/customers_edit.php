
<?php
	require_once("../conn.php");
	$kd = $_GET['edit'];
	$sql = "SELECT * FROM tb_customer WHERE kd_customer = '$kd'";
	$q = mysqli_query($conn, $sql);

	while ($r = mysqli_fetch_assoc($q)) 
	{
		echo"<input type='text' name='kd_customer' id='kd_customer' value='$r[kd_customer]'><br>";
		echo "<input type='text' name='nm_customer' id='nm_customer' value='$r[nm_customer]'><br>";
		echo "<input type='text' name='address' id='address' value='$r[alamat]'><br>";
		echo "<input type='text' name='kontak' id='kontak' value='$r[kontak]'><br>";
	}
?>