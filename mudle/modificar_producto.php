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
<title>Mudle</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="//fonts.googleapis.com/css?family=Cormorant+Garamond:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Arsenal:400,400i,700,700i" rel="stylesheet">

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

  <script>
  $( function() {
    $( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
  } );
  </script>

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
							<h1>Modificar Alta Producto</h1> 
							<div class="login-agileits-top">
<?php
	$host_db = "localhost";
	$user_db = "root";
	$pass_db = "";
	$db_name = "mudle";
	$tbl_name = "producto";

	$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

	if ($conexion->connect_error) {
	 die("La conexion falló: " . $conexion->connect_error);
	}

	$id_producto = $_GET['id_producto'];
	 
	$sql = "SELECT * FROM $tbl_name where id_producto=$id_producto";

	$result = $conexion->query($sql);
	$row = $result->fetch_array(MYSQLI_ASSOC);
	mysqli_close($conexion); 
?>
								<form action="modificar.php" method="post"> 
									<p>Fecha de Entrega: </p>
									<input type="text" name="fecha_entrega" value="<?php echo $row['fecha_entrega'] ?>" id="datepicker" required>
									<p>Nombre: </p>
									<input type="text" name="nombre" value="<?php echo $row['nombre'] ?>" required>
									<p>Descripcion: </p>
									<input type="text" name="descripcion" value="<?php echo $row['descripcion'] ?>" required>
									<input type="hidden" name="id_producto" value="<?php echo $id_producto ?>">
									<label class="anim">
										<!--
										<input type="checkbox" class="checkbox">
										<span> Remember me ?</span>
										-->  
									</label>  
									
									<input type="submit" name="Submit" value="Modificar"> 
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