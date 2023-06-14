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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Payment Form</title>
    <link rel="stylesheet" href="/css/stylecard.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/sweetalert/dist/sweetalert2.all.min.js"></script>
    <title>Registro tarjeta</title>


</head>

<body>

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
            <a class="nav-link active" aria-current="page" href="products.php">Novedades</a> <!-- PESTAÑA NOVEDADES -->
          </li>
          <li class="nav-item">
            <a class="nav-link" href="products.php">Rebajas</a> <!-- RESTAÑA REBAJAS -->
          </li>
          <li class="nav-item">
            <a class="nav-link" href="products.php">Un poco de todo </a> <!-- PESTAÑA PARA REVISAR ARTICULOS -->
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Ropa
            </a>
            <ul class="dropdown-menu"> <!-- PARA MOSTRAR DISTINTAS CATEGORIAS -->
              <li><a class="dropdown-item" href="#">Mezclilla</a></li> <!---->
              <li><a class="dropdown-item" href="#">Sudaderas</a></li>
              <li><a class="dropdown-item" href="#">Vestidos</a></li>
              <li><a class="dropdown-item" href="#">Conjuntos</a></li>
              <li><a class="dropdown-item" href="#">Ropa de descanso</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">¡TEMPORADA DE VERANO!</a></li> <!-- TEMPORADAS -->
            </ul>
          </li>
        </ul>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" id="busqueda_text" placeholder="" aria-label="Search"> <!-- input SEARCH con id="busqueda_text"-->
          <button class="btn btn-outline-success" id="busqueda" type="submit">Buscar</button> <!-- Botón para buscar -->
        </form>
        <ul class="nav">
          <li class="nav-item">
            &nbsp;&nbsp;&nbsp;&nbsp;
           <!--   <a class="navbar-brand" href="#"> 
             <img src="/assets/filtro.png" alt="carrito" width="30" height="30" class="d-inline-block align-text-top">
            </a> -
            <button type="button" style="background-image: url('/assets/filtro.png'); width: 10px; height: 10px;" data-toggle="modal" data-target="#exampleModalLong">
            </button>-->
            <a class="navbar-brand" href="#" data-toggle="modal" data-target="#exampleModalLong"> 
              <img src="../assets/filtro.png" alt="carrito" width="30" height="30" class="d-inline-block align-text-top">
             </a> 
           <!-- Modal -->
              <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">¿Buscas algo en especial?</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="form-group" id="filtro-form">
                        <form>
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <label class="input-group-text" for="color">Color</label>
                            </div>
                            <select class="custom-select" id="color">
                              <option value="todos">Todos</option>
                              <option value="verde">Verde</option>
                              <option value="azul">Azul</option>
                              <option value="blanco">Blanco</option>
                              <option value="negro">Negro</option>
                              <option value="rosa">Rosa</option>
                              <option value="café">Café</option>
                              <option value="morado">Morado</option>
                            </select>
                          </div>
                        
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <label class="input-group-text" for="talla">Talla</label>
                            </div>
                            <select class="custom-select" id="talla">
                              <option value="todas">Todas</option>
                              <option value="xs">XS</option>
                              <option value="s">S</option>
                              <option value="m">M</option>
                              <option value="l">L</option>
                              <option value="xl">XL</option>
                            </select>
                          </div>
                        
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <label class="input-group-text" for="Precio">Precio</label>
                            </div>
                            <select class="custom-select" id="Precio">
                              <option value="ninguno">Ninguno</option>
                              <option value="ascendente">Del más barato al más caro</option>
                              <option value="descendente">Del más caro al más barato</option>
                            </select>
                          </div>
                        
                        
                        <input type="checkbox" id="ofertas">
                        <label for="ofertas">Mostrar solo ofertas/descuentos</label>
                        
                      </form>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" id="busqueda_filtro" class="btn btn-primary">Filtrar</button>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                      
                    </div>
                  </div>
                </div>
              </div>
          </li>
          <li class="nav-item">
          <?php
              if($email != ":v" && $user != ":v"){

                ?>

                  <h3 id="usuario" style="display:none;"> <?php echo "$user";?></h3>
                  <h3 id="correo" style="display:none;"> <?php echo "$email";?></h3>
                  <a class="navbar-brand" onclick="user()" id="change"> <!-- INCIAR SESION -->
                    <img src="assets/usuario.png" alt="inicioSesión" width="30" height="30" class="d-inline-block align-text-top">
                  </a>
                  
                  <?php
                  
                
              }
              else{
                ?>
                <a class="navbar-brand" href="log-in.php"> <!-- INCIAR SESION -->
                <img src="assets/usuario.png" alt="inicioSesión" width="30" height="30" class="d-inline-block align-text-top">
                </a>
                <?php
              }
              ?>
          </li>
          <li class="nav-item">
             <a class="navbar-brand" href="favoritos.php"> <!-- ACCEDER A FAVORITOS-->
             <img src="../assets/favoritos.JPG" alt="carrito" width="30" height="30" class="d-inline-block align-text-top">
            </a>
          </li>
          <li class="nav-item">
            <a class="navbar-brand" href="carrito.php"> <!-- ACCEDER AL CARRITO-->
            <img src="../assets/carrito.png" alt="carrito" width="30" height="30" class="d-inline-block align-text-top">
           </a>
          </li>
        </ul>
        </div>
      </div>
    </div>
  </nav>

  
  <!-- FIN MENU DE NAVEGACIÓN -->

