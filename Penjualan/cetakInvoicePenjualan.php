<?php
	require_once __DIR__ . '/../vendor/autoload.php';
	// include("MPDF53/mpdf.php");
 
	// $mpdf=new mPDF('c','A4','','' , 0 , 0 , 0 , 0 , 0 , 0); 
	 
	// $mpdf->list_indent_first_level = 0;  // 1 or 0 - whether to indent the first level of a list
	         
	$mpdf = new \Mpdf\Mpdf([
		'mode' => 'utf-8',
		'margin_top' => 5,
		'margin_left' => 10,
		'margin_right' => 10,
		'margin_bottom' => 5,
		'margin_footer' => 5,
		'format' => [215, 140]]);

	// $mpdf->SetDisplayMode('fullpage');

	$style = file_get_contents('dpenjualan/styleInvoice.css');

	$mpdf->WriteHTML($style,1);

	$mpdf->SetHTMLFooter('
		<table width="100%" style="vertical-align: bottom; font-family: serif; 
		    font-size: 8pt; color: #000000;">
		    <tr>
		        <td width="50%">{DATE d-m-Y}</td>
		        <td width="50%" align="right">Hal {PAGENO}/{nbpg}</td>
		    </tr>
		</table>','O');

	$mpdf->SetHTMLFooter('
		<table width="100%" style="vertical-align: bottom; font-family: serif; 
		    font-size: 8pt; color: #000000; font-weight: bold; font-style: italic;">
		    <tr>
		        <td width="33%" align="center" style="font-weight: bold; font-style: italic;">Hal {PAGENO}/{nbpg}</td>
		        <td width="33%" style="text-align: right; ">{DATE d-m-Y}</td>
		    </tr>
		</table>', 'E');

require_once("../conn.php");
$noTrans = $_GET['noTrans'];
$sql = "SELECT * FROM tb_penjualan WHERE notrans = '$noTrans'";
$q = mysqli_query($conn, $sql);
while ($r = mysqli_fetch_assoc($q))
{
	$tanggalTransaksi = date_format(new DateTime($r['tgltrans']), "l, d-m-Y");
	$tanggalJatuhTempo = date_format(new DateTime($r['tglJatuhTempo']), "l, d-m-Y");
	$cetak=	
	'	<html>
		<head>
			<title>Invoice Penjualan</title>
			<meta charset = "UTF-8">
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
												<td class="nama"><label class="">No. Transaksi</label></td>
									      		<td class="titikDua">:</td>
									      		<td class="data">'.$r["notrans"].'</td>
											</tr>

											<tr>
												<td class="nama"><label for="" class="">Tanggal</label></td>
								      			<td class="titikDua">:</td>
								      			<td class="data">'.$tanggalTransaksi.'</td>
											</tr>

											<tr>
												<td class="nama"><label>Costumer</label></td>
												<td class="titikDua">:</td>					
												<td class="data">'.$r["customer"].'</td>
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
												<td class="nama"><label for="" class="">Keterangan</label></td>
												<td class="titikDua">:</td>
												<td class="data">'.$r["catatan"].'</td>
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

						require_once("../conn.php");
						$noTrans = $_GET['noTrans'];
						$sql2 = "SELECT * FROM tb_hd_penjualan WHERE no_trans = '$noTrans'";
						$q2 = mysqli_query($conn, $sql2);
						$nomor = 1;
						while ($r2 = mysqli_fetch_assoc($q2))
						{
							$cetak.='

											<tr>
												<td align="center" width="7%">'.$nomor.'</td>
												<td>'.$r2["nm_barang"].'</td>
												<td align="center" width="7%">'.$r2["qty"].'</td>
												<td align="right" width="17%">'.number_format($r2["harga"], 0, ',', '.').'</td>
												<td align="right" width="20%">'.number_format($r2["jumlah"], 0, ',', '.').'</td>
											</tr>
									
									';
							$nomor++;
						}
							$cetak.='	</table>
									</div>';

									$cetak.='<div class="invoice_foot"> 
										<table width="100%">
											<tr>
												<td width="35%">Jatuh Tempo &nbsp; &nbsp; &nbsp; : &nbsp; &nbsp;'.$tanggalJatuhTempo.'</td>
												<td width="35%"></td>
												<td width="15%">Total</td>
												<td width="20%" align="right">'.number_format($r["subtotal"], 0, ',', '.').'</td>
											</tr>
											<tr>
												<td></td>
												<td></td>
												<td>PPN 10%</td>
												<td width="20%" align="right">'.number_format($r["ppn"], 0, ',', '.').'</td>
											</tr>
											<tr>
												<td align="center">Tanda Terima</td>
												<td align="center">Hormat Kami,</td>
												<td>Potongan</td>
												<td width="20%" align="right">'.number_format($r["diskon"], 0, ',', '.').'</td>
											</tr>
											<tr>
												<td></td>
												<td></td>
												<td><strong>Grand Total</strong></td>
												<td width="20%" align="right"><strong>Rp '.number_format($r["total"], 0, ',', '.').'</strong></td>
											</tr>
											<tr>
												<td align="center" class="sign" valign="bottom">__________________</td>
												<td align="center" class="sign" valign="bottom">__________________</td>
												<td class="sign"></td>
												<td class="sign"></td>
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

	$mpdf->WriteHTML($cetak);
	$mpdf->Output('InvoicePenjualan.pdf', 'I');
?>