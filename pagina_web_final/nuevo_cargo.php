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
			
			<form class="form-horizontal" method="POST" action="guardar_cargo.php" autocomplete="off" enctype="multipart/form-data">
				<div class="form-group">
					<label for="cargo" class="col-sm-2 control-label">Cargo</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="cargo" name="cargo" placeholder="Cargo" required>
					</div>
				</div>

				
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<a href="index_cargo.php" class="btn btn-default">Regresar</a>
						<button type="submit" class="btn btn-primary">Guardar</button>
					</div>
				</div>
			</form>
		</div>
	</body>
</html>