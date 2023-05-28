<?php
// Establecer la conexión con la base de datos
include 'conexion.php';

// Obtener el valor del parámetro "estado" de la URL
$nombre = isset($_GET['nombre']) ? $_GET['nombre'] : '';

// Consulta SQL para obtener los datos filtrados por estado
$sql = "SELECT id, nombre, direccion, celular, tipo_provedor, red_social FROM provedores";

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
            'nombre' => $row['nombre'],
            'direccion' => $row['direccion'],
            'celular' => $row['celular'],
            'tipo_provedor' => $row['tipo_provedor'],
            'red_social' => $row['red_social'],     
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