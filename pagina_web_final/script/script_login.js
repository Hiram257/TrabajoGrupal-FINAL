const dniInput = document.getElementById('dni');
const contrasenaInput = document.getElementById('Contrasena');
const ingresarBtn = document.querySelector('.btn');

document.addEventListener('DOMContentLoaded', function() {
    ingresarBtn.addEventListener('click', function(event) {
      event.preventDefault(); // Evitar el comportamiento por defecto del botón
  
      const dni = dniInput.value;
      const contrasena = contrasenaInput.value;
  
      // Realizar la llamada a la API para validar el inicio de sesión
      fetch(`http://localhost/tienda_computo/TrabajoGrupal-FINAL/API/validar_usuario.php?dni=${dni}&contrasena=${contrasena}`)
        .then(response => response.json())
        .then(data => {
          if (data.length > 0) {
            console.log('Inicio de sesión exitoso');
            const tipoCargo = data[0].tipo_cargo;
            if (tipoCargo === 'venta') {
              // Redirigir a la página de ventas
              window.location.href = 'pagina_principal.php';
            } else if (tipoCargo === 'administrador') {
              // Redirigir a la página de administrador
              window.location.href = 'https://www.youtube.com/watch?v=bqAD6i8Dlyk';
            }
          } else {
            console.log('Credenciales inválidas');
            // Aquí puedes mostrar un mensaje de error o realizar acciones cuando las credenciales son inválidas
          }
        })
        .catch(error => {
          console.log('Error al hacer la solicitud:', error);
          // Manejar el error en caso de que ocurra
        });
  
      // Limpiar los campos de entrada después de procesar el formulario
      dniInput.value = '';
      contrasenaInput.value = '';
    });
  });