<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<!-- Date Picker JS CSS-->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/datepicker.css">
	<script src="javascript/jquery.min.js"></script>
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
				<a class="active" href="mainform.php"><span class="ion-ios-home"></span>Beranda</a>
				<a href="penjualan.php"><span class="ion-cash"></span>Penjualan</a>
				<a href="pembelian.php"><span class="ion-android-cart"></span>Pembelian</a>
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
			Welcome To SkyCom
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
  		$('#tab a').click(function(){
  			$('a').removeClass("active");
  			$(this).addClass("active");
  		});
  	});

</script>
