<?php
	session_start();
	if(!isset($_SESSION['username']))
	{
		header("Location:../index");
	}
?>

<!DOCTYPE html>
<html>
<head>

	<title>Pembelian Skycom</title>
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="../style.css">
	<link rel="stylesheet" type="text/css" href="../ionicons-2.0.1/css/ionicons.min.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/datepicker.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/dataTables.bootstrap4.min.css">
	
	<!-- Script -->
	<script src="../javascript/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="../javascript/bootstrap.min.js"></script>
	<script type="text/javascript" src="../javascript/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="../javascript/dataTables.bootstrap4.min.js"></script>
	<!-- ____________  -->

	<style type="text/css">	
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

		.ion-android-cart{
			margin-right: 10px;
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
<body onload="functionTampilkanJam();setInterval('functionTampilkanJam()', 1000);">
	<div id="topnav">
		<div class="title">
			<img src="../gambar/logo2.png" width="145" height="35" id="logo">
		</div>

		<div class="title2" style="float: left; margin-top: -6px; margin-left: 15px;">
			<h3>Pembelian</h3>
		</div>


		<div class="jamtgl">
			Jam : <span id="clock"></span>
			<span id="date">
				<?php
					functionTanggal();
				?>
			</span>
			<a id="lihatTrans" href="transaksiBeli" target="_blank">Lihat Transaksi</a>
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

						    <div class="form row">
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
							?>
						    </div>

						    <div class="form-group row">
								<label for="" class="col-sm-3 col-form-label"></label>
								<div class="col-sm-7">
									<small><span id="suppError" class="text-danger font-weight-bold"></span></small>
								</div>
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
						    	<input type="text" class="form-control form-control-sm" placeholder="Quantity" name="quantity" id="qty" autocomplete="off" required onkeypress="return functionHanyaAngka(event)" maxlength="3">
						    </div>

							<div class="col-xs-1">
						    	<button type="submit" class="btn btn-primary btn-sm" value="Add" id="add"><span class="ion-android-cart"></span>Tambah</button>
							</div>
						</div>

						<div class="form row">
							<label  class="col-sm-3 col-form-label"></label>
							<div class="col-sm-6">
								<div id="feedback"></div>
							</div>
						</div>

						<div class="form-group row">
							<label for="" class="col-sm-3 col-form-label"></label>
							<div class="col-sm-7">
								<small><span id="tableError" class="text-danger font-weight-bold"></span></small>
							</div>
						</div>

					</div>

					<div class="spacer" style="clear: both;"></div>

					<script type="text/javascript">
						$("#add").on('click', function() 
						{
							$("#tableError").html("");					
    						$("#tableError").css("display","block");

							$.ajax({
								url: 'pembelian_temp.php',
								type: 'POST',
								data: $('#pembelianTemp').serialize(),
								success : function(data)
								{
									$('#temp_pembelian').load('pembelian_temp_load.php');
									document.getElementById('feedback').innerHTML = data;
									if(document.getElementById('kode_item').value == ""){
								 		protekTabel = 0;
								 	}else{
								 		protekTabel=1;
								 	}
								}
							});
							return false;
						});
					</script>
				</div>

				<div class="all-bottom">
					<div id="temp_pembelian">
						<div class="table-responsive table-sm">
							<input type="hidden" name="protekTabel" id="protekTabel" value="0">
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
				<button type="submit" id="simpan" class="btn btn-primary" name="simpan" onclick="return functionSimpan()" formaction="pembelian_simpan">Simpan</button>
			</form>
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
											<th>Kode Supplier</th>
											<th>Nama Supplier</th>
											<th>Alamat</th>
											<th>Kontak</th>
											<th></th>
										</tr>
									</thead>	
									<?php
										require("../conn.php");
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
													<td align='center'><a href='#' data-kodeSupplier='$r[kd_supplier]' data-namaSupplier='$r[nm_supplier]' class='pilihSupplier' data-dismiss='modal' id='pilih1'>Pilih</a></td>
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
										<th>Jenis Barang</th>
										<th>Kode Barang</th>
										<th>Nama Barang</th>
										<th>Harga</th>
										<th></th>
									</tr>
								</thead>	
								<?php
									require("../conn.php");
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
												<td align='center'><a href='#' data-kodeItem='$r3[kd_barang]' data-namaBarang='$r3[nm_barang]' data-hargaItem='$r3[hrg_beli]' class='pilihItem' data-dismiss='modal' id='pilih2'>Pilih</a></td>
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
		<!-- </div> -->
	</div>
	
    <a href="javascript:" id="return-to-top"><i class="ion-chevron-up"></i></a>

<script type="text/javascript" src="../javascript/scrollUp.js"></script>	
</body>
<script type="text/javascript">
	var dropdown = document.getElementsByClassName("drop");
	var i, cekSupp=0, cekBarang=0, protek=0;
	var kdSupplier = document.getElementById('kode_supplier').value;
	var protekTabel = document.getElementById('protekTabel').value;			
	function functionSimpan(){	
		if(protekTabel==0){
			if(cekSupp==0){
				$("#suppError").html("** Supplier Harus Diisi");					
	        	$("#suppError").css("display","block");
	        	this.topFunction();
	        	return false;
			}
			else if(cekSupp==1){
				$("#tableError").html("**  Barang Belum Dipilih");					
	        	$("#tableError").css("display","block");
				return false;
			}
		}else if (protekTabel==1){
			if(cekSupp==0){
				$("#suppError").html("** Supplier Harus Diisi");					
	        	$("#suppError").css("display","block");
	        	this.topFunction();
	        	return false;
			}
			else if(cekSupp==1){
				$("#tableError").html("");					
	    		$("#tableError").css("display","block");
				return true;
			}
		}
	}

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

	// $(function(){
	// 	$("#datepicker").datepicker({
	// 		autoclose: true,
	// 		todayHighlight: true
	// 	}).datepicker('update', new Date());
	// });


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

	$('.pilihSupplier').on('click', function() 
	{
		var kodeSupplier = this.getAttribute('data-kodeSupplier');
		var namaSupplier = this.getAttribute('data-namaSupplier');
		document.getElementById('kode_supplier').value = kodeSupplier;
		document.getElementById('nama_supplier').value = namaSupplier;
		$("#suppError").html("");					
	    $("#suppError").css("display","block");
		cekSupp=1;
	});

	$('.pilihItem').on('click', function() 
	{
		var kodeItem = this.getAttribute('data-kodeItem');
		var namaItem = this.getAttribute('data-namaBarang');
		var hargaItem = this.getAttribute('data-hargaItem');
		document.getElementById('kode_item').value = kodeItem;
		document.getElementById('nama_item').value = namaItem;
		document.getElementById('harga_item').value = hargaItem;
		cekBarang=1;
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
</html>