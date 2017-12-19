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
<title>Productos</title>
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
							<h1>Ver Producto</h1> 
							<div class="login-agileits-top">
								<table class="table">
									<tr>
										<th>NC</th>
										<th>Fecha de Subida</th>
										<th>Entrega</th>
										<th>Trabajo</th>
										<th>Calificacion</th>
										<th>Descarga</th>
									</tr>

<?php
function compararFechas($primera, $segunda)
 {
  $valoresPrimera = explode ("-", $primera);   
  $valoresSegunda = explode ("-", $segunda); 

  $diaPrimera    = $valoresPrimera[2];  
  $mesPrimera  = $valoresPrimera[1];  
  $anyoPrimera   = $valoresPrimera[0]; 

  $diaSegunda   = $valoresSegunda[2];  
  $mesSegunda = $valoresSegunda[1];  
  $anyoSegunda  = $valoresSegunda[0];

  $diasPrimeraJuliano = gregoriantojd($mesPrimera, $diaPrimera, $anyoPrimera);  
  $diasSegundaJuliano = gregoriantojd($mesSegunda, $diaSegunda, $anyoSegunda);     

  if(!checkdate($mesPrimera, $diaPrimera, $anyoPrimera)){
    // "La fecha ".$primera." no es v&aacute;lida";
    return 0;
  }elseif(!checkdate($mesSegunda, $diaSegunda, $anyoSegunda)){
    // "La fecha ".$segunda." no es v&aacute;lida";
    return 0;
  }else{
    return  $diasPrimeraJuliano - $diasSegundaJuliano;
  } 

}
?>

<?php

$host_db = "localhost";
$user_db = "root";
$pass_db = "";
$db_name = "mudle";
$tbl_name = "carga";

$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}
 
$sql = "SELECT producto.id_producto, nc, fecha, ruta, fecha_entrega, id_carga, calificacion_trabajo FROM carga INNER JOIN producto on carga.id_producto=producto.id_producto WHERE producto.id_producto = $_GET[id_producto]";

$result = $conexion->query($sql);

if ($result->num_rows > 0) {
 }
 while($row = $result->fetch_array(MYSQLI_ASSOC)){
 	$primera = $row['fecha_entrega'];
 	$segunda = $row['fecha'];
 	$dias_diferencia = compararFechas($primera,$segunda);

 	if($dias_diferencia >= 0){
 		$calificacion_entrega = 100;
 	}else if ($dias_diferencia < -10){
 		$calificacion_entrega = 0;
 	}else{
 		$calificacion_entrega = (10 + $dias_diferencia) * 10;
 	}

 	$calificacion_trabajo = $row['calificacion_trabajo'];
 	$calificacion_final = ($calificacion_trabajo * 0.7) + ($calificacion_entrega * 0.3);

 echo "<tr><td>".$row['nc']."</td>";
 echo "<td>".$row['fecha']."</td>";
 echo "<td>".$calificacion_entrega."</td>";
 if ($row['calificacion_trabajo'] == 0){
 	echo "<td>"."Sin Calificar"."</td>";
 }else{
 	echo "<td>".$calificacion_trabajo."</td>";
 }
 echo "<td><strong>".$calificacion_final."</strong></td>";
 echo "<td>"."<a type=button class='button' href='calificar_producto.php?id_carga=".$row['id_carga']."'>Calificar</a>"."<a type=button class='button' href='".$row['ruta']."'>Ver Archivo</a>"."<a type=button class='button' href='ver_texto.php?id_carga=".$row['id_carga']."'>Ver Texto</a>"."</td></tr>\n";
 }
 mysqli_close($conexion); 
 ?>
 								</table>
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