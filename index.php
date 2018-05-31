<!DOCTYPE html>
<html>
<head>
	<title>Login Skycom</title>
	<link rel="stylesheet" type="text/css" href="login.css">
</head>
<body background="gambar\background_login.png">
		<div class="container">
			<div class="user">
				<form name="formLogin" method="POST" action="login.php">
					<div class="judul"><font size="10px" color="white"><i><u>SkyCom</u></i></font><br><br></div>
					<font color="white">ID : </font><br>
					<input type="text" name="id" placeholder="ID" autocomplete="off"><br><br>
					<font color="white">Password : </font><br>
					<input type="password" name="password" placeholder="Password"><br><br>
					<input type="submit" name="login" value="Login" class="login">
				</form>
			</div>
		</div>
		
</body>
</html>