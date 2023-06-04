<?php
// Establecer la conexión con la base de datos
include 'conexion.php';

// Validar los datos recibidos
$json = file_get_contents('php://input');
$data = json_decode($json, true);

// Validar los datos recibidos
if (isset($data['id']) && isset($data['id_personal']) && isset($data['fecha']) && isset($data['asistencia'])) {

    // Asignar los valores a las variables
    $id = $data['id'];
    $id_personal = $data['id_personal'];
    $fecha = $data['fecha'];
    $asistencia = $data['asistencia'];

    // Actualizar el registro en la tabla "asistencia"
    $sql = "UPDATE asistencia SET id_personal='$id_personal', fecha='$fecha', asistencia='$asistencia' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        if ($conn->affected_rows > 0) {
            echo "La asistencia se ha actualizado correctamente.";
        } else {
            echo "No se encontró ninguna asistencia para actualizar con la ID proporcionada.";
        }
    } else {
        echo "Error al actualizar la asistencia: " . $conn->error;
    }
} else {
    echo "Debe proporcionar todos los datos requeridos para actualizar la asistencia.";
}

// Cerrar la conexión con la base de datos
$conn->close();
?>

