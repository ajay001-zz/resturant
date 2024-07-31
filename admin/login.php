

	<html>
		<head>
			<title>Login - Food Order System</title>

			<link rel="stylesheet" type="text/css" href="../css/admin.css">

		</head>
		<body>
			<div class="login">
				<h1 class="text-center">Login</h1><br><br>
				 
				  

				<!--login form start here-->
				<form action="" method="POST" class="text-center">
					Username: <br>
					<input type="text" name="username" placeholder="Enter Username"><br><br>

					Password:<br>
					<input type="password" name="password" placeholder="Enter password"><br><br>
					<input type="submit" name="submit" value="Login" class="btn-primary"><br><br>
				</form>

				<!--login form end here-->
				<p class="text-center">Created By -<a href="www.azaydhital.com">Ajay Dhital</a></p>


			</div>
		
		</body>
	</html>

	<?php
		
		if(isset($_POST['btn_submit']))
		{
			extract($_POST);
			checkLogin_cus($connection,$user,$pass);
		}

	?>





