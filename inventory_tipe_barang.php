<?php 
	require_once("conn.php");
	$sql = "INSERT INTO tb_tipebarang(tipebarang,namatipebarang) VALUES ('$_POST[tipe_barang]', '$_POST[nama_tipe]')";
	$q = mysqli_query($conn, $sql);
	if(mysqli_error($conn))
	{
		echo "Data Tidak Tersimpan";
	}
	else
	{
		echo "Data Tersimpan";
		header("Location:inventory");
	}	

 ?>