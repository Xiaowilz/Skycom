<div class="table-responsive">
	<table class="table table-hover">
	 	<thead>
		    <tr>
		      <th scope="col">Kode Item</th>
		      <th scope="col">Item</th>
		      <th scope="col">Quantity</th>
		      <th scope="col">Harga</th>
		      <th scope="col">Sub Total</th>
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
						</tr>
		    		";
		    	}
		    ?>
	 	</tbody>
	</table>
	
</div>