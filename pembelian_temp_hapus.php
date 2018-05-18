<?php 
	require_once("conn.php");
	$kodeHapus = $_POST['kodeHapus'];
	$sql = "DELETE FROM tb_temp_pembelian WHERE kd_barang = '$kodeHapus'";
	$q = mysqli_query($conn, $sql);
 ?>