<?php
// Establecer la conexión con la base de datos
include 'conexion.php';

// Validar los datos recibidos
// Obtener el JSON recibido y decodificarlo
$json = file_get_contents('php://input');
$data = json_decode($json, true);

// Validar los datos recibidos
if (isset($data['id_cliente']) && isset($data['id_personal']) && isset($data['numero_serie']) && isset($data['total']) && isset($data['fecha_hora']) && isset($data['cantidad_producto']) && isset($data['estado_pago']) ) {

    // Asignar los valores a las variables
    $id_cliente = $data['id_cliente'];
    $id_personal = $data['id_personal'];
    $numero_serie = $data['numero_serie'];
    $total = $data['total'];
    $fecha_hora = $data['fecha_hora'];
    $cantidad_producto = $data['cantidad_producto'];
    $estado_pago = $data['estado_pago'];
   
    // Insertar los datos en la tabla "venta"
    $sql = "INSERT INTO venta (id_cliente, id_personal, numero_serie, total, fecha_hora, cantidad_producto, estado_pago) VALUES ('$id_cliente', '$id_personal', '$numero_serie', '$total', '$fecha_hora', '$cantidad_producto', '$estado_pago')";

    if ($conn->query($sql) === TRUE) {
        echo "La venta se ha guardado correctamente.";
    } else {
        echo "Error al guardar la venta: " . $conn->error;
    }
} else {
    echo "Debe proporcionar todos los datos requeridos de la venta.";
}

// Cerrar la conexión con la base de datos
$conn->close();
?>