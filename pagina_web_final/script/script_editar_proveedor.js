window.onload = function() {
    // Obtener los parámetros de la URL
    var parametros = obtenerParametrosURL();
    
    // Prellenar los campos del formulario con los datos del proveedor
    document.getElementById('idInput').value = parametros.id || '';
    document.getElementById('nombreInput').value = parametros.nombre || '';
    document.getElementById('direccionInput').value = parametros.direccion || '';
    document.getElementById('celularInput').value = parametros.celular || '';
    document.getElementById('tipoProveedorInput').value = parametros.tipoProveedor || '';
    document.getElementById('redSocialInput').value = parametros.redSocial || '';
};

function obtenerParametrosURL() {
    var parametros = {};
    var url = window.location.search.substring(1);
    var paresParametros = url.split('&');
    
    for (var i = 0; i < paresParametros.length; i++) {
        var par = paresParametros[i].split('=');
        var nombre = decodeURIComponent(par[0]);
        var valor = decodeURIComponent(par[1]);
        
        if (nombre) {
            parametros[nombre] = valor;
        }
    }
    
    return parametros;
}

function guardarCambios() {
    // Obtener los valores actualizados del formulario
    var id = document.getElementById('idInput').value;
    var nombre = document.getElementById('nombreInput').value;
    var direccion = document.getElementById('direccionInput').value;
    var celular = document.getElementById('celularInput').value;
    var tipoProveedor = document.getElementById('tipoProveedorInput').value;
    var redSocial = document.getElementById('redSocialInput').value;

    // Crear un objeto con los datos del proveedor actualizados
    var proveedorActualizado = {
        id:id,
        nombre: nombre,
        direccion: direccion,
        celular: celular,
        tipo_proveedor: tipoProveedor,
        red_social: redSocial,
        estado:1
    };
    

    // Enviar los datos a la API mediante una solicitud AJAX
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "http://localhost/tienda_computo/TrabajoGrupal-FINAL/API/modificar_proveedor.php", true);
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4) {
        if (xhr.status === 200) {
          var response = JSON.parse(xhr.responseText);
          if (response.status === 'success') {
            alert("Proveedor guardado correctamente.");
            // Redirigir a la página de destino después de guardar los cambios
            window.location.href = 'listar_proveedores.html';
            // Restablecer el formulario
            document.getElementById("proveedorForm").reset();
          } else {
            alert("Error al guardar el proveedor: " + response.message);
          }
        } else {
          alert("Error en la solicitud AJAX.");
        }
      }
    };
    xhr.send(JSON.stringify(proveedorActualizado));
}