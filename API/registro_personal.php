<?php
// Establecer la conexión con la base de datos
include 'conexion.php';

// Validar los datos recibidos
// Obtener el JSON recibido y decodificarlo
$json = file_get_contents('php://input');
$data = json_decode($json, true);

// Validar los datos recibidos
if (isset($data['dni']) && isset($data['foto']) && isset($data['nombre_apellido']) && isset($data['contrasena'])&& isset($data['estado_personal']) && isset($data['id_cargo'])) {

    //asignacion de los valores
    $dni = $data['dni'];
    $foto = $data['foto'];
    $nombre_apellido = $data['nombre_apellido'];
    $contrasena = $data['contrasena'];
    $estado_personal = $data['estado_personal'];
    $id_cargo = $data['id_cargo'];


   
    
    // Insertar los datos en la tabla "empresas"
    $sql = "INSERT INTO personal (dni,foto,nombre_apellido,contrasena,estado_personal,id_cargo) VALUES ('$dni','$foto','$nombre_apellido','$contrasena','$estado_personal','    $id_cargo')";

    if ($conn->query($sql) === TRUE) {
        echo "los datos de la tabla familia de interes se guardo correctamente.";
    } else {
        echo "Error al guardar la tabla personal: " . $conn->error;
    }
} else {
    echo "Debe proporcionar los datos de la tabla familia.";
}

// Cerrar la conexión con la base de datos
$conn->close();
?>
