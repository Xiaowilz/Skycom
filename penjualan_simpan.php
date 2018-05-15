<?php 
	require_once("conn.php");
	$sql = $conn->query("INSERT INTO tb_penjualan SELECT * FROM tb_temp_penjualan");
	$sqlDelete = $conn->query("DELETE FROM tb_temp_penjualan");
	if (mysqli_error($conn)) 
	{
		echo "Data Tidak Tersimpan";
		// header("Location:penjualan.php")
	}
	else
	{
		echo "Data Tersimpan";
		// header("Location:penjualan.php")
	}
	
 ?>