$(document).ready(function() {
    // Evento click para las opciones del menú
    $('.menu-option').click(function() {
        var page = $(this).attr('data-page');
        // Cargar contenido en el área principal
        $('#main-content').load(page);
        
    });
});

