function editarProveedor(proveedorId) {
  var tabla = document.getElementById('tablaProveedores');
  var filas = tabla.getElementsByTagName('tr');

  for (var i = 0; i < filas.length; i++) {
    var celdas = filas[i].cells;
    var idProveedor = celdas[0].textContent;
    console.log("idproveedor   "+idProveedor);
    console.log("proveedorId  "+proveedorId);
    console.log("-------------");
    if (idProveedor == proveedorId) {
      // Obtener los datos de la fila seleccionada
      var nombre = celdas[1].textContent;
      var direccion = celdas[2].textContent;
      var celular = celdas[3].textContent;
      var tipoProveedor = celdas[4].textContent;
      var redSocial = celdas[5].textContent;

      // Construir la URL de la página de edición con los datos como parámetros
      var urlEditarProveedor = 'editar_proveedor.html?id=' + encodeURIComponent(idProveedor) +
        '&nombre=' + encodeURIComponent(nombre) +
        '&direccion=' + encodeURIComponent(direccion) +
        '&celular=' + encodeURIComponent(celular) +
        '&tipoProveedor=' + encodeURIComponent(tipoProveedor) +
        '&redSocial=' + encodeURIComponent(redSocial);

      // Redirigir a la página de edición
      window.location.href = urlEditarProveedor;
      return; // Salir del bucle una vez que se haya encontrado la fila correspondiente
    }
  }

  console.log('Proveedor no encontrado');
}
  
function eliminarProveedor(proveedorId) {
  var confirmacion = confirm("¿Estás seguro de que deseas eliminar este proveedor?");
  if (confirmacion) {
      console.log('Eliminar proveedor ID:', proveedorId);

      var tabla = document.getElementById('tablaProveedores');
      var filas = tabla.getElementsByTagName('tr');

      for (var i = 0; i < filas.length; i++) {
          var celdas = filas[i].cells;
          var idProveedor = celdas[0].textContent;
          console.log("idproveedor   " + idProveedor);
          console.log("proveedorId  " + proveedorId);
          console.log("-------------");
          if (idProveedor == proveedorId) {
              // Obtener los datos de la fila seleccionada
              var nombre = celdas[1].textContent;
              var direccion = celdas[2].textContent;
              var celular = celdas[3].textContent;
              var tipoProveedor = celdas[4].textContent;
              var redSocial = celdas[5].textContent;

              // Crear un objeto con los datos del proveedor actualizados
              var proveedorActualizado = {
                  id: proveedorId,
                  nombre: nombre,
                  direccion: direccion,
                  celular: celular,
                  tipo_proveedor: tipoProveedor,
                  red_social: redSocial,
                  estado: 0
              };

              // Enviar los datos a la API mediante una solicitud AJAX
              var xhr = new XMLHttpRequest();
              xhr.open("POST", "http://localhost/tienda_computo/TrabajoGrupal-FINAL/API/modificar_proveedor.php", true);
              xhr.setRequestHeader("Content-Type", "application/json");
              xhr.onreadystatechange = function () {
                  if (xhr.readyState === 4) {
                      if (xhr.status === 200) {
                          var response = JSON.parse(xhr.responseText);
                          if (response.status === 'success') {
                              alert("Proveedor eliminado correctamente.");
                              // Redirigir a la página de lista de proveedores después de eliminar
                              window.location.href = 'listar_proveedores.html';
                          } else {
                              alert("Error al eliminar el proveedor: " + response.message);
                          }
                      } else {
                          alert("Error en la solicitud AJAX.");
                      }
                  }
              };
              xhr.send(JSON.stringify(proveedorActualizado));

              return; // Salir del bucle una vez que se haya encontrado la fila correspondiente
          }
      }
  }
}

  function guardarNuevoProveedores(){
    window.location.href = 'pagina_principal.php';
  }