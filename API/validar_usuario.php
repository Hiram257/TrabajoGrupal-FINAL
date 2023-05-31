<?php
include 'conexion.php';

$dni = isset($_GET['dni']) ? $_GET['dni'] : '';
$contrasena = isset($_GET['contrasena']) ? $_GET['contrasena'] : '';

// Utilizar una consulta preparada para evitar la inyección de SQL
$sql = "SELECT personal.id as id_personal, dni, contrasena, tipo_cargo FROM personal INNER JOIN cargo ON personal.id_cargo = cargo.id WHERE estado_personal = 1 AND dni = ? AND contrasena = ?";

// Preparar la consulta
$stmt = $conn->prepare($sql);
$stmt->bind_param('ss', $dni, $contrasena);
$stmt->execute();

// Obtener el resultado de la consulta
$result = $stmt->get_result();

// Crear una lista JSON con los datos obtenidos de la base de datos
$lista_json = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $item = array(
            'id_personal' => $row['id_personal'],
            'dni' => $row['dni'],
            'tipo_cargo' => $row['tipo_cargo']
        );
        $lista_json[] = $item;
    }
}

// Devolver la lista JSON como respuesta
header('Content-Type: application/json');

if (empty($lista_json)) {
    // Si el resultado está vacío, devolver un JSON indicando que no se encontraron datos
    echo json_encode(array('message' => 'No se encontraron datos.'));
} else {
    // Si se encontraron datos, devolver la lista JSON
    echo json_encode($lista_json);
}

// Cerrar la conexión a la base de datos
$stmt->close();
$conn->close();
?>