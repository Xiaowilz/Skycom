<?php
	require_once __DIR__ . '/vendor/autoload.php';
	// include("MPDF53/mpdf.php");
 
	// $mpdf=new mPDF('c','A4','','' , 0 , 0 , 0 , 0 , 0 , 0); 
	 
	// $mpdf->list_indent_first_level = 0;  // 1 or 0 - whether to indent the first level of a list
	         
	$mpdf = new \Mpdf\Mpdf([
		'mode' => 'utf-8',
		'margin_top' => 5,
		'margin_left' => 10,
		'margin_right' => 10,
		'margin_bottom' => 5,
		'format' => [215, 140]]);

	// $mpdf->SetDisplayMode('fullpage');

	$style = file_get_contents('dpenjualan/styleInvoice.css');

	$mpdf->WriteHTML($style,1);

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

require_once("conn.php");
$noTrans = $_GET['noTrans'];
$sql = "SELECT * FROM tb_penjualan WHERE notrans = '$noTrans'";
$q = mysqli_query($conn, $sql);
while ($r = mysqli_fetch_assoc($q))
{
	$cetak=	
	'	<html>
		<head>
			<title>Invoice</title>
			<meta charset = "UTF-8">
			<link rel="stylesheet" type="text/css" href="styleInvoice.css">


		</head>
		<body>
			<div class="wrapper">
				<div class="header">
					<table class="heading" style="width: 100%">
						<tr>
							<td>
								<strong>Sky Computer</strong>	<br>
								Jl. Dr. Setia Budi No. 207 Pontianak	<br>
								Telp (0561) 737895
							</td>

							<td align="right">
								<strong>Faktur Penjualan</strong>
							</td>
						</tr>
					</table>';


					$cetak.='
						<div class="dtkiri">
										<table class="headInfo" style="width: 100%">
											<tr>
												<td class="nama"><label for="kodetransaksi" class="">No. Transaksi</label></td>
									      		<td class="titikDua">:</td>
									      		<td class="data">'.$r["notrans"].'</td>
											</tr>

											<tr>
												<td class="nama"><label for="" class="">Tanggal</label></td>
								      			<td class="titikDua">:</td>
								      			<td class="data">'.$r["tgltrans"].'</td>
											</tr>

											<tr>
												<td class="nama"><label for="" class="">Sales</label></td>
												<td class="titikDua">:</td>
												<td class="data">'.$r["sales"].'</td>
											</tr>

										</table>
									</div>	

									<div class="dtkanan">
										<table class="headInfo" style="width: 100%">
											<tr>
												<td class="nama"><label>Costumer</label></td>
												<td class="titikDua">:</td>					
												<td class="data">'.$r["customer"].'</td>
											</tr>

											<tr>
												<td class="nama"><label for="" class="">Jatuh Tempo</label></td>
												<td class="titikDua">:</td>
								      			<td class="data">'.$r["tglJatuhTempo"].'</td>
											</tr>
										</table>
									</div>

									<div class="spacer" style="clear: both;"></div>
								</div>
								
								<!-- <br> -->
								<div class="content">
									<div class="invoice_body">
										<table class="thead" width="100%">
											<tr>
												<th width="7%">No</th>
												<th>Nama Barang</th>
												<th width="7%">Qty</th>
												<th width="17%">Harga</th>
												<th width="20%">Subtotal</th>
											</tr>
										</table>
										<table width="100%" class="tB">

						';

						require_once("conn.php");
						$noTrans = $_GET['noTrans'];
						$sql2 = "SELECT * FROM tb_hd_penjualan WHERE no_trans = '$noTrans'";
						$q2 = mysqli_query($conn, $sql2);
						while ($r2 = mysqli_fetch_assoc($q2))
						{
							$cetak.='

											<tr>
												<td align="center" width="7%">1</td>
												<td>'.$r2["nm_barang"].'</td>
												<td align="center" width="7%">'.$r2["qty"].'</td>
												<td align="right" width="17%">'.$r2["harga"].'</td>
												<td align="right" width="20%">'.$r2["jumlah"].'</td>
											</tr>
									
									';
						}
							$cetak.='	</table>
									</div>';

									$cetak.='<div class="invoice_foot"> 
										<table width="100%">
											<tr>
												<td>Note :</td>
												<td width="15%">Total</td>
												<td width="20%" align="right">'.$r["subtotal"].'</td>
											</tr>
											<tr>
												<td rowspan="4" valign="top">'.$r["catatan"].'</td>
												<td>PPN 10%</td>
												<td width="20%" align="right">'.$r["ppn"].'</td>
											</tr>
											<tr>
												<td>Potongan</td>
												<td width="20%" align="right">'.$r["diskon"].'</td>
											</tr>
											<tr>
												<td>Grand Total</td>
												<td width="20%" align="right">'.$r["total"].'</td>
											</tr>
										</table>
									</div>
								</div>

							</div>
									';

}					
	$cetak.='
	</body>
	</html>
	';
	// $mpdf->WriteHTML(file_get_contents('dpenjualan/invoice.php'));
	$mpdf->WriteHTML($cetak);
	$mpdf->Output('InvoicePenjualan.pdf', 'I');
?>