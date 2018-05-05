<?php
	require_once("conn.php");
	
	$u = $_POST['id'];
	$p = $_POST['password'];
	$sql = "SELECT id,password FROM login WHERE id = '$u' AND password = '$p'";

	$q = mysqli_query($conn, $sql);

	$r = mysqli_fetch_assoc($q);

	if ($u == $r['id'] && $p == $r['password']) 
	{
		header('location:mainform.php');
	}
	else
	{
		echo "
		<script>
			alert('Username atau Password Salah');
			window.history.back();
		</script>";
	}
?>

<!-- <script>
	function salah()
	{
		var r = confirm('Username atau Password Salah');
		if (r == true) 
		{
			window.history.back();
			return true;
		}
		else
		{
			alert('You Press Cancel');
		}
	}	
</script> -->