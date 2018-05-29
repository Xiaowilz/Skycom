<!DOCTYPE html>
<html>
<head>
    <title></title>
    <!-- <script src="javascript/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="javascript/bootstrap.min.js"></script>
    <script src="javascript/bootstrap-datepicker.js"></script>
    <script src="javascript/jquery-ui.min.js"></script>
    <link rel="stylesheet" type="text/css" href="javascript/jquery-ui.min.css"> -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/datepicker.css">
    <script src="javascript/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="javascript/bootstrap.min.js"></script>
    <script src="javascript/bootstrap-datepicker.js"></script>
</head>
<body>
    <br>
        <div id="tgl_awal" class="input-group date" data-date-format="yyyy-mm-dd">
            <input class="form-control" type="text" name="tgl_awal" id="from_date">
            <span class="input-group-addon"></span>
        </div>

        <div id="tgl_akhir" class="input-group date" data-date-format="yyyy-mm-dd">
            <input class="form-control" type="text" name="tgl_akhir" id="to_date">
            <span class="input-group-addon"></span>
        </div>
        <input type="submit" name="filter" value="Filter" id="filter">
        <input type="reset" name="reset" value="Reset">
        <input type="submit" name="" value="Cetak" id="cetak"> 

    <div id="tampil"></div>

 <script type="text/javascript">
    $(function(){
        $("#tgl_awal").datepicker({
            autoclose: true,
            todayHighlight: true
        }).datepicker('update', new Date());
    });

    $(function(){
        $("#tgl_akhir").datepicker({
            autoclose: true,
            todayHighlight: true
        }).datepicker('update', new Date());
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
            success : function(data)
            {
                window.open('cetak_penjualan_tanggal.php',data);
            }
           
        });

    });

</script>

</body>
</html>