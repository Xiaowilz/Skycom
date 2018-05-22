<?php 
	session_start();
	require_once("conn.php");
	$sql = $conn->query("INSERT INTO tb_hd_penjualan SELECT * FROM tb_temp_penjualan");
	$sqlDelete = $conn->query("DELETE FROM tb_temp_penjualan");

	$noTrans = $_POST['no_transaksi'];
	$namaCustomer = $_POST['nama_customer'];
	$totalPenjualan = $_SESSION['totalPenjualan'];
	// $test = $_SESSION['test'];
	// echo "$test";
	// echo "$total";
	// echo "$noTrans";
	// echo "$namaCustomer";
	$sql2 = "INSERT INTO tb_penjualan(notrans,customer,total) VALUES('$noTrans','$namaCustomer','$totalPenjualan')";
	$q2 = mysqli_query($conn, $sql2);

	header('Location:penjualan.php');
 ?>