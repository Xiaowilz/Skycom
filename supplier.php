<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">

	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/datepicker.css">
	<script src="javascript/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="javascript/bootstrap.min.js"></script>
	<script src="javascript/bootstrap-datepicker.js"></script>

	<style type="text/css">
		.ion-person-add{
			margin-right: 10px;
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
				<a href="mainform.php" class="aktif"><span class="ion-ios-home"></span>Beranda</a>
				<a href="penjualan.php" target="_blank"><span class="ion-cash"></span>Penjualan</a>
				<a href="pembelian.php" target="_blank"><span class="ion-android-cart"></span>Pembelian</a>
				<a href="customers.php" class="aktif"><span class="ion-ios-people"></span>Customers</a>
				<a href="inventory.php" class="aktif"><span class="ion-briefcase"></span>Inventory</a>
				<a class="active" href="supplier.php"><span class="ion-person-stalker"></span>Supplier</a>
			</div>
						
				<a class="aktif drop" id="btn_daftar"><span class="ion-android-list"></span>Daftar<i class="ion-arrow-down-b"></i></a>
				
					<div class="dropdown">
						<a href="#" class="aktif"><span class="ion-ios-circle-filled"></span>Item 1</a>
						<a href="#" class="aktif"><span class="ion-ios-circle-filled"></span>Item 2</a>
						<a href="#" class="aktif"><span class="ion-ios-circle-filled"></span>Item 3</a>
					</div>
		</div>
	</div>

	<div id="rightside">

			<div class="all-box">
				<div class="all-top">
					<h2>Supplier</h2>
				</div>
					

				<div class="all-content">
					<div class="all-head">
						<div class="button-add">
							<button class="btn btn-outline-primary" onclick="document.getElementById('id01').style.display='block'" style="width:auto;"><span class="ion-person-add"></span>Tambah Supplier</button>
						</div>

						<div class="search-container">
							<div class="input-group mb-3">
								<input type="text" name="keyword" id="keyword" class="form-control" placeholder="Search Here" autocomplete="off">
								<div class="input-group-append">
							    	<span class="input-group-text"><ion-icon ios="ios-search" md="md-search"></ion-icon></span>
							  	</div>
							</div>
		 				</div>
					</div>

				</br>

					<!-- Tabel -->
					<div id="tabelsupp">
						<div id="latar-tabel">
							<table class="table table-hover table-sm">
								<thead class="thead-dark">
									<tr>
										<th>Supplier Code</th>
										<th>Name</th>
										<th>Address</th>
										<th>Contact</th>
										<th></th>
										<th></th>
									</tr>
								</thead>

								<?php
									require_once("conn.php");

									$sql = "SELECT kd_supplier,nm_supplier,alamat,kontak FROM tb_supplier WHERE hapus=0";

									$q = mysqli_query($conn,$sql);

									while ($r = mysqli_fetch_assoc($q)) 
									{
									    echo "<tr>";
									    echo "<td>$r[kd_supplier]</td>";
									    echo "<td>$r[nm_supplier]</td>";
									    echo "<td>$r[alamat]</td>";
									    echo "<td>$r[kontak]</td>";
									    echo "<td><span class='editSupplier ion-edit' data-toggle='modal' data-target='#myModal0' data-backdrop='static' data-kodeSupplier='$r[kd_supplier]' data-namaSupplier='$r[nm_supplier]' data-alamat='$r[alamat]' data-kontak='$r[kontak]'></span></td>";
									    echo "<td><a href='supplier_hapus.php?hps=$r[kd_supplier]' onclick='return functionHapus()'><span class='ion-trash-a'></span></a></td>";
									    echo "</tr>";
									}
								?>
							</table>
						</div>	
					</div>
					
					
					<!-- TAbel -->
				</div>
			</div>	

			<!-- Modal Start -->	
			<div id="id01" class="modal_dialog">
				<div class="modal_content animate">
					<div class="modal_head">
						<button onclick="document.getElementById('id01').style.display='none'" class="btn-close-modal"><i class="ion-close-round"></i></button>
						<h4 class="modal_title">Tambah Supplier</h4>
					</div>	

					<form method="POST">
						<div class="modal_body">
							<form>
								<div class="input-group mb-3">
								 	<div class="input-group-prepend">
								    	<span class="input-group-text"><i class="ion-ios-barcode-outline"></i></span>
								  	</div>
								  	<input type="text" class="form-control" placeholder="Kode Supplier" name="kd_supp" required autocomplete="off">
								</div>

								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="ion-android-person"></i></span>
								  	</div>
								  	<input type="text" class="form-control" placeholder="Nama Supplier" name="nm_supp" required autocomplete="off">
								</div>

								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="ion-ios-location"></i></span>
								  	</div>
								  	<input type="text" class="form-control" placeholder="Alamat" name="alamat_supp" required autocomplete="off">
								</div>

								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="ion-ios-telephone"></i></span>
								  	</div>
								  	<input type="text" class="form-control" placeholder="Kontak" name="kontak_supp" required autocomplete="off">
								</div>
								<button type="submit" class="btn btn-outline-primary btn-sm btn-block" formaction="supplier_simpan.php">Tambah</button>
							</form>
				   		</div>
				   	</form>

				   	<div class="modal-footer">
				   		<div>
							<button onclick="document.getElementById('id01').style.display='none'" type="button" class="btn btn-outline-danger">Close</button>
						</div>
				   	</div>
				</div>   	
			</div>
			<!-- Modal End -->

			<!-- Modal Start -->
			<div class="modal fade" id="myModal0" role="dialog">
			    <div class="modal-dialog">
			      <!-- Modal content-->
			      <div class="modal-content">
			        <div class="modal-header">
			          <h4 class="modal-title">Edit Supplier</h4>
			          <span class="ion-close" data-dismiss="modal"></span>		          
			        </div>
			        <div class="modal-body">
			        	<form method="POST">
							<div class="input-group mb-3">
								<label for="kode" class="col-sm-3 col-form-label">Kode</label>
							 	<div class="input-group-prepend">
							    	<span class="input-group-text"><i class="ion-ios-barcode-outline"></i></span>
							  	</div>
							  	<input type="text" class="form-control" placeholder="Kode Supplier" name="kd_supp" required autocomplete="off" id="kode_supplier"> 
							</div>

							<div class="input-group mb-3">
								<label for="kode" class="col-sm-3 col-form-label">Nama</label>
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="ion-android-person"></i></span>
							  	</div>
							  	<input type="text" class="form-control" placeholder="Nama Supplier" name="nm_supp" required autocomplete="off" id="nama_supplier">
							</div>

							<div class="input-group mb-3">
								<label for="kode" class="col-sm-3 col-form-label">Alamat</label>
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="ion-ios-location"></i></span>
							  	</div>
							  	<input type="text" class="form-control" placeholder="Alamat" name="alamat_supp" required autocomplete="off" id="alamat_supplier">
							</div>

							<div class="input-group mb-3">
								<label for="kode" class="col-sm-3 col-form-label">Kontak</label>
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="ion-ios-telephone"></i></span>
							  	</div>
							  	<input type="text" class="form-control" placeholder="Kontak" name="kontak_supp" required autocomplete="off" id="kontak_supplier">
							</div>
							<button type="submit" class="btn btn-outline-primary btn-sm btn-block" formaction="supplier_edit_simpan.php">Update</button>
						</form>
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

<script src="https://unpkg.com/ionicons@4.1.1/dist/ionicons.js"></script>	
</body>
</html>

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
  		$('#tab .aktif').click(function(){
  			$('a').removeClass("active");
  			$(this).addClass("active");
  		});

	  	$('#keyword').on('keyup', function() {
			$('#tabelsupp').load('ajax/supplier_search.php?keyword=' + $('#keyword').val());
		});
  	});	

</script>

<script type="text/javascript">
	function functionHapus()
	{
		var r = window.confirm('Yakin di hapus?');
		if (r == true) 
		{
			alert('Data Terhapus');
			return true;
		}
		else
		{
			alert('Data Tidak Terhapus');
			return false;
		}
	}
	
</script>

<script type="text/javascript">
	$('.editSupplier').on('click', function()
	{
		var kodeSupplier = this.getAttribute('data-kodeSupplier');
		var namaSupplier = this.getAttribute('data-namaSupplier');
		var alamat = this.getAttribute('data-alamat');
		var kontak = this.getAttribute('data-kontak');
		document.getElementById('kode_supplier').value = kodeSupplier;
		document.getElementById('nama_supplier').value = namaSupplier;
		document.getElementById('alamat_supplier').value = alamat;
		document.getElementById('kontak_supplier').value = kontak;
	});
</script>