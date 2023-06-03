<?php
	
	require 'conexion.php';
	$id = $_POST['id'];
	$dni = $_POST['dni'];
    $nombre_apellido = $_POST['nombre'];
    $contrasena = $_POST['contra'];
    $estado_personal =(int) $_POST['estado'];
    $id_cargo = $_POST['cargo'];
    
	// verificar que se envio la imagen
if (isset($_FILES['foto']) && isset($_POST['dni'])) {

	// nombre de la imagen
	$nombre = $_FILES['foto']['name'];
	$foto = $dni . '/' . $nombre;
	// extension de la imagen
	$extension = pathinfo($nombre, PATHINFO_EXTENSION);
  
	// verificar que sea una imagen
	if (in_array($extension, ['jpg', 'jpeg', 'png'])) {
  
	  // crear la carpeta del personal si no existe
	  if (!file_exists('fotos/' . $dni)) {
		mkdir('fotos/' . $dni, 0777, true);
	  }
  
	  // copiamos la imagen a la carpeta
	  move_uploaded_file($_FILES['foto']['tmp_name'], 'fotos/' . $foto);

	  // actualizar los datos en la tabla "empresas"
	
	  $sql = "UPDATE personal SET dni = '$dni', foto = '$foto', nombre_apellido = '$nombre_apellido', contrasena = '$contrasena', estado_personal = $estado_personal, id_cargo = $id_cargo WHERE id = $id";
	
	  $resultado = $con->query($sql);
  
	} else {
  
	  // Error!
	  echo 'No es una imagen!';
  
	}
  
  }


	
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
				
				<a href="index_personal.php" class="btn btn-primary">Regresar</a>
				
				</div>
			</div>
		</div>
	</body>
</html>
