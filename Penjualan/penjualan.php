<?php
	session_start();
	if(!isset($_SESSION['username']))
	{
		header("Location:../index.php");
	}

	require_once("../conn.php");
	$username = $_SESSION['username'];
	$sqlLogin = "SELECT nama FROM login WHERE username = '$username'";
	$qLogin = mysqli_query($conn, $sqlLogin);
	$nama = mysqli_fetch_assoc($qLogin);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Penjualan SkyCom</title>
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="../style.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../ionicons-2.0.1/css/ionicons.min.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/dataTables.bootstrap4.min.css">
	
	<!-- Script -->
	<script src="../javascript/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="../javascript/bootstrap.min.js"></script>
	<script type="text/javascript" src="../javascript/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="../javascript/dataTables.bootstrap4.min.js"></script>

	<style type="text/css">
		.hapus {
			color : black;
			font-size: 20px;
		}

		.hapus:hover{
			color : red;
			cursor: pointer;
		}

		.all-bottom th{
			text-align: center;
		}

		#diskon, #tdPpn, #setelah_ppn{
			text-align: right;
			border : none;
		}

		.ion-android-cart {
			margin-right: 10px;
		}

		#add{
			padding: 4px 26px;
		}

		#lihatTrans{
			padding: 5px 15px;
			margin-right: 35px;
			text-decoration: none;
            color: white;
            border-radius: 4px;
            transition-duration: 0.3s;
            background-color: dodgerBlue;
		}
		#lihatTrans:hover{
			background-color: #1f57ff;
            color: white;
		}

		#pilih1, #pilih2 {
			text-decoration: none;
            padding: 2px 10px;
            color: #17a2b8;
            border-radius: 4px;
            font-size: 14px;
            transition-duration: 0.3s;
		}

		#pilih1:hover, #pilih2:hover{
			background-color: #17a2b8;
            color: white;
		}
	</style>

</head>

<script>
	function functionHanyaAngka(event) 
	{
	  var charCode = (event.which) ? event.which : event.keyCode;
	   if (charCode > 31 && (charCode < 48 || charCode > 57))
	   {
	   		return false;
	   }
	  return true;
	}

	window.onbeforeunload = function () 
	{
	  return 'Are you really want to perform the action?';
	}

	function functionTampilkanJam()
	{	
		var waktu = new Date();
		var jam = waktu.getHours() + "";
		var menit = waktu.getMinutes() + "";
		var detik = waktu.getSeconds() + "";
		document.getElementById("clock").innerHTML = (jam.length==1?"0"+jam:jam) + ":" + (menit.length==1?"0"+menit:menit) + ":" + (detik.length==1?"0"+detik:detik);
	}
</script>
<?php
	function functionTanggal()
	{
		$hari = date("l");
		$tanggal = date("d");
		$bulan = date("m");
		$tahun = date("Y");
		$_SESSION["tanggal"] = "$tanggal";
		$_SESSION["bulan"] = "$bulan";
		$_SESSION["tahun"] = "$tahun";
		echo "$hari".", "."$tanggal"."-"."$bulan"."-"."$tahun";
	}
