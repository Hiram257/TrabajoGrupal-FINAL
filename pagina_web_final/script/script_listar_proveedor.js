window.onload = function() {
    buscarProveedores();
};

function buscarProveedores() {
    var nombre = document.getElementById('nombreInput').value;
    var url = 'http://localhost/tienda_computo/TrabajoGrupal-FINAL/API/listar_proveedores.php?nombre=' + encodeURIComponent(nombre);
  
    fetch(url)
      .then(response => response.json())
      .then(data => {
        var tabla = document.getElementById('tablaProveedores');
  
        // Eliminar filas de datos existentes
        var filasDatos = tabla.getElementsByClassName('fila-datos');
        while (filasDatos.length > 0) {
          filasDatos[0].parentNode.removeChild(filasDatos[0]);
        }
  
        // Agregar filas de datos a la tabla
        data.forEach(proveedor => {
          var row = tabla.insertRow();
          row.className = 'fila-datos';
          row.insertCell().textContent = proveedor.id;
          row.insertCell().textContent = proveedor.nombre;
          row.insertCell().textContent = proveedor.direccion;
          row.insertCell().textContent = proveedor.celular;
          row.insertCell().textContent = proveedor.tipo_provedor;
          row.insertCell().textContent = proveedor.red_social;
          row.insertCell().innerHTML = '<td><button onclick="editarProveedor(' + proveedor.id + ')">Editar</button><button onclick="eliminarProveedor(' + proveedor.id + ')">Eliminar</button></td>';
        });
      })
      .catch(error => {
        console.log('Error:', error);
      });
  }
