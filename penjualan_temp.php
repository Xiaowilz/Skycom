<?php 
	require("conn.php");
	$qty = $_POST['quantity'];
	$hargaJual = $_POST['harga_item'];
	$subTotal = $qty * $hargaJual;
	$sql = "INSERT INTO tb_temp_penjualan (kd_barang,nm_barang,qty,harga,jumlah) VALUES 
	('$_POST[kode_item]', '$_POST[nama_item]', '$qty', '$hargaJual', '$subTotal');";
	$q = mysqli_query($conn, $sql);
	if (mysqli_error($conn)) 
	{
		echo "
			<script>
				alert('Data Tidak Tersimpan');
				window.history.back();
			</script>
		";
	}
	else
	{
		echo "
			<script>
				alert('Data Tersimpan');
				window.history.back();
			</script>
		";
	}
 ?>