<?php
sleep(1);
include('conexion.php');

/**
 * Nota: Es recomendable guardar la fecha en formato año - mes y dia (2022-08-25)
 * No es tan importante que el tipo de fecha sea date, puede ser varchar
 * La funcion strtotime:sirve para cambiar el forma a una fecha,
 * esta espera que se proporcione una cadena que contenga un formato de fecha en Inglés US,
 * es decir año-mes-dia e intentará convertir ese formato a una fecha Unix dia - mes - año.
*/

$fechaInit = date("Y-m-d", strtotime($_POST['f_ingreso']));
$fechaFin  = date("Y-m-d", strtotime($_POST['f_fin']));

$sqlTrabajadores = ("SELECT * from vista_reporte_venta WHERE  `fecha` BETWEEN '$fechaInit' AND '$fechaFin' ORDER BY fecha DESC");
$query = mysqli_query($con, $sqlTrabajadores);

$total   = mysqli_num_rows($query);
echo '<strong>Total: </strong> ('. $total .')';
?>

<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Cliente</th>
            <th scope="col">personal</th>
            <th scope="col">numero serie</th>
            <th scope="col">total</th>
            <th scope="col">fecha hora</th>           
            <th scope="col">Cantidad de producto</th>
            <th scope="col">Estado pago</th>

        </tr>
    </thead>
    <?php
    $i = 1;
    while ($dataRow = mysqli_fetch_array($query)) { ?>
        <tbody>
            <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $dataRow['dato_cliente']; ?></td>
                <td><?php echo $dataRow['dato_empleado']; ?></td>

                <td><?php echo $dataRow['numero_serie']; ?></td>
                <td><?php echo $dataRow['total']; ?></td>
                <td><?php echo $dataRow['fecha']; ?></td>
                <td><?php echo $dataRow['cantidad_producto']; ?></td>
                <td><?php echo $dataRow['estado_pago']; ?></td>
            
            </tr>
        </tbody>
    <?php } ?>
</table>