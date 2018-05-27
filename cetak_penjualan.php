<?php 
	require_once __DIR__ . '/vendor/autoload.php';

	$cetak = '
		<table class="table table-hover table-sm table-bordered">
	 	<thead class="thead-dark">
		    <tr>
		      <th scope="col">Kode Barang</th>
		      <th scope="col">Tanggal</th>
		      <th scope="col">Customer</th>
		      <th scope="col">Subtotal</th>
		      <th scope="col">Diskon</th>
		      <th scope="col">Total</th>
		      <th scope="col"></th>
		    </tr>
	  	</thead>
	  	<tbody>';

	  	session_start();
		    	require("conn.php");
		    	$sql5 = "SELECT * FROM tb_penjualan";
		    	$q5 = mysqli_query($conn, $sql5);
		    	while ($r5 = mysqli_fetch_assoc($q5)) 
		    	{
		    		$cetak .='
						<tr>
							<td>'.$r5["notrans"].'</td>
							<td>'.$r5["tgltrans"].'</td>
							<td>'.$r5["customer"].'</td>
							<td>'.$r5["subtotal"].'</td>
							<td>'.$r5["diskon"].'</td>
							<td>'.$r5["total"].'</td>
						</tr>';
		    	}

	$cetak .= '</tbody>
	  	</table>
	';

	$mpdf = new \Mpdf\Mpdf();
	$mpdf->WriteHTML($cetak);
	$mpdf->Output('laporan_penjualan.php', 'I');
 ?>