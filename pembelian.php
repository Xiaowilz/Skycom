<?php
	session_start();
	if(!isset($_SESSION['username']))
	{
		header("Location:index.php");
	}
?>

<!DOCTYPE html>
<html>
<head>

	<title>Pembelian Skycom</title>
	<link rel="stylesheet" type="text/css" href="style.css">

	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/datepicker.css">
	<script src="javascript/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="javascript/bootstrap.min.js"></script>
	<script src="javascript/bootstrap-datepicker.js"></script>

	<script type="text/javascript" src="javascript/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="javascript/dataTables.bootstrap4.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap4.min.css">
	<!-- ____________  -->

	<style type="text/css">
		.col-4 {
			float: right;
			margin-right: -15px;
		}
		
		.hapus {
			color : black;
			font-size: 20px;
		}

		.hapus:hover{
			color : red;
			cursor: pointer;
		}

		#add{
			padding: 4px 26px;
		}

		#cart {
			margin-right: 6px;
		}
		.jamtgl {
			float : right;
		}

		#clock {
			margin-right: 60px;
		}

		#date {
			margin-right: 35px;
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
<body onload="functionTampilkanJam();setInterval('functionTampilkanJam()', 1000);">
	<div id="topnav">
		<!-- <div class="menuicon" onclick="geser()">
			<div class="garis"></div>
			<div class="garis"></div>
			<div class="garis"></div>
		</div> -->

		<div class="jamtgl">
			Jam : <span id="clock"></span>
			<span id="date">
				<?php
					functionTanggal();
				?>
				<a id="lihatTrans" href="transaksiBeli" target="_blank">Lihat Transaksi</a>
			</span>
		</div>
	</div>

	<!-- <div id="sidenav">
		<div id="tab">
			<div class="tabbutton">
				<a href="mainform.php"><span class="ion-ios-home"></span>Beranda</a>
				<a href="penjualan.php"><span class="ion-cash"></span>Penjualan</a>
				<a class="active" href="pembelian.php"><span class="ion-android-cart"></span>Pembelian</a>
				<a href="customers.php"><span class="ion-ios-people"></span>Customers</a>
				<a href="inventory.php"><span class="ion-briefcase"></span>Inventory</a>
				<a href="supplier.php"><span class="ion-person-stalker"></span>Supplier</a>
			</div>
						
				<a class="tabbutton drop" id="btn_daftar"><span class="ion-android-list"></span>Daftar<i class="ion-arrow-down-b"></i></a>
				
					<div class="dropdown">
						<a href="#"><span class="ion-ios-circle-filled"></span>Item 1</a>
						<a href="#"><span class="ion-ios-circle-filled"></span>Item 2</a>
						<a href="#"><span class="ion-ios-circle-filled"></span>Item 3</a>
					</div>
		</div>
	</div> -->

	<div id="rightside2">
		<div id="beranda">	
			<div class="all-box">	
				<div class="all-top">
					<h2>Pembelian</h2>
				</div>
				<?php
					require_once("conn.php");
					$sql2 = "SELECT max(notrans) AS maxNoTrans FROM tb_pembelian";
					$q2 = mysqli_query($conn, $sql2);
					$data = mysqli_fetch_array($q2);
					$noTrans = $data['maxNoTrans'];

					$noUrut = (int) substr($noTrans, 3, 5);
					$noUrut++;

					$char = "TB";
					$noTrans = $char. sprintf("%05s", $noUrut);
				?>
				<div class="info-top">
					<form method="POST" id="pembelianTemp">
						<h5>Data Transaksi</h5>
						<hr>
						<div class="dtkiri">
							<div class="form-group row">
				      			<label for="kode_transaksi" class="col-sm-3 col-form-label col-form-label-sm">No. Transaksi</label>
				      			<div class="col-sm-2">
				      				<input id="kode_transaksi" type="text" class="form-control-plaintext form-control-sm" placeholder="Kode Transaksi" name="kode_transaksi" value="<?php echo $noTrans; ?>">
				    			</div>
						    </div>

						    <div class="form-group row">
				      			<label for="nama_supplier" class="col-sm-3 col-form-label col-form-label-sm">Supplier</label>
				      			<div class="col-sm-3">
				      				<input type="text" class="form-control form-control-sm" placeholder="Kode Supplier" id="kode_supplier" readonly="true" name="kode_supplier">
				    			</div>

				    			<div class="col-sm-4">
									<div class="input-group input-group-sm mb-1">
										<input type="text" class="form-control" placeholder="Supplier Name" readonly="true" id="nama_supplier" name="nama_supplier">
											<div class="input-group-append">
												<button class="btn btn-info" type="button" data-toggle="modal" data-target="#myModal0" data-backdrop="static"><span class="ion-person-add"></button>
											</div>
									</div>
								</div>	

							<?php
								$hari = date("l");
								$tanggal = date("d");
								$bulan = date("F");
								$tahun = date("Y");
								$tgl1 = $tahun."-".$bulan."-".$tanggal;
								$tgl2 = date('l, d-m-Y', strtotime('+14 days', strtotime($tgl1)));
								// echo $tgl2;
							?>

						    </div>
						</div>

						<div class="dtkanan">
							<div class="form row">
							    <label for="keterangan" class="col-sm-3 col-form-label col-form-label-sm">Keterangan</label>
							    <div class="col-md-6 mb-1">
							    	<textarea class="form-control form-control-sm" id="keterangan" rows="3"></textarea>
							    </div>	
							</div>
						</div>

						<div class="spacer" style="clear: both;"></div>	
					</div>

				<div class="all-content2">
					<h5>Data Barang</h5>
					<hr>
					<div class="dtkiri">
			    		<div class="form-group row">
		    				<label for="nama_item" class="col-sm-3 col-form-label col-form-label-sm">Barang</label>
			      			<div class="col-sm-3">
			      				<input id="kode_item" type="text" class="form-control form-control-sm" placeholder="Kode Barang" name="kode_item" readonly="true">
			    			</div>

							<div class="col-sm-4">
							    <div class="input-group input-group-sm">
									<input type="text" class="form-control" placeholder="Nama Barang" readonly="true" name="nama_item" id="nama_item">
									<div class="input-group-append">
										<button class="btn btn-info" type="button" data-toggle="modal" data-target="#myModal1" data-backdrop="static"><span class="ion-plus-round"></span></button>
									</div>
								</div>
							</div>
						</div>

						

						<div class="form-group row">
							<label for="harga_item" class="col-sm-3 col-form-label col-form-label-sm">Harga</label>
						    <div class="col-sm-3">
						    	<input type="text" class="form-control form-control-sm" placeholder="Harga" name="harga_item" id="harga_item" autocomplete="off" required onkeypress="return functionHanyaAngka(event)">
						    </div>

			    			
						</div>

						<div class="form-group row">	
							<label for="qty" class="col-sm-3 col-form-label col-form-label-sm">Quantity</label>
						    <div class="col-sm-3">
						    	<input type="text" class="form-control form-control-sm" placeholder="Quantity" name="quantity" id="qty" autocomplete="off" required onkeypress="return functionHanyaAngka(event)">
						    </div>

							<div class="col-xs-1">
						    	<button type="submit" class="btn btn-success btn-sm" value="Add" id="add"><ion-icon name="cart" id="cart"></ion-icon>Tambah</button>
							</div>

							<div>
								<p id="feedback"></p>
							</div>
						</div>
					</div>

					<div class="spacer" style="clear: both;"></div>

					<script type="text/javascript">
						$("#add").on('click', function() 
						{
							$.ajax({
								url: 'pembelian_temp.php',
								type: 'POST',
								data: $('#pembelianTemp').serialize(),
								success : function(data)
								{
									$('#temp_pembelian').load('pembelian_temp_load.php');
									document.getElementById('feedback').innerHTML = data;
								}
							});
							return false;
						});
					</script>
				</div>

				<div class="all-bottom">
					<div id="temp_pembelian">
						<div class="table-responsive table-sm">
							<table class="table table-hover table">
							 	<thead class="thead-dark">
								    <tr>
								      <th scope="col">Kode Item</th>
								      <th scope="col">Item</th>
								      <th scope="col">Quantity</th>
								      <th scope="col">Harga</th>
								      <th scope="col">Sub Total</th>
								    </tr>
							  	</thead>
							</table>
						</div>
					</div>

					
			</div>
			<br>
				<input type="submit" id="simpan" class="btn btn-primary" name="simpan" value="Simpan" formaction="pembelian_simpan.php">	
			</form>
				<button onclick="topFunction()" id="myBtn" title="Go to top" class="btn btn-danger">Top</button>

			
			<script type="text/javascript">
				$(document).ready(function() {
						$.ajax({
							url: 'pembelian_temp_load.php',
							type: 'GET',
							dataType: 'html',
							success : function(response)
							{
								$('#temp_pembelian').html(response);
							}
						});
						
				});
			</script>
			
		</div>
			
		<!-- Modal Start -->
		<div class="modal fade" id="myModal0" role="dialog">
		    <div class="modal-dialog modal-lg">
		      <!-- Modal content-->
		    	<div class="modal-content">
		        	<div class="modal-header">
		          		<h4 class="modal-title">Supplier</h4>
		          		<span class="ion-close" data-dismiss="modal"></span>		          
		        	</div>

		        	<div class="modal-body">
						<div id="tabelsuppliermodal">
				          	<div class="table-responsive">
					          	<table class="table table-hover table-sm" id="tabel_supplier">
					          		<thead class="thead-dark">
										<tr>
											<th>Supplier Code</th>
											<th>Supplier Name</th>
											<th>Address</th>
											<th>Contact</th>
											<th></th>
										</tr>
									</thead>	
									<?php
										require("conn.php");
										$sql = "SELECT * FROM tb_supplier WHERE hapus = 0";
										$q = mysqli_query($conn, $sql);

										while ($r = mysqli_fetch_assoc($q)) 
										{
											echo"
												<tr>
													<td>$r[kd_supplier]</td>
													<td>$r[nm_supplier]</td>
													<td>$r[alamat]</td>
													<td>$r[kontak]</td>
													<td><a href='#' data-kodeSupplier='$r[kd_supplier]' data-namaSupplier='$r[nm_supplier]' class='pilihSupplier' data-dismiss='modal'>Pilih</a></td>
												</tr>
											";	
										}
									?>
					  			</table>	
					  		</div>
					  	</div>
		        	</div>

			        <div class="modal-footer">
			          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
			        </div>
		     	</div>
		    </div>
		</div>
		<!-- </div> -->
		<!-- Modal End -->

		<!-- Modal Start -->
		<div class="modal fade" id="myModal1" role="dialog">
		    <div class="modal-dialog modal-lg">
		      <!-- Modal content-->
		      <div class="modal-content">
		        <div class="modal-header">
		          <h4 class="modal-title">Supplier</h4>
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
										<th>Price</th>
										<th></th>
									</tr>
								</thead>	
								<?php
									require("conn.php");
									$sql3 = "SELECT jns_barang, kd_barang, nm_barang, hrg_beli FROM tb_inventory";
									$q3 = mysqli_query($conn, $sql3);

									while ($r3 = mysqli_fetch_assoc($q3)) 
									{
										echo"
											<tr>
												<td>$r3[jns_barang]</td>
												<td>$r3[kd_barang]</td>
												<td>$r3[nm_barang]</td>
												<td>$r3[hrg_beli]</td>
												<td><a href='#' data-kodeItem='$r3[kd_barang]' data-namaBarang='$r3[nm_barang]' data-hargaItem='$r3[hrg_beli]' class='pilihItem' data-dismiss='modal'>Pilih</a></td>
											</tr>
											
										";	
									}
										// <td>$r3[hrg_beli]</td>
										// 		<td><a href='#' data-kodeItem='$r3[kd_barang]' data-namaBarang='$r3[nm_barang]' data-hargaItem='$r3[hrg_beli]' class='pilihItem' data-dismiss='modal'>Pilih</a></td>
										// 	<tr>	
								?>
				  			</table>
				  		</div>
				  	</div>
		        </div>
		        <div class="modal-footer">
		          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
		        </div>
		      </div>
		      
		    </div>
		  </div>
		</div>
		<!-- Modal End -->
		<!-- </div> -->
	</div>

