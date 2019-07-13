<?php
error_reporting(0);
require 'inc/db.php';
if(isset($_SESSION['username'])) { header ('Location: index.php'); }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Quick Bot - Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="icon" href="qb.png" type="image" sizes="16x16">
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
				<?php 
			if(isset($_POST['submit']))
			{
				$username = $_POST['username'];
				$stmt = $con->prepare('SELECT * FROM customers WHERE username = ?');
				$stmt->bind_param('s', $username);
				$stmt->execute();
				$meta = $stmt->result_metadata();
		
				while ($field = $meta->fetch_field()) {
					$parameters[] = &$row[$field->name];
				}
		
				call_user_func_array(array($stmt, 'bind_result'), $parameters);
		
				while ($stmt->fetch()) {
				  foreach($row as $key => $val) {
					$x[$key] = $val;
				  }
				  $results[] = $x;
				}
				
				$statusgrab = $row['status'];
				$passwordgrab = $row['password'];

				$password = hash("sha512", $_POST['password']);
				
				if($password == $passwordgrab)
				{
					if($statusgrab != 0)
					{
						$_SESSION['status'] = $statusgrab;
						$_SESSION['username'] = $username;
						echo "<center>Welcome, $username<br><a href='index.php'>Dashboard</a></center>";
						$stmt->close();
					}
					else
					{
						echo "<center>Account Banned<br><a href='login.php'>Refresh</a></center>";
						$stmt->close();
					}
				}
				else
				{
					echo "<center>Username/Password Authentication Failed<br><a href='login.php'>Refresh</a></center>";
					$stmt->close();
				}
			}
			else
			{
				?>
				<form action="" autocomplete="off" method="post" class="login100-form validate-form">
					<span class="login100-form-title p-b-33">
					    Quick Bot - Twitter Services
						Account Login
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Username is required">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>

					<div class="wrap-input100 rs1 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>

					<div class="container-login100-form-btn m-t-20">
						<button name="submit" type="submit" class="login100-form-btn">
							Sign in
						</button>
					</div>
						<br>
					<div class="text-center">
						<span class="txt1">
							Create an account?
						</span>

						<a href="register.php" class="txt2 hov1">
							Sign up
						</a>
					</div>
				</form>
				<?php } ?>
			</div>
		</div>
	</div>
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="vendor/animsition/js/animsition.min.js"></script>
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/select2/select2.min.js"></script>
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<script src="vendor/countdowntime/countdowntime.js"></script>
	<script src="js/main.js"></script>

</body>
</html>