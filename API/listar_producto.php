<?php
// Establecer la conexión con la base de datos
include 'conexion.php';

// Obtener el valor del parámetro "estado" de la URL
$nombre = isset($_GET['nombre']) ? $_GET['nombre'] : '';

// Consulta SQL para obtener los datos filtrados por estado
$sql = "SELECT id,descripcion,precio,stock,codigo_producto,id_marca,id_familia,nombre,id_ubicacion,estado_producto,id_proveedor FROM producto";

if (!empty($nombre)) {
    $sql .= " WHERE nombre LIKE '%$nombre%'";
}

$result = $conn->query($sql);

// Crear una lista JSON con los datos obtenidos de la base de datos
$lista_json = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $item = array(
            'id' => $row['id'],
            'descripcion' => $row['descripcion'],
            'precio' => $row['precio'],
            'stock' => $row['stock'],
            'codigo_producto' => $row['codigo_producto'],
            'id_marca' => $row['id_marca'],
            'id_familia' => $row['id_familia'],     
            'nombre' => $row['nombre'],     
            'id_ubicacion' => $row['id_ubicacion'],     
            'estado_producto' => $row['estado_producto'],     
            'id_proveedor' => $row['id_proveedor'],     
 

        );
        $lista_json[] = $item;
    }
}

// Devolver la lista JSON como respuesta
header('Content-Type: application/json');
echo json_encode($lista_json);

// Cerrar la conexión a la base de datos
$conn->close();
?>