function driner() {
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
      id_proveedor: document.getElementById("id_proveedor").value,
      imagen: document.getElementById("file").files[0].name
    };
  
    // Enviar los datos a la API mediante una solicitud fetch
    fetch("http://localhost/tienda_computo/TrabajoGrupal-FINAL/API/registro_producto.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/json"
      },
      body: JSON.stringify(proveedorData)
    })
      .then(response => response.json())
      .then(data => {
        if (data.status === 'success') {
          console.log("Productos guardados correctamente.");
        alert("Producto guardado correctamente");
          // Restablecer el formulario
          document.getElementById("registroProductos").reset();
        } else {
          console.log("Error al guardar el proveedor: " + data.message);
        }
      })
      .catch(error => {
        console.log("Error en la solicitud fetch: " + error);
      });
  }