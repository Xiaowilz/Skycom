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
	$subTotalSetelahPpn = $_SESSION['totalSetelahPpn'];
	var_dump($subTotalSetelahPpn);
	$grandTotal;
	if($diskon == 0)
	{
		$grandTotal = $totalPenjualan;
	}
	else
	{
		$grandTotal = $_SESSION['grandTotal'];
	}
	$catatan = $_POST['catatan'];
	$tempKredit = $_POST['cbo_jatuh_tempo'];
	$kredit = 0;
	$tglJatuhTempo = "";
	if($tempKredit == "kredit")
	{
		$kredit = 1;
		$tglJatuhTempo = $_POST['tgl_jatuh_tempo_hidden'];
		// var_dump($tglJatuhTempo);
	}
	else
	{
		$kredit = 0;
		$tglJatuhTempo = $_POST['tgl_jatuh_tempo_hidden'];
		// var_dump($tglJatuhTempo);
	}
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
	// echo "$diskon";
	echo "$grandTotal";

	$sql2 = "INSERT INTO tb_penjualan(notrans,tgltrans,kredit,tglJatuhTempo,customer,subtotal,subTotalSetelahPpn,diskon,total,catatan) VALUES('$noTrans','$tanggalTrans',$kredit,'$tglJatuhTempo','$namaCustomer','$totalPenjualan','$subTotalSetelahPpn','$diskon','$grandTotal','$catatan')";

	$q2 = mysqli_query($conn, $sql2);
	var_dump($q2);
	var_dump($sql2);
	header('Location:penjualan');
 ?>
