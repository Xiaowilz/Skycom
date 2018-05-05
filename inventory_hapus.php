<?php 
	require_once("conn.php");
	$hps = $_GET['hps'];
	$sql = "UPDATE tb_inventory SET hapus = 1 WHERE kd_barang = '$hps'";
	$q = mysqli_query($conn, $sql);
	header("Location:inventory.php");
 ?>