?>
<body onload="functionTampilkanJam();setInterval('functionTampilkanJam()', 1000); functionCboJatuhTempo()">
	<div id="topnav">
		<div class="title">
			<img src="../gambar/logo2.png" width="145" height="35" id="logo">
		</div>

		<div class="title2" style="float: left; margin-top: -6px; margin-left: 15px;">
			<h3>Penjualan</h3>
		</div>

		<div class="jamtgl">
			Jam : <span id="clock"></span>
			<span id="date">
				<?php
					functionTanggal();
				?>
			</span>
			<a id="lihatTrans" href="transaksiJual" target="_blank">Lihat Transaksi</a>
		</div>
	</div>
	
	<div id="rightside2">
		<div id="beranda">			
			<div class="all-box">	

				<div class="all-top">
					<br>
				</div>
				<?php
					require_once("../conn.php");
					$sql2 = "SELECT max(notrans) AS maxNoTrans FROM tb_penjualan";
					$q2 = mysqli_query($conn, $sql2);
					$data = mysqli_fetch_array($q2);
					$noTrans = $data['maxNoTrans'];

					$noUrut = (int) substr($noTrans, 3, 5);
					$noUrut++;

					$char = "TJ";
					$noTrans = $char. sprintf('%05s', $noUrut);
				?>
				<div class="info-top">
					<form method="POST" id="penjualanTemp">
						<h5 class="datatrans">Data Transaksi</h5>

						<hr>
						<div class="dtkiri">
							<div class="form-group row">
				      			<label for="kodetransaksi" class="col-sm-3 col-form-label col-form-label-sm">No. Transaksi</label>
				      			<div class="col-sm-4">
				      				<input id="kodetransaksi" type="text" class="form-control-plaintext form-control-sm" placeholder="Kode Transaksi" name="no_transaksi" value="<?php echo $noTrans; ?>">
				    			</div>
						    </div>

						    <div class="form-group row">
				      			<label for="nama_customer" class="col-sm-3 col-form-label col-form-label-sm">Customer</label>
				      			<div class="col-sm-3">
				      				<input type="text" class="form-control form-control-sm" placeholder="Kode Customer" name="" id="kode_customer"  required="required" readonly="true">
				    			</div>

				    			<div class="col-sm-4">
									<div class="input-group input-group-sm mb-1">
										<input type="text" class="form-control" placeholder="Nama Customer" id="nama_customer" name="nama_customer" required="required" readonly="true">
										<div class="input-group-append">
											<button class="btn btn-info" type="button"  data-toggle="modal" data-target="#myModal1" data-backdrop="static"><span class="ion-person-add"></span></button>
										</div>
									</div>
								</div>
						    </div>
							
							

							<div class="form-group row">
								<label for="jthtempo" class="col-sm-3 col-form-label col-form-label-sm">Pembayaran</label>

							   	<div class="col-sm-3">
							        <select class="form-control form-control-sm" id="cbo_jatuh_tempo" name="cbo_jatuh_tempo" onchange="functionCboJatuhTempo()">
								      <option value="kredit">Kredit</option>
								      <option value="cash">Cash</option>
								    </select>
								</div>		
							</div>


							<div class="form-group row">
				      			<label for="jthtempo" class="col-sm-3 col-form-label col-form-label-sm" id="label_jatuh_tempo">Jatuh Tempo 14 Hari</label>
				      			<div class="col-sm-5">
				      				<input id="jthtempo" type="text" class="form-control-plaintext form-control-sm" placeholder="Kode Transaksi" name="tgl_jatuh_tempo" readonly ">
				      				<input type="hidden" name="tgl_jatuh_tempo_hidden" id="tgl_jatuh_tempo_hidden">
				    			</div>
						    </div>
						</div>

						<div class="dtkanan">
							<div class="form-group row">
				      			<label for="sales" class="col-sm-3 col-form-label col-form-label-sm">Sales</label>
				      			<div class="col-sm-8">
				      				<input id="sales" type="text" class="form-control-plaintext form-control-sm" placeholder="Sales" name="nmSales" value="<?php echo implode($nama); ?>" readonly>
				    			</div>
						    </div>

						    <div class="form row">
							    <label for="keterangan" class="col-sm-3 col-form-label col-form-label-sm">Keterangan</label>
							    <div class="col-md-6">
							    	<textarea class="form-control form-control-sm" id="keterangan" rows="3" name="catatan"></textarea>
							    </div>	
							</div>
						</div>	
						<div class="spacer" style="clear: both;"></div>					
				</div>	

				<!-- <br/> -->

				<div class="all-content2">
				    	<h5>Data Barang</h5>				    	
				    	<hr>
				    	<div class="dtkiri">
					    	<div class="form-group row">
				      			<label for="nama_item" class="col-sm-3 col-form-label col-form-label-sm">Barang</label>
								<div class="col-sm-3">
				      				<input type="text" class="form-control form-control-sm" placeholder="Kode Barang" name="kode_item" id="kode_item" required="required" readonly="true"> 
				      			</div>

								<div class="col-sm-4">
								    <div class="input-group input-group-sm">
										<input type="text" class="form-control" placeholder="Nama Barang" id="nama_item" name="nama_item" required="required" readonly="true">
										<div class="input-group-append">
											<button class="btn btn-info" type="button" data-toggle="modal" data-target="#myModal2" data-backdrop="static"><span class="ion-plus-round"></button>
										</div>
									</div>
								</div>	
							</div>

							<div class="form-group row">
								<label for="harga_item" class="col-sm-3 col-form-label col-form-label-sm">Harga</label>
							    <div class="col-sm-3">
							    	<input type="text" class="form-control form-control-sm" placeholder="Harga" name="harga_item" id="harga_item" autocomplete="off" required="required" onkeypress="return functionHanyaAngka(event)">
							    </div>
							</div>

							<div class="form-group row">
						    	<label for="qty" class="col-sm-3 col-form-label col-form-label-sm">Quantity</label>
						    	<div class="col-sm-3">
						    		<input type="text" class="form-control form-control-sm" placeholder="Quantity" name="quantity" id="qty" autocomplete="off" required onkeypress="return functionHanyaAngka(event)">  
						    	</div>
								
						    	<div class="col-xs-2">
						    		<Button type="submit" id="add" class="btn btn-primary btn-sm"><span class="ion-android-cart"></span>Tambah</Button>
								</div>
							</div>

							<div class="form row">
								<label for="qty" class="col-sm-3 col-form-label"></label>
								<div class="col-sm-6">
									<div id="feedback"></div>
								</div>
							</div>
						</div>
						<div class="spacer" style="clear: both;"></div>
				</div>
				<!-- <br/> -->
				<div class="all-bottom">
					<!-- Load Tabel Temp -->
					<div id="tabelTemp"> 
						<div class="table-responsive">
							<table class="table table-hover table-sm">
							 	<thead class="thead-dark">
								    <tr>
								      <th scope="col">Kode Barang</th>
								      <th scope="col">Item</th>
								      <th scope="col" width="7%">Quantity</th>
								      <th scope="col">Harga</th>
								      <th scope="col" width="20%">Sub Total</th>
								    </tr>
							  	</thead>
							</table>	
						</div>
					</div>				
				</div>
					<button type="submit" name="simpan" class="btn btn-primary" id="simpan" formaction="penjualan_simpan.php">Simpan</button>
				</form>
			</div>
		</div>

		<!-- Modal Start -->
		<div class="modal fade" id="myModal1" role="dialog">
		    <div class="modal-dialog modal-lg">  
		      <!-- Modal content-->
		      	<div class="modal-content">
			        <div class="modal-header">
			          <h4 class="modal-title">Customer</h4>
			          <span class="ion-close" data-dismiss="modal"></span>		          
			        </div>
		        <div class="modal-body">
					<div id="tabelcustomermodal">
						<!-- <div class="table-responsive"> -->
				          	<table class="table table-hover table-sm" id="tabel_customer">
				          		<thead class="thead-dark">
									<tr>
										<th>Kode Customer</th>
										<th>Nama Customer</th>
										<th>Alamat</th>
										<th>Kontak</th>
										<th></th>
									</tr>
								</thead>	
								<tbody>
									<?php
										require("../conn.php");
										$sql = "SELECT * FROM tb_customer WHERE hapus = 0";
										$q = mysqli_query($conn, $sql);

										while ($r = mysqli_fetch_assoc($q)) 
										{
											echo"
												<tr>
													<td>$r[kd_customer]</td>
													<td>$r[nm_customer]</td>
													<td>$r[alamat]</td>
													<td>$r[kontak]</td>
													<td align='center'><a href='#' class='pilihCustomer' data-pilihCustomer='$r[kd_customer]' data-namaCustomer='$r[nm_customer]' data-dismiss='modal' id='pilih1'>Pilih</a></td>
												</tr>
											";	
										}
									?>
								</tbody>
				  			</table>
				  		<!-- </div> -->
				  	</div>
		        </div>
		        <div class="modal-footer">
		          <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
		        </div>
		      </div>
		      
		    </div>
		  </div>
		</div>
		<!-- Modal End -->

		<!-- Modal Start -->
		<div class="modal fade" id="myModal2" role="dialog">
		    <div class="modal-dialog modal-lg">a
		      <div class="modal-content">
		        <div class="modal-header">
		          <h4 class="modal-title">Barang</h4>
		          <span class="ion-close" data-dismiss="modal"></span>		          
		        </div>
		        <div class="modal-body">
					<div id="tabelitemmodal">
						<div class="table-responsive">
				          	<table class="table table-hover table-sm" id="tabel_barang">
				          		<thead class="thead-dark">
									<tr>
										<th>Type</th>
										<th>Item Code</th>
										<th>Item Name</th>
										<th>Qty</th>
										<th>Price</th>
										<th></th>
									</tr>
								</thead>	
								<?php
									require("../conn.php");
									$sql3 = "SELECT jns_barang, kd_barang, nm_barang, qty, hrg_jual FROM tb_inventory";
									$q3 = mysqli_query($conn, $sql3);

									while ($r3 = mysqli_fetch_assoc($q3)) 
									{
										echo"
											<tr>
												<td>$r3[jns_barang]</td>
												<td>$r3[kd_barang]</td>
												<td>$r3[nm_barang]</td>
												<td>$r3[qty]</td>
												<td>$r3[hrg_jual]</td>
												<td align='center'><a href='#' class='pilihItem' data-pilihItem='$r3[kd_barang]' data-namaItem='$r3[nm_barang]' data-hargaItem='$r3[hrg_jual]' data-dismiss='modal' id='pilih2'>Pilih</a></td>
											</tr>
										";	
									}
								?>
				  			</table>
				  		</div>
				  	</div>
		        </div>
		        <div class="modal-footer">
		          <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
		        </div>
		      </div>    
		    </div>
		  </div>
		</div>
		<!-- Modal End -->
	</div>	

    <a href="javascript:" id="return-to-top"><i class="ion-chevron-up"></i></a>

