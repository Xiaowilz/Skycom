<?php
	require_once("conn.php");
	$sql = "SELECT * FROM login";

	$q = mysqli_query($conn, $sql);
	$u = $_POST['id'];
	$p = $_POST['password'];

	while ($r = mysqli_fetch_assoc($q)) 
	{
		if ($u == $r['id']) 
		{
			if ($p == $r['password']) 
			{
				header('location:mainform.php');
				exit;
			}
			else
			{
				echo "<script>
					alert('Username atau Password Salah');
					window.history.back();
				</script>";
			}
		}
		else
		{

			echo "<script>
				alert('Username atau Password Salah');
				window.history.back();
			</script>";
		}
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