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
    <title>Registro tarjeta</title>


</head>

<body>

  <!-- LINEA NEGRA -->
  <nav class="navbar bg-dark" data-bs-theme="dark">
    <div class="container-fluid">
   <br><br>
 </div>
 </nav>
 <!--FIN LINEA NEGRA -->

   <!-- MENU DE NAVEGACION -->
   <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="/html/index.html">
        <img src="/assets/logo.jpg" class="rounded mx-auto d-block"  alt="" width="82" height="70">
      </a>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/html/products.html">Novedades</a> <!-- PESTAÑA NOVEDADES -->
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/html/products.html">Rebajas</a> <!-- RESTAÑA REBAJAS -->
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/html/products.html">Un poco de todo </a> <!-- PESTAÑA PARA REVISAR ARTICULOS -->
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
           <li class="nav-item">
            &nbsp;&nbsp;&nbsp;&nbsp;
             <a class="navbar-brand" href="./log-in.html"> <!-- INCIAR SESION -->
             <img src="../assets/usuario.png" alt="carrito" width="30" height="30" class="d-inline-block align-text-top">
            </a>
          </li>
          <li class="nav-item">
            &nbsp;&nbsp;&nbsp;&nbsp;
             <a class="navbar-brand" href="./favoritos.html"> <!-- ACCEDER A FAVORITOS-->
             <img src="../assets/favoritos.JPG" alt="carrito" width="30" height="30" class="d-inline-block align-text-top">
            </a>
          </li>
          <li class="nav-item">
            &nbsp;&nbsp;&nbsp;&nbsp;
            <a class="navbar-brand" href="./carrito.html"> <!-- ACCEDER AL CARRITO-->
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
        <a class="boton" href="#" id="addCardBtn">Añadir tarjeta</a>
    </div>
</div>


    <script>
        // Validación del CVV
        var cvvInput = document.getElementById("cvvInput");
        var cvvErrorMessage = document.getElementById("cvvErrorMessage");

        cvvInput.addEventListener("input", function () {
            var cvvValue = cvvInput.value.trim();
            var numbersOnly = cvvValue.replace(/\D/g, '');

            if (numbersOnly.length === 3) {
                cvvInput.value = numbersOnly;
                cvvErrorMessage.textContent = '';
            } else {
                cvvInput.value = numbersOnly;
                cvvErrorMessage.textContent = "El CVV no es válido";
            }
        });

        // Validación del número de tarjeta
        var cardNumberInput = document.getElementById('card-number-input');
        var cardNumberErrorMessage = document.getElementById('cardNumberErrorMessage');

        cardNumberInput.addEventListener('input', function () {
            var cardNumber = cardNumberInput.value.trim();
            var numericCardNumber = cardNumber.replace(/\D/g, '');

            if (numericCardNumber.length === 16) {
                cardNumberInput.value = numericCardNumber;
                cardNumberErrorMessage.textContent = '';
            } else {
                cardNumberInput.value = numericCardNumber;
                cardNumberErrorMessage.textContent = 'El número de tarjeta no es válido';
            }
        });

        // Validación del nombre del titular de la tarjeta
        var ownerNameInput = document.getElementById('owner-name-input');
        var ownerNameErrorMessage = document.getElementById('ownerNameErrorMessage');

        ownerNameInput.addEventListener('input', function () {
            var ownerName = ownerNameInput.value.trim();
            var regex = /^[A-Za-z\s]+$/; // Expresión regular para letras y espacios

            if (!regex.test(ownerName)) {
                ownerNameInput.value = ownerName.replace(/[^A-Za-z\s]/g, ''); // Eliminar caracteres no permitidos
            }
        });

        // Botón añadir tarjeta
        document.getElementById('addCardBtn').addEventListener('click', function (event) {
            event.preventDefault();

            var ownerName = ownerNameInput.value.trim();
            var cvvValue = cvvInput.value.trim();
            var cardNumber = cardNumberInput.value.trim();
            var monthsSelect = document.getElementById('months');
            var yearsSelect = document.getElementById('years');
            var selectedMonth = monthsSelect.value;
            var selectedYear = yearsSelect.value;

            var errorCount = 0; // Contador de errores

            if (ownerName.length === 0) {
                ownerNameErrorMessage.textContent = 'Por favor, introduzca el nombre del titular de la tarjeta';
                ownerNameErrorMessage.style.color = 'red';
                errorCount++;
            } else {
                ownerNameErrorMessage.textContent = '';
            }

            if (cardNumber.length === 0) {
                cardNumberErrorMessage.textContent = 'Por favor, introduzca el número de tarjeta';
                cardNumberErrorMessage.style.color = 'red';
                errorCount++;
            } else {
                cardNumberErrorMessage.textContent = '';
            }

            if (cvvValue.length === 0) {
                cvvErrorMessage.textContent = 'Por favor, introduzca el CVV';
                cvvErrorMessage.style.color = 'red';
                errorCount++;
            } else {
                cvvErrorMessage.textContent = '';
            }

            if (selectedMonth === 'mes' || selectedYear === 'año') {
                expirationErrorMessage.textContent = 'Por favor, seleccione la fecha de vencimiento';
                expirationErrorMessage.style.color = 'red';
                errorCount++;
            } else {
                expirationErrorMessage.textContent = '';
            }

            if (errorCount === 0) {
                var message = document.createElement('div');
                message.className = 'message';
                message.textContent = 'La tarjeta fue añadida exitosamente';
                document.body.appendChild(message);

                setTimeout(function () {
                    message.remove();
                }, 3000);
            }
        });
    </script>

