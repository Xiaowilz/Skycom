<?php
	require_once("conn.php");

	$sql = "SELECT kd_customer,nm_customer,alamat,kontak FROM tb_customer WHERE hapus = 0";

	$q = mysqli_query($conn,$sql);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Customer</title>
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
<body id="bodyCustomers">
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
				<a href="pembelian.php"><span class="ion-android-cart"></span>Pembelian</a>
				<a class="active" href="customers.php"><span class="ion-ios-people"></span>Customers</a>
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
					<h2>Customers</h2>
				</div>
				
				<div class="all-content">
					<div class="all-head">
						<div class="button-add">
							<button class="btn btn-outline-primary" onclick="document.getElementById('id01').style.display='block'" style="width:auto;"><span class="ion-person-add"></span>Tambah Customer</button>
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

					<br>

					<div id="container">
							<div class="table-responsive">
								<table class="table table-hover table-sm">
									<thead class="thead-dark">
										<tr>
											<th>Kode Customer</th>
											<th>Nama</th>
											<th>Alamat</th>
											<th>Kontak</th>
											<th></th>
											<th></th>
										</tr>
									</thead>	

									<?php
										require_once("conn.php");

										$sql = "SELECT kd_customer,nm_customer,alamat,kontak FROM tb_customer WHERE hapus = 0";

										$q = mysqli_query($conn,$sql);

										while ($r = mysqli_fetch_assoc($q)) 
										{
										    echo "<tr>";
										    echo "<td>$r[kd_customer]";
										    echo "<td>$r[nm_customer]</td>";
										    echo "<td>$r[alamat]</td>";
										    echo "<td>$r[kontak]</td>";
										    // echo "<td><a href='customers_edit.php?edit=$r[kd_customer]'>Edit</a></td>";
										    echo "<td><span class='editCust ion-edit' data-toggle='modal' data-target='#editcustomermodal' data-backdrop='static' data-kodeCustomer='$r[kd_customer]' data-namaCustomer='$r[nm_customer]' data-alamat='$r[alamat]' data-kontak='$r[kontak]'></span></td>";
										    echo "<td><a class='ion-trash-a' href='customers_hapus.php?hps=$r[kd_customer]' onclick='return functionHapus()' class='hapus' value='.$r[kd_customer]' id='hapus' name='hps' data-id = '.$r[kd_customer]'></a></td>";
										    echo "</tr>";
										}	
									?>
								</table>
								
							</div>	

							<script>
								$('.editCust').on('click', function()
								{
									var kode_customer = this.getAttribute('data-kodeCustomer');
									var nama_customer = this.getAttribute('data-namaCustomer');
									var alamat = this.getAttribute('data-alamat');
									var kontak = this.getAttribute('data-kontak');
									document.getElementById('kode').value = kode_customer;
									document.getElementById('nama').value = nama_customer;
									document.getElementById('alamat').value = alamat;
									document.getElementById('kon').value = kontak;
								});									
							</script>

								<!-- href='customers_hapus.php?HPS=$r[kd_customer]'  -->
								<!-- <script>
									function functionHapus()
									{
										var msg;
										msg = "Apakah Yakin Menghapus Data ?";
										var agree = confirm(msg);
										if (agree) 
										{
											alert("Data Terhapus");
											return true;
										}
										else
										{
											alert("Data Tidak Terhapus");
											return false;
										}
									}


									// $("#hapus").click(function() {
									// 	var hps = $(this).val();
									// 	var r = window.confirm("Yakin Ingin Hapus?");
									// 	if (r == true) 
									// 	{	
									// 		var d =  false;
									// 		if (!d)
									// 		{
									// 			d = true;
									// 			$.ajax({url : "customers_hapus.php", type :'GET', success: function(hps)
									// 		{
									// 			window.alert("Data Terhapus");
									// 			console.log(hps);
									// 		}});
									// 		}
											
									// 	}
									// });			
								</script> -->
					</div>	
					<!-- Tabel End -->

				</div>
			</div>	

			<!-- Modal Start -->	
			<div id="id01" class="modal_dialog">
				<div class="modal_content animate">
					<div class="modal_head">
						<button onclick="document.getElementById('id01').style.display='none'" class="btn-close-modal"><i class="ion-close-round"></i></button>
						<h4 class="modal_title">Add Customer</h4>
					</div>	

					<form method="POST" action="customers_simpan.php">
						<div class="modal_body">
							<div class="input-group mb-3">
							 	<div class="input-group-prepend">
							    	<span class="input-group-text"><i class="ion-ios-barcode-outline"></i></span>
							  	</div>
							  	<input type="text" class="form-control" placeholder="Kode Customer" id="kodecus" name="kd_cust" required>
							</div>

							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="ion-android-person"></i></span>
							  	</div>
							  	<input type="text" class="form-control" placeholder="Nama Customer" id="namacus" name="nm_cust" required>
							</div>

							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="ion-ios-location"></i></span>
							  	</div>
							  	<input type="text" class="form-control" placeholder="Alamat" name="almt_cust" required>
							</div>

							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="ion-ios-telephone"></i></span>
							  	</div>
							  	<input type="text" class="form-control" placeholder="Kontak" id="kontak" name="kontak_cust" required>
							</div>					    
							<!-- <input type="submit" name="btnAdd" id="btnAdd" class="button add-modal" value="ADD"> -->
							<button type="submit" name="btnAdd" id="btnAdd" class="btn btn-outline-primary btn-sm btn-block">Tambah</button>
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
			<div class="modal fade" id="editcustomermodal" role="dialog">
			    <div class="modal-dialog">
			    
			      <!-- Modal content-->
			      <div class="modal-content">
			        <div class="modal-header">
			          <h4 class="modal-title">Edit Customer</h4>
			          <span class="ion-close" data-dismiss="modal"></span>		          
			        </div>
			        <div class="modal-body">
			        	<form method="POST" id="formUpdate">
				          	<div class="input-group mb-3">
								<label for="kode" class="col-sm-3 col-form-label">Kode</label>
							 	<div class="input-group-prepend">
							    	<span class="input-group-text"><i class="ion-ios-barcode-outline"></i></span>
							  	</div>
							  	<input type="text" class="form-control" placeholder="Kode Customer" id="kode" name="kode" required="">
							</div>

							<div class="input-group mb-3">
								<label for="nama" class="col-sm-3 col-form-label">Nama</label>
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="ion-android-person"></i></span>
							  	</div>
							  	<input type="text" class="form-control" placeholder="Nama Customer" id="nama" name="nama" required>
							</div>

							<div class="input-group mb-3">
								<label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="ion-ios-location"></i></span>
							  	</div>
							  	<input type="text" class="form-control" placeholder="Alamat" id="alamat" name="alamat" required>
							</div>

							<div class="input-group mb-3">
								<label for="kon" class="col-sm-3 col-form-label">Kontak</label>
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="ion-ios-telephone"></i></span>
							  	</div>
							  	<input type="text" class="form-control" placeholder="Kontak" id="kon" name="kontak" required>
							</div>
							<input type="submit" class="btn btn-outline-primary btn-sm btn-block" id="update" value="Update" formaction="customers_edit_simpan.php">
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
	</div>	

