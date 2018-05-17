<?php 
	require_once("conn.php");
	$kdHapus = $_POST['kd_hapus'];
	$sql = "DELETE FROM tb_temp_penjualan WHERE kd_barang = '$kdHapus'";
	$q = mysqli_query($conn, $sql);
 ?>