<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_tienda_computo";

$con = new mysqli($servername, $username, $password, $dbname);

if ($con->connect_error) {
    die("Error en la conexión a la base de datos: " . $conn->connect_error);
}
?>