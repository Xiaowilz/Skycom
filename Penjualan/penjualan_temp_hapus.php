<?php 
	session_start();
	require_once("../conn.php");
	$qty = $_SESSION["qty"];
	$kdHapus = $_POST['kd_hapus'];

	$sqlQuantity = $conn->query("SELECT qty AS quantity FROM tb_inventory WHERE  kd_barang = '$kdHapus'");
	$data = mysqli_fetch_array($sqlQuantity);
	$quantity = $data['quantity'];

	$quantityInventory = $quantity + $qty;

	$sqlUpdateIventory = $conn->query("UPDATE tb_inventory SET qty = '$quantityInventory' WHERE kd_barang = '$kdHapus'");

	
	$sql = "DELETE FROM tb_temp_penjualan WHERE kd_barang = '$kdHapus'";
	$q = mysqli_query($conn, $sql);

	$sqlCekTemp = "SELECT * FROM tb_temp_penjualan";
	$cekTemp = mysqli_query($conn, $sqlCekTemp);
	if(mysqli_num_rows($cekTemp) > 0){
		echo"1";
	}
	else if(mysqli_num_rows($cekTemp) <= 0){
		echo "0";
	}	

 ?>