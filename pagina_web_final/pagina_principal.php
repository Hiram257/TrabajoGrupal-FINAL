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
            <li class="menu-option" data-page="carrito_compras.html"><a href="#">Opción 2</a></li>
            <li class="menu-option" data-page="pagina3.php"><a href="#">Opción 3</a></li>
            <!-- Agrega más opciones según sea necesario -->
        </ul>
    </div>
    <div id="main-content">
        <!-- Aquí se cargará el contenido seleccionado -->
    </div>

    <script src="script/funcionalidad_opciones_menu.js"></script>
    
</body>
</html>