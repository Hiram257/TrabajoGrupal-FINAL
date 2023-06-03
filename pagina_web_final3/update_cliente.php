<?php
	
	require 'conexion.php';
	$id = $_POST['id'];
	$dni = $_POST['dni'];
    $nombre_apellido = $_POST['nombre'];
    
	  // actualizar los datos en la tabla "empresas"
	
	  $sql = "UPDATE cliente SET dni = '$dni', nombre_apellido = '$nombre_apellido' WHERE id = $id";
	
	  $resultado = $con->query($sql);

	
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
				
				<a href="index_cliente.php" class="btn btn-primary">Regresar</a>
				
				</div>
			</div>
		</div>
	</body>
</html>
