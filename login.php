<?php
	session_start();
	require_once("conn.php");
	$u = mysqli_real_escape_string($conn, $_POST['id']);
	$p = mysqli_real_escape_string($conn, $_POST['password']);
		$sql = "SELECT id,password FROM login WHERE id = '$u' AND password = '$p'";

		$q = mysqli_query($conn, $sql);

		$r = mysqli_fetch_assoc($q);
		if(!empty($u) && !empty($p))
		{
			if ($u == $r['id'] && $p == $r['password']) 
			{
				$_SESSION['username'] = "$u";
				header('location:mainform');
			}
			else
			{
				echo "
				<script>
					alert('Username atau Password Salah');
					window.history.back();
				</script>";
			}
		}
		
		else
		{
			echo "
			<script>
				alert('Form harus di isi terlebih dahulu!!');
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