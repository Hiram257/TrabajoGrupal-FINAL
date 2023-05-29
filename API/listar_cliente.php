<?php
// Establecer la conexión con la base de datos
include 'conexion.php';

// Obtener el valor del parámetro "dni" de la URL
$dni = isset($_GET['dni']) ? $_GET['dni'] : '';

// Consulta SQL para obtener los datos filtrados por dni si se proporciona, de lo contrario obtener todos los datos
$sql = "SELECT id, dni, nombre_apellido FROM cliente";
if (!empty($dni)) {
    $sql .= " WHERE dni = '$dni'";
}

$result = $conn->query($sql);

// Crear una lista JSON con los datos obtenidos de la base de datos
$lista_json = array();
if ($result !== false && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $item = array(
            'id' => $row['id'],
            'dni' => $row['dni'],
            'nombre_apellido' => $row['nombre_apellido'],
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
