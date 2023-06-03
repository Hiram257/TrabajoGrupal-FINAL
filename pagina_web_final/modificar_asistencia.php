<?php
	require 'conexion.php';
	
	$id = $_GET['id'];
	
	$sql = "SELECT * FROM asistencia WHERE id = '$id'";
	$resultado = $con->query($sql);
	$row = $resultado->fetch_array(MYSQLI_ASSOC);
	$id_personal = $row['id_personal'];
	$personal = $con->query("SELECT * FROM personal WHERE id = '$id_personal'")->fetch_array(MYSQLI_ASSOC);
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
				<h3 style="text-align:center">MODIFICAR REGISTRO</h3>
			</div>
			
			<form class="form-horizontal" method="POST" action="update_asistencia.php" autocomplete="off" enctype="multipart/form-data">
				<div class="form-group">
					<label for="nombre" class="col-sm-2 control-label">Nombre y Apellidos</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="<?php echo $personal['nombre_apellido']; ?>" disabled>
					</div>
				</div>
				<div class="form-group">
					<label for="dni" class="col-sm-2 control-label">DNI</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="dni" name="dni" placeholder="DNI" value="<?php echo $personal['dni']; ?>" disabled>
					</div>
				</div>
				<input type="hidden" id="id" name="id" value="<?php echo $row['id']; ?>" />
				
				<div class="form-group">
					<label for="fecha" class="col-sm-2 control-label">Fecha</label>
					<div class="col-sm-10">
						<input type="date" class="form-control" id="fecha" name="fecha" placeholder="Fecha" value="<?php echo $row['fecha']; ?>" required>
					</div>
				</div>
				<div class="form-group">
					<label for="asistencia" class="col-sm-2 control-label">Asistencia</label>
					<div class="col-sm-10">
						<select class="form-control" id="asistencia" name="asistencia" required>
							<option value="1" <?php if($row['asistencia']=='1') echo 'selected'; ?>>PRESENTE</option>
							<option value="0" <?php if($row['asistencia']=='0') echo 'selected'; ?>>AUSENTE</option>
							
						</select>
					</div>
				</div>
				
				
						
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<a href="index_asistencia.php" class="btn btn-default">Regresar</a>
						<button type="submit" class="btn btn-primary">Guardar</button>
					</div>
				</div>
			</form>
		</div>
	</body>
</html>