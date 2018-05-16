<div class="table-responsive table-sm">
	<table class="table table-hover table">
	 	<thead class="thead-dark">
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
						</tr>
		    		";
		    	}
		     ?>
	 	</tbody>
	</table>
</div>