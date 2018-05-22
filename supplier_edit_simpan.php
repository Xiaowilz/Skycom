<?php 
	require_once("conn.php");
	$sql = "UPDATE tb_supplier SET nm_supplier = '$_POST[nm_supp]', alamat = '$_POST[alamat_supp]', kontak = '$_POST[kontak_supp]'
	WHERE kd_supplier = '$_POST[kd_supp]'";
	$q = mysqli_query($conn,$sql);
	header("Location:supplier.php");
 ?>