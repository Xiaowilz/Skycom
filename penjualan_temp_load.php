<div class="table-responsive">
	<table class="table table-hover table-sm">
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
		    	$sql5 = "SELECT kd_barang,nm_barang,qty,harga,jumlah FROM tb_temp_penjualan";
		    	$q5 = mysqli_query($conn, $sql5);
		    	while ($r5 = mysqli_fetch_assoc($q5)) 
		    	{
		    		echo "
						<tr>
							<td>$r5[kd_barang]</td>
							<td>$r5[nm_barang]</td>
							<td>$r5[qty]</td>
							<td>$r5[harga]</td>
							<td>$r5[jumlah]</td>
							<td><a href='#' data-kodeHapus='$r5[kd_barang]' class='hapus'>Hapus</td>
						</tr>
		    		";
		    	}
		    ?>
		    <script type="text/javascript">
		    	$('.hapus').on('click',function() 
		    	{
		    		var kd_hapus = this.getAttribute('data-kodeHapus');
		    		$.ajax({
		    			url: 'penjualan_temp_hapus.php',
		    			type: 'POST',
		    			dataType: 'html',
		    			data: {'kd_hapus' : kd_hapus},
		    			success : function()
		    			{
		    				$("#tabelTemp").load("penjualan_temp_load.php");
		    			}
		    		});
		    			
		    	});
		    </script>
	 	</tbody>
	</table>
	
</div>