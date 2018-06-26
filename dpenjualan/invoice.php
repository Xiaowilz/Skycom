<!DOCTYPE html>
<html>
<head>
	<title>Invoice</title>
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
			</table>
			
			<!-- <hr> -->

			<!-- <table class="headInfo" style="width: 100%">
				<tr>
					<td class="nama"><label for="kodetransaksi" class="">No. Transaksi</label></td>
		      		<td class="titikDua">:</td>
		      		<td class="data"> </td>

		      		<td class="nama" align="center"><label for="" class="">Jatuh Tempo</label></td>
					<td class="titikDua">:</td>
		      		<td class="data"><input id="" type="text" class="" placeholder="" name=""  value="25 Juni 2018" readonly></td>
	      		</tr>
				
				<tr>
					<td class="nama"><label for="" class="">Tanggal</label></td>
		      		<td class="titikDua">:</td>
		      		<td class="data"><input id="" type="text" class="" placeholder="" name=""  value="11 Juni 2018" readonly></td>
				
					<td class="nama" align="center"><label>Costumer</label></td>
					<td class="titikDua">:</td>					
					<td class="data"><input id="" type="text" class="" placeholder="" name="no_transaksi"  value="TJ000000" readonly></td>
				</tr>
			</table>
 -->			
 			<div class="dtkiri">
				<table class="headInfo" style="width: 100%">
					<tr>
						<td class="nama"><label for="kodetransaksi" class="">No. Transaksi</label></td>
			      		<td class="titikDua">:</td>
			      		<td class="data"> <?php echo "aaaaa" ?> </td>
					</tr>

					<tr>
						<td class="nama"><label for="" class="">Tanggal</label></td>
		      			<td class="titikDua">:</td>
		      			<td class="data"><input id="" type="text" class="" placeholder="" name=""  value="11 Juni 2018" readonly></td>
					</tr>

					<tr>
						<td class="nama"><label for="" class="">Sales</label></td>
						<td class="titikDua">:</td>
						<td class="data"><input id="" type="text" class="" placeholder="" name="" value="AAAAAA" readonly></td>
					</tr>

				</table>
			</div>	

			<div class="dtkanan">
				<table class="headInfo" style="width: 100%">
					<tr>
						<td class="nama"><label>Costumer</label></td>
						<td class="titikDua">:</td>					
						<td class="data">AAA</td>
					</tr>

					<tr>
						<td class="nama"><label for="" class="">Jatuh Tempo</label></td>
						<td class="titikDua">:</td>
		      			<td class="data"><input id="" type="text" class="" placeholder="" name=""  value="25 Juni 2018" readonly></td>
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
					<tr>
						<td align="center" width="7%">1</td>
						<td>Gtx</td>
						<td align="center" width="7%">2</td>
						<td align="right" width="17%">10.000.000</td>
						<td align="right" width="20%">10.000.000</td>
					</tr>

					<tr>
						<td align="center" width="7%">2</td>
						<td>Gtx</td>
						<td align="center" width="7%">2</td>
						<td align="right" width="17%">10.000.000</td>
						<td align="right" width="20%">10.000.000</td>
					</tr>

					<tr>
						<td align="center" width="7%">3</td>
						<td>Gtx</td>
						<td align="center" width="7%">2</td>
						<td align="right" width="17%">10.000.000</td>
						<td align="right" width="20%">10.000.000</td>
					</tr>
										<tr>
						<td align="center" width="7%">3</td>
						<td>Gtx</td>
						<td align="center" width="7%">2</td>
						<td align="right" width="17%">10.000.000</td>
						<td align="right" width="20%">10.000.000</td>
					</tr>
										<tr>
						<td align="center" width="7%">3</td>
						<td>Gtx</td>
						<td align="center" width="7%">2</td>
						<td align="right" width="17%">10.000.000</td>
						<td align="right" width="20%">10.000.000</td>
					</tr>
										<tr>
						<td align="center" width="7%">3</td>
						<td>Gtx</td>
						<td align="center" width="7%">2</td>
						<td align="right" width="17%">10.000.000</td>
						<td align="right" width="20%">10.000.000</td>
					</tr>
										<tr>
						<td align="center" width="7%">3</td>
						<td>Gtx</td>
						<td align="center" width="7%">2</td>
						<td align="right" width="17%">10.000.000</td>
						<td align="right" width="20%">10.000.000</td>
					</tr>
										<tr>
						<td align="center" width="7%">3</td>
						<td>Gtx</td>
						<td align="center" width="7%">2</td>
						<td align="right" width="17%">10.000.000</td>
						<td align="right" width="20%">10.000.000</td>
					</tr>
					
				</table>
			</div>

			<div class="invoice_foot"> 
				<table width="100%">
					<tr>
						<td>Note :</td>
						<td width="15%">Total</td>
						<td width="20%"></td>
					</tr>
					<tr>
						<td rowspan="4" valign="top">Lamhoooooooooooooooooooooooot</td>
						<td>PPN 10%</td>
						<td width="20%"></td>
					</tr>
					<tr>
						<td>Diskon</td>
						<td width="20%"></td>
					</tr>
					<tr>
						<td>Potongan</td>
						<td width="20%"></td>
					</tr>
					<tr>
						<td>Grand Total</td>
						<td width="20%" align="right">10.000.000</td>
					</tr>
				</table>
			</div>
		</div>

	</div>
</body>
</html>