<?php
session_start();
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

$id_carga = $_POST['id_carga'];
$calificacion = $_POST['calificacion'];
 
 $query = "UPDATE $tbl_name SET calificacion_trabajo = '$calificacion' WHERE id_carga = $id_carga";

if ($conexion->query($query) === TRUE) {
 
 echo "<h2>" . "Calificado exitosamente!" . "</h2>" . "<a href='productos.php'> Continuar</a>";
 echo "<script language='javascript'>setTimeout('location.href='productos.php'', 3000);</script>";
 }
 else {
 echo "Error al Modificar producto." . $query . "<br>" . $conexion->error; 
   }

 mysqli_close($conexion); 
 ?>