<?php
// Establecer la conexión con la base de datos
include 'conexion.php';

// Validar los datos recibidos
$json = file_get_contents('php://input');
$data = json_decode($json, true);

// Validar los datos recibidos
if (isset($data['id_personal']) && isset($data['fecha']) && isset($data['asistencia'])) {

    // Asignar los valores a las variables
    $id_personal = $data['id_personal'];
    $fecha = $data['fecha'];
    $asistencia = $data['asistencia'];

    // Insertar los datos en la tabla "asistencia"
    $sql = "INSERT INTO asistencia (id_personal, fecha, asistencia) VALUES ('$id_personal', '$fecha', '$asistencia')";

    if ($conn->query($sql) === TRUE) {
        echo "La asistencia se ha registrado correctamente.";
    } else {
        echo "Error al registrar la asistencia: " . $conn->error;
    }
} else {
    echo "Debe proporcionar todos los datos requeridos para la asistencia.";
}

// Cerrar la conexión con la base de datos
$conn->close();
?>
