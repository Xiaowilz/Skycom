<?php
	require("../conn.php");
	
	$diskonskin = (int)$_POST['diskonskin'];
?>

<input type="decimal" name="diskon" id="diskon" placeholder="0" value="<?php echo "Rp " .number_format($diskonskin, 0, ',', '.'); ?>">