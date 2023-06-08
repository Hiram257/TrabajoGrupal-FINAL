    <?php
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        include 'conexion.php';
        
        $descripcion=$_POST["descripcion"];
        $precio=$_POST["precio"];
        $stock=$_POST["stock"];
        $codigo_producto=$_POST["codigo_producto"];
        $id_marca=$_POST["id_marca"];
        $id_familia=$_POST["id_familia"];
        $nombre=$_POST["nombre"];
        $id_ubicacion=$_POST["id_ubicacion"];
        $estado_producto=$_POST["estado_producto"];
        $id_proveedor=$_POST["id_proveedor"];
        $imagen=$_POST["imagen"];


 
        $query="INSERT INTO producto (descripcion,precio,stock,codigo_producto,id_marca,id_familia,nombre,id_ubicacion,estado_producto,id_proveedor, imagen) VALUES ('$descripcion','$precio','$stock','$codigo_producto','$id_marca','$id_familia','$nombre','$id_ubicacion','$estado_producto','$id_proveedor','$imagen')";

        $resultado=$conn->query($query);
        if($resultado==true){
            echo "El usuario se inserto de forma exitosa";
        }else{
            echo "Error al insertar el usuario";
        }
    }