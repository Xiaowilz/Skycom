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
	<title>Menu Utama</title>
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="../style.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../ionicons-2.0.1/css/ionicons.min.css">
	
	<!-- Script -->
	<script type="text/javascript" src="../javascript/jquery-3.3.1.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
	<script type="text/javascript" src="../javascript/bootstrap.min.js"></script>
	<script type="text/javascript" src="../javascript/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="../javascript/dataTables.bootstrap4.min.js"></script>


	<style type="text/css">
		.logout
		{
			margin-top: -4px;
            float : right;
		}

        .wrapper{
            padding: 30px;
        }

        .wrapper a{
            padding: 8px 8px 8px 32px;
            display: block;
            text-decoration: none;
            font-size: 17px;
            color: #818181;
            transition: 0.3s;
            margin-bottom: 5px;
            border-radius: 6px;
        }

        .wrapper a:hover{
            background-color: dodgerBlue;
            color: white;
        }

        .wrapper span, .logout span{
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
	if(!isset($_SESSION['username']))
	{
		header("Location:../index");
	}
?>

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
				<a class="dropdown-item" href="logout"><span class="ion-log-out"></span>Log Out</a>
			</div>
		</div>

		<div class="title">
			<img src="../gambar/logo2.png" width="145" height="35" id="logo">
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
				<a class="active" href="../mainform"><span class="ion-ios-home"></span>Beranda</a>
				<a href="../penjualan/penjualan" target="_blank"><span class="ion-cash"></span>Penjualan</a>
				<a href="../pembelian/pembelian" target="_blank"><span class="ion-android-cart"></span>Pembelian</a>
				<a href="../Customers/customers" class="aktif"><span class="ion-ios-people"></span>Customers</a>
				<a href="../Inventory/inventory" class="aktif"><span class="ion-briefcase"></span>Inventory</a>
				<a href="../Supplier/supplier" class="aktif"><span class="ion-person-stalker"></span>Supplier</a>
			</div>	
						
				<a class="aktif drop" id="btn_daftar"><span class="ion-android-list"></span>Laporan<i class="ion-arrow-down-b"></i></a>
				
				<div class="dropdown">
						<a href="Penjualan/transaksiJual" target="_blank" class="aktif"><span class="ion-ios-circle-filled"></span>Penjualan</a>
						<a href="Pembelian/transaksiBeli" target="_blank" class="aktif"><span class="ion-ios-circle-filled"></span>Pembelian</a>
				</div>
		</div>
	</div>

	<div id="rightside">
        <div class="all-box"> 
            <br>
            <div class="all-content">
                <center>
                    <div class="wrapper">
                    	<h1>Selamat Datang</h1> <br>
                    	<h4>Di Sistem Penjualan Sky Computer </h4> <br>
                    	<hr>
                    </div>
               	</center>
               	<div class="wrapper">
	               	<div class="card-deck"> 
	                	<div class="card bg-light mb-3" style="max-width: 30rem;">
						 	<div class="card-header">Transaksi</div>
						  		<div class="card-body">
						    		<a href="penjualan" target="_blank" class=""><span class="ion-cash"></span>Penjualan</a>
                                	<a href="pembelian" target="_blank" class=""><span class="ion-android-cart"></span>Pembelian</a>
						  		</div>
						</div>

						<div class="card bg-light mb-3" style="max-width: 30rem;">
						 	<div class="card-header">Master</div>
						  		<div class="card-body">
						    		<a href="customers"><span class="ion-ios-people"></span>Customers</a>
									<a href="inventory"><span class="ion-briefcase"></span>Inventory</a>
									<a href="supplier"><span class="ion-person-stalker"></span>Supplier</a>
						  		</div>
						</div>

						<div class="card bg-light mb-3" style="max-width: 30rem;">
						 	<div class="card-header">Laporan</div>
						  		<div class="card-body">
						    		<a href="transaksiJual" class=""><span class="ion-android-list"></span>Laporan Penjualan</a>
                                	<a href="transaksiBeli" class=""><span class="ion-android-list"></span>Laporan Pembelian</a>
						  		</div>
						</div>
					</div>
				</div>
            </div>
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

  		$(document).ready( function () {
            $.fn.DataTable.ext.pager.numbers_length = 9;

		    $('#example').DataTable({
                "pagingType":"full_numbers",
                "lengthMenu": [ [1, 4, 8, -1], [1, 4, 8, "All"] ],
                // "pageLength": 4
            });
		});
  	});

</script>
