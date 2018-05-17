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
			    echo "<td><span class='ion-edit' data-toggle='modal' data-target='#myModal0' data-backdrop='static'></span></td>";
			    echo "<td><span class='ion-trash-a'></span></td>";
			    echo "</tr>";
			}
		?>
	</table>
</div>