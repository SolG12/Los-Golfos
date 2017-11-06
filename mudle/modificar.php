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

$id_producto = $_POST['id_producto'];
$fecha_entrega = $_POST['fecha_entrega'];
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
 
 $query = "UPDATE $tbl_name SET fecha_entrega='$fecha_entrega', nombre='$nombre', descripcion='$descripcion' WHERE id_producto = $id_producto";

if ($conexion->query($query) === TRUE) {
 
 echo "<br />" . "<h2>" . "Producto Modificado exitosamente!" . "</h2>" . "<a href='productos.php'> Continuar</a>";
 echo "<script language='javascript'>setTimeout('location.href='productos.php'', 3000);</script>";
 }
 else {
 echo "Error al Modificar producto." . $query . "<br>" . $conexion->error; 
   }

 mysqli_close($conexion); 
 ?>