<div class="table-responsive">
  	<table class="table table-hover table-sm">
  		<thead class="thead-dark">
			<tr>
				<th>Kode Customer</th>
				<th>Nama Customer</th>
				<th>Alamat</th>
				<th>Kontak</th>
				<th></th>
			</tr>
		</thead>	
		<?php
			require("../conn.php");
			$keyword0 = addslashes($_GET["keyword0"]);
			$sql = "SELECT * FROM tb_customer WHERE nm_customer LIKE '%$keyword0%' AND hapus = 0";
			$q = mysqli_query($conn, $sql);

			while ($r = mysqli_fetch_assoc($q)) 
			{
				echo"
					<tr>
						<td>$r[kd_customer]</td>
						<td>$r[nm_customer]</td>
						<td>$r[alamat]</td>
						<td>$r[kontak]</td>
						<td><a href='#' class='pilihCustomer' data-pilihCustomer='$r[kd_customer]' data-namaCustomer='$r[nm_customer]' data-dismiss='modal'>Pilih</a></td>
					<tr>
				";	
			}
		?>
	</table>
</div>						