<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">

	<script type="text/javascript" src="javascript/jquery-3.3.1.js"></script>
	<script type="text/javascript" src="javascript/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="javascript/dataTables.bootstrap4.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">

	<style type="text/css">
		.logout
		{
			margin-top: -4px;
            float : right;
		}

        .wrapper{
            padding: 30px;
            align-items: center;
            justify-content: center;
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

        .wrapper span{
            margin-right: 15px;
        }
	</style>
</head>
<?php
	session_start();
	if(!isset($_SESSION['username']))
	{
		header("Location:index");
	}
?>
<body>
	<div id="topnav">
		<div class="menuicon" onclick="geser()">
			<div class="garis"></div>
			<div class="garis"></div>
			<div class="garis"></div>
		</div>
		
		<div class="logout">
			<form method="POST" action="logout">
				<input type="submit" name="logout" value="Logout" class="btn btn-outline-danger btn-sm">
			</form>
		</div>
	</div>

	<div id="sidenav">
		<div id="tab">
			<div class="tabbutton">	
				<a class="active" href="mainform"><span class="ion-ios-home"></span>Beranda</a>
				<a href="penjualan" target="_blank"><span class="ion-cash"></span>Penjualan</a>
				<a href="pembelian" target="_blank"><span class="ion-android-cart"></span>Pembelian</a>
				<a href="customers" class="aktif"><span class="ion-ios-people"></span>Customers</a>
				<a href="inventory" class="aktif"><span class="ion-briefcase"></span>Inventory</a>
				<a href="supplier" class="aktif"><span class="ion-person-stalker"></span>Supplier</a>
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
            <br>
            <div class="all-content">
                <center>
                    <div class="wrapper">
                        <div class="card text-center card w-50">
                            <div class="card-header">
                                Menu
                            </div>
                            <div class="card-body">
                                <a href="" class=""><span class="ion-cash"></span>Penjualan</a>
                                <a href="" class=""><span class="ion-android-cart"></span>Pembelian</a>
                                <a href="coba_tanggal" class=""><span class="ion-android-list"></span>Laporan Penjualan</a>
                                <a href="" class=""><span class="ion-android-list"></span>Laporan Pembelian</a>
                            </div>
                            <div class="card-footer text-muted">

                            </div>
                        </div>
                    </div>
                </center>
            </div>
        </div>
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
