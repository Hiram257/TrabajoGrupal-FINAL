<?php
// Establecer la conexión con la base de datos
include 'conexion.php';

// Obtener el valor del parámetro "id_personal" de la URL
$id_personal = isset($_GET['id_personal']) ? $_GET['id_personal'] : '';

// Consulta SQL para obtener los datos filtrados por id_personal si se proporciona, de lo contrario obtener todos los datos
$sql = "SELECT id, id_personal, fecha, asistencia FROM asistencia";
if (!empty($id_personal)) {
    $sql .= " WHERE id_personal = '$id_personal'";
}

$result = $conn->query($sql);

// Crear una lista JSON con los datos obtenidos de la base de datos
$lista_json = array();
if ($result !== false && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $item = array(
            'id' => $row['id'],
            'id_personal' => $row['id_personal'],
            'fecha' => $row['fecha'],
            'asistencia' => $row['asistencia'],
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
