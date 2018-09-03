<?php 
	require_once("../conn.php");
	$hps= $_GET['hps'];
	$sql = "UPDATE tb_customer SET hapus = 1 WHERE kd_customer = '$hps'";
	$q = mysqli_query($conn,$sql);
	header("Location:customers.php");

 ?>
