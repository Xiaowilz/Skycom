	<!DOCTYPE html>
<html>
<head>
	<title></title>

	<link rel="stylesheet" type="text/css" href="style.css">
	<!-- Date Picker JS CSS-->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/datepicker.css">
	<script src="javascript/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="javascript/bootstrap.min.js"></script>
	<script src="javascript/bootstrap-datepicker.js"></script>
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

		.all-bottom th{
			text-align: center;
		}


	</style>

</head>
<body>
	<div id="topnav">
		<div class="menuicon" onclick="geser()">
			<div class="garis"></div>
			<div class="garis"></div>
			<div class="garis"></div>
		</div>
	</div>

	<!-- <div id="sidenav">
		<div id="tab">
			<div class="tabbutton">	
				<a href="mainform.php"><span class="ion-ios-home"></span>Beranda</a>
				<a class="active" href="penjualan.php" target="_blank"><span class="ion-cash"></span>Penjualan</a>
				<a href="pembelian.php"><span class="ion-android-cart"></span>Pembelian</a>
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
					<h2>Penjualan</h2>
					<div id="datepicker" class="input-group date" data-date-format="dd MM yyyy">
						<input class="form-control" type="text" name="">
						<span class="input-group-addon"></span>
					</div>

				</div>
				<?php
					require_once("conn.php");
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
						<div class="form-group row">
			      			<label for="kodetransaksi" class="col-sm-2 col-form-label">Kode Transaksi</label>
			      			<div class="col-sm-3">
			      				<input id="kodetransaksi" type="text" class="form-control" placeholder="Kode Transaksi" name="no_transaksi" value="<?php echo $noTrans; ?>">
			    			</div>
					    </div>
						

					    <div class="form row">
			      			<label for="namacustomer" class="col-sm-2 col-form-label">Customer</label>
			      			<div class="col-sm-2">
			      				<input type="text" class="form-control" placeholder="Kode Customer" name="" id="kode_customer" readonly="true">
			    			</div>

			    			<div class="col-sm-3">
								<div class="input-group">
									<input type="text" class="form-control" placeholder="Nama Customer" id="nama_customer" readonly="true" name="nama_customer">
									<div class="input-group-append">
										<button class="btn btn-info" type="button"  data-toggle="modal" data-target="#myModal1" data-backdrop="static"><span class="ion-person-add"></button>
									</div>
								</div>
							</div>
					    </div>
				</div>	

				<br/>

				<div class="all-content">
			    	<div class="form row">
			    		
			      			<div class="col-sm-2">
			      				<input type="text" class="form-control" placeholder="Kode Barang" name="kode_item" id="kode_item" readonly required>
			    			</div>

							<div class="col-sm-4">
							    <div class="input-group">
									<input type="text" class="form-control" placeholder="Nama Barang" id="nama_item" name="nama_item" readonly="true" required>
									<div class="input-group-append">
										<button class="btn btn-info" type="button" data-toggle="modal" data-target="#myModal2" data-backdrop="static"><span class="ion-plus-round"></button>
									</div>
								</div>
							</div>	

						    <div class="col-sm-2">
						    	<input type="text" class="form-control" placeholder="Quantity" name="quantity" required>
						    </div>

						    <div class="col-sm-2">
						    	<input type="text" class="form-control" placeholder="Harga" name="harga_item" id="harga_item" required>
						    </div>

			    			<Button type="submit" id="add" class="btn btn-outline-primary">Add</Button>
		    			<!-- ><span class="ion-arrow-down-b"></span> -->
		    			
					</div>
				</div>

				<br/>

				<div class="all-bottom">
					<!-- Load Tabel Temp -->
					<div id="tabelTemp"> 
						<div class="table-responsive">
							<table class="table table-hover table-sm">
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
					<div class="col-4">
						<div class="input-group mb-1 input-group-sm">
							<input type="text" name="keyword0" id="keyword0" class="form-control" placeholder="Search Here" autocomplete="off">
							<div class="input-group-append">
						    	<span class="input-group-text"><ion-icon ios="ios-search" md="md-search"></ion-icon></span>
						  	</div>
						</div>
					</div>	

					<div id="tabelcustomermodal">
						<div class="table-responsive">
				          	<table class="table table-hover table-sm">
				          		<thead class="thead-dark">
									<tr>
										<th>Kode Customer</th>
										<th>Nama Customer</th>
										<th>Alamat</th>
										<th>Kontak</th>
										<th></th>
									</tr>
								</thead>	
								<?php
									require("conn.php");
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
												<td><a href='#' class='pilihCustomer' data-pilihCustomer='$r[kd_customer]' data-namaCustomer='$r[nm_customer]' data-dismiss='modal'>Pilih</a></td>
											<tr>
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

		<!-- Modal Start -->
		<div class="modal fade" id="myModal2" role="dialog">
		    <div class="modal-dialog modal-lg">
		    
		      <!-- Modal content-->
		      <div class="modal-content">
		        <div class="modal-header">
		          <h4 class="modal-title">Barang</h4>
		          <span class="ion-close" data-dismiss="modal"></span>		          
		        </div>
		        <div class="modal-body">

		        	<div class="col-4">
						<div class="input-group mb-1 input-group-sm">
							<input type="text" name="keyword1" id="keyword1" class="form-control" placeholder="Search Here" autocomplete="off">
							<div class="input-group-append">
						    	<span class="input-group-text"><ion-icon ios="ios-search" md="md-search"></ion-icon></span>
						  	</div>
						</div>
					</div>	

					<div id="tabelitemmodal">
						<div class="table-responsive">
				          	<table class="table table-hover table-sm">
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
									$sql3 = "SELECT jns_barang, kd_barang, nm_barang, hrg_jual FROM tb_inventory WHERE hapus = 0";
									$q3 = mysqli_query($conn, $sql3);

									while ($r3 = mysqli_fetch_assoc($q3)) 
									{
										echo"
											<tr>
												<td>$r3[jns_barang]</td>
												<td>$r3[kd_barang]</td>
												<td>$r3[nm_barang]</td>
												<td>$r3[hrg_jual]</td>
												<td><a href='#' class='pilihItem' data-pilihItem='$r3[kd_barang]' data-namaItem='$r3[nm_barang]' data-hargaItem='$r3[hrg_jual]' data-dismiss='modal'>Pilih</a></td>
											<tr>
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
		</div>
		<!-- Modal End -->
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

  		$('#keyword0').on('keyup', function() {
			$('#tabelcustomermodal').load('ajax/penjualan_search.php?keyword0=' + $('#keyword0').val());
		});

		$('#keyword1').on('keyup', function() {
			$('#tabelitemmodal').load('ajax/penjualan_item_search.php?keyword1=' + $('#keyword1').val());
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
			}
		});
		return false;
	});
</script>

</html>