<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Enviar Tarea</title>
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
							<h1>Enviar Tarea</h1> 
							<div class="login-agileits-top">
							<?php
							$id_producto = $_POST['id_producto'];
							echo $id_producto;
							 ?>
							<form action="carga.php" method="post"> 	
								<p>Numero de Control</p>
								<input type="text" name="nc" maxlength="20" class="name" required>
								<input type="submit" name="seleccionar" value="Seleccionar Archivo">
								<br>
								<br>
								<input type="submit" name="Submit" value="Enviar">
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