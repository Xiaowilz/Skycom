<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/datepicker.css">
	<script src="javascript/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="javascript/bootstrap.min.js"></script>
	<script src="javascript/bootstrap-datepicker.js"></script>
	<!-- ____________  -->
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
				<a class="active"href="inventory.php"><span class="ion-briefcase"></span>Inventory</a>
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
						<h2>Inventory</h2>
					</div>

				<div class="all-content">
					<div class="all-head">
						<div class="button-add">
							<button class="button add-customer" onclick="document.getElementById('id01').style.display='block'" style="width:auto;"><span class="ion-plus-round"></span> Add Item</button>
						</div>

						<div class="search-container">
						      <input type="text" placeholder="Search" name="search">
						      <button type="submit"><i class="ion-search"></i></button>
		 				</div>
					</div>

					<div class="table-responsive">
						<table class="table table-hover table-sm">
						 	<thead class="thead-dark">
							    <tr>
							      <th>Jenis Barang</th>
							      <th>Kode Barang</th>
							      <th>Nama Barang</th>
							      <th>Qty</th>
							      <th>Harga Beli</th>
							      <th>Harga Jual</th>
							      <th></th>
							      <th></th>
							    </tr>
						  	</thead>

							<tbody>
							    
							    <?php
									require_once("conn.php");

									$sql = "SELECT jns_barang,kd_barang,nm_barang,qty,hrg_beli,hrg_jual FROM tb_inventory WHERE hapus = 0";

									$q = mysqli_query($conn,$sql);

									while ($r = mysqli_fetch_assoc($q)) 
									{
									    echo "<tr>";
									    echo "<td>$r[jns_barang]</td>";
									    echo "<td>$r[kd_barang]</td>";
									    echo "<td>$r[nm_barang]</td>";
									    echo "<td>$r[qty]</td>";
									    echo "<td>$r[hrg_beli]</td>";
									    echo "<td>$r[hrg_jual]</td>";
									    // echo "<td><a href='inventory_edit.php?edit=$r[kd_barang]'<span class='ion-edit'></a></span></td>";
									    echo "<td><span class='ion-edit' data-toggle='modal' data-target='#myModal0' data-backdrop='static'></span></td>";
									    echo "<td class='hapus'><a class='ion-trash-a' href='inventory_hapus.php?hps=$r[kd_barang]' onclick='return functionHapus()'></a></td>";
									    echo "</tr>";
									}
								?>
						 	</tbody>
						</table>

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
					</div>
				</div>
			</div>	

			<!-- Modal Start -->	
			<div id="id01" class="modal_dialog">
				<div class="modal_content animate">
					<div class="modal_head">
						<button onclick="document.getElementById('id01').style.display='none'" class="btn-close-modal"><i class="ion-close-round"></i></button>
						<h3 class="modal_title">Add Customer</h3>
					</div>	

					<form method="POST" action="inventory_simpan.php">
						<div class="modal_body">
							<div class="inputbox">			
								<span class="input-addon-customer"><i class="ion-person-stalker"></i></span>
								<input type="text" name="jns_barang" placeholder="Jenis Barang" required>
							</div>

					      	<div class="inputbox">			
								<span class="input-addon-customer"><i class="ion-person-stalker"></i></span>
								<input type="text" name="kd_barang" placeholder="Kode Barang" required>
							</div>

							<div class="inputbox">
								<span class="input-addon-customer"><i class="ion-ios-location"></i></span>
								<input type="text" name="nm_barang" placeholder="Nama Barang" required>
							</div>

							<div class="inputbox">
								<span class="input-addon-customer"><i class="ion-ios-telephone"></i></span>
								<input type="text" name="qty" placeholder="Qty" required>
							</div>

							<div class="inputbox">
								<span class="input-addon-customer"><i class="ion-ios-telephone"></i></span>
								<input type="text" name="hrg_beli" placeholder="Harga Beli" required>
							</div>

							<div class="inputbox">
								<span class="input-addon-customer"><i class="ion-ios-telephone"></i></span>
								<input type="text" name="hrg_jual" placeholder="Harga Jual" required>
							</div>
						        
						    <div>
								<input type="submit" name="btnAdd" id="btnAdd" class="button add-modal" value="ADD">
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
			    <div class="modal-dialog">
			    
			      <!-- Modal content-->
			      <div class="modal-content">
			        <div class="modal-header">
			          <h4 class="modal-title">Supplier</h4>
			          <span class="ion-close" data-dismiss="modal"></span>		          
			        </div>
			        <div class="modal-body">
			        	<form>
							<select class="form-control">
								<option>Default select</option>
							</select>
							
							<br>

							<div class="input-group">
							 	<div class="input-group-prepend">
							    	<span class="input-group-text ion-ios-barcode"></span>
							  	</div>
							  	<input type="text" class="form-control" placeholder="Item Code">
							</div>
			        	</form>
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

<script type="text/javascript">
	var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
	window.onclick = function(event) {
	    if (event.target == modal) {
	        modal.style.display = "none";
	    }
}
</script>

</html>