<script src="/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<!-- FOOTER -->
<footer class="container">
  <p class="float-end"><a href="#">Volver al inicio</a></p>
  <p>&copy; 2023 Chic Venue, Inc. &middot; <a href="#">Privacidad</a> &middot; <a href="#">Términos</a></p>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</body>
 <!-- FOOTER -->
 <footer class="container">
  <nav class="navbar bg-dark" data-bs-theme="dark">
    <div class="container-fluid">
    </div>
    </nav>
    <br>
    <div class="row">
      <div class="col-12 col-md">
        <img class="logo" src="/assets/logo_CA.PNG"  width="24" height="19" alt="Logotipo de Chic Avenue" >
        <small class="d-block mb-3 text-body-secondary">&copy; 2022–2023</small>
      </div>
      <div class="col-6 col-md">
        <h5>Nosotros</h5>
        <ul class="list-unstyled text-small">
          <li class="mb-1"><a class="link-secondary text-decoration-none" href="./preguntas.php">Preguntas frecuentes</a></li>
          <li class="mb-1"><a class="link-secondary text-decoration-none" href="./products.php">Random feature</a></li>

        </ul>
      </div>
      <div class="col-6 col-md">
        <h5>Catálogo</h5>
        <ul class="list-unstyled text-small">
          <li class="mb-1"><a class="link-secondary text-decoration-none" href="../products.php">Tendencia</a></li>
          <li class="mb-1"><a class="link-secondary text-decoration-none" href="./products.php">Descuentos</a></li>
          <li class="mb-1"><a class="link-secondary text-decoration-none" href="./products.php">Promociones</a></li>
        </ul>
      </div>
      <div class="col-6 col-md">
        <h5>Atención a cliente</h5>
        <ul class="list-unstyled text-small">
          <li class="mb-1"><a class="link-secondary text-decoration-none" href="./preguntas.php">Contactos</a></li>
          <li class="mb-1"><a class="link-secondary text-decoration-none" href="./preguntas.php">Ubicación</a></li>
          <li class="mb-1"><a class="link-secondary text-decoration-none" href="#"></a></li>
          <li class="mb-1"><a class="link-secondary text-decoration-none" href="#"></a></li>
        </ul>
      </div>
    </div></footer>
</html>
