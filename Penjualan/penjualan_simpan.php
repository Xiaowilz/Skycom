<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="../style.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../ionicons-2.0.1/css/ionicons.min.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/dataTables.bootstrap4.min.css">

	<!-- Script -->
	<script src="../javascript/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="../javascript/bootstrap.min.js"></script>
	<script type="text/javascript" src="../javascript/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="../javascript/dataTables.bootstrap4.min.js"></script>

</head>
<body>

</body>
</html>
<?php 
	session_start();
	require_once("../conn.php");
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
	$sales = $_POST['nmSales'];
	$ppn = $_SESSION['ppn'];
	$grandTotal;

	if($diskon == 0 && $subTotalSetelahPpn != 0)
	{
		$grandTotal = $subTotalSetelahPpn;
	}
	else if($diskon == 0 && $subTotalSetelahPpn == 0)
	{
		$grandTotal = $totalPenjualan;
	}
	else if($diskon != 0 && $subTotalSetelahPpn ==0)
	{
		$grandTotal = $_SESSION['grandTotal'];
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
	
	}
	// echo "$grandTotal";

	$sql2 = "INSERT INTO tb_penjualan(notrans,tgltrans,kredit,tglJatuhTempo,customer,subtotal,ppn,subTotalSetelahPpn,diskon,total,sales,catatan) VALUES('$noTrans','$tanggalTrans',$kredit,'$tglJatuhTempo','$namaCustomer','$totalPenjualan','$ppn','$subTotalSetelahPpn','$diskon','$grandTotal','$sales','$catatan')";

	$q2 = mysqli_query($conn, $sql2);
	$_SESSION['totalSetelahPpn'] = 0;
	$_SESSION['diskon'] = 0;
	$_SESSION['grandTotal'] = 0;
	$_SESSION['ppn'] = 0;

	echo"<script>
	$(document).ready(function()
	{
		window.open('dpenjualan/detail_penjualan?notrans=$noTrans', '_blank');
		
	});
	</script>";

	echo "<script>
		window.open('penjualan', '_self');
	</script>";
 ?>

