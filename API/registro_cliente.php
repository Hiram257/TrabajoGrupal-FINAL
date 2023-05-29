<?php
// Establecer la conexión con la base de datos
include 'conexion.php';

// Validar los datos recibidos
$json = file_get_contents('php://input');
$data = json_decode($json, true);

// Validar los datos recibidos
if (isset($data['dni']) && isset($data['nombre_apellido'])) {

    // Asignar los valores a las variables
    $dni = $data['dni'];
    $nombre_apellido = $data['nombre_apellido'];

    // Insertar los datos en la tabla "cliente"
    $sql = "INSERT INTO cliente (dni, nombre_apellido) VALUES ('$dni', '$nombre_apellido')";

    if ($conn->query($sql) === TRUE) {
        echo "El cliente se ha registrado correctamente.";
    } else {
        echo "Error al registrar el cliente: " . $conn->error;
    }
} else {
    echo "Debe proporcionar el DNI y el nombre y apellido del cliente.";
}

// Cerrar la conexión con la base de datos
$conn->close();
?>
