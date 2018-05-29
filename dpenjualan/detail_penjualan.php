<?php
	require_once("../conn.php");

    if(isset($_GET["notrans"]) && isset($_GET["customer"]) && isset($_GET["tgltrans"]))
    {
        $notrans = $_GET["notrans"];
        $customer = $_GET["customer"];
        $tgltrans = $_GET["tgltrans"];
    }
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>

	<link rel="stylesheet" type="text/css" href="../style.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/datepicker.css">
    <script src="../javascript/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="../javascript/bootstrap.min.js"></script>
    <script src="../javascript/bootstrap-datepicker.js"></script>
	
	<style type="text/css">
		.jamtgl {
            float : right;
        }

        #clock {
            margin-right: 60px;
        }

        #date {
            margin-right: 35px;
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
        session_start();
        $hari = date("l");
        $tanggal = date("d");
        $bulan = date("m");
        $tahun = date("Y");
        echo "$hari".", "."$tanggal"."-"."$bulan"."-"."$tahun";
    }
?>

<body  onload="functionTampilkanJam();setInterval('functionTampilkanJam()', 1000);">
	<div id="topnav">
        <div class="menuicon" onclick="geser()">
            <div class="garis"></div>
            <div class="garis"></div>
            <div class="garis"></div>
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

    <div class="all-box">
    	.
    	<div class="all-content2">

			<div class="form row">
			    <label for="staticEmail" class="col-sm-2 col-form-label">No. Transaksi</label>
			    <div class="col-sm-10">
			      <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $notrans; ?>">
			    </div>
			 </div>

			 <div class="form row">
			    <label for="staticEmail" class="col-sm-2 col-form-label">Customer</label>
			    <div class="col-sm-10">
			      <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $customer; ?>">
			    </div>
			 </div>
    	</div>
    </div>
	
</body>
</html>