<!-- <script src="javascript/search.js"></script> -->
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
  		$('#tab a').click(function(){
  			$('a').removeClass("active");
  			$(this).addClass("active");
  		});

  		$('#keyword').on('keyup', function() {
			$('#container').load('ajax/customer_search.php?keyword=' + $('#keyword').val());
		});
  	});	

</script>

<script>
	function functionHapus()
	{
		var msg;
		msg = "Apakah Yakin Menghapus Data ?";
		var agree = confirm(msg);
		if (agree) 
		{
			alert("Data Terhapus");
			return true;
		}
		else
		{
			alert("Data Tidak Terhapus");
			return false;
		}
	}


	// $("#hapus").click(function() {
	// 	var hps = $(this).val();
	// 	var r = window.confirm("Yakin Ingin Hapus?");
	// 	if (r == true) 
	// 	{	
	// 		var d =  false;
	// 		if (!d)
	// 		{
	// 			d = true;
	// 			$.ajax({url : "customers_hapus.php", type :'GET', success: function(hps)
	// 		{
	// 			window.alert("Data Terhapus");
	// 			console.log(hps);
	// 		}});
	// 		}
			
	// 	}
	// });						
</script>

<<<<<<< HEAD
=======
<script>
	$('.editCust').on('click', function()
	{
		var kode_customer = this.getAttribute('data-kodeCustomer');
		var nama_customer = this.getAttribute('data-namaCustomer');
		var alamat = this.getAttribute('data-alamat');
		var kontak = this.getAttribute('data-kontak');
		document.getElementById('kode').value = kode_customer;
		document.getElementById('nama').value = nama_customer;
		document.getElementById('alamat').value = alamat;
		document.getElementById('kon').value = kontak;
	});									

	// $('#update').on('click', function()
	// {
	// 	$.ajax({
	// 		url: 'customer_edit_simpan.php',
	// 		type: 'POST',
	// 		dataType: 'html',
	// 		data: $('#formUpdate').serialize(),
	// 		success : function()
	// 		{
	// 			location:reload();			
	// 		}
	// 	});
		
	// });
</script>
>>>>>>> 9c6785022af5e2a199c012eaadd94a7ff9d758cd
