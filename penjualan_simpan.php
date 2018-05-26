<?php 
	session_start();
	require_once("conn.php");
	$sql = $conn->query("INSERT INTO tb_hd_penjualan SELECT * FROM tb_temp_penjualan");
	$sqlDelete = $conn->query("DELETE FROM tb_temp_penjualan");

	$noTrans = $_POST['no_transaksi'];
	$namaCustomer = $_POST['nama_customer'];
	$totalPenjualan = $_SESSION['totalPenjualan'];
	$tanggal = $_SESSION['tanggal'];
	$bulan  = $_SESSION['bulan'];
	$tahun = $_SESSION['tahun'];
	$tanggalTrans = "$tahun-$bulan-$tanggal";
	$diskon = $_SESSION['diskon'];
	$grandTotal = $_SESSION['grandTotal'];
	// $diskon = $_SESSION['kon'];
	// echo "$tanggal";
	// echo "$bulan";
	// echo "$tahun";
	// echo "$tanggalTrans";
	// $test = $_SESSION['test'];
	// echo "$test";
	// echo "$total";
	// echo "$noTrans";
	// echo "$namaCustomer";
	echo "$diskon";

	$sql2 = "INSERT INTO tb_penjualan(notrans,tgltrans,customer,subtotal,diskon,total) VALUES('$noTrans','$tanggalTrans','$namaCustomer','$totalPenjualan','$diskon','$grandTotal')";

	$q2 = mysqli_query($conn, $sql2);

	header('Location:penjualan.php');
 ?>