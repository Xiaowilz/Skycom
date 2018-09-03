<?php
	require_once("../conn.php");

	$sql ="INSERT INTO tb_customer(kd_customer,nm_customer,alamat,kontak,hapus) VALUES
	('$_POST[kd_cust]','$_POST[nm_cust]', '$_POST[almt_cust]','$_POST[kontak_cust]', 0);";

	$q = mysqli_query($conn,$sql);
	if (mysqli_error($conn)) 
	{
		echo "
			<script>
				window.alert('Data Tidak Tersimpan');
			</script>
		";
		header("Location:customers.php");
	}
	else
	{
		echo"
			<script>
				window.alert('Data Tersimpan');
			</script>

		";
		header("Location:customers.php");
		// echo "Data tersimpan";
	}
?>