<?php
	
	require 'conexion.php';
	$id = $_POST['id'];
	$dni = $_POST['dni'];
    $foto = $_POST['foto'];
    $nombre_apellido = $_POST['nombre'];
    $contrasena = $_POST['contra'];
    $estado_personal =(int) $_POST['estado'];
    $id_cargo = $_POST['cargo'];


   
    
    // Insertar los datos en la tabla "empresas"
    
	
	$sql = "UPDATE personal SET dni = '$dni', foto = '$foto', nombre_apellido = '$nombre_apellido', contrasena = '$contrasena', estado_personal = $estado_personal, id_cargo = $id_cargo WHERE id = $id";

	
	
	$resultado = $conn->query($sql);
	
?>

<html lang="es">
	<head>
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-theme.css" rel="stylesheet">
		<script src="js/jquery-3.1.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>	
	</head>
	
	<body>
		<div class="container">
			<div class="row">
				<div class="row" style="text-align:center">
				<?php if($resultado) { ?>
				<h3>REGISTRO MODIFICADO</h3>
				<?php } else { ?>
				<h3>ERROR AL MODIFICAR</h3>
				<?php } ?>
				
				<a href="index.php" class="btn btn-primary">Regresar</a>
				
				</div>
			</div>
		</div>
	</body>
</html>
