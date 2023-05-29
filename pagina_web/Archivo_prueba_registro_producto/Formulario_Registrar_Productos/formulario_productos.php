<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stilos.css">
    <title>Document</title>
</head>
<body>
<br>
<br>

  <div class="container_wrapper">
    <div class="container">
        <h2>Registro <span>productos</span> </h2>
        <form id="registroProductos">
            <input id="descripcion" class="input_info" type="text" placeholder="Descripcion">
            <input id="precio" class="input_info" type="text" placeholder="Precio">

            <input id="stock" class="input_info" type="text" placeholder="Stock">
            
            <input id="codigo_producto" class="input_info" type="text" placeholder="Codigo producto">

              <input id="id_marca" class="input_info" type="text" placeholder="marca producto">
              <input id="id_familia" class="input_info" type="text" placeholder="familia">

            <input id="nombre" class="input_info" type="text" placeholder="Nombre">
            <input id="id_ubicacion" class="input_info" type="text" placeholder="ubicacion">
            <input id="estado_producto" class="input_info" type="text" placeholder="Estado producto">
          
         
            <input id="id_proveedor" class="input_info" type="tel" placeholder="provedor">
            <button class="register_btn" type="submit">Actualizar producto</button>
        </form>


    </div> 
    <script src="registro.js"></script>


  </div>
    
</body>
</html>