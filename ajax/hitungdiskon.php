<?php
	require("../conn.php");
	session_start();

	$diskon = (int)$_POST['diskon'];
	$total = (int)$_POST['total'];
	$totalSetelahPpn = (int)$_POST['totalSetelahPpn'];
	$ppn = (int)$_POST['tdppn'];
	// $diskon = $nilai * 10;
	$result = 0;
	if($totalSetelahPpn <= 0)
	{
		$result = $total - $diskon;
	}
	else
	{
		$result = $totalSetelahPpn - $diskon;
	}

	$_SESSION['totalSetelahPpn'] = "$totalSetelahPpn";
	$_SESSION['diskon'] = "$diskon";
	$_SESSION['grandTotal'] = "$result";
	$_SESSION['ppn'] = "$ppn";

?>

<?php echo "Rp " .number_format($result, 0, ',', '.');  ?>	