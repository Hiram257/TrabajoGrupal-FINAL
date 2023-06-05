<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> <!--Importante--->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Descargar</title>
    <style>
    .color{
        background-color: #9BB;  
    }
</style>
</head>
<body>
    
<?php
include('conexion.php');
$fecha = date("d_m_Y");


/**PARA FORZAR LA DESCARGA DEL EXCEL */
header("Content-Type: text/html;charset=utf-8");
header("Content-Type: application/vnd.ms-excel charset=iso-8859-1");
$filename = "ReporteExcel_" .$fecha. ".xls";
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Disposition: attachment; filename=" . $filename . "");


/***RECIBIENDO LAS VARIABLE DE LA FECHA */
$fechaInit = date("Y-m-d", strtotime($_POST['fecha_ingreso']));
$fechaFin  = date("Y-m-d", strtotime($_POST['fechaFin']));


$sqlTrabajadores = ("SELECT * FROM venta WHERE (fecha>='$fechaInit' and fecha<='$fechaFin') ORDER BY fecha ASC");
$query = mysqli_query($con, $sqlTrabajadores);
?>


<table style="text-align: center;" border='1' cellpadding=1 cellspacing=1>
<thead>
    <tr style="background: #D0CDCD;">
    <th>#</th>
 

    <th class="color">Cliente</th>
    <th class="color">personal</th>
    <th class="color">numero serie
</th>
    <th class="color">total</th>
    <th class="color">fecha hora
</th>
    <th class="color">Cantidad de producto
</th>
<th class="color">Estado pago
</th>

    </tr>

</thead>
<?php
$i =1;
    while ($dataRow = mysqli_fetch_array($query)) { ?>
    <tbody>
        <tr>
            <td><?php echo $i++; ?></td>
            <td><?php echo $dataRow['id_cliente']; ?></td>
            <td><?php echo $dataRow['id_personal']; ?></td>
            <td><?php echo $dataRow['numero_serie'] ; ?></td>
            <td><?php echo $dataRow['total'] ; ?></td>
            <td><?php echo $dataRow['fecha'] ; ?></td>
             <td><?php echo $dataRow['cantidad_producto'] ; ?></td>
            <td><?php echo $dataRow['estado_pago'] ; ?></td>
        </tr>
    </tbody>
    
<?php } ?>
</table>

</body>
</html>