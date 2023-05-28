<?php
// Establecer la conexión con la base de datos
include 'conexion.php';

// Validar los datos recibidos
// Obtener el JSON recibido y decodificarlo
$json = file_get_contents('php://input');
$data = json_decode($json, true);

// Validar los datos recibidos
if (isset($data['id_venta']) && isset($data['id_producto']) && isset($data['cantidad']) && isset($data['precio_total']) ) {

    // Asignar los valores a las variables
    $id_venta = $data['id_venta'];
    $id_producto = $data['id_producto'];
    $cantidad = $data['cantidad'];
    $precio_total = $data['precio_total'];
    
   
    // Insertar los datos en la tabla "venta"
    $sql = "INSERT INTO detalle_venta (id_venta, id_producto, cantidad, precio_total) VALUES ('$id_venta', '$id_producto', '$cantidad', '$precio_total')";

    if ($conn->query($sql) === TRUE) {
        echo "El detalle venta se ha guardado correctamente.";
    } else {
        echo "Error al guardar el detalle venta: " . $conn->error;
    }
} else {
    echo "Debe proporcionar todos los datos requeridos del detalle venta.";
}

// Cerrar la conexión con la base de datos
$conn->close();
?>