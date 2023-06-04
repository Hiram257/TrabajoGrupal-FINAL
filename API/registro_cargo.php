<?php
// Establecer la conexión con la base de datos
include 'conexion.php';

// Validar los datos recibidos
$json = file_get_contents('php://input');
$data = json_decode($json, true);

// Validar los datos recibidos
if (isset($data['tipo_cargo'])) {

    // Asignar los valores a las variables
    $tipo_cargo = $data['tipo_cargo'];

    // Insertar los datos en la tabla "cargo"
    $sql = "INSERT INTO cargo (tipo_cargo) VALUES ('$tipo_cargo')";

    if ($conn->query($sql) === TRUE) {
        echo "El cargo se ha registrado correctamente.";
    } else {
        echo "Error al registrar el cargo: " . $conn->error;
    }
} else {
    echo "Debe proporcionar el tipo de cargo.";
}

// Cerrar la conexión con la base de datos
$conn->close();
?>
