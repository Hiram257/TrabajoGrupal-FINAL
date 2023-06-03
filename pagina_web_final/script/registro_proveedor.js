document.getElementById("proveedorForm").addEventListener("submit", function(event) {
    event.preventDefault();
  
    var proveedorData = {
      nombre: document.getElementById("nombre").value,
      direccion: document.getElementById("direccion").value,
      celular: document.getElementById("celular").value,
      tipo_proveedor: document.getElementById("tipo_proveedor").value,
      red_social: document.getElementById("red_social").value
    };
  
    // Enviar los datos a la API mediante una solicitud AJAX
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "http://localhost/tienda_computo/TrabajoGrupal-FINAL/API/registro_proveedores.php", true);
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4) {
        if (xhr.status === 200) {
          var response = JSON.parse(xhr.responseText);
          if (response.status === 'success') {
            alert("Proveedor guardado correctamente.");
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
    xhr.send(JSON.stringify(proveedorData));
  });