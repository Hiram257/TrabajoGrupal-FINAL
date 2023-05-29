<!DOCTYPE html>
<html>
<head>
  <title>Buscar Productos</title>
  <link rel="stylesheet" href="stilos.css">
  <script>
    function buscarProductos() {
      var nombre = document.getElementById('nombreInput').value;
      var url = 'http://localhost/registro/listar_producto.php?nombre=' + encodeURIComponent(nombre);


      fetch(url)
        .then(response => response.json())
        .then(data => {
          var tabla = document.getElementById('tablaProveedores');
          tabla.innerHTML = ''; // Limpiar la tabla antes de agregar los nuevos datos

          // Agregar filas a la tabla con los datos de los productos
          data.forEach(proveedor => {
            var row = tabla.insertRow();
            row.insertCell().textContent = proveedor.id;
            row.insertCell().textContent = proveedor.descripcion;
            row.insertCell().textContent = proveedor.precio;
            row.insertCell().textContent = proveedor.stock;
            row.insertCell().textContent = proveedor.codigo_producto;
            row.insertCell().textContent = proveedor.id_marca;
            row.insertCell().textContent = proveedor.id_familia;
            row.insertCell().textContent = proveedor.nombre;
            row.insertCell().textContent = proveedor.id_ubicacion;
            row.insertCell().textContent = proveedor.estado_producto;
            row.insertCell().textContent = proveedor.id_proveedor;



          });
        })
        .catch(error => {
          console.log('Error:', error);
        });
    }
  </script>
</head>
<body>
    <div class="table-container">
  <h1>Buscar Productos</h1>
  <label for="nombreInput">Nombre:</label>
  <input type="text" id="nombreInput" name="nombreInput">
  <button onclick="buscarProductos()">Buscar</button>

  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Descripcion</th>
        <th>Precio</th>
        <th>Stock</th>
        <th>Codigo Producto</th>
        <th>Marca</th>
        <th>Familia</th>
        <th>Nombre</th>
        <th>Ubicacion</th>
        <th>Estado Producto</th>
        <th>Proveedor</th>
      </tr>
    </thead>
    <tbody id="tablaProveedores">
      <!-- Las filas de productos se agregarán dinámicamente aquí -->
    </tbody>
  </table>
  </div>
</body>
</html>
