<?php 
	require_once("conn.php");
	$edit = $_GET['edit'];
	$sql = "SELECT * FROM tb_inventory WHERE kd_barang = '$edit'";
	$q = mysqli_query($conn, $sql);

	while ($r = mysqli_fetch_assoc($q)) 
	{
		echo "
			<label>Jenis Barang : </label>
			<input type='text' name='jns_barang' value='$r[jns_barang]'</input></br>
			<label>Kode Barang : </label>
			<input type='text' name='kd_barang' value='$r[kd_barang]'></input></br>
			<label>Nama Barang : </label>
			<input type='text' name='nm_barang' value='$r[nm_barang]'></input></br>
			<label>Qty : </labe>
			<input type='text' name='qty' value='$r[qty]'></input></br>
			<label>Harga Beli : <label>
			<input type='text' name='hrg_beli' value='$r[hrg_beli]'></input></br>
			<label>Harga Jual : <label>
			<input type='text' name='hrg_jual' value='$r[hrg_jual]'></input>
		";	
	}
 ?>