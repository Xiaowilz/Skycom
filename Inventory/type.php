<?php
	require_once("../conn.php");
	$type = $_POST['type'];
	$sql2 = "SELECT max(kd_barang) AS maxkodeBarang FROM tb_inventory WHERE jns_barang = '$type'";
	$q2 = mysqli_query($conn, $sql2);
	$data = mysqli_fetch_array($q2);
	$noTrans = $data['maxkodeBarang'];

	$noUrut = (int) substr($noTrans, 5, 5);
	$noUrut++;

	$char = "$type"."-";
	$noTrans = $char. sprintf('%05s', $noUrut);
	echo "$noTrans";
?>