<link rel="stylesheet" type="text/css" href="style/diseño_listar_proveedores.css">
<section class="contenedor_listar_usuario">
<h1>Lista de Proveedores</h1>
    <input type="text" id="nombreInput" placeholder="Buscar por nombre">
    <button onclick="buscarProveedores()">Buscar</button>
    <table id="tablaProveedores">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Dirección</th>
            <th>Celular</th>
            <th>Tipo de Proveedor</th>
            <th>Red Social</th>
            <th>Acciones</th>
        </tr>
       
    </table>
</section>


    
    <script src="script/funcionalidades.js"></script>
    <script src="script/script_listar_proveedor.js"></script>