<script src="https://unpkg.com/ionicons@4.1.1/dist/ionicons.js"></script>	
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

  		$('#tabel_supplier').DataTable();

	    $('#tabel_barang').DataTable();
  	});	
</script>


</html>

<script type="text/javascript">
	$(function(){
		$("#datepicker").datepicker({
			autoclose: true,
			todayHighlight: true
		}).datepicker('update', new Date());
	});
</script>

<script type="text/javascript">
	$(document).ready(function() {
		$.ajax({
			url: 'pembelian_temp_load.php',
			type: 'GET',
			dataType: 'html',
			success : function(response)
			{
				$('#temp_pembelian').html(response);
			}
		});

		$('#keyword0').on('keyup', function() {
			$('#tabelsuppliermodal').load('ajax/pembelian_supplier_search.php?keyword0=' + $('#keyword0').val());
		});

		$('#keyword1').on('keyup', function() {
			$('#tabelitemmodal').load('ajax/pembelian_item_search.php?keyword1=' + $('#keyword1').val());
		});
		
	});

	// $("#add").on('click', function() 
	// {
	// 	$.ajax({
	// 		url: 'pembelian_temp.php',
	// 		type: 'POST',
	// 		data: $('#pembelianTemp').serialize(),
	// 		success : function()
	// 		{
	// 			$('#temp_pembelian').load('pembelian_temp_load.php');
	// 		}
	// 	});
	// 	return false;
	// });
</script>

<script type="text/javascript">
	$('.pilihSupplier').on('click', function() 
	{
		var kodeSupplier = this.getAttribute('data-kodeSupplier');
		var namaSupplier = this.getAttribute('data-namaSupplier');
		document.getElementById('kode_supplier').value = kodeSupplier;
		document.getElementById('nama_supplier').value = namaSupplier;
	});

	$('.pilihItem').on('click', function() 
	{
		var kodeItem = this.getAttribute('data-kodeItem');
		var namaItem = this.getAttribute('data-namaBarang');
		var hargaItem = this.getAttribute('data-hargaItem');
		document.getElementById('kode_item').value = kodeItem;
		document.getElementById('nama_item').value = namaItem;
		document.getElementById('harga_item').value = hargaItem;
	});

	$("#pembelianTemp").submit(function() 
	{
		window.onbeforeunload = null;
	});

	function topFunction() 
	{
    	document.body.scrollTop = 0;
    	document.documentElement.scrollTop = 0;
	}
</script>		