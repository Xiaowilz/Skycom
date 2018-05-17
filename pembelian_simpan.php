<?php 
	require_once("conn.php");
	$sql = $conn->query("INSERT INTO tb_hd_pembelian SELECT * FROM tb_temp_pembelian");
	$sqlDelete = $conn->query("DELETE FROM tb_temp_pembelian");
 ?>