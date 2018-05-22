<?php
	require_once('../conn.php');
	$keyword = addslashes($_GET["keyword"]);
?>

<div id="latar-tabel">
	<table class="table table-hover table-sm">
		<thead class="thead-dark">
			<tr>
				<th>Supplier Code</th>
				<th>Name</th>
				<th>Address</th>
				<th>Contact</th>
				<th></th>
				<th></th>
			</tr>
		</thead>

		<?php
			$sql = "SELECT * FROM tb_supplier WHERE nm_supplier LIKE '%$keyword%' AND hapus = 0";

			$q = mysqli_query($conn,$sql);

			while ($r = mysqli_fetch_assoc($q)) 
			{
			    echo "<tr>";
			    echo "<td>$r[kd_supplier]</td>";
			    echo "<td>$r[nm_supplier]</td>";
			    echo "<td>$r[alamat]</td>";
			    echo "<td>$r[kontak]</td>";
			    echo "<td><span class='editSupplier ion-edit' data-toggle='modal' data-target='#myModal0' data-backdrop='static' data-kodeSupplier='$r[kd_supplier]' data-namaSupplier='$r[nm_supplier]' data-alamat='$r[alamat]' data-kontak='$r[kontak]'></span></td>";
			    echo "<td><a href='supplier_hapus.php?hps=$r[kd_supplier]' onclick='return functionHapus()'><span class='ion-trash-a'></span></a></td>";
			    echo "</tr>";
			}
		?>
	</table>
</div>

<script type="text/javascript">
	function functionHapus()
	{
		var r = window.confirm('Yakin di hapus?');
		if (r == true) 
		{
			alert('Data Terhapus');
			return true;
		}
		else
		{
			alert('Data Tidak Terhapus');
			return false;
		}
	}
	
</script>

<script type="text/javascript">
	$('.editSupplier').on('click', function()
	{
		var kodeSupplier = this.getAttribute('data-kodeSupplier');
		var namaSupplier = this.getAttribute('data-namaSupplier');
		var alamat = this.getAttribute('data-alamat');
		var kontak = this.getAttribute('data-kontak');
		document.getElementById('kode_supplier').value = kodeSupplier;
		document.getElementById('nama_supplier').value = namaSupplier;
		document.getElementById('alamat_supplier').value = alamat;
		document.getElementById('kontak_supplier').value = kontak;
	});
</script>