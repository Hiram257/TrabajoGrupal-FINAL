<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Urian Viera :: WebDeveloper</title>
    <link rel="icon" type="image/x-icon" href="assets/img/logo-mywebsite-urian-viera.svg">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i|Roboto+Mono:300,400,700|Roboto+Slab:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link href="assets/css/material.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/home.css">
    <link rel="stylesheet" href="./assets/css/loader.css">
</head>
    <body>
        <header>
          <div class="contenedor_header">
              <ul class="flex-container">
                <li class="flex-item"></li>
                <li class="flex-item">
                  <p>
                    <strong>
                    REPORTE DE VENTAS
                    </strong>
                  </p>
                </li>
                
                <li class="flex-item"></li>
              </ul>
          </div>
        </header>
<br>
        <div id="demo-content">
          <div id="loader-wrapper">
            <div id="loader"></div>
            <div class="loader-section section-left"></div>
                <div class="loader-section section-right"></div>
            </div>
          <div id="content"> </div>
        </div>


        <div class="container">
          <div class="row">
            <!-- <div class="col-md-12 text-center" style="padding:100px 0px;">
              <h3 class="text-center" style="color:#333; font-weight:900;">
              
               </h3>
              <h3 style="color:#D90E1D !important; font-weight:bold;">
              
              </h3>
            </div> -->
          </div>
        </div>


      <section>
          <div class="container">
            <div class="row">
              
              <div class="col-md-12 text-center mt-5">
                <form action="DescargarReporte_x_fecha.php" method="post" accept-charset="utf-8">
                  <div class="row">
                    <div class="col">
                      <input type="date" name="fecha_ingreso" class="form-control"  placeholder="Fecha de Inicio" required>
                    </div>
                    <div class="col">
                      <input type="date" name="fechaFin" class="form-control" placeholder="Fecha Final" required>
                    </div>
                    <div class="col">
                      <span onclick=activos() class="btn btn-dark mb-2" id="filtro">Filtrar</span>
                      <button type="submit"  class="btn btn-danger mb-2 activo">Descargar Reporte</button>
                    </div>
                  </div>
                </form>
              </div>

              <div class="col-md-12 text-center mt-5">     
                <span id="loaderFiltro">  </span>
              </div>
              
              
            <div class="table-responsive resultadoFiltro">
              <table class="table table-hover" id="tableEmpleados">
                <thead>
                  <tr>
                  <th scope="col">#</th>
            <th scope="col">Cliente</th>
            <th scope="col">personal</th>
            <th scope="col">numero serie</th>
            <th scope="col">total</th>
            <th scope="col">fecha hora</th>           
            <th scope="col">Cantidad de producto</th>
            <th scope="col">Estado pago</th>

                  </tr>
                </thead>
              <?php
              include('conexion.php');
            if(!empty($_REQUEST["nume"])){$_REQUEST["nume"]=$_REQUEST["nume"];}else{$_REQUEST['nume']='1';}
            if($_REQUEST["nume"]==""){$_REQUEST["nume"] = "1";}
