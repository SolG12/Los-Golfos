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

$fecha_entrega = $_POST['fecha_entrega'];
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
 
 $query = "INSERT INTO $tbl_name (fecha_entrega, nombre, descripcion) values('$fecha_entrega', '$nombre', '$descripcion')";

if ($conexion->query($query) === TRUE) {
 
 echo "<h2>" . "Producto agregado exitosamente!" . "</h2> " . "<a href='productos.php'> Continuar</a>";
 }
 else {
 echo "Error al agregar producto." . $query . "<br>" . $conexion->error; 
   }

 mysqli_close($conexion); 
 ?>