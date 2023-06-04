<?php
// Establecer la conexión con la base de datos
include 'conexion.php';

// Validar los datos recibidos
$json = file_get_contents('php://input');
$data = json_decode($json, true);

// Validar los datos recibidos
if (isset($data['id']) && isset($data['tipo_cargo'])) {

    // Asignar los valores a las variables
    $id = $data['id'];
    $tipo_cargo = $data['tipo_cargo'];

    // Actualizar el registro en la tabla "cargo"
    $sql = "UPDATE cargo SET tipo_cargo='$tipo_cargo' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        if ($conn->affected_rows > 0) {
            echo "El cargo se ha actualizado correctamente.";
        } else {
            echo "No se encontró ningún registro para actualizar con la ID proporcionada.";
        }
    } else {
        echo "Error al actualizar el cargo: " . $conn->error;
    }
} else {
    echo "Debe proporcionar todos los datos requeridos para actualizar el cargo.";
}

// Cerrar la conexión con la base de datos
$conn->close();
?>
