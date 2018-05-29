<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/datepicker.css">
    <script src="javascript/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="javascript/bootstrap.min.js"></script>
    <script src="javascript/bootstrap-datepicker.js"></script>

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

        #tampil th{
            text-align: center;
        }       

        #detail {
            text-decoration: none;
            padding: 3px 10px;
            color: #17a2b8;
            border-radius: 4px;
            font-size: 14px;
            transition-duration: 0.3s;
        }

        #detail:hover {
            background-color: #17a2b8;
            color: white;
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

<body onload="functionTampilkanJam();setInterval('functionTampilkanJam()', 1000);">
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
        <div class="all-top">
            <h2>Data Penjualan</h2>   
        </div>

        <div class="all-content">
            <div class="form row">
                    <div class="form-group col-md-2">
                        <label for="tgl_awal" class="col-form-label col-form-label-sm">Dari Tanggal</label>
                        <div id="tgl_awal" class="input date" data-date-format="yyyy-mm-dd">
                            <input class="form-control" type="text" name="tgl_awal" id="from_date">
                            <span class="input-group-addon"></span>
                        </div>
                    </div>
                    
                    <div class="form-group col-md-2">
                        <label for="tgl_awal" class="col-form-label col-form-label-sm">Sampai Tanggal</label>
                        <div id="tgl_akhir" class="input date" data-date-format="yyyy-mm-dd">
                            <input class="form-control" type="text" name="tgl_akhir" id="to_date">
                            <span class="input-group-addon"></span>
                        </div>
                    </div>
                
                
                <div class="tombolfilter">
                    <button type="submit" name="filter" id="filter" class="btn btn-outline-primary">Filter</button>
                    <button type="reset" name="reset" id="reset" class="btn btn-outline-primary">Reset</button>
                    <button type="submit" name="" id="cetak" class="btn btn-outline-info">Cetak</button>
                </div>

                <div class="spacer" style="clear: both;"></div>
            </div>
            
            <div id="tampil">
                <div class="table-responsive">
                    <table class="table table-hover table-sm table-bordered">
                        <thead class="thead-dark">    
                            <tr>
                                <th>No. Transaksi</th>
                                <th width="15%">Tanggal Transaksi</th>
                                <th>Customer</th>
                                <th width="10%">Sub Total</th>
                                <th>Diskon</th>
                                <th>Grand Total</th>
                                <th width="7%"></th>
                            </tr>
                        </thead>

                        <?php 
                            require_once("conn.php");
                            $sql = "SELECT * FROM tb_penjualan";
                            $q = mysqli_query($conn,$sql);
                            $grandTotal = 0;
                            while ($r = mysqli_fetch_array($q)) 
                            {
                                $subtotal = number_format($r['subtotal'], 0, ',', '.');
                                $diskon = number_format($r['diskon'], 0, ',', '.');
                                $total = number_format($r['total'], 0, ',', '.');
                                echo"
                                    <tr>
                                        <td align='center'>$r[notrans]</td>
                                        <td align='center'>$r[tgltrans]</td>
                                        <td align='center'>$r[customer]</td>
                                        <td align='right'>$subtotal</td>
                                        <td align='right'>$diskon</td>
                                        <td align='right'>$total</td>
                                        <td align='center'><a href='dpenjualan/detail_penjualan.php?notrans=$r[notrans]&customer=$r[customer]&tgltrans=$r[tgltrans]' target=_blank id='detail'>Detail</a></td>
                                    </tr>
                                ";  
                                $grandTotal = $grandTotal + $r['total'];
                            }
                        ?>
                        <tr>
                            <td colspan="7"></td>
                        </tr>

                        <tr>
                            <td colspan="5" align="center"><strong>Total</strong></td>
                            <td align="right"><?php echo "Rp " .number_format($grandTotal, 0, ',', '.'); ?> </td>
                            <td></td>
                        </tr>     
                    </table>
                </div>
            </div>
        </div>
    </div>        

 <script type="text/javascript">
    $(document).ready(function(){

        $(function(){
            $("#tgl_awal").datepicker({
                autoclose: true,
                todayHighlight: true
            });
            // .datepicker('update', new Date());
        });

        $(function(){
            $("#tgl_akhir").datepicker({
                autoclose: true,
                todayHighlight: true
            });
            // .datepicker('update', new Date());
        });

        $("#filter").click(function()
        {
            var tglAwal = $("#from_date").val();
            var tglAkhir = $("#to_date").val();
            $.ajax({
                url: 'coba_filter.php',
                method : 'POST',
                data: {tglAwal : tglAwal, tglAkhir : tglAkhir},
                success : function(data)
                {
                    $("#tampil").html(data);
                }
            
            });
            
        });

        $("#cetak").click(function()
        {       
            var tglAwal = $("#from_date").val();
            var tglAkhir = $("#to_date").val();
            $.ajax({
                url: 'cetak_penjualan_tanggal.php',
                method : 'POST',
                data: {tglAwal : tglAwal, tglAkhir : tglAkhir},
                success : function()
                {
                    window.open("cetak_penjualan_tanggal.php");
                }
               
            });

        });
    });
</script>

</body>
</html>