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
			
			<hr>

			<table class="headInfo" style="width: 100%">
				<tr>
					<td class="nama"><label for="kodetransaksi" class="">No. Transaksi</label></td>
		      		<td class="titikDua">:</td>
		      		<td class="data"> <?php echo "aaaaa"; ?> </td>

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

				<tr>

				</tr>
			
				<tr>
					<td class="nama"><label for="" class="">Sales</label></td>
					<td class="titikDua">:</td>
					<td class="data"><input id="" type="text" class="" placeholder="" name="" value="AAAAAA" readonly></td>
				</tr>
      		</table>
		</div>
		
		<!-- <br> -->

		<div class="content">
			<table>
				<thead>
					<th>No</th>
					<th>Nama Barang</th>
					<th>Qty</th>
					<th>Harga</th>
					<th>Subtotal</th>
				</thead>

				<tbody>
					<td>1</td>
					<td>Asus</td>
					<td>2</td>
					<td>50000</td>
					<td>100000</td>
				</tbody>
			</table>
		</div>

	</div>
</body>
</html>