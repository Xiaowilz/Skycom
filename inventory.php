<!DOCTYPE html>
<html>
<head>
	<title>Inventory</title>
	<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
	
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script src="javascript/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="javascript/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="ionicons-2.0.1/css/ionicons.min.css">

	<script type="text/javascript" src="javascript/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="javascript/dataTables.bootstrap4.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap4.min.css">
	<script type="text/javascript" src="javascript/script.js"></script>	
	<!-- ____________  -->
	<style type="text/css">
		#table_id th{
			text-align: center; 
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

<body onload="functionTampilkanJam();setInterval('functionTampilkanJam()', 1000);">
	<div id="topnav">
		<div class="menuicon" onclick="geser()">
			<div class="garis"></div>
			<div class="garis"></div>
			<div class="garis"></div>
		</div>

		<div class="title">
            <img src="gambar/logo2.png" width="145" height="35" id="logo"> 
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
				<a class="active" href="inventory"><span class="ion-briefcase"></span>Inventory</a>
				<a href="supplier" class="aktif"><span class="ion-person-stalker"></span>Supplier</a>
			</div>
						
				<a class="aktif drop" id="btn_daftar"><span class="ion-android-list"></span>Laporan<i class="ion-arrow-down-b"></i></a>
				
					<div class="dropdown">
						<a href="transaksiJual" target="_blank" class="aktif"><span class="ion-ios-circle-filled"></span>Penjualan</a>
						<a href="transaksiBeli" target="_blank" class="aktif"><span class="ion-ios-circle-filled"></span>Pembelian</a>
					</div>
		</div>
	</div>

	<div id="rightside">
		<div id="beranda">	
			<div class="all-box">

					<div class="all-top">
						<h2>Inventory</h2>
					</div>

				<div class="all-content">
					<div class="all-head">
						<div class="button-add">
							<button class="btn btn-outline-primary" data-toggle='modal' data-target='#modalJenisBarang' data-backdrop='static'><span class="ion-plus-round"></span> Tambah Jenis Barang</button>

							<button class="btn btn-outline-primary" onclick="document.getElementById('id01').style.display='block'" style="width:auto;"><span class="ion-plus-round"></span> Tambah Barang</button>					
						</div>
						<br>
					</div>
					<br>
					
					<div id="container1">
						<!-- Tabel -->
						<div class="table-responsive">
							<table class="table table-hover table-sm" id="table_id">
							 	<thead class="thead-dark">
								    <tr>
								      <th>Jenis Barang</th>
								      <th>Kode Barang</th>
								      <th>Nama Barang</th>
								      <th>Qty</th>
								      <th>Harga Beli</th>
								      <th>Harga Jual</th>
								      <th width="5%"></th>
								      <th width="5%"></th>
								    </tr>
							  	</thead>

								<tbody>								    
								    <?php
										require_once("conn.php");

										$sql = "SELECT jns_barang,kd_barang,nm_barang,qty,hrg_beli,hrg_jual,hapus FROM tb_inventory WHERE hapus = 0";
										$q = mysqli_query($conn,$sql);

										while ($r = mysqli_fetch_assoc($q)) 
										{
											$hargaBeli = number_format($r['hrg_beli'], 0, ',', '.');
											$hargaJual = number_format($r['hrg_jual'], 0, ',', '.');
										    echo "<tr>";
										    echo "<td>$r[jns_barang]</td>";
										    echo "<td>$r[kd_barang]</td>";
										    echo "<td>$r[nm_barang]</td>";
										    echo "<td align='center'>$r[qty]</td>";
										    echo "<td align='right'>$hargaBeli</td>";
										    echo "<td align='right'>$hargaJual</td>";
										    echo "<td align='center'><span class='editBarang ion-edit' data-toggle='modal' data-target='#myModal0' data-backdrop='static'  data-jenisBarang='$r[jns_barang]' data-kodeBarang='$r[kd_barang]' data-namaBarang='$r[nm_barang]' data-qty='$r[qty]' data-hargaBeli='$r[hrg_beli]' data-hargaJual='$r[hrg_jual]'></span></td>";
										    echo "<td class='hapus' align='center'><a class='ion-trash-a' href='inventory_hapus.php?hps=$r[kd_barang]' onclick='return functionHapus()'></a></td>";
										    echo "</tr>";
										}
									?>
							 	</tbody>
							</table>							
						</div>
						<!-- Tabel End -->
					</div>
				</div>
			</div>	

			<!-- Modal Start -->	
			<div id="id01" class="modal_dialog">
				<div class="modal_content animate">
					<div class="modal_head">
						<button onclick="document.getElementById('id01').style.display='none'" class="btn-close-modal"><i class="ion-close-round"></i></button>
						<h4 class="modal_title">Tambah Barang</h4>
					</div>	

					<form method="POST" action="inventory_simpan.php">
						<div class="modal_body">
							<div class="input-group mb-3">
								<!-- <label for="type" class="col-sm-3 col-form-label">Jenis</label> -->
								<div class="input-group-prepend">
							    	<label class="input-group-text ion-levels" for="type"></label>
							  	</div>
							  	<select class="custom-select type" id="type" name="jns_barang" onchange="functionType()">
							  	<?php
							  		require_once("conn.php");
							  		$sql = $conn->query("SELECT tipebarang FROM tb_tipebarang");
							  
							  		while ($r = mysqli_fetch_array($sql)) 
							  		{
							  			echo "<option value='$r[tipebarang]'>$r[tipebarang]";
							  		}
							  	?>
								</select>		  	
							</div>
								<script type="text/javascript">
									function functionType()
									{
										var type = document.getElementById('type').value;
										$.ajax({
											url: 'type.php',
											type: 'POST',
											data: {type : type},
											success : function(data)
											{
												document.getElementById('kd_barang').value = data;
											}
										});
										
									}
								</script>
							<div class="input-group mb-3">
						      	<div class="input-group-prepend">			
									<span class="input-group-text"><i class="ion-ios-barcode-outline"></i></span>
								</div>
								<input type="text" id="kd_barang" class="form-control" name="kd_barang" placeholder="Kode Barang" required autocomplete="off" readonly="true">
							</div>

							<div class="input-group mb-3">
						      	<div class="input-group-prepend">			
									<span class="input-group-text"><i class="ion-ios-pricetag"></i></span>
								</div>
								<input type="text" class="form-control" name="nm_barang" placeholder="Nama Barang" required autocomplete="off">
							</div>

							<div class="input-group mb-3">
						      	<div class="input-group-prepend">			
									<span class="input-group-text"><i class="ion-ios-box"></i></span>
								</div>
								<input type="text" class="form-control" name="qty" placeholder="Quantity" required autocomplete="off" onkeypress="return functionHanyaAngka(event)">
							</div>

							<div class="input-group mb-3">
						      	<div class="input-group-prepend">			
									<span class="input-group-text"><i class="ion-ios-pricetags-outline"></i></span>
								</div>
								<input type="text" class="form-control" name="hrg_beli" placeholder="Harga Beli" required autocomplete="off" onkeypress="return functionHanyaAngka(event)">
							</div>

							<div class="input-group mb-3">
						      	<div class="input-group-prepend">			
									<span class="input-group-text"><i class="ion-ios-pricetags-outline"></i></span>
								</div>
								<input type="text" class="form-control" name="hrg_jual" placeholder="Harga Jual" required autocomplete="off" onkeypress="return functionHanyaAngka(event)">
							</div>
						        
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
			<div class="modal fade" id="myModal0" role="dialog">
			    <div class="modal-dialog">
			      <!-- Modal content-->
			      <div class="modal-content">
			        <div class="modal-header">
			          <h4 class="modal-title">Edit Barang</h4>
			          <span class="ion-close" data-dismiss="modal"></span>		          
			        </div>
			        <div class="modal-body">
			        	<form method="POST">
							<div class="input-group mb-3">
								<label for="type" class="col-sm-3 col-form-label">Tipe</label>
								<div class="input-group-prepend">
							    	<label class="input-group-text ion-levels" for="type"></label>
							  	</div>
							  	<select class="custom-select" id="typeEdit" name="jenis_barang">
						  		<?php
						  		require_once("conn.php");
						  		$sql = $conn->query("SELECT tipebarang FROM tb_tipebarang");
						  
						  		while ($r = mysqli_fetch_array($sql)) 
						  		{
						  			echo "<option value='$r[tipebarang]'>$r[tipebarang]";
						  		}
							  	?>
							  	</select>
							</div>	
	
							<div class="input-group mb-3">
								<label for="kodeitem" class="col-sm-3 col-form-label">Kode</label>
							 	<div class="input-group-prepend">
							    	<span class="input-group-text"><i class="ion-ios-barcode-outline"></i></span>
							  	</div>
							  	<input type="text" class="form-control" placeholder="Kode Barang" id="kodeitem" name="kode_item" required readonly="true">
							</div>

							<div class="input-group mb-3">
								<label for="namaitem" class="col-sm-3 col-form-label">Nama</label>
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="ion-ios-pricetag"></i></span>
							  	</div>
							  	<input type="text" class="form-control" placeholder="Nama Barang" id="namaitem" name="nama_item" required>
							</div>

							<div class="input-group mb-3">
								<label for="stock" class="col-sm-3 col-form-label">Stock</label>
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="ion-ios-box"></i></span>
							  	</div>
							  	<input type="text" class="form-control" placeholder="Stock" id="stock" name="stock_item" required readonly="true" onkeypress="return functionHanyaAngka(event)">
							</div>

							<div class="input-group mb-3">
								<label for="hargabeli" class="col-sm-3 col-form-label">Harga Beli</label>
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="ion-ios-pricetags-outline"></i></span>
							  	</div>
							  	<input type="text" class="form-control" placeholder="Harga Beli" id="hargabeli" name="harga_beli" required onkeypress="return functionHanyaAngka(event)">
							</div>

							<div class="input-group mb-3">
								<label for="hargajual" class="col-sm-3 col-form-label">Harga Jual</label>
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="ion-ios-pricetags-outline"></i></span>
							  	</div>
							  	<input type="text" class="form-control" placeholder="Harga Jual" id="hargajual" name="harga_jual" required onkeypress="return functionHanyaAngka(event)">
							</div>
							<button type="submit" class="btn btn-outline-primary btn-sm btn-block" formaction="inventory_edit_simpan.php">Update</button>
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

			<!-- Modal Start -->
			<div class="modal fade" id="modalJenisBarang" role="dialog">
			    <div class="modal-dialog">
			      <!-- Modal content-->
			      <div class="modal-content">
			        <div class="modal-header">
			          <h4 class="modal-title">Tambah Jenis Barang</h4>
			          <span class="ion-close" data-dismiss="modal"></span>		          
			        </div>
			        <div class="modal-body">
			        	<form method="POST">
							<div class="input-group mb-3">
								<label for="type" class="col-sm-3 col-form-label">Jenis</label>
								<div class="input-group-prepend">
							    	<label class="input-group-text ion-levels" for="type"></label>
							  	</div>
							  	<input type="text" name="tipe_barang" id="tipe_barang" class="form-control" autocomplete="off" placeholder="Jenis" maxlength="3">
							</div>	