<script type="text/javascript" src="../javascript/scrollUp.js"></script>

</body>
<script type="text/javascript">
		var dropdown = document.getElementsByClassName("drop");
		var i;

		for (i = 0; i < dropdown.length; i++) {
		  dropdown[i].addEventListener("click", function() {
		    this.classList.toggle("active");
		    var dropdownContent = this.nextElementSibling;
		    if (dropdownContent.style.display === "block") {
		      dropdownContent.style.display = "none";
		    } else {
		      dropdownContent.style.display = "block";
		    }
		  });
		}
</script>

<script type="text/javascript">
	function geser(){
  		document.getElementById("sidenav").classList.toggle('show');
  		document.getElementById("rightside").classList.toggle('show');
  		}

  	$(document).ready(function(){
  		$('#tab a').click(function(){
  			$('a').removeClass("active");
  			$(this).addClass("active");
  		});
  	});	
</script>

<script type="text/javascript">
	$('.pilihCustomer').on('click', function(){
		var kode_customer = this.getAttribute('data-pilihCustomer');
		var nama_customer = this.getAttribute('data-namaCustomer');
		document.getElementById('kode_customer').value = kode_customer;
		document.getElementById('nama_customer').value = nama_customer;
	});

	$('.pilihItem').on('click', function() {
		var kode_item = this.getAttribute('data-pilihItem');
		var nama_item = this.getAttribute('data-namaItem');
		var harga_item = this.getAttribute('data-hargaItem');
		document.getElementById('kode_item').value = kode_item;
		document.getElementById('nama_item').value = nama_item;
		document.getElementById('harga_item').value = harga_item;
	});
