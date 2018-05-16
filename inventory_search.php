<?php
	require_once('../conn.php');
	$keyword = $_GET["keyword"];
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

				echo $sql;

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
				    // echo "<td><a href='inventory_edit.php?edit=$r[kd_barang]'<span class='ion-edit'></a></span></td>";
				    echo "<td><span class='ion-edit' data-toggle='modal' data-target='#myModal0' data-backdrop='static'></span></td>";
				    echo "<td class='hapus'><a class='ion-trash-a' href='inventory_hapus.php?hps=$r[kd_barang]' onclick='return functionHapus()'></a></td>";
				    echo "</tr>";
				}
			?>
	 	</tbody>
	</table>							
</div>	