<!-- 							<script type="text/javascript">
							    function functionKapital(event){
		   								  
								       	 if ((event.keyCode > 64 && event.keyCode < 91) || (event.keyCode > 96 && event.keyCode < 123) || event.keyCode == 8)
								        {
										   	  setTimeout(function(){
										        return toUpperCase(event);
										    }, 1);
								        }
										else
									  	{
									       alert("Please enter only char");
									       return false;
									  	}


								}
							</script> -->
	
							<div class="input-group mb-3">
								<label for="namaTipe" class="col-sm-3 col-form-label">Nama Jenis</label>
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="ion-ios-pricetag"></i></span>
							  	</div>
							  	<input type="text" class="form-control" placeholder="Nama Jenis Barang" id="namaTipe" name="nama_tipe" required autocomplete="off">
							</div>

							<button type="submit" class="btn btn-outline-primary btn-sm btn-block" formaction="inventory_tipe_barang.php">Tambah</button>
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
<!-- <script src="https://unpkg.com/ionicons@4.1.1/dist/ionicons.js"></script> -->

    <a href="javascript:" id="return-to-top"><i class="ion-chevron-up"></i></a>

<script type="text/javascript" src="javascript/scrollUp.js"></script>
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
  		$('#tab .aktif').click(function(){
  			$('a').removeClass("active");
  			$(this).addClass("active");
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

<script>
	function functionHapus()
	{
		var r = window.confirm("Yakin Ingin Hapus ?");
		if(r == true)
		{

				window.alert("Data Terhapus");
				return true;
		}
		else
		{
			alert("Data Tidak Terhapus");
			return false;
		}
	}
</script>

<script type="text/javascript">
	$('.editBarang').on('click', function()
	{
		var jenisBarang = this.getAttribute('data-jenisBarang');
		var kodeBarang = this.getAttribute('data-kodeBarang');
		var namaBarang = this.getAttribute('data-namaBarang');
		var quantity = this.getAttribute('data-qty');
		var hargaBeli = this.getAttribute('data-hargaBeli');
		var hargaJual = this.getAttribute('data-hargaJual');
		document.getElementById('typeEdit').value = jenisBarang;
		document.getElementById('kodeitem').value = kodeBarang;
		document.getElementById('namaitem').value = namaBarang;
		document.getElementById('stock').value = quantity;
		document.getElementById('hargabeli').value = hargaBeli;
		document.getElementById('hargajual').value = hargaJual;
	});
</script>

</html>