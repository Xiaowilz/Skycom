<div class="table-responsive">
  	<table class="table table-hover table-sm">
  		<thead class="thead-dark">
			<tr>
				<th>Supplier Code</th>
				<th>Supplier Name</th>
				<th>Address</th>
				<th>Contact</th>
				<th></th>
			</tr>
		</thead>	
		<?php
			require("../conn.php");
			$keyword = addslashes($_GET["keyword0"]);
			$sql = "SELECT * FROM tb_supplier WHERE nm_supplier LIKE '%$keyword%' AND hapus = 0";
			$q = mysqli_query($conn, $sql);

			while ($r = mysqli_fetch_assoc($q)) 
			{
				echo"
					<tr>
						<td>$r[kd_supplier]</td>
						<td>$r[nm_supplier]</td>
						<td>$r[alamat]</td>
						<td>$r[kontak]</td>
						<td><a href='#' data-kodeSupplier='$r[kd_supplier]' data-namaSupplier='$r[nm_supplier]' class='pilihSupplier' data-dismiss='modal'>Pilih</a></td>
					<tr>
				";	
			}
		?>
	</table>	
</div>