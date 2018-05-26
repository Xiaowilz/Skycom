<?php
	require("../conn.php");
	session_start();

	$diskon = (int)$_POST['diskon'];
	$total = (int)$_POST['total'];
	// $diskon = $nilai * 10;
	$result = $total - $diskon;
	$_SESSION['diskon'] = "$diskon";
	$_SESSION['grandTotal'] = "$result";

	$diskon = (int)$_POST['diskon'];
	$total = (int)$_POST['total'];
	
	// $result = $total - $diskon;
?>

<?php echo "Rp " .number_format($diskon, 0, ',', '.');  ?>