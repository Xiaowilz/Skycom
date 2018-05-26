<?php
	require("../conn.php");
	session_start();

	$diskon = (int)$_POST['diskon'];
	$total = (int)$_POST['total'];
	
	// $result = $total - $diskon;
?>

<?php echo "Rp " .number_format($diskon, 0, ',', '.');  ?>