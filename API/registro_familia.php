<?php
// Establecer la conexión con la base de datos
include 'conexion.php';

// Validar los datos recibidos
// Obtener el JSON recibido y decodificarlo
$json = file_get_contents('php://input');
$data = json_decode($json, true);

// Validar los datos recibidos
if (isset($data['nombre_familia']) ) {

    //asignacion de los valores
    $nombre_familia = $data['nombre_familia'];
   
    
    // Insertar los datos en la tabla "empresas"
    $sql = "INSERT INTO familia (nombre_familia) VALUES ('$nombre_familia')";

    if ($conn->query($sql) === TRUE) {
        echo "los datos de la tabla familia de interes se guardo correctamente.";
    } else {
        echo "Error al guardar la tabla familia: " . $conn->error;
    }
} else {
    echo "Debe proporcionar los datos de la tabla familia.";
}

// Cerrar la conexión con la base de datos
$conn->close();
?>
