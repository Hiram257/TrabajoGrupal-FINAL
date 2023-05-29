<?php
// Establecer la conexión con la base de datos
include 'conexion.php';

// Validar los datos recibidos
$json = file_get_contents('php://input');
$data = json_decode($json, true);

// Validar los datos recibidos
if (isset($data['id']) && isset($data['dni']) && isset($data['nombre_apellido'])) {

    // Asignar los valores a las variables
    $id = $data['id'];
    $dni = $data['dni'];
    $nombre_apellido = $data['nombre_apellido'];

    // Actualizar el registro en la tabla "cliente"
    $sql = "UPDATE cliente SET dni='$dni', nombre_apellido='$nombre_apellido' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        if ($conn->affected_rows > 0) {
            echo "El cliente se ha actualizado correctamente.";
        } else {
            echo "No se encontró ningún registro para actualizar con la ID proporcionada.";
        }
    } else {
        echo "Error al actualizar el cliente: " . $conn->error;
    }
} else {
    echo "Debe proporcionar todos los datos requeridos para actualizar el cliente.";
}

// Cerrar la conexión con la base de datos
$conn->close();
?>


