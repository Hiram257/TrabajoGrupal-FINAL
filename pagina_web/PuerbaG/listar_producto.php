<?php
// Establecer la conexión con la base de datos
include 'conexion.php';

// Obtener el valor del parámetro "estado" de la URL
$nombre = isset($_GET['nombre']) ? $_GET['nombre'] : '';

// Consulta SQL para obtener los datos filtrados por estado
$sql = "SELECT id,descripcion,precio,stock,codigo_producto,id_marca,id_familia,nombre,id_ubicacion,estado_producto,id_proveedor FROM producto";

$respuesta=mysqli_query($conn,$sql);
// Devolver la lista JSON como respuesta
$datos=mysqli_fetch_all($respuesta,MYSQLI_ASSOC);


if (!empty($datos)) {
    echo json_encode($datos);
    # code...
}else {
    echo json_encode([]);

}

// Cerrar la conexión a la base de datos
$conn->close();

?>