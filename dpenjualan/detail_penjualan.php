<?php
	require_once("../conn.php");

	session_start();
	if(!isset($_SESSION['username']))
	{
		header("Location:index.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Detail Penjualan</title>

	<link rel="stylesheet" type="text/css" href="../style.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/datepicker.css">
    <script src="../javascript/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="../javascript/bootstrap.min.js"></script>
    <script src="../javascript/bootstrap-datepicker.js"></script>
	
	<style type="text/css">
        #tampil th{
            text-align: center;
        }     

        #tampil {
        	padding-left: 30px;
        	padding-right: 30px;
        }

        #print {
        	text-decoration: none;
            padding: 6px 25px;
            color: white;
            border-radius: 4px;
            font-size: 14px;
            transition-duration: 0.3s;
            background-color: #17a2b8;
        }

        #print:hover{
        	background-color: #f7f7f7;
            color: #17a2b8;
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
        echo "$hari".", "."$tanggal"."-"."$bulan"."-"."$tahun";
    }
?>

<body  onload="functionTampilkanJam();setInterval('functionTampilkanJam()', 1000);">
	<?php 
    	$noTrans = $_GET['notrans'];
    	$sql = "SELECT * FROM tb_penjualan WHERE notrans = '$noTrans'";
    	$q = mysqli_query($conn, $sql);
    	while($r = mysqli_fetch_assoc($q))
    	{
    		$noTransaksi = $r["notrans"];
    		$customer = $r["customer"];
    		$tgltrans = $r["tgltrans"];
    		$jatuhTempo = $r["tglJatuhTempo"];
    		$keterangan = $r["catatan"];
    		$diskon = $r['diskon'];
    		$sales = $r['sales'];
    	}
    ?>

	<div id="topnav">

		<div class="title">
			<h3 style="margin-left: 35px;">Detail Penjualan</h3>
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
    	<br>
    	<a href="../cetakInvoicePenjualan?noTrans=<?php echo $noTrans; ?>" id="print" style="float: right;">Cetak Nota</a>
    	<div class="spacer" style="clear: both;"></div>
    	<br>


    	<div class="all-content">
			<div class="header">	
				<div class="kiri">
					<div class="form row">
					    <label for="staticEmail" class="col-sm-4 col-form-label">No. Transaksi</label>
					    <div class="col-sm-6">
					      <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $noTransaksi; ?>">
					    </div>
					 </div>

					 <div class="form row">
					    <label for="staticEmail" class="col-sm-4 col-form-label">Customer</label>
					    <div class="col-sm-6">
					      <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $customer; ?>">
					    </div>
					 </div>
					
					<div class="form row">
					    <label for="staticEmail" class="col-sm-4 col-form-label">Tanggal Transaksi</label>
					    <div class="col-sm-6">
					      <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $tgltrans; ?>">
					    </div>
					</div>

					<div class="form row">
					    <label for="staticEmail" class="col-sm-4 col-form-label">Sales</label>
					    <div class="col-sm-6">
					      <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $sales; ?>">
					    </div>
					</div>

				</div>

				<div class="kanan">
					 <div class="form row">
					    <label for="staticEmail" class="col-sm-4 col-form-label">Jatuh Tempo (14 hari)</label>
					    <div class="col-sm-6">
					      <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $jatuhTempo; ?>">
					    </div>
					 </div>

					 <div class="form row">
					    <label for="staticEmail" class="col-sm-4 col-form-label">Keterangan</label>
					    <div class="col-sm-6">
					    	<textarea class="form-control-plaintext form-control-sm" id="keterangan" rows="3" readonly><?php echo $keterangan; ?></textarea>
					    </div>
					 </div>
				</div>
				<div class="spacer" style="clear: both;"></div>
			</div>	

				<div id="tampil">
					<div class="table-responsive">
	                    <table class="table table-hover table-sm table-bordered">
	                        <thead class="thead-dark">    
	                            <tr>
	                                <th>Kode Barang</th>
	                                <th>Nama Barang</th>
	                                <th width="7%">Quantity</th>
	                                <th>Harga</th>
	                                <th width="20%">Subtotal</th>
	                            </tr>
	                        </thead>
							<tbody>
								<?php
									$totalPenjualan = 0;
									$sql = "SELECT kd_barang,nm_barang,qty,harga,jumlah FROM tb_hd_penjualan WHERE no_trans = '$noTrans'";
									$q = mysqli_query($conn, $sql);
		    						while ($r = mysqli_fetch_assoc($q)) 
		    						{
			    						$harga = number_format($r['harga'], 0, ',', '.');
							    		$jumlah = number_format($r['jumlah'], 0, ',', '.');
							    		echo "
											<tr>
												<td>$r[kd_barang]</td>
												<td>$r[nm_barang]</td>
												<td align='center'>$r[qty]</td>
												<td align='right'>$harga</td>
												<td align='right'>$jumlah</td>
											</tr>
							    		";
							    		$totalPenjualan += $r['jumlah'];
						    		}
						    		$grandtotal = $totalPenjualan - $diskon;
								?>

								<tr>
									<td colspan="5"></td>
								</tr>

								<tr>
									<td colspan="4" align="center"><strong>Total</strong></td>
									<td align="right"><?php echo "Rp " .number_format($totalPenjualan, 0, ',', '.'); ?></td>
								</tr>

								<tr>
									<td colspan="4" align="center"><strong>PPN 10%</strong></td>
									<td align="right"><?php echo "Rp " .number_format($totalPenjualan, 0, ',', '.'); ?></td>
								</tr>

								<tr>
									<td colspan="4" align="center"><strong>Potongan</strong></td>
									<td align="right"><?php echo "Rp " .number_format($diskon, 0, ',', '.'); ?></td>
								</tr>

								<tr>
									<td colspan="4" align="center"><strong>Grand Total</strong></td>
									<td align="right"><strong><?php echo "Rp " .number_format($grandtotal, 0, ',', '.'); ?></strong></td>
								</tr>
	                        </tbody>
	                    </table>
	                </div>
				</div>
    	</div>
    </div>
	
</body>
</html>