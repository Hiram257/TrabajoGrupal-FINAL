<?php
	require 'conexion.php';
	
	$cargos = $con->query("SELECT * from cargo");
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
				<h3 style="text-align:center">NUEVO REGISTRO</h3>
			</div>
			
			<form class="form-horizontal" method="POST" action="guardar_asistencia.php" autocomplete="off" enctype="multipart/form-data">
				<div class="form-group">
					<label for="id_personal" class="col-sm-2 control-label">ID</label>
					<div class="col-sm-10">
						<input type="number" class="form-control" id="id_personal" name="id_personal" placeholder="ID" required>
					</div>
				</div>
				<div class="form-group">
					<label for="fecha" class="col-sm-2 control-label">Fecha</label>
					<div class="col-sm-10">
						<input type="datetime-local" class="form-control" id="fecha" name="fecha" placeholder="Fecha" required>
					</div>
				</div>
				<div class="form-group">
					<label for="asistencia" class="col-sm-2 control-label">Asistencia</label>
					<div class="col-sm-10">
						<select class="form-control" id="asistencia" name="asistencia" required>
							<option value="1" >PRESENTE</option>
							<option value="0" >AUSENTE</option>
							
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