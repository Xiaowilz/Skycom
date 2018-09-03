<?php 
	session_start();
	require_once("../conn.php");
	$qty = (int)$_POST['quantity'];
	$hargaJual = (int)$_POST['harga_item'];
	$subTotal = $qty * $hargaJual;
	$sqlCekBarang = "SELECT * FROM tb_temp_penjualan WHERE kd_barang = '$_POST[kode_item]'";
	$cekBarang = mysqli_query($conn, $sqlCekBarang);

	$sqlQuantity = $conn->query("SELECT qty AS quantity FROM tb_inventory WHERE  kd_barang = '$_POST[kode_item]'");
	$data = mysqli_fetch_array($sqlQuantity);
	$quantity = $data['quantity'];

	if($qty <= $quantity)
	{
		if(mysqli_num_rows($cekBarang) > 0)
		{
			echo"
				<div class='alert alert-danger alert-dismissible fade show' role='alert'>
					<strong>Barang sudah ada di tabel</strong>
				  	<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
				    	<span aria-hidden='true'>&times;</span>
				  	</button>
				</div>
			";
			exit;
		}
		else if (!empty($qty) && !empty($hargaJual))
		{
			$sql = "INSERT INTO tb_temp_penjualan (no_trans,kd_barang,nm_barang,qty,harga,jumlah) VALUES 
			('$_POST[no_transaksi]','$_POST[kode_item]', '$_POST[nama_item]', '$qty', '$hargaJual', '$subTotal');";
			$q = mysqli_query($conn, $sql);

			$quantityInventory = $quantity - $qty;

			$sqlUpdateIventory = $conn->query("UPDATE tb_inventory SET qty = '$quantityInventory' WHERE kd_barang = '$_POST[kode_item]'");

			$_SESSION["qty"] = "$qty";

			echo "
				<div class='alert alert-primary alert-dismissible fade show' role='alert'>
					<strong>Barang berhasil ditambahkan</strong>
				  	<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
				    	<span aria-hidden='true'>&times;</span>
				  	</button>
				</div>
			";
			
		}
		exit;
	}
	else if($qty > $quantity)
	{
		echo "
			<div class='alert alert-danger alert-dismissible fade show' role='alert'>
				<strong>Stock tidak cukup</strong>
				<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
					<span aria-hidden='true'>&times;</span>
				</button>
			</div>
		";
		exit;
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


