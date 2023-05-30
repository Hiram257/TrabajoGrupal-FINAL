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
&& isset($data['imagenes'])

 )


 {

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
    $imagenes = $data['imagenes'];


    // Insertar los datos en la tabla "empresas"
    $sql = "INSERT INTO producto (descripcion,precio,stock,codigo_producto,id_marca,id_familia,nombre,id_ubicacion,estado_producto,id_proveedor,imagenes) VALUES ('$discripcion','$precio','$stock','$codigo_producto','$id_marca','$id_familia','$nombre','$id_ubicacion','$estado_producto','$id_proveedor','$imagenes')";
    if ($conn->query($sql) === TRUE) {
        $response = array(
            'status' => 'success',
            'message' => 'Producto guardado correctamente.'
        );
        echo json_encode($response);

    } else {
        $response = array(
            'status' => 'error',
            'message' => 'Error al guardar el proveedor: ' . $conn->error
        );
        echo json_encode($response);    }
} else {
    $response = array(
        'status' => 'error',
        'message' => 'Debe proporcionar todos los datos requeridos del proveedor.'
    );
    echo json_encode($response);}

// Cerrar la conexión con la base de datos
$conn->close();
?>
