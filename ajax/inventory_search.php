<?php
	require_once('../conn.php');
	$keyword = addslashes($_GET["keyword"]);
?>

<div class="table-responsive">
	<table class="table table-hover table-sm">
	 	<thead class="thead-dark">
		    <tr>
		      <th>Jenis Barang</th>
		      <th>Kode Barang</th>
		      <th>Nama Barang</th>
		      <th>Qty</th>
		      <th>Harga Beli</th>
		      <th>Harga Jual</th>
		      <th></th>
		      <th></th>
		    </tr>
	  	</thead>

		<tbody>
		    
		    <?php
				$sql = "SELECT * FROM tb_inventory WHERE nm_barang LIKE '%$keyword%' AND hapus = 0";
				$q = mysqli_query($conn,$sql);
				while ($r = mysqli_fetch_assoc($q)) 
				{
				    echo "<tr>";
				    echo "<td>$r[jns_barang]</td>";
				    echo "<td>$r[kd_barang]</td>";
				    echo "<td>$r[nm_barang]</td>";
				    echo "<td>$r[qty]</td>";
				    echo "<td>$r[hrg_beli]</td>";
				    echo "<td>$r[hrg_jual]</td>";
				    echo "<td><span class='editBarang ion-edit' data-toggle='modal' data-target='#myModal0' data-backdrop='static' data-jenisBarang='$r[jns_barang]' data-kodeBarang='$r[kd_barang]' data-namaBarang='$r[nm_barang]' data-qty='$r[qty]' data-hargaBeli='$r[hrg_beli]' data-hargaJual='$r[hrg_jual]'></span></td>";
				    echo "<td class='hapus'><a class='ion-trash-a' href='inventory_hapus.php?hps=$r[kd_barang]' onclick='return functionHapus()'></a></td>";
				    echo "</tr>";
				}
			?>
	 	</tbody>
	</table>				
	<script type="text/javascript">
	$('.editBarang').on('click', function()
	{
		var jenisBarang = this.getAttribute('data-jenisBarang');
		var kodeBarang = this.getAttribute('data-kodeBarang');
		var namaBarang = this.getAttribute('data-namaBarang');
		var quantity = this.getAttribute('data-qty');
		var hargaBeli = this.getAttribute('data-hargaBeli');
		var hargaJual = this.getAttribute('data-hargaJual');
		document.getElementById('kodeitem').value = kodeBarang;
		document.getElementById('namaitem').value = namaBarang;
		document.getElementById('stock').value = quantity;
		document.getElementById('hargabeli').value = hargaBeli;
		document.getElementById('hargajual').value = hargaJual;
	});
	</script>			
</div>	