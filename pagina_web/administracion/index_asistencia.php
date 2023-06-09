<?php
	require 'conexion.php';
	
	$where = "";
	
	if(!empty($_POST))
	{
		$valor = $_POST['campo'];
		if(!empty($valor)){
			$where = "WHERE id_personal LIKE '%$valor'";
		}
	}
	$sql = "SELECT * FROM asistencia $where ORDER BY fecha ASC";
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
				<h2 style="text-align:center">PERSONAL</h2>
			</div>
			
			<div class="row">
				<a href="nuevo_asistencia.php" class="btn btn-primary">Nuevo Registro</a>
				
				<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
					<b>ID: </b><input type="text" id="campo" name="campo" />
					<input type="submit" id="enviar" name="enviar" value="Buscar" class="btn btn-info" />
				</form>
			</div>
			
			<br>
			
			<div class="row table-responsive">
				<table class="table table-striped">
					<thead>
					
						<tr>

							<th>ID</th>
							<th>ID Personal</th>
							<th>Nombres y Apellidos</th>
							<th>DNI</th>
							<th>Asistencia</th>
							<th>Fecha</th>
							<th></th>
							<th></th>

						</tr>
					</thead>
					
					<tbody>
						<?php while($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
							<tr>
								<td><?php echo $row['id']; ?></td>
								<td><?php echo $row['id_personal']; ?></td>
								<td>
									<?php
										$id_personal = $row['id_personal'];
										echo $con->query("SELECT * FROM personal WHERE id=$id_personal")->fetch_array(MYSQLI_ASSOC)['nombre_apellido'];
									?>
								</td>
								<td>
									<?php
										$id_personal = $row['id_personal'];
										echo $con->query("SELECT * FROM personal WHERE id=$id_personal")->fetch_array(MYSQLI_ASSOC)['dni'];
									?>
								</td>
								<td>
									<?php
										if($row['asistencia']=='1') {
											echo "PRESENTE"; 
										} else {
											echo "AUSENTE";
										}
									?>
								</td>
								<td><?php echo $row['fecha']; ?></td>
								<td><a href="modificar_asistencia.php?id=<?php echo $row['id']; ?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
								<td><a href="#" data-href="eliminar_asistencia.php?id=<?php echo $row['id']; ?>" data-toggle="modal" data-target="#confirm-delete"><span class="glyphicon glyphicon-trash"></span></a></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
		
		<!-- Modal -->
		<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="myModalLabel">Eliminar Registro</h4>
					</div>
					
					<div class="modal-body">
						¿Desea eliminar este registro?
					</div>
					
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
						<a class="btn btn-danger btn-ok">Delete</a>
					</div>
				</div>
			</div>
		</div>
		
		<script>
			$('#confirm-delete').on('show.bs.modal', function(e) {
				$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
				
				$('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
			});
		</script>	
		
	</body>
</html>	