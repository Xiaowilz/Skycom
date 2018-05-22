<div class="table-responsive">
  	<table class="table table-hover table-sm">
  		<thead class="thead-dark">
			<tr>
				<th>Type</th>
				<th>Item Code</th>
				<th>Item Name</th>
				<th>Price</th>
				<th></th>
			</tr>
		</thead>	
		<?php
			require("../conn.php");
			$keyword1 = addslashes($_GET["keyword1"]);
			$sql3 = "SELECT jns_barang, kd_barang, nm_barang, hrg_jual FROM tb_inventory WHERE nm_barang LIKE '%$keyword1%' AND hapus = 0";
			$q3 = mysqli_query($conn, $sql3);

			while ($r3 = mysqli_fetch_assoc($q3)) 
			{
				echo"
					<tr>
						<td>$r3[jns_barang]</td>
						<td>$r3[kd_barang]</td>
						<td>$r3[nm_barang]</td>
						<td>$r3[hrg_jual]</td>
						<td><a href='#' class='pilihItem' data-pilihItem='$r3[kd_barang]' data-namaItem='$r3[nm_barang]' data-hargaItem='$r3[hrg_jual]' data-dismiss='modal'>Pilih</a></td>
					<tr>
				";	
			}
		?>
	</table>
</div>

<script type="text/javascript">
	$('.pilihItem').on('click', function() {
		var kodeItem = this.getAttribute('data-pilihItem');
		var namaItem = this.getAttribute('data-namaItem');
		var hargaItem = this.getAttribute('data-hargaItem');
		document.getElementById('kode_item').value = kodeItem;
		document.getElementById('nama_item').value = namaItem;
		document.getElementById('harga_item').value = hargaItem;
	});
</script>