<?php 
	session_start();
	require_once("conn.php");
	$sql = $conn->query("INSERT INTO tb_hd_pembelian SELECT * FROM tb_temp_pembelian");
	$sqlDelete = $conn->query("DELETE FROM tb_temp_pembelian");

	$kode = $_POST['kode_transaksi'];
	$namaSupplier = $_POST['nama_supplier'];
	// echo "$kode";
	// echo "$namaSupplier";
	$totalPembelian = $_SESSION['totalPembelian'];
	// echo "$totalPembelian";
	$sql3 = "INSERT INTO tb_pembelian(notrans,supplier,total) VALUES ('$kode','$namaSupplier','$totalPembelian');";
	$q3 = mysqli_query($conn, $sql3);


	// if (mysqli_error($conn)) 
	// {
	// 	echo "Data Tidak Tersimpan";
	// 	// header("Location:penjualan.php")
	// }
	// else
	// {
	// 	echo "Data Tersimpan";
	// 	// header("Location:penjualan.php")
	// }
	

	header("Location:pembelian.php");
 ?>