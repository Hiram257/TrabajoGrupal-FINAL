<?php
// Establecer la conexión con la base de datos
include 'conexion.php';

// Validar los datos recibidos
// Obtener el JSON recibido y decodificarlo
$json = file_get_contents('php://input');
$data = json_decode($json, true);

// Validar los datos recibidos
if (isset($data['descripcion']) 
&& isset($data['precio']) 
&& isset($data['stock']) 
&& isset($data['codigo_producto'])
&& isset($data['id_marca'])
&& isset($data['id_familia'])
&& isset($data['nombre'])
&& isset($data['id_ubicacion'])
&& isset($data['estado_producto'])
&& isset($data['id_proveedor'])
&& isset($data['imagen'])) {

    //asignacion de los valores
    $discripcion = $data['descripcion'];
    $precio = $data['precio'];
    $stock = $data['stock'];
    $codigo_producto = $data['codigo_producto'];
    $id_marca=$data['id_marca'];
    $id_familia = $data['id_familia'];
    $nombre = $data['nombre'];
    $id_ubicacion = $data['id_ubicacion'];
    $estado_producto = $data['estado_producto'];
    $id_proveedor = $data['id_proveedor'];
    $imagen = $data['imagen'];

    // Insertar los datos en la tabla "empresas"
    $sql = "INSERT INTO producto (descripcion,precio,stock,codigo_producto,id_marca,id_familia,nombre,id_ubicacion,estado_producto,id_proveedor,imagen) VALUES ('$discripcion','$precio','$stock','$codigo_producto','$id_marca','$id_familia','$nombre','$id_ubicacion','$estado_producto','$id_proveedor','$imagen')";
    if ($conn->query($sql) === TRUE) {
        echo "los datos de la tabla productos de interes se guardo correctamente.";
    } else {
        echo "Error al guardar la tabla productos: " . $conn->error;
    }
} else {
    echo "Debe proporcionar los datos de la tabla familia.";
}

// Cerrar la conexión con la base de datos
$conn->close();
?>

