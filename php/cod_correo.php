<?php
    session_start();

    $codigopag = $_SESSION['codigo'];
    if(isset($_POST['codigo'])){
        $codigousu = $_POST['codigo'];
    }

    $conexion = mysqli_connect("localhost", "root", "", "chicvenue");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <script src="/docs/5.3/assets/js/color-modes.js"></script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/activacion.css">
  <script src="../sweetalert/dist/sweetalert2.all.min.js"></script>

</head>
<title>Activación de cuenta exitosa</title>

<body class="p-3 m-0 border-0 bd-example">
  <!-- LINEA NEGRA-->
  <nav class="navbar bg-dark" data-bs-theme="dark">
    <div class="container-fluid">
      <br><br>
      <?php 
        if(isset($_POST['codigo'])){
            ?>
            <h3 style="display:block;"><?php echo "codigo enviado",$codigopag, "codigo usuario", $codigousu;?></h3>
            <?php
            if($codigopag == $codigousu){
                $_SESSION['mensaje']  = "¡Te has registrado correctamente!";
                $email = $_SESSION['email'];

                $query = "UPDATE cliente SET activado = 1 WHERE id_cliente = '$email'";
                $resul = mysqli_query($conexion,$query);
                if($resul){
                    header("Location: ../activacion.php");
                }
                else{
                    $_SESSION['mensaje']  = "Ha habido un problema";
                    header("Location: cod_correo.php");
                }
            }
            else{
                $_SESSION['mensaje'] = "Los códigos no coinciden";
                header("Location: cod_correo.php");
            }
        }

        if(isset($_SESSION['mensaje'])){
            $mensaje = $_SESSION['email'];
            ?>
                <h3 id="uwu" style="display:none;"><?php echo $email;?></h3>
            <?php
        }
      ?>
    </div>
  </nav>
  <!--FIN LINEA NEGRA -->

  <!-- MENU DE NAVEGACION -->
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="/index.php">
        <img src="/assets/logo.jpg" class="rounded mx-auto d-block" alt="" width="82" height="70">
      </a>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/products.php">Novedades</a>
            <!-- PESTAÑA NOVEDADES -->
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/products.php">Rebajas</a> <!-- RESTAÑA REBAJAS -->
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/products.php">Un poco de todo </a> <!-- PESTAÑA PARA REVISAR ARTICULOS -->
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Ropa
            </a>
            <ul class="dropdown-menu">
              <!-- PARA MOSTRAR DISTINTAS CATEGORIAS -->
              <li><a class="dropdown-item" href="#">Mezclilla</a></li>
              <!---->
              <li><a class="dropdown-item" href="#">Sudaderas</a></li>
              <li><a class="dropdown-item" href="#">Vestidos</a></li>
              <li><a class="dropdown-item" href="#">Conjuntos</a></li>
              <li><a class="dropdown-item" href="#">Ropa de descanso</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="#">¡TEMPORADA DE VERANO!</a></li> <!-- TEMPORADAS -->
            </ul>
          </li>
        </ul>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" id="busqueda_text" placeholder="" aria-label="Search">
          <!-- input SEARCH con id="busqueda_text"-->
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
              <img src="/assets/filtro.png" alt="carrito" width="30" height="30"
                class="d-inline-block align-text-top">
            </a>
            <!-- Modal -->
            <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog"
              aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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
          <li class="nav-item">
            <a class="navbar-brand" href="../log-in.php">
              <!-- INCIAR SESION -->
              <img src="/assets/usuario.png" alt="carrito" width="30" height="30"
                class="d-inline-block align-text-top">
            </a>
          </li>
          <li class="nav-item">
            <a class="navbar-brand" href="#">
              <!-- ACCEDER A FAVORITOS-->
              <img src="/assets/favoritos.JPG" alt="carrito" width="30" height="30"
                class="d-inline-block align-text-top">
            </a>
          </li>
          <li class="nav-item">
            <a class="navbar-brand" href="#">
              <!-- ACCEDER AL CARRITO-->
              <img src="/assets/carrito.png" alt="carrito" width="30" height="30"
                class="d-inline-block align-text-top">
            </a>
          </li>
        </ul>
      </div>
    </div>
    </div>
  </nav>


  <!-- FIN MENU DE NAVEGACIÓN -->

  <!--Contenedor de aviso-->

  <div class="container">
    <div class="checked">
        <h2>Por favor ingresa el código que ha sido enviado a tu correo electrónico.</h2>
        <!-- <p></p> -->
        <form id = "codi" action="cod_correo.php" method= "POST" enctype="multipart/form-data">
            <input type="text"  class="letra-texto" name="cod" id="codigo" placeholder="Código*"><br>
            <a href="log-in.php" class="btn">Iniciar sesión</a>
        </form>
    </div>
  </div>

 


</body>

</html>