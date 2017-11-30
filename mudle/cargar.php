<?php
session_start();
?>

<?php
	$host_db = "localhost";
	$user_db = "root";
	$pass_db = "";
	$db_name = "mudle";
	$tbl_name = "carga";

	$id_producto = $_POST['id_producto'];
	$nc = $_POST['nc'];
	$ruta = 'tareas/'.$nc.'_'.$_FILES['archivo']['name'];
	$fecha_actual = date("Y-m-d");

	if ($_FILES['archivo']['size'] < 500000){
		if (move_uploaded_file($_FILES['archivo']['tmp_name'],$ruta)){
			$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);
			if ($conexion->connect_error) {
 				die("La conexion falló: " . $conexion->connect_error);
			}
			$query = "INSERT INTO $tbl_name values (null, '$nc', '$id_producto', '$fecha_actual', '$ruta', 0)";
			if ($conexion->query($query) === TRUE){
				echo "El archivo se ha cargado correctamente!<br>";
				echo "<a href='productos.php'>Regresar</a>";
			}else{
				echo "Error al agregar producto." . $query . "<br>" . $conexion->error; 
			}
			mysqli_close($conexion); 
		}else{
			echo "Ocurrio un error al subir el archivo";
		}
	}else{
		echo "El archivo es demasiado grande.";
	}

?>