<div class="tarjeta">
  <div class="contenedor">
        <h1>NUEVA TARJETA</h1>

        <div class="first-row">
            <div class="owner">
                <h3>Nombre del titular de la tarjeta</h3>
                <div class="input-field">
                    <input type="text" id="owner-name-input">
                    <div id="ownerNameErrorMessage" class="error-message"></div>
                </div>
            </div>
            <div class="cvv">
                <h3>CVV</h3>
                <div class="input-field">
                    <input type="password" id="cvvInput" maxlength="3">
                    <div id="cvvErrorMessage" class="error-message"></div>
                </div>
            </div>
        </div>

        <div class="second-row">
            <div class="card-number">
                <h3>Número de la tarjeta</h3>
                <div class="input-field">
                    <input type="text" id="card-number-input" maxlength="16">
                    <div id="cardNumberErrorMessage" class="error-message"></div>
                </div>
            </div>

        </div>

        <div class="third-row">
            <h3>Vencimiento</h3>
            <div class="selection">
                <div class="date">
                    <select name="months" id="months">
                        <option value="mes">Mes</option>
                        <option value="Jan">01</option>
                        <option value="Feb">02</option>
                        <option value="Mar">03</option>
                        <option value="Apr">04</option>
                        <option value="May">05</option>
                        <option value="Jun">06</option>
                        <option value="Jul">07</option>
                        <option value="Aug">08</option>
                        <option value="Sep">09</option>
                        <option value="Oct">10</option>
                        <option value="Nov">11</option>
                        <option value="Dec">12</option>
                    </select>
                    <select name="years" id="years">
                        <option value="año">Año</option>
                        <option value="2023">2023</option>
                        <option value="2024">2024</option>
                        <option value="2025">2025</option>
                        <option value="2026">2026</option>
                        <option value="2027">2027</option>
                        <option value="2028">2028</option>
                        <option value="2029">2029</option>
                        <option value="2030">2030</option>
                        <option value="2031">2031</option>
                        <option value="2032">2032</option>
                        <option value="2033">2033</option>
                        <option value="2034">2034</option>
                        <option value="2035">2035</option>
                    </select>
                </div>
                <div class="cards">
                    <img src="/assets/mc.png" alt="">
                    <img src="/assets/vi.png" alt="">
                    <img src="/assets/pp.png" alt="">
                </div>
            </div>
            <div id="expirationErrorMessage" class="error-message"></div>
        </div>
        <button class="btn btn-bd-primary btn-lg" id="addCardBtn">Agregar nueva tarjeta</button><br><br>
        <!--<a class="boton" href="#" id="addCardBtn">Añadir tarjeta</a>-->
        <!--<button class="btn btn-bd-primary btn-lg" onclick="agregarTarjeta()">Agregar nueva tarjeta</button><br><br>-->
    </div>
</div>

    <script src="/js/tarjeta.js"></script>

<script src="/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<!-- FOOTER -->
<footer class="container">
  <p class="float-end"><a href="#">Volver al inicio</a></p>
  <p>&copy; 2023 Chic Venue, Inc. &middot; <a href="#">Privacidad</a> &middot; <a href="#">Términos</a></p>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</body>
</html>
