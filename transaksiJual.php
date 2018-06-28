<!DOCTYPE html>
<html>
<head>
    <title>Transaksi Penjualan</title>
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
        #bar{
            margin-left: 2px;
        }

        #tampil th{
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
        <div class="title">
            <h3 style="margin-left: 35px;">Transaksi Penjualan</h3>  
        </div>
        <div class="jamtgl">
            Jam : <span id="clock"></span>
            <span id="date">
                <?php
                    functionTanggal();
                ?>
            </span>
            <a id="mainMenu" href="mainform"><span class="ion-android-home"></span>Menu</a>
        </div>
    </div>

    <div class="all-box">
        <div class="all-top">
             <br>
        </div>

        <div class="all-content">
            <div class="form row" id="bar">
                <div class="form-group col-md-2">
                    <label for="tgl_awal" class="col-form-label col-form-label-sm">Dari Tanggal</label>
                    <div id="tgl_awal" class="input date" data-date-format="yyyy-mm-dd">
                        <input class="form-control" type="text" name="tgl_awal" id="from_date" autocomplete="off">
                        <span class="input-group-addon"></span>
                    </div>                
                </div>
                
                <div class="form-group col-md-2">
                    <label for="tgl_awal" class="col-form-label col-form-label-sm">Sampai Tanggal</label>
                    <div id="tgl_akhir" class="input date" data-date-format="yyyy-mm-dd">
                        <input class="form-control" type="text" name="tgl_akhir" id="to_date" autocomplete="off">
                        <span class="input-group-addon"></span>
                    </div>
                </div>
                   
                <div class="tombolfilter">
                    <button type="submit" name="filter" id="filter" class="btn btn-outline-primary">Filter</button>
                    <button type="submit" name="" id="cetak" class="btn btn-outline-primary">Cetak</button>
                </div>

                <div class="spacer" style="clear: both;"></div>
            </div>
            
            <div id="tampil">
                <div class="table-responsive">
                    <table class="table table-hover table-sm table-bordered" id="tabel_penjualan">
                        <thead class="thead-dark">    
                            <tr>
                                <th>No. Transaksi</th>
                                <th width="15%">Tanggal Transaksi</th>
                                <th>Customer</th>
                                <th width="10%">Total</th>
                                <th width="10%">PPN 10%</th>
                                <th>Potongan</th>
                                <th>Grand Total</th>
                                <th width="7%"></th>
                                <th width="7%"></th>
                            </tr>
                        </thead>

                        <tbody>
                        <?php 
                            require_once("conn.php");
                            $sql = "SELECT * FROM tb_penjualan ORDER BY notrans DESC";
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
                                        <td align='right'>$r[ppn]</td>
                                        <td align='right'>$diskon</td>
                                        <td align='right'>$total</td>
                                        <td align='center'><a href='dpenjualan/detail_penjualan?notrans=$r[notrans]' target=_blank id='detail'>Detail</a></td>
                                        <td align='center'><a href='cetakInvoicePenjualan?noTrans=$r[notrans]' target=_blank class='cetak' id='print'>Cetak</a></td>
                                    </tr>
                                ";  
                                $grandTotal = $grandTotal + $r['total'];
                            }
                        ?>                          
                            <tr>
                                <td colspan="6" align="center"><strong>Total</strong></td>
                                <td style="display: none;"></td>
                                <td style="display: none;"></td>
                                <td style="display: none;"></td>
                                <td style="display: none;"></td>
                                <td style="display: none;"></td>
                                <td align="right"><strong> <?php echo "Rp " .number_format($grandTotal, 0, ',', '.'); ?> </strong></td>
                                <td></td>
                                <td></td>
                            </tr>

                        </tbody>     
                    </table>


                </div>
            </div>
        </div>
    </div>

    <a href="javascript:" id="return-to-top"><i class="ion-chevron-up"></i></a>

<script type="text/javascript" src="javascript/scrollUp.js"></script>

<script type="text/javascript">
    $(document).ready(function(){

        $(function(){
            $("#tgl_awal").datepicker({
                autoclose: true,
                todayHighlight: true
            });
        });

        $(function(){
            $("#tgl_akhir").datepicker({
                autoclose: true,
                todayHighlight: true
            });
        });


        $("#filter").click(function(){
            var tglAwal = $("#from_date").val();
            var tglAkhir = $("#to_date").val();
            $.ajax({
                url: 'filterJual.php',
                method : 'POST',
                data: {tglAwal : tglAwal, tglAkhir : tglAkhir},
                success : function(data)
                {
                    $("#tampil").html(data);
                }
            
            });
       
        });

        $("#cetak").click(function(){       
            var tglAwal = $("#from_date").val();
            var tglAkhir = $("#to_date").val();
            // $.ajax({
            //     url: 'cetak_penjualan_tanggal.php',
            //     method : 'POST',
            //     data: {tglAwal : tglAwal, tglAkhir : tglAkhir},
            //     success : function()
            //     {
                    window.open("cetakLaporanJual.php?tglAwal=" + tglAwal + "&tglAkhir=" + tglAkhir, "_blank");
            //     }
               
            // });
        });
    });

    $(document).ready(function() {
        $.fn.DataTable.ext.pager.numbers_length = 9;
        
        $('#tabel_penjualan').DataTable({
            "searching": false,
            "info": false,
            "ordering": false,
            "pagingType":"full_numbers",
            "lengthMenu": [ [50, 100, 150, -1], [50, 100, 150, "All"] ],
        });
    });
</script>

</body>
</html>