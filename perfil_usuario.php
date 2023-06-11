<?php
  session_start();

  if(isset($_GET['valor'])){
    $valor = $_GET['valor'];
  }
  else{
    $valor = $_SESSION['valor'];
  }

  if(isset($_COOKIE['usuario'])){
    $_SESSION['user'] = $_COOKIE['usuario'];
    $_SESSION['email'] = $_COOKIE['email'];
    $user = $_SESSION['user'];
    $email = $_SESSION['email'];
  }
  elseif(isset($_SESSION['email'])){
    $user = $_SESSION['user'];
    $email = $_SESSION['email'];
  }
  elseif($valor == 0){
    $user = "No";
    $email = "No";  
  }
  elseif($valor == 1){
    $user = ":v";
    $email = ":v";
  }
  else{
    $valor = 1;
    $_SESSION['valor'] = $valor;
  }
  
  // Conexión a la base de datos
  $conexion = mysqli_connect("localhost", "root", "", "chicvenue");
  
  // Consulta SQL para obtener los valores de una columna
  $query = "SELECT apellido FROM cliente WHERE correo_electronico = '$email'";
     
  // Ejecutar consulta
  $resultado = mysqli_query($conexion, $query);
  if ($resultado) {
    $ape = mysqli_fetch_array($resultado);
    $apellido = $ape[0];
  }

  $query_noCliente = "SELECT id_cliente FROM cliente where correo_electronico = '$email'";
  $resultado = mysqli_query($conexion,$query_noCliente);
  if($resultado){
    $num = mysqli_fetch_array($resultado);
    $num_cliente = $num[0];
  }

  $query_id = "SELECT id_cliente FROM cliente where correo_electronico = '$email'";
  $resul = mysqli_query($conexion,$query_id);
  if($resul){
    $ids=mysqli_fetch_array($resul);
    $aidi= $ids[0];
  }




  
  if(isset($_POST['modificar'])){
    if(strlen($_POST['nombre']) >= 1 && strlen($_POST['apellido']) >= 1){
        $nombre = trim($_POST['nombre']);
        $apep = trim($_POST['apellido']);
        $query_id = "SELECT id_cliente FROM cliente where correo_electronico = '$email'";
        $resul = mysqli_query($conexion,$query_id);
        if($resul){
          $ids=mysqli_fetch_array($resul);
          $aidi= $ids[0];

          $consulta1 = "UPDATE cliente SET nombre = '$nombre' WHERE id_cliente ='$aidi'";  
          $consulta2 = "UPDATE cliente SET apellido = '$apep' WHERE id_cliente = '$aidi'";  
          mysqli_query($conexion,$consulta1);
          $cambio = mysqli_query($conexion,$consulta2);
             if($cambio){
                 /*?>
                 <h3 class="ok">¡Te has registrado correctamente!</h3>
                 <?php*/
                 $_SESSION['mensaje']  = "Se han modificado tus datos";
                 //include "../registro.php";
             } else {
                 /*?>
                 <h3 class="bad">¡Ups ha ocurrido un error!</h3>
                 <?php*/
                 $_SESSION['mensaje']  = "¡Ups, ha ocurrido un error!";
                 
             }
         } else {
             /*?>
             <h3 class="bad">¡Por favor completa los campos!</h3>
             <?php*/
         }
          
        }
       // $query = "SELECT correo_electronico FROM cliente";
        //$resul = mysqli_query($conexion,$query);

     //   $consulta = "INSERT INTO cliente(nombre,apellido,correo_electronico,contraseña,activado) VALUES ('$nombre','$apellido','$email','$contrasena','$activado')";
    
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>Mi perfil</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sidebars/">
    <link href="/css/perfil.css" rel="stylesheet">
    <!-- Bootstrap core CSS -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/sweetalert/dist/sweetalert2.all.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script> 
  </head>


<style>
  body{
    font-family:"Britannic";
    background: #F4F4F4;
}
.titulo{
    font-family:"Candara";
    font-size: 3rem;
  }

  .boton_registro { /* boton registrarme */
    width: 60%;
    margin: auto;
    border: solid thin rgb(255, 255, 255);
    padding: .7rem;
    border-radius: 2rem;
    background-color: white;
    text-align: center;
    font-weight: 600;
    margin-top: 3rem;
    font-size: .8rem;
    cursor: pointer;
    color: #222;
    font-family:"Candara";
}

.letra-titulo{
    font-family:"Candara";
    font-size: 2rem;
    text-align: justify;
  }
  
  .letra-subtitulo{
    font-family:"Candara";
    font-size: 1.5rem;
    text-align: justify;
  }
  
  .letra-texto{
    font-family:"Candara";
    font-size: 1.2em;
    text-align: justify;
  }

  .letra-ad{
    font-family:"Candara";
    font-size: 0.8em;
    text-align: justify;
  }

  .fondoBonito{
    background: #ADB3E3;
  }

  .significaPeligro{
    background: #FF8167;
  }

  

  fieldset {
	border: medium none !important;
	margin: 0 0 10px;
	min-width: 100%;
	padding: 0;
	width: 100%;
}

</style>

  <body class="p-3 m-0 border-0 bd-example">


    <!-- LINEA NEGRA -->
    <nav class="navbar bg-dark" data-bs-theme="dark">
       <div class="container-fluid">
      <br><br>
      <?php
        if($_SESSION['email'] != "No" && $_SESSION['user'] != "No"){
          ?>
          <h3 class="text_user" style="display:none;">Hola, <?php echo "$user";?></h1>
          <?php
          if($valor == 0 ){
            if($_GET['valor'] == 0){
              setcookie('usuario', "", time()-86400, '/');
              setcookie('email', "", time()-86400, '/');
              unset($_SESSION['email']);
              unset($_SESSION['user']);
              $_SESSION['valor'] = 1;
              header("Location: index.php?valor=1");
            }
          }
        }
      ?>
    </div>
    </nav>
    <!--FIN LINEA NEGRA -->


    <!-- MENU DE NAVEGACION -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php">
          <img src="/assets/logo.jpg" class="rounded mx-auto d-block"  alt="" width="82" height="70">
        </a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/products.php">Novedades</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/products.php">Rebajas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/products.php">Básicos</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Ropa
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Mezclilla</a></li> <!---->
                <li><a class="dropdown-item" href="#">Sudaderas</a></li>
                <li><a class="dropdown-item" href="#">Vestidos</a></li>
                <li><a class="dropdown-item" href="#">Conjuntos</a></li>
                <li><a class="dropdown-item" href="#">Ropa de descanso</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">¡TEMPORADA DE VERANO!</a></li>
              </ul>
            </li>
          </ul>
          <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Buscar</button>
          </form>
          <ul class="nav">
            <li class="nav-item">
              &nbsp;&nbsp;&nbsp;&nbsp;
               <a class="navbar-brand" href="#">
               <img src="/assets/filtro.png" alt="filtro" width="30" height="30" class="d-inline-block align-text-top">
              </a>
            </li>
            <li class="nav-item">
             <li class="nav-item">
             <?php
              if($email != ":v" && $user != ":v"){
                ?>
                  <h3 id="usuario" style="display:none;"> <?php echo "$user";?></h3>
                  <h3 id="correo" style="display:none;"> <?php echo "$email";?></h3>
                  <a class="navbar-brand" onclick="user()" id="change"> <!-- INCIAR SESION -->
                    <img src="assets/usuario.png" alt="carrito" width="30" height="30" class="d-inline-block align-text-top">
                  </a>
                  <?php
              }
              else{
                ?>
                <a class="navbar-brand" href="log-in.php"> <!-- INCIAR SESION -->
                <img src="assets/usuario.png" alt="carrito" width="30" height="30" class="d-inline-block align-text-top">
                </a>
                <?php
              }
              ?>
            </li>
            <li class="nav-item">
               <a class="navbar-brand" href="#">
               <img src="/assets/favoritos.JPG" alt="favoritos" width="30" height="30" class="d-inline-block align-text-top">
              </a>
            </li>
            <li class="nav-item">
              <a class="navbar-brand" href="#">
              <img src="/assets/carrito.png" alt="carrito" width="30" height="30" class="d-inline-block align-text-top">
             </a>
            </li>
          </ul>
          </div>
        </div>
      </div>
    </nav>

<main>
  <!-- -->


  <nav class="navbar bg-body">
    <div class="container-xl">
      <span class="navbar-expand mb-0"><h1 class="titulo">Mi perfil</h1></span>


    </div>
  </nav>
<div class="container">
<div class="row">
<div class="col-5">
    <br><br>
    <div class="container-lg">
    <a class="navbar-brand" href="#">&nbsp;&nbsp;&nbsp;
        <img src="/assets/usuario2.png" alt="usuario" width="200" height="200" class="d-inline-block align-text-top rounded-circle">
       </a>
       <br><br><br>
       <div id="datos_usuario">
          <h1 id="Nombre_usuario"><?php echo $user;?></h1>
       <h5 id="correo_electronico"><?php echo $email;?></h5>
    </div>
    <br><br>
    <div class="d-flex align-items-start">
        <div class="nav flex-column nav-pills gap-lg-4 col-6" id="v-pills-tab" role="tablist" aria-orientation="vertical">
          <button class="btn btn-lg nav-link active" id="informacion" data-bs-toggle="pill" data-bs-target="#informacion-tab" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">MI INFORMACIÓN PERSONAL</button>
          <button class="btn btn-lg nav-link" id="compras" data-bs-toggle="pill" data-bs-target="#compras-tab" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">MIS COMPRAS</button>
          <button class="btn btn-lg nav-link" id="tarjetas" data-bs-toggle="pill" data-bs-target="#tarjetas-tab" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">TARJETAS</button>
          <button class="btn btn-lg nav-link" id="configuracion" data-bs-toggle="pill" data-bs-target="#configuracion-tab" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">CONFIGURACIÓN</button>
          <button class="btn btn-lg btn-outline-danger position-relative" type="button">Cerrar sesión</button>
        </div>
        
    </div>
   
</div>
</div>

<!-----------------------------------DATOS-------------------------------------->
    <div class="col" id="lelele">
            <br><br>
        <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade show active" id="informacion-tab" role="tabpanel" aria-labelledby="v-pills-home-tab">
                
                <div class="container">
                    <div class="row">
                        <!--------------------->
                        <div class="col">
                            <div class="card ">
                                <div class="card-body">
                                  <h5 class="card-title letra-titulo">Nombre</h5>
                                  <span class="input-group-text" id="nombreUsuario"><?php echo $user;?></span>
                                </div>
                              </div>
                        </div>
                        <!--------------------->
                        <div class="col">
                            <div class="card ">
                                <div class="card-body">
                                  <h5 class="card-title letra-titulo">Apellido(s)</h5>
                                  <span class="input-group-text" id="apellidoUsuario"><?php echo $apellido;?></span>
                                </div>
                              </div>
                        </div>
                        <!--------------------->
                    </div>
                    <hr>
                <div class="row">
                        <!--------------------->
                        <div class="col">
                            <div class="card ">
                                <div class="card-body">
                                  <h5 class="card-title letra-titulo">Correo </h5>
                                  <span class="input-group-text" id="correoUsuario"><?php echo $email;?></span>
                                </div>
                              </div>
                        </div>
                        <!--------------------->
                </div>
                </div>
            </div>
<!-----------------------------------COMPRAS-------------------------------------->
        
            <div class="tab-pane fade" id="compras-tab" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                
                <div class="container">
                    <div class="row">
                        <div class="jumbotron jumbotron-fluid">
                            <div class="container">
                              <h1 class="display-4">Compras</h1>
                              <p class="lead"></p>
                            </div>
                          </div>
                    </div>
                        <hr>
                    <div class="row" id="informacionCompras">
                        <!-- AQUI ENTRAN LA INFORMACIÓN DE LAS COMPRAS-->
                        <div class="page-item">
                            <!--CONTENEDOR DE LAS COMPRAS-->
                            <div class="container" id="contenedor_compras">
                              <?php
                                $query_idArt = "SELECT id_articulo FROM compra WHERE id_cliente = '$num_cliente'";
                                $res = mysqli_query($conexion,$query_idArt);
                                if($res){
                                  $idArt = mysqli_fetch_all($res);
                                  
                                  
                                  for ($i=0; $i < count($idArt); $i++) { 
                                    $id_Arti = $idArt[$i][0];
                                    
                                    $query_nomArt = "SELECT nombre_articulo FROM articulo WHERE id_articulo = '$id_Arti'";
                                    $resul_nomArt = mysqli_query($conexion,$query_nomArt);
                                    if($resul_nomArt){
                                      $nomArt = mysqli_fetch_array($resul_nomArt);
                                      $nombre_articulo = $nomArt[0];
                                    }

                                    $query_fecha = "SELECT fecha FROM compra WHERE id_cliente = '$num_cliente' and id_articulo = '$id_Arti'";
                                    $resul_fecha = mysqli_query($conexion,$query_fecha);
                                    if($resul_fecha){
                                      $fech = mysqli_fetch_array($resul_fecha);
                                      $fecha = $fech[0];
                                    }           
                                    
                                    $query_ima = "SELECT imagen FROM articulo WHERE id_articulo = '$id_Arti'";
                                    $resul_ima = mysqli_query($conexion,$query_ima);
                                    if($resul_ima){
                                      $ima = mysqli_fetch_array($resul_ima);
                                      $imagen = $ima[0];
                                    }


                                    
                                    ?>
                                    <div class="row">
                                      <div class="col"><img src="<?php echo $imagen;?>"  alt="imagen" width="150" height="150"></div>
                                      <div class="col">
                                          <h3><?php echo $nombre_articulo;?></h3>
                                          <br>
                                          <h5>Entregado el <?php echo $fecha;?></h5>
                                      </div>
                                      <div class="col-sm-1">
                                          <button class="btn btn-bd-primary position-relative" >Ver compra</button>
                                      </div>
                                    </div>
                                    <hr>
                                    <?php
                                  }
                                }
                            ?>
                            <div>
                                <button class="btn btn-bd-primary btn-lg" href="/products.php">Agregar nueva compra</button><br><br>
                            </div>
                            </div>
                        </div>
                        </div>

                    </div>
                </div>
<!-----------------------------------TARJETAS-------------------------------------->


            <div class="tab-pane fade" id="tarjetas-tab" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                
                <div class="container">
                    <div class="row">
                        <div class="jumbotron jumbotron-fluid">
                            <div class="container">
                              <h1 class="display-4">Tarjetas</h1>
                              <p class="lead"></p>
                            </div>
                          </div>
                    </div>
                        <hr>
                    <div class="row" id="infoTarjetas">
                        <!-- AQUI ENTRAN LA INFORMACIÓN DE LAS TARJETAS-->
                        <div class="page-item">
                            <!--CONTENEDOR DE LAS TARJETAS-->
                            <div class="container" id="contenedor_tarjetas">
                                <?php

                                $query_tarjeta = "SELECT numero_tarjeta FROM tarjeta_bancaria WHERE id_cliente = '$num_cliente'";
                                $resul = mysqli_query($conexion,$query_tarjeta);
                                if($resul){
                                  $tar = mysqli_fetch_all($resul);

                                  $query_banco = "SELECT nom_banco FROM tarjeta_bancaria WHERE id_cliente = '$num_cliente'";
                                  // Ejecutar consulta
                                  $resultado = mysqli_query($conexion, $query_banco);
                                  if ($resultado) {
                                    $banco = mysqli_fetch_all($resultado);
                                  }

                                  $query_vencimiento = "SELECT vencimiento FROM tarjeta_bancaria WHERE id_cliente = '$num_cliente'";
                                  $result = mysqli_query($conexion,$query_vencimiento);
                                  if($result){
                                    $ven = mysqli_fetch_all($result);
                                  }
     
                                  
                                
                                  for ($i=0; $i < count($tar); $i++) {
                                    $tarjeta = $tar[$i][0];
                                    $tarjeta = substr($tarjeta,-4);
                                    $nomBanco = $banco[$i][0];
                                    $vencimiento = $ven[$i][0];
                                    $vencimiento = substr($vencimiento, 0,7);
                                    ?>
                                    <div class="row ">
                                        <div class="col-8">
                                            <h2><?php echo $nomBanco;?></h2>
                                            <h3>****-****-****-<?php echo $tarjeta;?></h3>
                                            <h5>Vence el <?php echo $vencimiento;?></h5>
                                        </div>
                                        <div class="col-1">
                                            <button class="btn btn-danger btn-lg">Eliminar</button><br><br>
                                        </div>
                                      </div>
                                      <hr>
                                    <?php
                                  }
                                }
                                ?>
                            <div>
                                <button class="btn btn-bd-primary btn-lg">Agregar nueva tarjeta</button><br><br>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>               
            
            </div>
<!---------------------------------------------CONFIGURACION-------------------------------------------------------------->
            <div class="tab-pane fade" id="configuracion-tab" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                <div class="btn-group-vertical gap-5 col-11" role="group" aria-label="Vertical button group">
                    <a class="btn btn-outline-dark btn-lg fondoBonito" href="#" data-toggle="modal" data-target="#exampleModalCenter">
                    Modificar mis datos personales
                    </a>
                    <!-- MODIFICAR CONTRASEÑA --------------------------------------------------------->
                    <a class="btn btn-outline-dark btn-lg fondoBonito" href="../contraseña_dos.php">Cambiar mi contraseña</a>
                    <!--AVISO DE PRIVACIDAD ---------------------------------------------------------- -->
                    <a class="btn btn-outline-dark btn-lg fondoBonito" data-toggle="modal" data-target="#exampleModalLong">Privacidad</a>
                    <!--SEGURIDAD -->
                 <!--   <button type="button" class="btn btn-outline-dark btn-lg ">Seguridad</button>-->
                    <!--Ayuda -->
                    <a class="btn btn-outline-dark btn-lg fondoBonito" href="../preguntas.php">Ayuda</a>
                    <!-- ELIMINAR CUENTA-->
                    <button type="button" class="btn btn-outline-danger btn-lg" onclick="aviso(<?php echo $aidi?>);">Eliminar cuenta</button>
                    <script>
                      function aviso(codigo) {
                      
                        Swal.fire({
                          icon: 'warning',
                          title: 'Confirmar acción',
                          text: '¿Estás seguro de eliminar tu cuenta en Chic Venue?',
                          showCancelButton: true,
                          confirmButtonText: 'Eliminar cuenta',
                          cancelButtonText: 'Cancelar'
                        }).then((result) => {
                          if (result.isConfirmed) {
                            
                                Swal.fire({
                              title: 'Operación exitosa',
                              text: 'Se ha eliminado tu cuenta',
                              confirmButtonText: 'De acuerdo',
                            }).then((result) => {
                              if (result.isConfirmed) {
                            document.location.href = "/php/modificarDatos.php?id=<?php echo $aidi?>"
                            location.href = "index.php?valor=" + encodeURIComponent(0);
                          }
                        });
                        }
                  });
                }

                    function mandarPHP(codigo)
                    {
                      parametros = { 'id': codigo };
                     
                    }
                      </script>

                  </div>
            </div>
          </div>
          
        
    </div>
</div>
</div>

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title letra-titulo" id="exampleModalLongTitle">Modificar datos personales</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        

          <form id="modificar" action="../perfil_usuario.php" method="post" enctype="multipart/form-data">
        <h4 class="letra-subtitulo">Por favor, agregue sus nuevos datos</h4>
        <div class="form-floating formulario_grupo formulario_grupo-input">
          <fieldset>
            <input class="form-control" placeholder=<?php echo $user;?> type="text" name="nombre" required>
          </fieldset>
        </div>
        <div class="form-floating formulario_grupo formulario_grupo-input">
          <fieldset>
            <input class="form-control" placeholder=<?php echo $apellido;?> type="text" name="apellido" required>
          </fieldset>
        </div>
        <div class="modal-footer">
      <button type="submit" class="btn btn-primary" name="modificar">Guardar cambios</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
        <?php
                if (isset($_SESSION['mensaje'])) {
                    $mensaje = $_SESSION['mensaje'];
                    ?>
                    <div><h3 id="mensaje" style="display: none;"><?php echo "$mensaje";?></h3></div>
                    <?php
                    unset($_SESSION['mensaje']); // Limpiamos la variable de sesión
                }
                ?>
      </form>


      </div>
  
    </div>
  </div>
</div>


<!-- -------------------------------------------------------------------------------------------- -->

<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title letra-titulo" id="exampleModalLongTitle">Aviso de Privacidad - Chic Venue</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <p class="letra-texto">En Chic Venue, valoramos y respetamos tu privacidad. Este aviso de privacidad explica cómo recopilamos, utilizamos, almacenamos y protegemos la información personal que nos proporcionas al utilizar nuestros servicios y visitar nuestro sitio web. Nos comprometemos 
          a cumplir con las leyes y regulaciones aplicables en materia de protección de datos.</p>
      <br>
      <h5 class="letra-subtitulo">Recopilación de información:</h5>
      <p  class="letra-texto">Recopilamos información personal que nos proporcionas directamente, como tu nombre, dirección de correo electrónico y número de teléfono. También podemos recopilar información automáticamente a través de cookies 
        y otras tecnologías de seguimiento cuando visitas nuestro sitio web.</p>
      <br>
      <h5 class="letra-subtitulo">Uso de la información:</h5>
      <p  class="letra-texto">Utilizamos la información recopilada para brindarte nuestros servicios y mejorar tu experiencia como cliente. Podemos utilizar tus datos personales para procesar tus pedidos, proporcionarte información sobre nuestros productos, responder a tus consultas,
         mejorar nuestro sitio web y personalizar tu experiencia de compra.</p>
       
      <br>
      <h5 class="letra-subtitulo">Divulgación de información:</h5>
      <p  class="letra-texto">Nos comprometemos a no vender, alquilar ni compartir tu información personal con terceros, excepto en las siguientes circunstancias: cuando sea necesario para proporcionarte los servicios solicitados, cumplir con la ley, proteger nuestros derechos legales,
         prevenir fraudes o abusos, o con tu consentimiento expreso.</p>   
      
      <br>
      <h5 class="letra-subtitulo">Cambios al aviso de privacidad:</h5>
      <p  class="letra-texto">Nos reservamos el derecho de actualizar o modificar este aviso de privacidad en cualquier momento. Te recomendamos revisar periódicamente este aviso para estar informado sobre cualquier cambio. Cualquier modificación entrará en vigencia a partir
         de su publicación en nuestro sitio web..</p>  
      
      <br>
      <h5 class="letra-subtitulo">Chic Venue:</h5>
      <p  class="letra-texto">
              <b>Dirección:</b>Av. Juan de Dios Bátiz, Nueva Industrial Vallejo, Gustavo A. Madero, 07320 Ciudad de México, CDMX<br>
              <b>Teléfono:</b> +52 1 55 7112 6400<br>
              <b>Correo electónico:</b> cochs7534@gmail.com<br>
              <b>Fecha de vigencia:</b> 21-06-2023
              </b>
              <br>
                
              <p class="letra-texto">  Este aviso de privacidad se aplica únicamente a la información recopilada por Chic Venue. Al utilizar nuestros servicios o proporcionarnos tu información personal, aceptas los términos y condiciones descritos en este aviso.
              </p>
            <br>
            <p class="letra-texto">
              Gracias por confiar en Chic Venue. Estamos comprometidos en proteger tu privacidad 
              y brindarte una experiencia de compra segura y satisfactoria.</p>        
  
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">De acuerdo</button>
      </div>
    </div>
  </div>
</div>


</main>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script src="js/perfil_user.js"></script>
</body>
</html>