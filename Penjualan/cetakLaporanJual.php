
	<?php 
	require_once __DIR__ . '/../vendor/autoload.php';

	$mpdf = new \Mpdf\Mpdf([
		'mode' => 'utf-8',
		'margin_top' => 23,
		'format' => 'A4']);

	$mpdf->useOddEven = 1;

	$mpdf->SetHTMLHeader('
			<div style="text-align: center; font-weight: bold; font-size: 16pt;">
			    Laporan Penjualan

			</div>','O');
	$mpdf->SetHTMLHeader('<div style="border-bottom: 1px solid #000000;">Laporan Penjualan</div>','E');

	$mpdf->SetHTMLFooter('
		<table width="100%" style="vertical-align: bottom; font-family: serif; 
		    font-size: 8pt; color: #000000;">
		    <tr>
		        <td width="50%">{DATE j-m-Y}</td>
		        <td width="50%" align="right">Hal {PAGENO}/{nbpg}</td>
		    </tr>
		</table>','O');

	$mpdf->SetHTMLFooter('
		<table width="100%" style="vertical-align: bottom; font-family: serif; 
		    font-size: 8pt; color: #000000; font-weight: bold; font-style: italic;">
		    <tr>
		        <td width="33%" align="center" style="font-weight: bold; font-style: italic;">Hal {PAGENO}/{nbpg}</td>
		        <td width="33%" style="text-align: right; ">{DATE j-m-Y}</td>
		    </tr>
		</table>', 'E');

	require("../conn.php");
	$tglAwal = $_GET['tglAwal'];
	$tglAkhir = $_GET['tglAkhir'];

	$cetak= '
	<html>
	<head>
		<meta charset="UTF-8">
		<title>Laporan Penjualan</title>
		<link rel="stylesheet" type="text/css" href="../css/styleLaporanJual.css">
	</head>
	<body>';

	if ($tglAwal == "" && $tglAkhir == "")
	{	
		$cetak.= '<strong>Data Laporan Penjualan Secara Keseluruhan</strong>';
	}
	else
	{
		$cetak .= '<strong>Laporan Penjualan dari tanggal '.date_format(new DateTime($tglAwal), "d-m-Y").' hingga '.date_format(new DateTime($tglAkhir), "d-m-Y </strong>");
	}

		$cetak.= '
		<table width="100%" id="tabel">
		    <tr>
               	<th>No. Transaksi</th>
                <th>Tanggal Transaksi</th>
                <th>Customer</th>
                <th>Grand Total</th>
		    </tr>';

		    	if ($tglAwal == "" && $tglAkhir == "")
		    	{
		    		$sql5 = "SELECT * FROM tb_penjualan WHERE tgltrans";
			    	$q5 = mysqli_query($conn, $sql5);
			    	$grandTotal = 0;

			    	while ($r5 = mysqli_fetch_assoc($q5)) 
			    	{
                    	$tanggalTransaksi = date_format(new DateTime($r5['tgltrans']), "d-m-Y");
			    		$cetak .='
							<tr>
								<td align="center">'.$r5["notrans"].'</td>
								<td align="center">'.$tanggalTransaksi.'</td>
								<td align="center">'.$r5["customer"].'</td>
								<td align="right">'.number_format($r5["total"],0, ',', '.').'</td>
							</tr>';
						$grandTotal = $grandTotal + $r5['total'];
			    	}
		    	}
			    else
			    {
			    	$sql5 = "SELECT * FROM tb_penjualan WHERE tgltrans BETWEEN '$tglAwal' AND '$tglAkhir'";
			    	$q5 = mysqli_query($conn, $sql5);
			    	$grandTotal = 0;
			    	while ($r5 = mysqli_fetch_assoc($q5)) 
			    	{
				    	$tanggalTransaksi = date_format(new DateTime($r5['tgltrans']), "d-m-Y");
			    		$cetak .='
							<tr>
								<td align="center">'.$r5["notrans"].'</td>
								<td align="center">'.$tanggalTransaksi.'</td>
								<td align="center">'.$r5["customer"].'</td>
								<td align="right">'.number_format($r5["total"],0, ',', '.').'</td>
							</tr>';
						$grandTotal = $grandTotal + $r5['total'];
			    	}
			    }
		    	
		    	$cetak.='
					<tr>
						<td colspan="3" align="center"><strong><h4>Jumlah</h4></strong></td>
						<td align="right"><strong><h4>Rp ' .number_format($grandTotal,0, ',', '.').'</h4></strong></td>
					<tr>
		    	';

	$cetak .= '
	  	</table>
	</body>
	</html>
	';

	
	$mpdf->WriteHTML($cetak);
	$mpdf->Output('laporan_penjualan.php', 'I');
 ?>