$articulos=mysqli_query($con,"SELECT * FROM venta ORDER BY fecha DESC;");
$num_registro=@mysqli_num_rows($articulos);
$registros="5";
$pagina=$_REQUEST["nume"];
if (is_numeric($pagina))
$inicio=(($pagina-1)*$registros);
else
$inicio=0;
$busqueda=mysqli_query($con,"SELECT * FROM venta ORDER BY fecha DESC LIMIT $inicio,$registros;");
$paginas=ceil($num_registro/$registros);

              $i =1;
                while ($resultado = mysqli_fetch_assoc($busqueda)) { ?>
                <tbody>
                  <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $resultado['id_cliente'] ; ?></td>
                    <td><?php echo $resultado['id_personal'] ; ?></td>

                    <td><?php echo $resultado['numero_serie'] ; ?></td>
                    <td><?php echo $resultado['total'] ; ?></td>
                    <td><?php echo $resultado['fecha'] ; ?></td>
                    <td><?php echo $resultado['cantidad_producto'] ; ?></td>
                    <td><?php echo $resultado['estado_pago'] ; ?></td>

                </tr>
                </tbody>
              <?php } ?>
              </table>
            </div>

            </div>
          </div>
          
       <div class="container-fluid col-12"> 
        <ul id="activo" class="pagination pg-dark justify-content-center pb-5 pt-5 mb-0" style="float:none;">
           <?php

     if($_REQUEST["nume"]== "1"){ $_REQUEST["nume"]=="0";
      
        echo "";
    }else{
    if ($pagina>1)
    $ant = $_REQUEST["nume"] - 1;
        echo "<a class='page-link' aria-label-Previous' href='reporte_venta.php?nume=1'><span aria-hidden'true'>&laquo;</span>Ant<span class='sr-only'>Previous</span></a>"; 
        echo "<li class='page-item'><a class='page-link' href='reporte_venta.php?nume=". ($pagina-1)."' >".$ant."</a></li>"; }
        
        echo "<li class='page-item active'><a class='page-link'>".$_REQUEST["nume"]."</a></li>";
    $sigui =$_REQUEST["nume"]+1;
    $ultima= $num_registro / $registros;
    if ($ultima == $_REQUEST["nume"] +1){
      $ultima =="";}
    
  
    if ($pagina<$paginas && $paginas>1)
      echo "<li class='page-item'><a class='page-link' href='reporte_venta.php?nume=". ($pagina+1)."'>".$sigui."</a></li>";
 if ($pagina<$paginas && $paginas>1)
 echo"
 <li class='page-item'><a class='page-link' aria-label='Next' href='reporte_venta.php?nume=". ceil($ultima)."'><span aria-hidden='true' >&raquo;</span><span class='er-only'>Sig</span></a>
 </li>"         
        
   
          ?>
          </ul>
      </section>


    <footer class="footer grey darken-4">
      <div class="container center" style="padding-top: 5px;">
        <div class="row justify-content-md-center">
          <div class="col col-lg-5">
          &copy; 
          </div>
          <div class="col-md-auto">
            <a href="https://www.youtube.com/watch?v=gnHGVe0eUBo" target="_blank" title="Visitar Youtube">
              <i class="bi bi-youtube"></i>
            </a>
            <a href="https://github.com/Hiram257/TrabajoGrupal-FINAL" target="_blank" title="Visitar Github">
              <i class="bi bi-github"></i>
            </a>
            <a href="" target="_blank" title="Visitar Linkedin">
              <i class="bi bi-linkedin"></i>
            </a>
            <a href="" target="_blank" title="Visitar Portafolio">
              <i class="bi bi-briefcase"></i>
            </a>

          </div>
        </div>
      </div>
    </footer>



  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
   
  <script src="assets/js/material.min.js"></script>
  <script>
  $(function() {
      setTimeout(function(){
        $('body').addClass('loaded');
      }, 1000);


//FILTRANDO REGISTROS
$("#filtro").on("click", function(e){ 
  e.preventDefault();
  
  loaderF(true);

  var f_ingreso = $('input[name=fecha_ingreso]').val();
  var f_fin = $('input[name=fechaFin]').val();
  console.log(f_ingreso + '' + f_fin);

  if(f_ingreso !="" && f_fin !=""){
    $.post("filtro.php", {f_ingreso, f_fin}, function (data) {
      $("#tableEmpleados").hide();
      $(".resultadoFiltro").html(data);
      loaderF(false);
    });  
    document.getElementById('activo').remove();

  }else{
    $("#loaderFiltro").html('<p style="color:red;  font-weight:bold;">Debe seleccionar ambas fechas</p>');
  }
} );


function loaderF(statusLoader){
    console.log(statusLoader);
    if(statusLoader){
      $("#loaderFiltro").show();
      $("#loaderFiltro").html('<img class="img-fluid" src="assets/img/cargando.svg" style="left:50%; right: 50%; width:50px;">');
    }else{
      $("#loaderFiltro").hide();
    }
  }
});
</script>

</body>
</html>
