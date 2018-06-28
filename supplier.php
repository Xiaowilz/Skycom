<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Supplier</title>
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

	<style type="text/css">
		.ion-person-add{
			margin-right: 10px;
		}

		#table_id th{
			text-align: center;
		}

		.logout
		{
			float : right;
			margin-top: -4px;
		}

		.logout span{
			margin-right: 15px;
		}
	</style>
</head>

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

<?php
	session_start();
	if(!isset($_SESSION['username']))
	{
		header("Location:index");
	}
?>

<body onload="functionTampilkanJam();setInterval('functionTampilkanJam()', 1000);">
	<div id="topnav">
		<div class="menuicon" onclick="geser()">
			<div class="garis"></div>
			<div class="garis"></div>
			<div class="garis"></div>
		</div>

		<div class="title">
            <h3 style="margin-left: 35px;">SkyCom</h3>  
        </div>

		<div class="logout">
			<form method="POST" action="logout">
				<button type="submit" name="logout" value="Logout" class="btn btn-danger btn-sm"><span class="ion-log-out"></span>Log Out</button>
			</form>
		</div>

		<div class="jamtgl">
			Jam : <span id="clock"></span>
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
				<a href="mainform" class="aktif"><span class="ion-ios-home"></span>Beranda</a>
				<a href="penjualan" target="_blank"><span class="ion-cash"></span>Penjualan</a>
				<a href="pembelian" target="_blank"><span class="ion-android-cart"></span>Pembelian</a>
				<a href="customers" class="aktif"><span class="ion-ios-people"></span>Customers</a>
				<a href="inventory" class="aktif"><span class="ion-briefcase"></span>Inventory</a>
				<a class="active" href="supplier"><span class="ion-person-stalker"></span>Supplier</a>
			</div>
						
				<a class="aktif drop" id="btn_daftar"><span class="ion-android-list"></span>Laporan<i class="ion-arrow-down-b"></i></a>
				
					<div class="dropdown">
						<a href="transaksiJual" target="_blank" class="aktif"><span class="ion-ios-circle-filled"></span>Penjualan</a>
						<a href="transaksiBeli" target="_blank" class="aktif"><span class="ion-ios-circle-filled"></span>Pembelian</a>
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
						<br>
					</div>

				</br>

					<!-- Tabel -->
					<div id="tabelsupp">
						<div id="latar-tabel">
							<table class="table table-hover table-sm" id="table_id">
								<thead class="thead-dark">
									<tr>
										<th>Supplier Code</th>
										<th>Name</th>
										<th>Address</th>
										<th>Contact</th>
										<th width="5%"></th>
										<th width="5%"></th>
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
									    echo "<td align='center'><span class='editSupplier ion-edit' data-toggle='modal' data-target='#myModal0' data-backdrop='static' data-kodeSupplier='$r[kd_supplier]' data-namaSupplier='$r[nm_supplier]' data-alamat='$r[alamat]' data-kontak='$r[kontak]'></span></td>";
									    echo "<td align='center'><a href='supplier_hapus.php?hps=$r[kd_supplier]' onclick='return functionHapus()'><span class='ion-trash-a'></span></a></td>";
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
				<?php
					require_once("conn.php");
					$sql2 = "SELECT max(kd_supplier) AS maxKodeSupplier FROM tb_supplier";
					$q2 = mysqli_query($conn, $sql2);
					$data = mysqli_fetch_array($q2);
					$noKodeSupplier = $data['maxKodeSupplier'];

					$noUrut = (int) substr($noKodeSupplier, 3, 5);
					$noUrut++;

					$char = "SP-";
					$noKodeSupplier = $char. sprintf('%05s', $noUrut);
				?>
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
								  	<input type="text" class="form-control" placeholder="Kode Supplier" name="kd_supp" required autocomplete="off" value="<?php echo $noKodeSupplier; ?>" readonly="true">
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

    <a href="javascript:" id="return-to-top"><i class="ion-chevron-up"></i></a>

<script type="text/javascript" src="javascript/scrollUp.js"></script>	
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

  	$(document).ready( function () {
  		$.fn.DataTable.ext.pager.numbers_length = 9;
		$('#table_id').DataTable({
			"pagingType": "full_numbers",
            "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
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