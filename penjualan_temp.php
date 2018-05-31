<?php 
	session_start();
	require_once("conn.php");
	$qty = $_POST['quantity'];
	$hargaJual = $_POST['harga_item'];
	$subTotal = $qty * $hargaJual;

	$sqlCekBarang = "SELECT * FROM tb_temp_penjualan WHERE kd_barang = '$_POST[kode_item]'";
	$cekBarang = mysqli_query($conn, $sqlCekBarang);
	if(mysqli_num_rows($cekBarang) > 0)
	{
		echo"
			<script>
				window.alert('Barang Telah Ada di Tabel');
			</script>
		";
		exit;
	}
	else if (!empty($qty) && !empty($hargaJual))
	{
		$sql = "INSERT INTO tb_temp_penjualan (no_trans,kd_barang,nm_barang,qty,harga,jumlah) VALUES 
		('$_POST[no_transaksi]','$_POST[kode_item]', '$_POST[nama_item]', '$qty', '$hargaJual', '$subTotal');";
		$q = mysqli_query($conn, $sql);

		$sqlQuantity = $conn->query("SELECT qty AS quantity FROM tb_inventory WHERE  kd_barang = '$_POST[kode_item]'");
		$data = mysqli_fetch_array($sqlQuantity);
		$quantity = $data['quantity'];

		$quantityInventory = $quantity - $qty;

		$sqlUpdateIventory = $conn->query("UPDATE tb_inventory SET qty = '$quantityInventory' WHERE kd_barang = '$_POST[kode_item]'");

		$_SESSION["qty"] = "$qty";
	}
	
	// if (mysqli_error($conn)) 
	// {
	// 	echo "
	// 		<script>
	// 			alert('Data Tidak Tersimpan');
	// 		</script>
	// 	";
	// }
	// else
	// {
	// 	echo "
	// 		<script>
	// 			alert('Data Tersimpan');
	// 		</script>
	// 	";
	// }
 ?>