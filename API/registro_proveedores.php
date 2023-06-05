<?php
// Establecer la conexión con la base de datos
include 'conexion.php';

// Configurar los encabezados CORS
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

// Validar los datos recibidos
// Obtener el JSON recibido y decodificarlo
$json = file_get_contents('php://input');
$data = json_decode($json, true);

// Validar los datos recibidos
if (isset($data['nombre']) && isset($data['direccion']) && isset($data['celular']) && isset($data['tipo_proveedor']) && isset($data['red_social'])) {

    // Asignar los valores a las variables
    $nombre = $data['nombre'];
    $direccion = $data['direccion'];
    $celular = $data['celular'];
    $tipo_proveedor = $data['tipo_proveedor'];
    $red_social = $data['red_social'];

    // Insertar los datos en la tabla "provedores"
    $sql = "INSERT INTO provedores (nombre, direccion, celular, tipo_provedor, red_social,estado) VALUES ('$nombre', '$direccion', '$celular', '$tipo_proveedor', '$red_social',1)";

    if ($conn->query($sql) === TRUE) {
        // Éxito en la inserción, enviar respuesta al cliente
        $response = array(
            'status' => 'success',
            'message' => 'Proveedor guardado correctamente.'
        );
        echo json_encode($response);
    } else {
        // Error en la inserción, enviar respuesta al cliente
        $response = array(
            'status' => 'error',
            'message' => 'Error al guardar el proveedor: ' . $conn->error
        );
        echo json_encode($response);
    }
} else {
    // Datos faltantes, enviar respuesta al cliente
    $response = array(
        'status' => 'error',
        'message' => 'Debe proporcionar todos los datos requeridos del proveedor.'
    );
    echo json_encode($response);
}

// Cerrar la conexión con la base de datos
$conn->close();
?>