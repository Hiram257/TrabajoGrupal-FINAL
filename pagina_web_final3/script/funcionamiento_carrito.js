fetch('http://localhost/tienda_computo/TrabajoGrupal-FINAL/API/listar_producto.php')
    .then(resultado=> resultado.json()) 
    .then(respuesta=>{
      var tabla = document.querySelector('.contenedor-items');

        respuesta.forEach(elemento=>{
        tabla.innerHTML+=`<div class="item">
      <span class="titulo-item">${elemento.nombre}</span>
      <img src="fotos_productos/${elemento.imagen}" alt="" class="img-item">
      <span class="precio-item">${elemento.precio}</span>
      <span class="id_item">${elemento.id}</span>
      <button class="boton-item">Agregar al Carrito</button>
  </div>`
        });


        var carritoVisible = false;

if(document.readyState == 'loading'){
  document.addEventListener('DOMContentLoaded', ready)
}else{
  ready();
}

function ready(){

  //Agregremos funcionalidad a los botones eliminar del carrito
  var botonesEliminarItem = document.getElementsByClassName('btn-eliminar');
  for(var i=0;i<botonesEliminarItem.length; i++){
      var button = botonesEliminarItem[i];
      button.addEventListener('click',eliminarItemCarrito);
  }

  //Agrego funcionalidad al boton sumar cantidad
  var botonesSumarCantidad = document.getElementsByClassName('sumar-cantidad');
  for(var i=0;i<botonesSumarCantidad.length; i++){
      var button = botonesSumarCantidad[i];
      button.addEventListener('click',sumarCantidad);
  }

   //Agrego funcionalidad al buton restar cantidad
  var botonesRestarCantidad = document.getElementsByClassName('restar-cantidad');
  for(var i=0;i<botonesRestarCantidad.length; i++){
      var button = botonesRestarCantidad[i];
      button.addEventListener('click',restarCantidad);
  }

  //Agregamos funcionalidad al boton Agregar al carrito
  var botonesAgregarAlCarrito = document.getElementsByClassName('boton-item');
  for(var i=0; i<botonesAgregarAlCarrito.length;i++){
      var button = botonesAgregarAlCarrito[i];
      button.addEventListener('click', agregarAlCarritoClicked);
  }

  //Agregamos funcionalidad al botón comprar
  document.getElementsByClassName('btn-pagar')[0].addEventListener('click',pagarClicked)
}
//Eliminamos todos los elementos del carrito y lo ocultamos
// Función que controla el botón "Pagar"
function pagarClicked() {

  var dni = document.getElementById("dni").value;
  var nombreApellido = document.getElementById("nombre").value;
  var idPersonal = document.getElementById("id_personal").value;
  var numeroSerie = document.getElementById("numero_serie").value;
 
  var totalElemento = document.querySelector('.carrito-precio-total');
  var total = totalElemento.innerText;
  console.log(total)

  var carritoItems = document.getElementsByClassName('carrito-item');
  var detalleVenta = [];
  
  // Recorre los elementos del carrito y construye el array de items
  for (var i = 0; i < carritoItems.length; i++) {
    var item = carritoItems[i];
    var id_producto = item.getElementsByClassName('carrito-item-id')[0].innerText;
    var cantidad = item.getElementsByClassName('carrito-item-cantidad')[0].value;
    var precio_total = item.getElementsByClassName('carrito-item-precio')[0].innerText;
    

    var detalleVentaData = {
      id_producto: id_producto,
      cantidad: cantidad,
      precio_total: precio_total,
    };
  
    detalleVenta.push(detalleVentaData);
  }
  
  
  var ventaData = {
    "dni": dni,
    "nombre_apellido": nombreApellido,
    "id_personal": idPersonal,
    "numero_serie": numeroSerie,
    "total": total,
    "cantidad_producto": carritoItems.length,
    "estado_pago": 1,
    "detalle_venta": detalleVenta
  };
console.log(ventaData)

// Enviar los datos al servidor utilizando tu API
fetch('http://localhost/tienda_computo/TrabajoGrupal-FINAL/API/registro_cliente_venta_detalle_venta.php', {
  method: 'POST',
  headers: {
    'Content-Type': 'application/json'
  },
  body: JSON.stringify(ventaData)
})
  // .then(response => response.json())
  // .then(data => {
  //   console.log(data);
  // })
  // .catch(error => {
  //   console.error('Error:', error);
  // });

// Elimina los elementos del carrito y oculta el carrito
var carritoItemsContainer = document.getElementsByClassName('carrito-items')[0];
while (carritoItemsContainer.hasChildNodes()) {
  carritoItemsContainer.removeChild(carritoItemsContainer.firstChild);
}
actualizarTotalCarrito();
ocultarCarrito();

alert('Gracias por la compra');
  
}
//Funciòn que controla el boton clickeado de agregar al carrito
function agregarAlCarritoClicked(event){
  var button = event.target;
  var item = button.parentElement;
  var titulo = item.getElementsByClassName('titulo-item')[0].innerText;
  var id = item.getElementsByClassName('id_item')[0].innerText;
  var precio_fijo = item.getElementsByClassName('precio-item')[0].innerText;
  var precio = item.getElementsByClassName('precio-item')[0].innerText;
  var imagenSrc = item.getElementsByClassName('img-item')[0].src;
 
  console.log(imagenSrc);

  agregarItemAlCarrito(titulo, precio, imagenSrc,id,precio_fijo);

  hacerVisibleCarrito();
}

//Funcion que hace visible el carrito
function hacerVisibleCarrito(){
  carritoVisible = true;
  var carrito = document.getElementsByClassName('carrito')[0];
  carrito.style.marginRight = '0';
  carrito.style.opacity = '1';

  var items =document.getElementsByClassName('contenedor-items')[0];
  items.style.width = '60%';
}

// Función que agrega un item al carrito
function agregarItemAlCarrito(titulo, precio, imagenSrc, id, precio_fijo) {
  var item = document.createElement('div');
  item.classList.add('item');
  var itemsCarrito = document.getElementsByClassName('carrito-items')[0];

  // Controlamos que el item que intenta ingresar no se encuentre en el carrito
  var nombresItemsCarrito = itemsCarrito.getElementsByClassName('carrito-item-titulo');
  for (var i = 0; i < nombresItemsCarrito.length; i++) {
    if (nombresItemsCarrito[i].innerText == titulo) {
      alert("El item ya se encuentra en el carrito");
      return;
    }
  }

  // Corregir el formato del precio antes de convertirlo a número
  var precioNumero = parseFloat(precio.replace('$', '').replace(',', ''));

  var itemCarritoContenido = `
      <div class="carrito-item">
          <img src="${imagenSrc}" width="80px" alt="">
          <div class="carrito-item-detalles">
              <span class="carrito-item-id"></span>
              <span class="carrito-item-titulo">${titulo}</span>
              <span class="carrito-item-precio_fijo">${precio_fijo}</span>
              <div class="selector-cantidad">
                  <i class="fa-solid fa-minus restar-cantidad"></i>
                  <input type="text" value="1" class="carrito-item-cantidad" disabled>
                  <i class="fa-solid fa-plus sumar-cantidad"></i>
              </div>
              <span class="carrito-item-precio" id="precio_total">${precioNumero.toLocaleString("es")}</span>
          </div>
          <button class="btn-eliminar">
              <i class="fa-solid fa-trash"></i>
          </button>
      </div>
  `;
  item.innerHTML = itemCarritoContenido;
  itemsCarrito.append(item);

  // Agregamos la funcionalidad eliminar al nuevo item
  item.getElementsByClassName('btn-eliminar')[0].addEventListener('click', eliminarItemCarrito);

  // Agregamos la funcionalidad restar cantidad del nuevo item
  var botonRestarCantidad = item.getElementsByClassName('restar-cantidad')[0];
  botonRestarCantidad.addEventListener('click', restarCantidad);

  // Agregamos la funcionalidad sumar cantidad del nuevo item
  var botonSumarCantidad = item.getElementsByClassName('sumar-cantidad')[0];
  botonSumarCantidad.addEventListener('click', sumarCantidad);

  // Actualizamos total
  actualizarTotalCarrito();
}
//Aumento en uno la cantidad del elemento seleccionado



function sumarCantidad(event) {
  var buttonClicked = event.target;
  var selector = buttonClicked.parentElement;
  var cantidadActual = parseInt(selector.getElementsByClassName('carrito-item-cantidad')[0].value);
  cantidadActual++;
  selector.getElementsByClassName('carrito-item-cantidad')[0].value = cantidadActual;

  var precioFijoElemento = selector.parentElement.querySelector('.carrito-item-precio_fijo');
  var precioFijo = parseFloat(precioFijoElemento.innerText);

  var precioTotalElemento = selector.parentElement.querySelector('.carrito-item-precio');
  var precioTotal = precioFijo * cantidadActual;
  precioTotalElemento.innerText = precioTotal.toLocaleString("es");

  actualizarTotalCarrito();
}

//
//Resto en uno la cantidad del elemento seleccionado
function restarCantidad(event) {
  var buttonClicked = event.target;
  var selector = buttonClicked.parentElement;
  var cantidadElemento = selector.getElementsByClassName('carrito-item-cantidad')[0];
  var cantidadActual = parseInt(cantidadElemento.value);

  if (cantidadActual > 1) {
    cantidadActual--;
    cantidadElemento.value = cantidadActual;

    var precioFijoElemento = selector.parentElement.querySelector('.carrito-item-precio_fijo');
    var precioFijo = parseFloat(precioFijoElemento.innerText);

    var precioTotalElemento = selector.parentElement.querySelector('.carrito-item-precio');
    var precioTotal = precioFijo * cantidadActual;
    precioTotalElemento.innerText = precioTotal.toLocaleString("es");

    actualizarTotalCarrito();
  }
}

//Elimino el item seleccionado del carrito
function eliminarItemCarrito(event){
  var buttonClicked = event.target;
  buttonClicked.parentElement.parentElement.remove();
  //Actualizamos el total del carrito
  actualizarTotalCarrito();

  //la siguiente funciòn controla si hay elementos en el carrito
  //Si no hay elimino el carrito
  ocultarCarrito();
}
//Funciòn que controla si hay elementos en el carrito. Si no hay oculto el carrito.
function ocultarCarrito(){
  var carritoItems = document.getElementsByClassName('carrito-items')[0];
  if(carritoItems.childElementCount==0){
      var carrito = document.getElementsByClassName('carrito')[0];
      carrito.style.marginRight = '-100%';
      carrito.style.opacity = '0';
      carritoVisible = false;

      var items =document.getElementsByClassName('contenedor-items')[0];
      items.style.width = '100%';
  }
}
//Actualizamos el total de Carrito
function actualizarTotalCarrito() {
  var carritoItems = document.getElementsByClassName('carrito-item');
  var total = 0;

  for (var i = 0; i < carritoItems.length; i++) {
    var item = carritoItems[i];
    var precioElemento = item.getElementsByClassName('carrito-item-precio')[0];
    var precioTexto = precioElemento.innerText;
    var precio = parseFloat(precioTexto.replace('$', '').replace(',', '.'));

    total += precio;
  }

  total = Math.round(total * 100) / 100;

  var totalElemento = document.getElementsByClassName('carrito-precio-total')[0];
  totalElemento.innerText = total.toLocaleString("es") ;
}
    }

    );
