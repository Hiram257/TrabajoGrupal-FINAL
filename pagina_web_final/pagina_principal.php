<!DOCTYPE html>
<html>
<head>
    <title>Menú Lateral</title>
    <link rel="stylesheet" type="text/css" href="style/diseño_menu.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   
</head>
<body>
    <div class="sidebar">
        <ul>
            <li class="menu-option" data-page="listar_proveedores.php"><a href="#">Lista de Proveedores</a></li>
            <li class="menu-option" data-page="carrito_compras.html"><a href="#">Ventas</a></li>
            <li class="menu-option" data-page="registro_producto.php"><a href="#">Registrar Productos</a></li>
            <li class="menu-option" data-page="reporte_ventas.php"><a href="#">Reporte Ventas</a></li>
            <li class="menu-option" data-page="DescargarReporte_x_fecha.php"><a href="#">Reporte Ventas</a></li>
            <li class="menu-option" data-page="filtro.php"><a href="#">Reporte Ventas</a></li>
            <!-- Agrega más opciones según sea necesario -->
        </ul>
    </div>
    <div id="main-content">
        <!-- Aquí se cargará el contenido seleccionado -->
    </div>

    <script src="script/funcionalidad_opciones_menu.js"></script>
    
</body>
</html>