<?php 
	require("../conn.php");
	$sql = "UPDATE tb_customer SET nm_customer = '$_POST[nama]', alamat = '$_POST[alamat]', kontak = '$_POST[kontak]'
		WHERE kd_customer = '$_POST[kode]'";
	$q = mysqli_query($conn, $sql);

	header("location:customers.php");
 ?>