<?php
	require("../conn.php");
	
	$diskon = (int)$_POST['diskon'];
	$total = (int)$_POST['total'];
	// $diskon = $nilai * 10;
	$result = $total - $diskon;
?>

<?php echo "Rp " .number_format($result, 0, ',', '.');  ?>