<?php
	require 'conexion.php';
	
	$cargos = $conn->query("SELECT * from cargo");
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
			
			<form class="form-horizontal" method="POST" action="guardar.php" autocomplete="off" enctype="multipart/form-data">
				<div class="form-group">
					<label for="nombre" class="col-sm-2 control-label">Nombre y Apellidos</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required>
					</div>
				</div>
				
				
				
				<div class="form-group">
					<label for="dni" class="col-sm-2 control-label">DNI</label>
					<div class="col-sm-10">
						<input type="number" class="form-control" id="dni" name="dni" placeholder="DNI" required>
					</div>
				</div>
				<div class="form-group">
					<label for="foto" class="col-sm-2 control-label">Foto</label>
					<div class="col-sm-10">
						<input type="file" accept="image/*" class="form-control" id="foto" name="foto" placeholder="Foto" value="<?php echo $row['foto']; ?>"  required>
					</div>
				</div>
				<div class="form-group">
					<label for="cargo" class="col-sm-2 control-label">Cargo</label>
					<div class="col-sm-10">
						<select class="form-control" id="cargo" name="cargo" required>
						<?php while($cargo = $cargos->fetch_array(MYSQLI_ASSOC)) { ?>
							<option value=<?php echo $cargo['id']?>><?php echo $cargo['tipo_cargo']?></option>
						<?php } ?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="contra" class="col-sm-2 control-label">Contraseña</label>
					<div class="col-sm-10">
						<input type="password" class="form-control" id="contra" name="contra" placeholder="Contraseña" required>
					</div>
				</div>
				
				<div class="form-group">
					<label for="estado" class="col-sm-2 control-label">Estado</label>
					<div class="col-sm-10">
						<select class="form-control" id="estado" name="estado" required>
							<option value="1" >ACTIVO</option>
							<option value="0" >INACTIVO</option>
							
						</select>
					</div>
				</div>
				
				
						
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<a href="index.php" class="btn btn-default">Regresar</a>
						<button type="submit" class="btn btn-primary">Guardar</button>
					</div>
				</div>
			</form>
		</div>
	</body>
</html>