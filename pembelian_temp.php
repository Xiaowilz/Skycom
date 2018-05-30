<?php 
	session_start();
	require_once("conn.php");
	// $kodeBarang = isset($_POST['kode_barang']);
	// $namaBarang = isset($_POST['nama_barang']);
	$qty = $_POST['quantity'];
	$hargaItem = $_POST['harga_item'];
	$subTotal = $qty * $hargaItem;

	$sqlCekBarang = "SELECT * FROM tb_temp_pembelian WHERE kd_barang = '$_POST[kode_item]'";
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
	else
	{
		$sql = "INSERT INTO tb_temp_pembelian(notrans,kd_barang,nm_barang,qty,harga,jumlah)
		VALUES ('$_POST[kode_transaksi]', '$_POST[kode_item]', '$_POST[nama_item]', $qty, $hargaItem, $subTotal);";
		$q = mysqli_query($conn, $sql);

		$sqlQuantity = $conn->query("SELECT qty AS quantity FROM tb_inventory WHERE  kd_barang = '$_POST[kode_item]'");
		$data = mysqli_fetch_array($sqlQuantity);
		$quantity = $data['quantity'];

		$quantityInventory = $quantity + $qty;

		$sqlUpdateIventory = $conn->query("UPDATE tb_inventory SET qty = '$quantityInventory' WHERE kd_barang = '$_POST[kode_item]'");

		$_SESSION["qty"] = "$qty";
		if (mysqli_error($conn))
		{
			echo "Data Gagal Tersimpan";
		}
		else
		{
			echo "Data Tersimpan";
		}
	}
	
 ?>