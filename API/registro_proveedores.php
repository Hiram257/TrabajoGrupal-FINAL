<?php
// Establecer la conexión con la base de datos
include 'conexion.php';

// Validar los datos recibidos
// Obtener el JSON recibido y decodificarlo
$json = file_get_contents('php://input');
$data = json_decode($json, true);

// Validar los datos recibidos
if (isset($data['nombre']) && isset($data['direccion']) && isset($data['celular']) && isset($data['tipo_proveedor']) && isset($data['red_social']) ) {

    // Asignar los valores a las variables
    $nombre = $data['nombre'];
    $direccion = $data['direccion'];
    $celular = $data['celular'];
    $tipo_proveedor = $data['tipo_proveedor'];
    $red_social = $data['red_social'];
   
    // Insertar los datos en la tabla "venta"
    $sql = "INSERT INTO provedores (nombre, direccion, celular, tipo_provedor, red_social) VALUES ('$nombre', '$direccion', '$celular', '$tipo_proveedor','$red_social')";

    if ($conn->query($sql) === TRUE) {
        echo "El proveedor se ha guardado correctamente.";
    } else {
        echo "Error al guardar el proveedor: " . $conn->error;
    }
} else {
    echo "Debe proporcionar todos los datos requeridos del proveedor .";
}

// Cerrar la conexión con la base de datos
$conn->close();
?>