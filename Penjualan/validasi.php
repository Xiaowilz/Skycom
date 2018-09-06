<?php
	$errorMSG = "";
	$tabel = "";

	require_once("../conn.php");
	$sql = "SELECT * FROM tb_temp_penjualan";
	$query = mysqli_query($conn, $sql);
	$count = mysqli_num_arrows($query);

	/* NAME */
	if (empty($_POST["namaCust"])) {
	    $errorMSG = "** Customer Belum Terisi";
	} else {
	    $name = $_POST["namaCust"];
	}

	if ($count == 0)
	{
		$tabel = "Kosong";
	}

	if(empty($errorMSG)){
	$msg = "Name: ".$name;
	echo json_encode(['code'=>200, 'msg'=>$msg]);
	exit;
	}

	echo json_encode(['code'=>404, 'msg'=>$errorMSG]);

	echo json_encode(['code'=>200, 'count'=>$count]);
?>