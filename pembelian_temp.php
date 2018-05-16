<?php 
	require_once("conn.php");
	// $kodeBarang = isset($_POST['kode_barang']);
	// $namaBarang = isset($_POST['nama_barang']);
	$qty = $_POST['quantity'];
	$hargaItem = $_POST['harga_item'];
	$subTotal = $qty * $hargaItem;
	$sql = "INSERT INTO tb_temp_pembelian(notrans,kd_barang,nm_barang,qty,harga,jumlah)
	VALUES ('$_POST[kode_transaksi]', '$_POST[kode_item]', '$_POST[nama_item]', $qty, $hargaItem, $subTotal);";
	$q = mysqli_query($conn, $sql);
	if (mysqli_error($conn))
	{
		echo "Data Gagal Tersimpan";
	}
	else
	{
		echo "Data Tersimpan";
	}
 ?>