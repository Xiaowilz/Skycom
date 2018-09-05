<?php 
	session_start();
	require_once("../conn.php");
	$sql = $conn->query("INSERT INTO tb_hd_pembelian SELECT * FROM tb_temp_pembelian");
	$sqlDelete = $conn->query("DELETE FROM tb_temp_pembelian");

	$kode = $_POST['kode_transaksi'];
	$namaSupplier = $_POST['nama_supplier'];
	$totalPembelian = $_SESSION['totalPembelian'];
	$tanggal = $_SESSION['tanggal'];
	$bulan = $_SESSION['bulan'];
	$tahun = $_SESSION['tahun'];
	$tanggalTrans = "$tahun-$bulan-$tanggal";
	$sql3 = "INSERT INTO tb_pembelian(notrans,tgltrans,supplier,total) VALUES ('$kode','$tanggalTrans','$namaSupplier','$totalPembelian');";
	$q3 = mysqli_query($conn, $sql3);	

	header("Location:pembelian.php");
 ?>