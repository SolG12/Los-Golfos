<?php
	session_start();

	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	} else {
   		echo "Necesitas acceder para registrar un administrador.<br>";
   		echo "<br><a href='login.html'>Login</a>";
		exit;
	}

	$now = time();

	if($now > $_SESSION['expire']) {
		session_destroy();
		echo "Su sesion a terminado,
		<a href='login.html'>Necesita Hacer Login</a>";
		exit;
	}
?>

<!DOCTYPE html>
<html>
<head>
<title>Login Administrador</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="//fonts.googleapis.com/css?family=Cormorant+Garamond:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Arsenal:400,400i,700,700i" rel="stylesheet">
</head>
<body> 
	<div class="main-agileinfo slider ">
		<div class="items-group">
			<div class="item agileits-w3layouts">
				<div class="block text main-agileits"> 
					<span class="circleLight"></span> 
					<!-- login form -->
					<div class="login-form loginw3-agile"> 
						<div class="agile-row">
							<h1>Dar de Alta Producto</h1> 
							<div class="login-agileits-top"> 	
								<form action="alta.php" method="post"> 
									<p>Fecha de Entrega: </p>
									<input type="text" name="fecha_entrega" required>
									<p>Nombre: </p>
									<input type="text" name="nombre" required>
									<p>Descripcion: </p>
									<input type="text" name="descripcion" required>
									<label class="anim">
										<!--
										<input type="checkbox" class="checkbox">
										<span> Remember me ?</span>
										-->  
									</label>  
									
									<input type="submit" name="Submit" value="Dar de Alta"> 
								</form> 	
							</div> 
							<!--
							<div class="login-agileits-bottom wthree"> 
								<h6><a href="#">Forgot password?</a></h6>
							</div> 
							--> 
						</div>  
					</div>   
				</div>
				<div class="footeragileits">
					<p> &copy; 2017 Derechos Reservados | Los Golfos</a></p>
				</div> 
			</div>   
		</div>
	</div>	 
	<!-- //main --> 
</body>
</html>