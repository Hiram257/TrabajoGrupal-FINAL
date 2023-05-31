<?php
// Establecer la conexión con la base de datos
include 'conexion.php';

// Permitir solicitudes desde cualquier origen

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");

// Obtener el valor del parámetro "nombre" de la URL
$nombre = isset($_GET['nombre']) ? $_GET['nombre'] : '';

// Consulta SQL para obtener los datos filtrados por nombre
$sql = "SELECT id, descripcion, precio, stock, codigo_producto, id_marca, id_familia, nombre, id_ubicacion, estado_producto, id_proveedor, imagen FROM producto";
if (!empty($nombre)) {
    $sql .= " WHERE nombre LIKE '%$nombre%'";
}

$respuesta = mysqli_query($conn, $sql);

// Verificar si se obtuvieron resultados
if (mysqli_num_rows($respuesta) > 0) {
    // Convertir los resultados a un arreglo asociativo
    $datos = mysqli_fetch_all($respuesta, MYSQLI_ASSOC);
    // Devolver los datos en formato JSON
    echo json_encode($datos);
} else {
    // No se encontraron resultados, devolver un arreglo vacío
    echo json_encode([]);
}

// Cerrar la conexión a la base de datos
$conn->close();
?>