<?php
	require_once("conn.php");
	$sql = "INSERT INTO tb_inventory(jns_barang,kd_barang,nm_barang,qty,hrg_beli,hrg_jual,hapus) VALUES
	('$_POST[jns_barang]','$_POST[kd_barang]', '$_POST[nm_barang]', '$_POST[qty]', '$_POST[hrg_beli]','$_POST[hrg_jual]', 0);";
	$q = mysqli_query($conn, $sql);
	if (mysqli_error($conn)) 
	{
		echo "
			<script>
				alert('Data Tidak Tersimpan');
			</script>
		";
	}
	else
	{
		echo "
			<script>
				alert('Data Tersimpan');
			</script>
		";
	}
?>