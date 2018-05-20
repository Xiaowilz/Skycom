<?php
	require_once('../conn.php');
	$keyword = addslashes($_GET["keyword"]);

?>

<div class="table-responsive">
	<table class="table table-hover table-sm">
		<thead class="thead-dark">
			<tr>
				<th>Kode Customer</th>
				<th>Name</th>
				<th>Address</th>
				<th>Contact</th>
				<th></th>
				<th></th>
			</tr>
		</thead>	

		<?php
			$sql = "SELECT kd_customer,nm_customer,alamat,kontak FROM tb_customer 
					WHERE nm_customer LIKE '%$keyword%' AND hapus = 0";

			// echo $sql;

			$q = mysqli_query($conn,$sql);

			while ($r = mysqli_fetch_array($q)) 
			{
			    echo "<tr>";
			    echo "<td>$r[kd_customer]";
			    echo "<td>$r[nm_customer]</td>";
			    echo "<td>$r[alamat]</td>";
			    echo "<td>$r[kontak]</td>";
			    // echo "<td><a href='customers_edit.php?edit=$r[kd_customer]'>Edit</a></td>";
			    echo "<td><span class='editCust ion-edit' data-toggle='modal' data-target='#editcustomermodal' data-backdrop='static' data-kodeCustomer='$r[kd_customer]' data-namaCustomer='$r[nm_customer]' data-alamat='$r[alamat]' data-kontak='$r[kontak]'></span></td>";
			    echo "<td><a class='ion-trash-a' href='customers_hapus.php?hps=$r[kd_customer]' onclick='return functionHapus()' class='hapus' value='.$r[kd_customer]' id='hapus' name='hps' data-id = '.$r[kd_customer]'></a></td>";
			    echo "</tr>";
			}	
				
		?>
	</table>
<script>
	$('.editCust').on('click', function()
	{
		var kode_customer = this.getAttribute('data-kodeCustomer');
		var nama_customer = this.getAttribute('data-namaCustomer');
		var alamat = this.getAttribute('data-alamat');
		var kontak = this.getAttribute('data-kontak');
		document.getElementById('kode').value = kode_customer;
		document.getElementById('nama').value = nama_customer;
		document.getElementById('alamat').value = alamat;
		document.getElementById('kon').value = kontak;
	});									
</script>