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
							<h1>Productos</h1> 
							<div class="login-agileits-top">
								<table class="table_productos">
									<tr>
										<th>Nombre</th>
										<th>Descripción</th>
										<th>Fecha</th>
										<th></th>
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
session_start();
?>
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
?>

<?php
$sql = "SELECT count(*) FROM $tbl_name";
$result = $conexion->query($sql);
$row = $result->fetch_array(MYSQLI_ASSOC);
$count = $row['count(*)'];

//Limito la busqueda
$TAMANO_PAGINA = 25;

//examino la página a mostrar y el inicio del registro a mostrar
$pagina = 1;
if (isset($_GET["pagina"]))
{
	$pagina = $_GET["pagina"];
}

if (!$pagina) {
   $inicio = 0;
   $pagina = 1;
}
else {
   $inicio = ($pagina - 1) * $TAMANO_PAGINA;
}
//calculo el total de páginas
$total_paginas = ceil($count / $TAMANO_PAGINA);
?>

<?php
$sql = "SELECT * FROM $tbl_name limit ".$inicio.",".$TAMANO_PAGINA;

$result = $conexion->query($sql);

$segunda = date("Y")."-".date("m")."-".date("d");

if ($result->num_rows > 0) {     
 }
 while($row = $result->fetch_array(MYSQLI_ASSOC)){
 $primera = $row['fecha_entrega'];

 echo "<tr><td>".$row['nombre']."</td>";
 echo "<td>".$row['descripcion']."</td>";
 echo "<td>".$row['fecha_entrega']."</td>";
 echo "<td>";
 if (compararFechas($primera,$segunda) > -4){
 	echo "<a type=button class='button' href='subir.php?id_producto=".$row['id_producto']."'>Enviar</a>";
 }
 echo "<a type=button class='button' href='ver_producto.php?id_producto=".$row['id_producto']."'>Ver</a>";
 echo "<a type=button class='button' href='modificar_producto.php?id_producto=".$row['id_producto']."'>Modificar</a></td></tr>\n";
   echo "<input type='hidden' name='id_producto' value='".$row['id_producto']."'>";
 }
 echo "</table>";

 mysqli_close($conexion); 
 ?>
 <?php
 $url = "productos.php";
 if ($total_paginas > 1) {
   if ($pagina != 1)
      echo '<a href="'.$url.'?pagina='.($pagina-1).'"><img src="images/izq.png" border="0"></a>';
      for ($i=1;$i<=$total_paginas;$i++) {
         if ($pagina == $i)
            //si muestro el índice de la página actual, no coloco enlace
            echo $pagina;
         else
            //si el índice no corresponde con la página mostrada actualmente,
            //coloco el enlace para ir a esa página
            echo '  <a href="'.$url.'?pagina='.$i.'">'.$i.'</a>  ';
      }
      if ($pagina != $total_paginas)
         echo '<a href="'.$url.'?pagina='.($pagina+1).'"><img src="images/der.png" border="0"></a>';
}
 ?>
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