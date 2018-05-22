<?php 
	require_once("conn.php");
	$hps = $_GET['hps'];
	$sql = "UPDATE tb_supplier set hapus = 1 WHERE kd_supplier = '$hps'";
	$q = mysqli_query($conn, $sql);
	header("Location:supplier.php");
 ?>