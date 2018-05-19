<div class="table-responsive table-sm">
	<table class="table table-hover table-bordered">
	 	<thead class="thead-dark">
		    <tr>
		      <th scope="col">Kode Item</th>
		      <th scope="col">Item</th>
		      <th scope="col">Quantity</th>
		      <th scope="col">Harga</th>
		      <th scope="col">Sub Total</th>
		      <th scope="col"></th>
		    </tr>
	  	</thead>

		<tbody>
		    <?php 
		    	require("conn.php");
		    	$sql3 = "SELECT kd_barang,nm_barang,qty,harga,jumlah FROM tb_temp_pembelian";
		    	$q3 = mysqli_query($conn, $sql3);
		    	while ($r3 = mysqli_fetch_assoc($q3))
		    	{
		    		echo "
						<tr>
							<td>$r3[kd_barang]</td>
							<td>$r3[nm_barang]</td>
							<td>$r3[qty]</td>
							<td>$r3[harga]</td>
							<td>$r3[jumlah]</td>
							<td><a href='#' data-kodeHapus='$r3[kd_barang]' class='pilihHapus'>Hapus</a>
						</tr>
		    		";
		    	}
		     ?>
		     <script type="text/javascript">
		     	$('.pilihHapus').on('click', function()
		     	{
		     		var kode_hapus = this.getAttribute('data-kodeHapus');
		     		$.ajax({
		     			url: 'pembelian_temp_hapus.php',
		     			type: 'POST',
		     			dataType: 'html',
		     			data: {'kodeHapus': kode_hapus},
		     			success : function()
		     			{
		     				$('#temp_pembelian').load('pembelian_temp_load.php');
		     			}
		     		});
		     		
		     	});
		     </script>
	 	</tbody>
	</table>
</div>