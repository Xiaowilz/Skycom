<div class="table-responsive">
	<table class="table table-hover table-sm table-bordered">
	 	<thead class="thead-dark">
		    <tr>
		      <th scope="col">Kode Item</th>
		      <th scope="col">Item</th>
		      <th scope="col" width="7%">Quantity</th>
		      <th scope="col">Harga</th>
		      <th scope="col" width="20%">Sub Total</th>
		      <th scope="col"></th>
		    </tr>
	  	</thead>

		<tbody>
		    <?php
		    	session_start();
		    	require("conn.php");
		    	$totalPenjualan = 0;
		    	$sql5 = "SELECT kd_barang,nm_barang,qty,harga,jumlah FROM tb_temp_penjualan";
		    	$q5 = mysqli_query($conn, $sql5);
		    	while ($r5 = mysqli_fetch_assoc($q5)) 
		    	{
		    		$harga = number_format($r5['harga'], 0, ',', '.');
		    		$jumlah = number_format($r5['jumlah'], 0, ',', '.');
		    		echo "
						<tr>
							<td>$r5[kd_barang]</td>
							<td>$r5[nm_barang]</td>
							<td align='center'>$r5[qty]</td>
							<td align='right'>$harga</td>
							<td align='right'>$jumlah</td>
							<td width='5%'><center><ion-icon name='trash' href='#' data-kodeHapus='$r5[kd_barang]' class='hapus'></ion-icon></center></td>
						</tr>
		    		";
		    		$totalPenjualan += $r5['jumlah'];
		    	}
		    	$_SESSION['totalPenjualan'] = "$totalPenjualan";
		    	// $_SESSION['test'] = "Test 123";
		    ?>
				<tr>
					<td colspan="6"></td>
				</tr>

				<tr>
					<td colspan="4" align="center"><b>Total<b></td>
					<td align="right"><?php echo "Rp " .number_format($totalPenjualan, 0, ',', '.'); ?> </td>
					<td></td>
				</tr>

				<tr>
					<td colspan="4" align="center">
						<div class="form-check">
						  	<input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
						  	<label class="form-check-label" for="defaultCheck1"><h6>PPN 10%</h6></label>
						</div>
					</td>
					<td></td>
					<td></td>
				</tr>

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