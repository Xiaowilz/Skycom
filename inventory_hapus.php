<?php 
	require_once("conn.php");
	$hps = $_GET['hps'];
	$sql = "DELETE FROM tb_inventory WHERE kd_barang = '$hps'";
	$q = mysqli_query($conn, $sql);
	header("Location:inventory.php");
 ?>