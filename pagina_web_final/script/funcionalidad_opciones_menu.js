$(document).ready(function() {
    // Manejar el clic en los enlaces del menú lateral
    $('.menu-option').click(function(e) {
      e.preventDefault(); // Evitar el comportamiento predeterminado del enlace
  
      // Obtener la página a cargar desde el atributo 'data-page' del elemento de la lista
      var page = $(this).data('page');
  
      // Cargar el contenido de la página dentro del div '#main-content'
      $('#main-content').load(page);
    });
  });
