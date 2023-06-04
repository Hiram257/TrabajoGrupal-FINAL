<?php
// Establecer la conexión con la base de datos
include 'conexion.php';

// Validar los datos recibidos
// Obtener el JSON recibido y decodificarlo
$json = file_get_contents('php://input');
$data = json_decode($json, true);

// Validar los datos recibidos
if (isset($data['nombre_ubicacion']) ) {

    //asignacion de los valores
    $nombre_ubicacion = $data['nombre_ubicacion'];
   
    
    // Insertar los datos en la tabla "empresas"
    $sql = "INSERT INTO ubicacion (nombre_ubicacion) VALUES ('$nombre_ubicacion')";

    if ($conn->query($sql) === TRUE) {
        echo "la ubicacion se guardo correctamente.";
    } else {
        echo "Error al guardar la ubicacion: " . $conn->error;
    }
} else {
    echo "Debe proporcionar los datos de la ubicacion.";
}

// Cerrar la conexión con la base de datos
$conn->close();
?>