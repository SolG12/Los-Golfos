<?php
	session_start();

	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	} else {
   		echo "Necesitas acceder para registrar un administrador.<br>";
   		echo "<br><a href='login.php'>Login</a>";
		exit;
	}

	$now = time();

	if($now > $_SESSION['expire']) {
		session_destroy();
		echo "Su sesion a terminado,
		<a href='login.php'>Necesita Hacer Login</a>";
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
	<ul>
  		<li><a href="productos.php">Productos</a></li>
  		<li><a href="alta_producto.php">Dar de Alta Producto</a></li>
 		<li><a href="login.php">Login</a></li>
 		<li><a href="logout.php">Logout</a></li>
	</ul>
	<div class="main-agileinfo slider ">
		<div class="items-group">
			<div class="item agileits-w3layouts">
				<div class="block text main-agileits"> 
					<span class="circleLight"></span> 
					<!-- login form -->
					<div class="login-form loginw3-agile"> 
						<div class="agile-row">
							<h1>Calificar Trabajo</h1> 
							<div class="login-agileits-top">
<?php
	$id_carga = $_GET['id_carga'];
?>
								<form action="calificar.php" method="post"> 
									<p>Calificacion: </p>
									<input type="number" name="calificacion" min="1" max="100" value="100">
									<input type="hidden" name="id_carga" value="<?php echo $id_carga ?>">
									<label class="anim">
										<!--
										<input type="checkbox" class="checkbox">
										<span> Remember me ?</span>
										-->  
									</label>  
									
									<input type="submit" name="Submit" value="Calificar"> 
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