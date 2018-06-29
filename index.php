<!DOCTYPE html>
<html>
<head>
	<title>Login Skycom</title>
	<link rel="stylesheet" type="text/css" href="login.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script src="javascript/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="javascript/bootstrap.min.js"></script>
</head>
<body>
		<!-- <div class="container"> -->
			<!-- <div class="user"> -->

	<div class="container-fluid">
		<div class="row">
			<div class="outer" style="width: 100%;">
				<div class="inner">

					<center><h1>Sky Computer</h1></center>
					<br>
					<!-- <div class="col-md-12 col-sm-12 col-xs-12"> -->
						<form method="POST" action="login.php">
							<div class="form-group">
						    	<label for="nama">Username</label>
						    	<input type="text" name="username" class="form-control" id="nama"  placeholder="Username" autocomplete="off">
						  	</div>
						  	<div class="form-group">
						    	<label for="pass">Password</label>
						    	<input type="password" name="password" class="form-control" id="pass" placeholder="Password">
						  	</div>
						  	<br>
						  	<button type="submit" class="btn btn-primary btn-block" name="login" value="login">Login</button>
						</form>
					<!-- </div> -->
				</div>
			</div>
		</div>
	</div>

			<!-- </div> -->
		<!-- </div> -->
		
</body>
</html>