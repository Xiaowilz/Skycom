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
				<a href="mainform.php"><span class="ion-ios-home"></span>Beranda</a>
				<a href="penjualan.php"><span class="ion-cash"></span>Penjualan</a>
				<a href="pembelian.php"><span class="ion-android-cart"></span>Pembelian</a>
				<a href="customers.php"><span class="ion-ios-people"></span>Customers</a>
				<a href="inventory.php"><span class="ion-briefcase"></span>Inventory</a>
				<a class="active" href="supplier.php"><span class="ion-person-stalker"></span>Supplier</a>
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

			<div class="all-box">
				<div class="all-top">
					<h2>Supplier</h2>
				</div>
					

				<div class="all-content">
					<div class="all-head">
						<div class="button-add">
							<button class="button add-customer" onclick="document.getElementById('id01').style.display='block'" style="width:auto;"><span class="ion-person-add"></span>Add Supplier</button>
						</div>

						<div class="search-container">

						      <input type="text" placeholder="Search" name="search">
						      <button type="submit"><i class="ion-search"></i></button>

		 				</div>
					</div>

				</br>

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

								$sql = "SELECT kd_supplier,nm_supplier,alamat,kontak FROM tb_supplier";

								$q = mysqli_query($conn,$sql);

								while ($r = mysqli_fetch_assoc($q)) 
								{
								    echo "<tr>";
								    echo "<td>$r[kd_supplier]</td>";
								    echo "<td>$r[nm_supplier]</td>";
								    echo "<td>$r[alamat]</td>";
								    echo "<td>$r[kontak]</td>";
								    echo "<td><span class='ion-edit' data-toggle='modal' data-target='#myModal0' data-backdrop='static'></span></td>";
								    echo "<td><span class='ion-trash-a'></span></td>";
								    echo "</tr>";
								}
							?>
						</table>
					</div>
				</div>
			</div>	

			<!-- Modal Start -->	
			<div id="id01" class="modal_dialog">
				<div class="modal_content animate">
					<div class="modal_head">
						<button onclick="document.getElementById('id01').style.display='none'" class="btn-close-modal"><i class="ion-close-round"></i></button>
						<h3 class="modal_title">Add Supplier</h3>
					</div>	

					<form method="POST">
						<div class="modal_body">
							<div class="inputbox">			
								<span class="input-addon-customer"><i class="ion-person-stalker"></i></span>
								<input type="text" name="kd_supp" placeholder="Kode" required>
							</div>

					      	<div class="inputbox">			
								<span class="input-addon-customer"><i class="ion-person-stalker"></i></span>
								<input type="text" name="nm_supp" placeholder="Name" required>
							</div>

							<div class="inputbox">
								<span class="input-addon-customer"><i class="ion-ios-location"></i></span>
								<input type="text" name="alamat_supp" placeholder="Address" required>
							</div>

							<div class="inputbox">
								<span class="input-addon-customer"><i class="ion-ios-telephone"></i></span>
								<input type="text" name="kontak_supp" placeholder="Contact" required>
							</div>
						        
						    <div>
								<button type="submit" class="button add-modal" formaction="supplier_simpan.php">Add</button>
							</div>
				   		</div>
				   	</form>

				   	<div class="modal_foot">
				   		<div>
							<button onclick="document.getElementById('id01').style.display='none'" type="button" class="button cancel-modal">Cancel</button>
						</div>
				   	</div>
				</div>   	
			</div>
			<!-- Modal End -->

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
										<th>Kode Customer</th>
										<th>Nama Customer</th>
										<th>Alamat</th>
										<th>Kontak</th>
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

	</div>
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
  	});	

</script>

<script type="text/javascript">
	var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
	window.onclick = function(event) {
	    if (event.target == modal) {
	        modal.style.display = "none";
	    }
}
</script>