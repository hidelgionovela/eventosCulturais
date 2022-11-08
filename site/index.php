<?php
session_start();
ob_start();
?>

<!DOCTYPE html>
<html>

<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/styleindex.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<link rel="icon" type="image/png" sizes="16x16" href="./img/download.jpg">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
	<!-- <img class="wave" src="img/wave.png"> -->
	<div class="wave">
		<h3 class="logo">Teatro<span>Gungu</span></h3>
	</div>
	<div class="container">

		<div class="img">
			<img src="img/bg.svg">
		</div>
		<div class="login-content">
			<form action="./Controller/loginControllerr.php" method="POST">
				<img src="img/avatar.svg">
				<h2 class="title">Bem-Vindo</h2>
				<div class="input-div one">
					<div class="i">
						<i class="fas fa-user"></i>
					</div>
					<div class="div">
						<h5>Email</h5>
						<input type="email" class="input" name="email" require>
					</div>
				</div>
				<div class="input-div pass">
					<div class="i">
						<i class="fas fa-lock"></i>
					</div>
					<div class="div">
						<h5>Password</h5>
						<input type="password" class="input" name="senha" require>
					</div>
				</div>
				<p class="error">
				<?php
				if (isset($_SESSION['loginError'])) {
					$a = $_SESSION['loginError'] ;
					echo "$a" ;
					unset($_SESSION['loginError']);
				}
				?> 
			</p>
			<p class="sucesso">
				<?php
				if (isset($_SESSION['msg'])) {
					$a = $_SESSION['msg'] ;
					echo "$a" ;
					unset($_SESSION['msg']);
				} 
				?> 
			</p>
			
			 <?php
			if (!isset($_SESSION['loginError'])) {
				echo " <p>Área Administrativa</p> " ;
			}
				?>
				<input type="submit" class="btn" value="Login" name="Login">
			</form>
			
		</div>
	</div>
	<script type="text/javascript" src="js/mainindex.js"></script>
</body>

</html>