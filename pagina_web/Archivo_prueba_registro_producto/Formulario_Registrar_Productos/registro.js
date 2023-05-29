document.getElementById("registroProductos").addEventListener("submit", function(event) {
    event.preventDefault();
  
    var proveedorData = {
    descripcion: document.getElementById("descripcion").value,
      precio: document.getElementById("precio").value,
      stock: document.getElementById("stock").value,
      codigo_producto: document.getElementById("codigo_producto").value,
      id_marca: document.getElementById("id_marca").value,
      id_familia: document.getElementById("id_familia").value,
      nombre: document.getElementById("nombre").value,
      id_ubicacion: document.getElementById("id_ubicacion").value,
      estado_producto: document.getElementById("estado_producto").value,
      id_proveedor: document.getElementById("id_proveedor").value

    };
  
    // Enviar los datos a la API mediante una solicitud AJAX
    var xhr = new XMLHttpRequest();
    xhr.open("POST","http://localhost/registro/registro_producto.php", true);
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4) {
        if (xhr.status === 200) {
          var response = JSON.parse(xhr.responseText);
          if (response.status === 'success') {
            alert("Productos guardado correctamente.");
            // Restablecer el formulario
            document.getElementById("registroProductos").reset();
          } else {
            alert("Error al guardar el proveedor: " + response.message);
          }
        } else {
          alert("Error en la solicitud AJAX.");
        }
      }
    };
    xhr.send(JSON.stringify(proveedorData));
  });