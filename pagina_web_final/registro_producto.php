<!DOCTYPE html>
 <head>
   
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="style/stylo_registroProducto.css" />
    <title>Document</title>
</head>

 
<?php 

 
$imagen='';
if (isset($_FILES["foto"])){
    $file=$_FILES["foto"];
    $nombre=$file["name"];
    $tipo=$file["type"];
    $ruta=$file["tmp_name"];
    $size =$file["size"];
    $dimensiones=getimagesize($ruta);
    $width=$dimensiones[0];
    $heigh=$dimensiones[1];
    $carpeta="fotos_productos/";
    if($tipo != "image/jpg" && $tipo != 'image/JPG' && $tipo != 'image/jpeg' &&
    $tipo != 'image/png' && $tipo != 'image/gif'){
    echo "ERROR,el archivo no es imagen";
}
    elseif ($size >3*1024*1024){
    echo "Error tamaño maximo es de 3m";
}
    else{
    $src=$carpeta.$nombre;
    move_uploaded_file($ruta,$src);
    $imagen="fotos/".$nombre;
}
}


?>

 

    <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
         <form action="registro_producto.php" method="post" class="sign-in-form" enctype="multipart/form-data" id="registroProductos">
            <h2>Registro de productos</h2>

             <div class="input-field">
        <i class="fa-sharp fa-light fa-heart"></i>         
   <input id="descripcion" class="input_info" type="text" placeholder="Descripcion">
            </div>
            <div class="input-field">
        <i class="fa-sharp fa-light fa-heart"></i>            
<input id="precio" class="input_info" type="text" placeholder="Precio">
            </div>

  <div class="input-field">
        <i class="fa-sharp fa-light fa-heart"></i>            
            <input id="stock" class="input_info" type="text" placeholder="Stock">
            </div>



              <div class="input-field">
        <i class="fa-sharp fa-light fa-heart"></i>            
   <input id="codigo_producto" class="input_info" type="text" placeholder="Codigo producto">
            </div>


              <div class="input-field">
        <i class="fa-sharp fa-light fa-heart"></i>            
              <input id="id_marca" class="input_info" type="text" placeholder="marca producto">
            </div>


              <div class="input-field">
        <i class="fa-sharp fa-light fa-heart"></i>            
              <input id="id_familia" class="input_info" type="text" placeholder="familia">
            </div>


              <div class="input-field">
        <i class="fa-sharp fa-light fa-heart"></i>            
            <input id="nombre" class="input_info" type="text" placeholder="Nombre">
            </div>



         <div class="input-field">
        <i class="fa-sharp fa-light fa-heart"></i>            
            <input id="id_ubicacion" class="input_info" type="text" placeholder="ubicacion">
            </div>

 <div class="input-field">
        <i class="fa-sharp fa-light fa-heart"></i>            
            <input id="estado_producto" class="input_info" type="text" placeholder="Estado producto">
            </div>
             <div class="input-field">
        <i class="fa-sharp fa-light fa-heart"></i>            
            <input  id="id_proveedor" class="input_info" type="tel" placeholder="provedor">
            </div>
             <div class="input-field">
        <i class="fa-sharp fa-light fa-heart"></i>            
            <input id="file" class="modifi" type="file" name="foto">
            </div>
          

<button onclick="driner()" class="btn solid input_info" class="register_btn" type="submit">Registrar</button>            
         </form>

        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
         
         
          </div>
         <!-- Agregar el nombre de la carpeta del fondo -->
          <img src="fondo_producto/log.svg" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
           
             
          </div>
        </div>
      </div>
    </div>

   </body>

<script src="script/registroProducto.js"> 
</script>
  </div>
 </body>
</html>
