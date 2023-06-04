<?php
// Establecer la conexión con la base de datos
include 'conexion.php';

// Validar los datos recibidos
// Obtener el JSON recibido y decodificarlo
$json = file_get_contents('php://input');
$data = json_decode($json, true);

// Validar los datos recibidos
if (isset($data['nombre_marca']) ) {

    //asignacion de los valores
    $nombre_marca = $data['nombre_marca'];
   
    
    // Insertar los datos en la tabla "empresas"
    $sql = "INSERT INTO marca (nombre_marca) VALUES ('$nombre_marca')";

    if ($conn->query($sql) === TRUE) {
        echo "la marca de interes se guardo correctamente.";
    } else {
        echo "Error al guardar el marca: " . $conn->error;
    }
} else {
    echo "Debe proporcionar los datos del marca.";
}

// Cerrar la conexión con la base de datos
$conn->close();
?>