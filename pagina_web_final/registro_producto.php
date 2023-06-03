<!DOCTYPE html>
 <head>
   
    <link rel="stylesheet" href="style/stylo_registroProducto.css">
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
    $imagen="fotos_productos/".$nombre;
}
}


?>

<body>
<br>
<br>

  <div class="container_wrapper">
    <div class="container">
        <h2>Registro <span>productos</span> </h2>
        <form action="registro_producto.php" method="post" enctype="multipart/form-data" id="registroProductos" >
            <input id="descripcion" class="input_info" type="text" placeholder="Descripcion">
            <input id="precio" class="input_info" type="text" placeholder="Precio">

            <input id="stock" class="input_info" type="text" placeholder="Stock">
              
            <input id="codigo_producto" class="input_info" type="text" placeholder="Codigo producto">

              <input id="id_marca" class="input_info" type="text" placeholder="marca producto">
              <input id="id_familia" class="input_info" type="text" placeholder="familia">

            <input id="nombre" class="input_info" type="text" placeholder="Nombre">
            <input id="id_ubicacion" class="input_info" type="text" placeholder="ubicacion">
            <input id="estado_producto" class="input_info" type="text" placeholder="Estado producto">
          
         
            <input  id="id_proveedor" class="input_info" type="tel" placeholder="provedor">
            
            <input id="file" class="input_info" type="file" name="foto">
            

             <button onclick="driner()" class="input_info" class="register_btn" type="submit">Actualizar producto</button>
        </form>


    </div> 

<script src="script/registroProducto.js"> 
</script>
  </div>
 </body>
</html>