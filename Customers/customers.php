<?php
	session_start();
	if(!isset($_SESSION['username']))
	{
		header("Location:../index");
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
	<meta charset="utf-8">
	<title>Customer</title>
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="../style.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../ionicons-2.0.1/css/ionicons.min.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/dataTables.bootstrap4.min.css">

	<!-- Script -->
	<script type="text/javascript" src="../javascript/jquery-3.3.1.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
	<script type="text/javascript" src="../javascript/bootstrap.min.js"></script>	
	<script type="text/javascript" src="../javascript/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="../javascript/dataTables.bootstrap4.min.js"></script>

	<style type="text/css">
		.ion-person-add{
			margin-right: 10px;
		}

		#table_id th{
			text-align: center;
		}
	</style>

<script>
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

</head>
<body onload="functionTampilkanJam();setInterval('functionTampilkanJam()', 1000);">
	<div id="topnav">
		<div class="menuicon" onclick="geser()">
			<div class="garis"></div>
			<div class="garis"></div>
			<div class="garis"></div>
		</div>

		<div class="btn-group" id="test">
		  	<img src="../gambar/user.png" width="40" height="40" class="dropdown-toggle rounded-circle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="userpict">
		  	<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item" href="#"><span class="ion-android-person"></span><?php echo implode($nama); ?></a>
			  	<div class="dropdown-divider"></div>
				<a class="dropdown-item" href="../Home/logout"><span class="ion-log-out"></span>Log Out</a>
			</div>
		</div>

		<div class="title">
            <img src="../gambar/logo2.png" width="145" height="35" id="logo"> 
        </div>

		<div class="jamtgl">
			Jam : <span id="clock">
				<?php echo "HH:MM:SS"; ?> 
			</span>

			<span id="date">
				<?php
					functionTanggal();
				?>
			</span>
		</div>
	</div>


	<div id="sidenav">
		<div id="tab">
			<div class="tabbutton">
				<a href="../Home/mainform" class="aktif"><span class="ion-ios-home"></span>Beranda</a>
				<a href="../Penjualan/penjualan" target="_blank"><span class="ion-cash"></span>Penjualan</a>
				<a href="../Pembelian/pembelian" target="_blank"><span class="ion-android-cart"></span>Pembelian</a>
				<a class="active" href="customers"><span class="ion-ios-people"></span>Customers</a>
				<a href="../Inventory/inventory" class="aktif"><span class="ion-briefcase"></span>Inventory</a>
				<a href="../Supplier/supplier" class="aktif"><span class="ion-person-stalker"></span>Supplier</a>
			</div>
						
			<a class="aktif drop" id="btn_daftar"><span class="ion-android-list"></span>Laporan<i class="ion-arrow-down-b"></i></a>		
			<div class="dropdown">
				<a href="../Penjualan/transaksiJual" target="_blank" class="aktif"><span class="ion-ios-circle-filled"></span>Penjualan</a>
				<a href="../Pembelian/transaksiBeli" target="_blank" class="aktif"><span class="ion-ios-circle-filled"></span>Pembelian</a>
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
						<br>
					</div>

					<br>
					
					<div id="container">
							<div class="table-responsive">
								<table class="table table-hover table-sm cell-border" id="table_id">
									<thead class="thead-dark">
										<tr>
											<th width="20%">Kode Customer</th>
											<th width="">Nama Customer</th>
											<th width="">Alamat</th>
											<th width="">Kontak</th>
											<th width="5%"></th>
											<th width="5%"></th>
										</tr>
									</thead>	

									<?php
										require_once("../conn.php");

										$sql = "SELECT kd_customer,nm_customer,alamat,kontak FROM tb_customer WHERE hapus = 0";

										$q = mysqli_query($conn,$sql);

										while ($r = mysqli_fetch_assoc($q)) 
										{
										    echo "<tr>";
										    echo "<td>$r[kd_customer]</td>";
										    echo "<td>$r[nm_customer]</td>";
										    echo "<td>$r[alamat]</td>";
										    echo "<td>$r[kontak]</td>";
										    echo "<td align='center'><span class='editCust ion-edit' data-toggle='modal' data-target='#editcustomermodal' data-backdrop='static' data-kodeCustomer='$r[kd_customer]' data-namaCustomer='$r[nm_customer]' data-alamat='$r[alamat]' data-kontak='$r[kontak]'></span></td>";
										    echo "<td align='center'><a class='ion-trash-a' href='customers_hapus.php?hps=$r[kd_customer]' onclick='return functionHapus()' class='hapus' value='.$r[kd_customer]' id='hapus' name='hps' data-id = '.$r[kd_customer]'></a></td>";
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
					</div>	
					<!-- Tabel End -->
				</div>
			</div>	

			<!-- Modal Start -->	
			<div id="id01" class="modal_dialog">
				<?php
					require_once("../conn.php");
					$sql2 = "SELECT max(kd_customer) AS maxKodeCustomer FROM tb_customer";
					$q2 = mysqli_query($conn, $sql2);
					$data = mysqli_fetch_array($q2);
					$noKodeCustomer = $data['maxKodeCustomer'];

					$noUrut = (int) substr($noKodeCustomer, 4, 5);
					$noUrut++;

					$char = "CST-";
					$noKodeCustomer = $char. sprintf('%05s', $noUrut);
				?>
				<div class="modal_content animate">
					<div class="modal_head">
						<button onclick="document.getElementById('id01').style.display='none'" class="btn-close-modal"><i class="ion-close-round"></i></button>
						<h4 class="modal_title">Tambah Customer</h4>
					</div>	

					<form method="POST" action="customers_simpan.php">
						<div class="modal_body">
							<div class="input-group mb-3">
							 	<div class="input-group-prepend">
							    	<span class="input-group-text"><i class="ion-ios-barcode-outline"></i></span>
							  	</div>
							  	<input type="text" class="form-control" placeholder="Kode Customer" id="kodecus" name="kd_cust" required autocomplete="off" value="<?php echo $noKodeCustomer; ?>" readonly="true">
							</div>

							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="ion-android-person"></i></span>
							  	</div>
							  	<input type="text" class="form-control" placeholder="Nama Customer" id="namacus" name="nm_cust" required autocomplete="off" maxlength="25">
							</div>

							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="ion-ios-location"></i></span>
							  	</div>
							  	<input type="text" class="form-control" placeholder="Alamat" name="almt_cust" required autocomplete="off" maxlength="50">
							</div>

							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="ion-ios-telephone"></i></span>
							  	</div>
							  	<input type="text" class="form-control" placeholder="Kontak" id="kontak" name="kontak_cust" required autocomplete="off" maxlength="13">
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
							  	<input type="text" class="form-control" placeholder="Kode Customer" id="kode" name="kode" required autocomplete="off" readonly="true">
							</div>

							<div class="input-group mb-3">
								<label for="nama" class="col-sm-3 col-form-label">Nama</label>
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="ion-android-person"></i></span>
							  	</div>
							  	<input type="text" class="form-control" placeholder="Nama Customer" id="nama" name="nama" required autocomplete="off" maxlength="25">
							</div>

							<div class="input-group mb-3">
								<label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="ion-ios-location"></i></span>
							  	</div>
							  	<input type="text" class="form-control" placeholder="Alamat" id="alamat" name="alamat" required autocomplete="off" maxlength="50">
							</div>

							<div class="input-group mb-3">
								<label for="kon" class="col-sm-3 col-form-label">Kontak</label>
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="ion-ios-telephone"></i></span>
							  	</div>
							  	<input type="text" class="form-control" placeholder="Kontak" id="kon" name="kontak" required autocomplete="off" maxlength="13">
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

    <a href="javascript:" id="return-to-top"><i class="ion-chevron-up"></i></a>

<script type="text/javascript" src="../javascript/scrollUp.js"></script>
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

	function geser() {
  		document.getElementById("sidenav").classList.toggle('show');
  		document.getElementById("rightside").classList.toggle('show');
  		}

	$(document).ready(function() {
  		$('#tab .aktif').click(function(){
  			$('a').removeClass("active");
  			$(this).addClass("active");
  		});
  	});	

  	$(document).ready( function() {
  		$.fn.DataTable.ext.pager.numbers_length = 9;
  		
	    $('#table_id').DataTable({
	    	"pagingType":"full_numbers",
            "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
	    });
	});

	function functionHapus() {
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

	$('.editCust').on('click', function() {
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
