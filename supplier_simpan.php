<?php
	require_once("conn.php");

	$kode = $_POST['kd_supp'];
	$nama = $_POST['nm_supp'];
	$alamat = $_POST['alamat_supp'];
	$kontak = $_POST['kontak_supp'];

	$sql = "INSERT INTO tb_supplier(kd_supplier,nm_supplier,alamat,kontak) VALUES('$kode','$nama','$alamat','$kontak')";

	$q = mysqli_query($conn,$sql);
	if (mysqli_error($conn)) 
	{
		echo "
			<script>
				window.alert('Data Tidak Tersimpan');
			</script>
		";
		header("Location:supplier.php");
	}
	else
	{
		echo"
			<script>
				window.alert('Data Tersimpan');
			</script>

		";
		header("Location:supplier.php");
		// echo "Data tersimpan";
	}

	

?>
