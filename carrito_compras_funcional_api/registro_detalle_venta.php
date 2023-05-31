<?php
// Establecer la conexión con la base de datos
include 'conexion.php';

// Permitir solicitudes desde cualquier origen
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");

// Validar los datos recibidos
$json = file_get_contents('php://input');
$data = json_decode($json, true);

// Validar los datos recibidos
if (isset($data['dni']) && isset($data['nombre_apellido']) && isset($data['id_personal']) && isset($data['numero_serie']) && isset($data['total']) && isset($data['cantidad_producto']) && isset($data['estado_pago']) && isset($data['detalle_venta'])) {

    // Asignar los valores a las variables
    $dni = $data['dni'];
    $nombre_apellido = $data['nombre_apellido'];
    $id_personal = $data['id_personal'];
    $numero_serie = $data['numero_serie'];
    $total = $data['total'];
    $fecha = date("Y-m-d");
    $cantidad_producto = $data['cantidad_producto'];
    $estado_pago = $data['estado_pago'];
    $detalle_venta = $data['detalle_venta'];

    // Iniciar la transacción
    $conn->begin_transaction();

    try {
        // Insertar los datos en la tabla "cliente"
        $sql_cliente = "INSERT INTO cliente (dni, nombre_apellido) VALUES ('$dni', '$nombre_apellido')";
        $conn->query($sql_cliente);
        
        // Obtener el ID del cliente registrado
        $cliente_id = $conn->insert_id;
        
        echo "ID del cliente registrado: " . $cliente_id . "\n";

        // Insertar los datos en la tabla "venta"
        $sql_venta = "INSERT INTO `venta` (`id_cliente`, `id_personal`, `numero_serie`, `total`, `fecha`, `cantidad_producto`, `estado_pago`) VALUES ('$cliente_id', '$id_personal', '$numero_serie', '$total', '$fecha', '$cantidad_producto', '$estado_pago')";
        $conn->query($sql_venta);

// Obtener el ID de la venta registrada
$venta_id = $conn->insert_id;

echo "ID de la venta registrada: " . $venta_id . "\n";

// Insertar los datos en la tabla "detalle_venta"
foreach ($detalle_venta as $detalle) {
    $id_producto = $detalle['id_producto'];
    $cantidad = $detalle['cantidad'];
    $precio_total = $detalle['precio_total'];

    $sql_detalle_venta = "INSERT INTO detalle_venta (id_venta, id_producto, cantidad, precio_total) VALUES ('$venta_id', '$id_producto', '$cantidad', '$precio_total')";
    $conn->query($sql_detalle_venta);

    // Obtener el ID del detalle de venta registrado
    $detalle_venta_id = $conn->insert_id;
    
    echo "ID de la detalle venta registrada: " . $detalle_venta_id . "\n";
}
        
        // Confirmar la transacción
        $conn->commit();
    
        // Enviar respuesta de éxito en formato JSON
        echo json_encode(["message" => "El cliente, la venta y el detalle de venta se han guardado correctamente."]);
    } catch (Exception $e) {
        // Revertir la transacción en caso de error
        
    
        // Enviar respuesta de error en formato JSON
        echo json_encode(["error" => "Error al guardar los datos: " . $e->getMessage()]);
    }
}

// Cerrar la conexión con la base de datos
$conn->close();
?>