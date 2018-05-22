<?php 
	require_once("conn.php");
	$sql = "UPDATE tb_inventory SET jns_barang = '$_POST[jenis_barang]', nm_barang = '$_POST[nama_item]', qty = '$_POST[stock_item]',
			hrg_beli = '$_POST[harga_beli]', hrg_jual = '$_POST[harga_jual]' WHERE kd_barang = '$_POST[kode_item]'";
	$q = mysqli_query($conn, $sql);
	header("Location:inventory.php");
 ?>