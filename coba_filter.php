<div id="tampil"></div>
    <table border="1px solid black">
        <tr>
            <td>No Transaksi</td>
            <td>Tanggal Transaksi</td>
            <td>Customer</td>
            <td>Sub Total</td>
            <td>Diskon</td>
            <td>Grand Total</td>
            <td></td>
        </tr>

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
                echo"

                        <tr>
                            <td>$r[notrans]</td>
                            <td>$r[tgltrans]</td>
                            <td>$r[customer]</td>
                            <td>$r[subtotal]</td>
                            <td>$r[diskon]</td>
                            <td>$r[total]</td>
                            <td><a href=''>Detail</a></td>
                        </tr>
                ";  
                $grandTotal = $grandTotal + $r['total'];
            }

            echo "</table>
            <br>";
            echo "$grandTotal";
        }
     ?>