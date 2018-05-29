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
    if(isset($_POST['tglAwal']) && isset($_POST['tglAkhir'])){
        $tglAwal = $_POST['tglAwal'];
        $tglAkhir = $_POST['tglAkhir'];
        $sql = "SELECT * FROM tb_penjualan WHERE tgltrans BETWEEN '$tglAwal' AND '$tglAkhir'";
        $q = mysqli_query($conn,$sql);
        $grandTotal = 0;
        while ($r = mysqli_fetch_array($q)) 
        {
            // $subtotal = number_format($r['subtotal'], 0, ',', '.');
            $total = number_format($r['total'], 0, ',', '.');
            echo"
                <tr>
                    <td align='center'>$r[notrans]</td>
                    <td align='center'>$r[tgltrans]</td>
                    <td align='center'>$r[customer]</td>
                    <td align='right'>$r[subtotal]</td>
                    <td align='right'>$r[diskon]</td>
                    <td align='right'>$total</td>
                    <td align='center'><a href='dpenjualan/detail_penjualan.php?notrans=$r[notrans]&customer=$r[customer]&tgltrans=$r[tgltrans]' target=_blank id='detail'>Detail</a></td>
                </tr>
            ";  
            $grandTotal = $grandTotal + $r['total'];
        }
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