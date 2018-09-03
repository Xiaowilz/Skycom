<script type="text/javascript">
	function functionHanyaAngka(event) 
	{
	  var charCode = (event.which) ? event.which : event.keyCode;
	   if (charCode > 31 && (charCode < 48 || charCode > 57))
	   {
	   		return false;
	   }
	  return true;
	}
</script>

<div class="table-responsive">
	<table class="table table-hover table-sm table-bordered">
	 	<thead class="thead-dark">
		    <tr>
		      <th scope="col">Kode Barang</th>
		      <th scope="col">Item</th>
		      <th scope="col" width="7%">Quantity</th>
		      <th scope="col">Harga</th>
		      <th scope="col" width="20%">Sub Total</th>
		      <th scope="col"></th>
		    </tr>
	  	</thead>

		<tbody>
		    <?php
		    	session_start();
		    	require("../conn.php");
		    	$totalPenjualan = 0;
		    	$result = 0;
		    	$sql5 = "SELECT kd_barang,nm_barang,qty,harga,jumlah FROM tb_temp_penjualan";
		    	$q5 = mysqli_query($conn, $sql5);
		    	while ($r5 = mysqli_fetch_assoc($q5)) 
		    	{
		    		$harga = number_format($r5['harga'], 0, ',', '.');
		    		$jumlah = number_format($r5['jumlah'], 0, ',', '.');
		    		echo "
						<tr>
							<td>$r5[kd_barang]</td>
							<td>$r5[nm_barang]</td>
							<td align='center'>$r5[qty]</td>
							<td align='right'>$harga</td>
							<td align='right'>$jumlah</td>
							<td width='5%'><center><span href='#' data-kodeHapus='$r5[kd_barang]' class='hapus ion-trash-b'></span></center></td>
						</tr>
		    		";
		    		$totalPenjualan += $r5['jumlah'];
		    	}
		    	$_SESSION['totalPenjualan'] = "$totalPenjualan";
		    	// $_SESSION['test'] = "Test 123";
		    ?>
				<tr>
					<td colspan="6"></td>
				</tr>

				<tr>
					<td colspan="4" align="right"><b>Total<b></td>
					<td align="right"><?php echo "Rp " .number_format($totalPenjualan, 0, ',', '.'); ?> </td>
					<td></td>
				</tr>

				<tr>
					<td colspan="4" align="right">
						  <input class="form-check-input" type="checkbox" value="10" id="ppn" onclick="functionPpn()">
						  <label class="form-check-label" for="ppn">PPN 10%</label>
					</td>
					<td align="right"><input type="text" name="tdPpn" id="tdPpn" value="0" readonly="true"></td>
					<td></td>
				</tr>
				

				<tr>
					<td colspan="4" align="right">Total Setelah PPN</td>
					<td align="right"><input type="text" name="" id="setelah_ppn" value="0" readonly="true"></td>
					<td></td>
				</tr>

				<tr>
					<td colspan="4" align="right">
						<strong>Potongan</strong>
					</td>
					<td align="right"><input type="decimal" name="diskon" id="diskon" placeholder="0" onkeypress="return functionHanyaAngka(event)"></td>
					<td></td>
				</tr>

				<tr>
					<td colspan="4" align="right"><strong>Grand Total</strong></td>
					<td align="right"><div id="grandtotal"></div></td>
					<td></td>
				</tr>	


		    <script type="text/javascript">  	
		    	var totalPenjualan2 = 0;
		    	document.getElementById('grandtotal').innerHTML = <?php echo $totalPenjualan;?>;
			    function functionPpn()
				{
					checkBox = document.getElementById('ppn');

					if(checkBox.checked == true)
					{
						var tempPpn = document.getElementById('ppn').value;
						console.log(tempPpn);
						var totalPenjualan = <?php echo $totalPenjualan;?>;
						var ppn = totalPenjualan * (tempPpn/100);
						document.getElementById('tdPpn').value = ppn;
						totalPenjualan2 = totalPenjualan + ppn;
						console.log(totalPenjualan2);
						document.getElementById('setelah_ppn').value = totalPenjualan2;
						document.getElementById('grandtotal').innerHTML = totalPenjualan2;
						document.getElementById('diskon').value = 0;
					}
					else
					{
						document.getElementById('tdPpn').value = 0;
						document.getElementById('setelah_ppn').value = 0;
						document.getElementById('grandtotal').innerHTML = <?php echo $totalPenjualan;?>;
						document.getElementById('diskon').value = 0;
					}
				}

		    	$('.hapus').on('click',function() 
		    	{
		    		var kd_hapus = this.getAttribute('data-kodeHapus');
		    		$.ajax({
		    			url: 'penjualan_temp_hapus.php',
		    			type: 'POST',
		    			dataType: 'html',
		    			data: {'kd_hapus' : kd_hapus},
		    			success : function()
		    			{
		    				$("#tabelTemp").load("penjualan_temp_load.php");
		    			}
		    		});
		    			
		    	});

		    	$(document).ready(function() {
					$('#diskon').on('click',function() {
						document.getElementById('diskon').value = "";
						var diskon = $('#diskon').val();
		    			var totalSetelahPpn = document.getElementById('setelah_ppn').value;
		    			var tdppn = document.getElementById('tdPpn').value
		    			// var diskonskin = $('#diskon').val();
		    			var total = <?php echo $totalPenjualan ?>;
		    			console.log(total);
		    			// $('#diskon').load('ajax/diskonskin.php', {diskonskin : diskonskin } );
		    			$('#grandtotal').load('ajax/hitungdiskon.php', {diskon : diskon , total : total, totalSetelahPpn : totalSetelahPpn, tdppn : tdppn});
					});

		    		$('#diskon').on('change', function() {
		    			var diskon = $('#diskon').val();
		    			var totalSetelahPpn = document.getElementById('setelah_ppn').value;
		    			var tdppn = document.getElementById('tdPpn').value
		    			// var diskonskin = $('#diskon').val();
		    			var total = <?php echo $totalPenjualan ?>;
		    			console.log(total);
		    			// $('#diskon').load('ajax/diskonskin.php', {diskonskin : diskonskin } );
		    			$('#grandtotal').load('ajax/hitungdiskon.php', {diskon : diskon , total : total, totalSetelahPpn : totalSetelahPpn, tdppn : tdppn});
		    		});

		    		$('#ppn').on('change', function()
		    		{
		    			if(this.checked)
		    			{
		    				var diskon = $('#diskon').val();
			    			var totalSetelahPpn = document.getElementById('setelah_ppn').value;
			    			var tdppn = document.getElementById('tdPpn').value
			    			// var diskonskin = $('#diskon').val();
			    			var total = <?php echo $totalPenjualan ?>;
			    			console.log(total);
			    			// $('#diskon').load('ajax/diskonskin.php', {diskonskin : diskonskin } );
			    			$('#grandtotal').load('ajax/hitungdiskon.php', {diskon : diskon , total : total, totalSetelahPpn : totalSetelahPpn, tdppn : tdppn});
		    			}
		    			
		    		});

		    	// 	$('#diskon').on('blur', function() {
		    	// 		var diskonskin = parseInt($('#diskon').val());
		    			// var total = <?php echo $totalPenjualan ?>;
		    	// 		<?php   
		    	// 			$test = '<script> document.writeln(diskonskin); </script>';
		    	// 			$hasil = number_format($test, 0, ',', '.');	
		    	// 		?>
		    	// 		// console.log($hasil);
		    	// 		$('#diskon').val( )
		    	// 		// $('#diskon').load('ajax/diskonskin.php', {diskonskin : diskonskin } );
		    	// 		// $('#grandtotal').load('ajax/hitungdiskon.php', {diskon : diskon , total : total } );
		    	// 	});
		    	// });



			    	function format_number(number, prefix, thousand_separator, decimal_separator)
					{
						var thousand_separator = thousand_separator || '.',
							decimal_separator = decimal_separator || ',',
							regex		= new RegExp('[^' + decimal_separator + '\\d]', 'g'),
							number_string = number.replace(regex, '').toString(),
							split	  = number_string.split(decimal_separator),
							rest 	  = split[0].length % 3,
							result 	  = split[0].substr(0, rest),
							thousands = split[0].substr(rest).match(/\d{3}/g);
						
						if (thousands) {
							separator = rest ? thousand_separator : '';
							result += separator + thousands.join(thousand_separator);
						}
						result = split[1] != undefined ? result + decimal_separator + split[1] : result;
						return prefix == undefined ? result : (result ? prefix + result : '');
					};

					var input = document.getElementById('diskon');
					var ppn, setelahPpn;
					ppn = document.getElementById('tdPpn');
					setelahPpn = document.getElementById('setelah_ppn');
					ppn.addEventListener('blur', function(e)
					{
						ppn.value = format_number(this.value, 'Rp ');
					});

					setelahPpn.addEventListener('blur', function(e)
					{
						setelahPpn.value = format_number(this.value, 'Rp ');
					});

					input.addEventListener('blur', function(e)
					{
						input.value = format_number(this.value, 'Rp ');
					});

				});

		    </script>
	 	</tbody>
	</table>
	
</div>