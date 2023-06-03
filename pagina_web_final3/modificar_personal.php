<?php
	require 'conexion.php';
	
	$id = $_GET['id'];
	
	$sql = "SELECT * FROM personal WHERE id = '$id'";
	$resultado = $con->query($sql);
	$row = $resultado->fetch_array(MYSQLI_ASSOC);
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
				<h3 style="text-align:center">MODIFICAR REGISTRO</h3>
			</div>
			
			<form class="form-horizontal" method="POST" action="update_personal.php" autocomplete="off" enctype="multipart/form-data">
				<div class="form-group">
					<label for="nombre" class="col-sm-2 control-label">Nombre y Apellidos</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="<?php echo $row['nombre_apellido']; ?>" required>
					</div>
				</div>
				
				<input type="hidden" id="id" name="id" value="<?php echo $row['id']; ?>" />
				
				<div class="form-group">
					<label for="dni" class="col-sm-2 control-label">DNI</label>
					<div class="col-sm-10">
						<input type="number" class="form-control" id="dni" name="dni" placeholder="DNI" value="<?php echo $row['dni']; ?>"  required>
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
							<option value=<?php echo $cargo['id']?> <?php if($row['id_cargo']==$cargo['id']) echo 'selected'; ?>><?php echo $cargo['tipo_cargo']?></option>
						<?php } ?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="contra" class="col-sm-2 control-label">Contraseña</label>
					<div class="col-sm-10">
						<input type="password" class="form-control" id="contra" name="contra" placeholder="Contraseña" value="<?php echo $row['contrasena']; ?>" required >
					</div>
				</div>
				
				<div class="form-group">
					<label for="estado" class="col-sm-2 control-label">Estado</label>
					<div class="col-sm-10">
						<select class="form-control" id="estado" name="estado" required>
							<option value="1" <?php if($row['estado_personal']=='1') echo 'selected'; ?>>ACTIVO</option>
							<option value="0" <?php if($row['estado_personal']=='0') echo 'selected'; ?>>INACTIVO</option>
							
						</select>
					</div>
				</div>
				
				
						
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<a href="index_personal.php" class="btn btn-default">Regresar</a>
						<button type="submit" class="btn btn-primary">Guardar</button>
					</div>
				</div>
			</form>
		</div>
	</body>
</html>