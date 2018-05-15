<!DOCTYPE html>
<html>
<head>

	<title>Pembelian Skycom</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<!-- Date Picker JS CSS-->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/datepicker.css">
	<script src="javascript/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="javascript/bootstrap.min.js"></script>
	<script src="javascript/bootstrap-datepicker.js"></script>
	<!-- ____________  -->

		<style type="text/css">
		#namasupplier {
			margin-left: -20px;
		}

		.btn span {
			margin-right: 5px;
		}

		#btnsupplier {
			margin-left: -20px;
		}

		.ion-arrow-down-b{
			margin-left: 7px;
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

	<div id="sidenav">
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
	</div>

	<div id="rightside">
		<div id="beranda">	
			<div class="all-box">	
				<div class="all-top">
					<h2>Pembelian</h2>

					<div id="datepicker" class="input-group date" data-date-format="dd MM yyyy">
						<input class="form-control" type="text" name="">
						<span class="input-group-addon"></span>
					</div>
				</div>

				<div class="info-top">
					<div class="form-group row">
		      			<label for="kodetransaksi" class="col-sm-2 col-form-label">Kode Transaksi</label>
		      			<div class="col-sm-3">
		      				<input id="kodetransaksi" type="text" class="form-control" placeholder="Kode Transaksi" name="">
		    			</div>
				    </div>

				    <div class="form row">
		      			<label for="namasupplier" class="col-sm-2 col-form-label">Supplier</label>
		      			<div class="col-sm-2">
		      				<input type="text" class="form-control" placeholder="Kode Supplier" name="" disabled>
		    			</div>

		    			<div class="col-sm-3">
							<div class="input-group">
								<input type="text" class="form-control" placeholder="Supplier Name" disabled>
									<div class="input-group-append">
										<button class="btn btn-info" type="button" data-toggle="modal" data-target="#myModal0" data-backdrop="static"><span class="ion-person-add"></button>
									</div>
							</div>
						</div>	
				    </div>
				</div>

				<br/>

				<div class="all-content">
					<!-- <div class="container"> -->
						<form action="">
				    		<div class="form row">
					      			<div class="col-sm-2">
					      				<input id="kodeitem" type="text" class="form-control" placeholder="Kode Barang" name="" disabled>
					    			</div>

									<div class="col-sm-4">
									    <div class="input-group">
											<input type="text" class="form-control" placeholder="Nama Barang" disabled>
											<div class="input-group-append">
												<button class="btn btn-info" type="button" data-toggle="modal" data-target="#myModal1" data-backdrop="static"><span class="ion-plus-round"></span></button>
											</div>
										</div>
									</div>	

								    <div class="col-sm-2">
								    	<input type="text" class="form-control" placeholder="Quantity" name="">
								    </div>

								    <div class="col-sm-2">
								    	<input type="text" class="form-control" placeholder="Harga" name="">
								    </div>

					    			<button type="button" class="btn btn-primary"><span class="ion-arrow-down-b"></span>Add</button>
							</div>
				  		</form>
				</div>

				<br/>

				<div class="all-bottom">
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

							<tbody>
							    <tr>
							      <th scope="row">1</th>
							      <td>Mark</td>
							      <td>Otto</td>
							      <td>@mdo</td>
							      <td></td>
							    </tr>
							    <tr>
							      <th scope="row">2</th>
							      <td>Jacob</td>
							      <td>Thornton</td>
							      <td>@fat</td>
							      <td></td>
							    </tr>
							    <tr>
							      <th scope="row">3</th>
							      <td>Larry the Bird</td>
							      <td>Sans</td>
							      <td>@twitter</td>
							      <td></td>
							    </tr>
						 	</tbody>
						</table>
					</div>
			</div>	
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
		          <div class="table-responsive">
			          	<table class="table table-hover table-sm">
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
												<td><a href=''>Pilih</a></td>
											<tr>
										
									";	
								}
							?>
			  			</table>
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
								$sql = "SELECT jns_barang, kd_barang, nm_barang, hrg_jual FROM tb_inventory WHERE hapus = 0";
								$q = mysqli_query($conn, $sql);

								while ($r = mysqli_fetch_assoc($q)) 
								{
									echo"

											<tr>
												<td>$r[jns_barang]</td>
												<td>$r[kd_barang]</td>
												<td>$r[nm_barang]</td>
												<td>$r[hrg_jual]</td>
												<td><a href=''>Pilih</a></td>
											<tr>
										
									";	
								}
							?>
			  			</table>
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

	</div>
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


</html>

<script type="text/javascript">
	$(function(){
		$("#datepicker").datepicker({
			autoclose: true,
			todayHighlight: true
		}).datepicker('update', new Date());
	});
</script>