</script>

<script type="text/javascript">
	$(document).ready(function() {
		// refreshTable();
		$.ajax({
			url: 'penjualan_temp_load.php',
			type: 'GET',
			dataType: 'html',
			success : function(response)
			{
				$("#tabelTemp").html(response);
			}
		});
	});

	$("#add").click(function() 
	{
		$.ajax({
			url: 'penjualan_temp.php',
			type: 'POST',
			data: $("#penjualanTemp").serialize(),
			success : function(data)
			{
				$("#tabelTemp").load("penjualan_temp_load.php");
			 	document.getElementById('feedback').innerHTML = data;
			}
		});
		
		return false;
	});

	$(document).ready( function () {
	    $('#tabel_customer').DataTable();

	    $('#tabel_barang').DataTable();
	});	

	$('#penjualanTemp').submit(function() 
	{
		window.onbeforeunload = null;
	});


</script>

<script>
	function functionCboJatuhTempo()
	{
		var kredit = document.getElementById('cbo_jatuh_tempo').value
		console.log(kredit);
		if(kredit == "kredit")
		{
			<?php
				$hari = date("l");
				$tanggal = date("d");
				$bulan = date("m");
				$tahun = date("Y");
				$tgl1 = $tahun."-".$bulan."-".$tanggal;
				$tgl2 = date('l, d-m-Y', strtotime('+14 days', strtotime($tgl1)));
				$tgl3 = date('Y-m-d', strtotime('+14 days', strtotime($tgl1)));

				echo"
					document.getElementById('tgl_jatuh_tempo_hidden').value = '$tgl3';
					document.getElementById('jthtempo').value = '$tgl2';
					document.getElementById('label_jatuh_tempo').innerHTML = 'Jatuh Tempo 14 Hari';
				";
			?>
		}
		else
		{
			<?php
				$hari = date("l");
				$tanggal = date("d");
				$bulan = date("m");
				$tahun = date("Y");
				$tgl1 = $tahun."-".$bulan."-".$tanggal;
				$tgl2 = date('l, d-m-Y', strtotime('0 days', strtotime($tgl1)));

				echo"
					document.getElementById('tgl_jatuh_tempo_hidden').value = '$tgl1';
					document.getElementById('jthtempo').value = '$tgl2';
					document.getElementById('label_jatuh_tempo').innerHTML = 'Jatuh Tempo';
				";
			?>
		}
	}

	function topFunction() 
	{
    	document.body.scrollTop = 0;
    	document.documentElement.scrollTop = 0;
	}
</script>

</html>