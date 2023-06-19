document.addEventListener('DOMContentLoaded', function() {
  var buttons = document.querySelectorAll('.btn-circle');
  buttons.forEach(function(button) {
    button.addEventListener('click', async function(e) {
      e.preventDefault(); // Evita que el formulario se envíe automáticamente
      if (isLoggedIn()) {
        button.classList.toggle('active'); // Alternar la clase 'active' en el botón clicado
        button.blur(); // Quitar el enfoque del botón para evitar la apariencia de selección
        if (button.getAttribute('name') === 'add') {
          var nombre_articulo = button.getAttribute('data-nombre');
          var precio = button.getAttribute('data-precio');
          handleAgregarAlCarrito(nombre_articulo, precio);
        } else if (button.getAttribute('name') === 'favorite') {
          handleAgregarAFavoritos(button);
        }
        resetButtons(buttons, button); // Restablecer el estado de los botones
      } else {
        if (button.getAttribute('name') === 'add') {
          showAddToCartAlert();
        } else if (button.getAttribute('name') === 'favorite') {
          showAddToFavoritesAlert();
        }
      }
    });
  });


    // Función para verificar si el usuario ha iniciado sesión y está activado
  // Función para verificar si el cliente ha iniciado sesión
  function isLoggedIn() {
    var formulario = document.getElementById("login");
    var inputs = formulario.querySelectorAll("input");
    var campos = {
      email: false,
      pass: false
    };

    for (var i = 0; i < inputs.length; i++) {
      var input = inputs[i];
      var campo = input.name.substring(1);
      var expresion = exp[campo];
      validarCampo(expresion, input, campo);
      campos[campo] = expresion.test(input.value);
    }

    return campos.email && campos.pass;
  }
    
  // Función para mostrar la alerta de agregar a carrito o iniciar sesión
  function showAddToCartAlert() {
    if (isLoggedIn()) {
      // El cliente está activado
      Swal.fire({
        title: 'Añadido al carrito',
        text: 'El producto ha sido añadido al carrito.',
        icon: 'success',
        timer: 1500,
        timerProgressBar: true,
        showConfirmButton: false
      });
    } else {
      // El cliente no está activado
      Swal.fire({
        title: 'Alerta',
        text: 'Se requiere iniciar sesión con una cuenta activada para realizar una compra.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Iniciar sesión'
      }).then((result) => {
        if (result.isConfirmed) {
          location.href = "log-in.php";
        }
      });
    }
  }
  
  function showAddToFavoritesAlert() {
    if (!isLoggedIn()) {
      // El cliente no está activado
      Swal.fire({
        title: 'Alerta',
        text: 'Se requiere iniciar sesión con una cuenta activada para añadir a favoritos.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Iniciar sesión'
      }).then((result) => {
        if (result.isConfirmed) {
          location.href = "log-in.php";
        }
      });
    } else {
      // El cliente está activado
      Swal.fire({
        title: 'Añadido a favoritos',
        text: 'El producto ha sido añadido a favoritos.',
        icon: 'success',
        timer: 1500,
        timerProgressBar: true,
        showConfirmButton: false
      });
    }
  }
  
    // Función para manejar el evento de clic en el botón de carrito
    function handleAgregarAlCarrito(nombre_articulo, precio) {
      // Aquí puedes agregar la lógica para manejar el evento de agregar al carrito
      // Por ejemplo, puedes enviar una solicitud al servidor para agregar el producto al carrito
      // y luego mostrar la alerta correspondiente
      console.log('Producto agregado al carrito:', nombre_articulo, precio);
      showAddToCartAlert();
    }
  
    // Función para manejar el evento de clic en el botón de favoritos
    function handleAgregarAFavoritos(button) {
      console.log('Botón de favoritos clicado');
      var id_articulo = button.getAttribute('data-id-articulo');
      var nombre_articulo = button.getAttribute('data-nombre');
      var precio = button.getAttribute('data-precio');
      var imagen = button.parentNode.querySelector('img');
      var url_imagen = imagen.getAttribute('src');
  
      // Objeto con los datos del producto
      var producto = {
        id_articulo: id_articulo,
        nombre_articulo: nombre_articulo,
        precio: precio,
        url_imagen: url_imagen
      };
  
      // Enviar los datos mediante una solicitud AJAX para agregar el producto a favoritos en la base de datos
      var xhr = new XMLHttpRequest();
      xhr.open('POST', '../favoritos.php', true); // Ajusta la ruta a '../favoritos.php'
      xhr.setRequestHeader('Content-Type', 'application/json');
      xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
          console.log('Producto añadido a favoritos');
          // Agregar el nuevo elemento en la página de favoritos
          agregarElementoFavorito(producto);
        } else if (xhr.readyState === 4 && xhr.status !== 200) {
          console.error('Error al añadir el producto a favoritos');
          // Aquí puedes mostrar un mensaje de error al usuario si la solicitud falla
        }
      };
      xhr.send(JSON.stringify(producto));
    }
  
    function agregarElementoFavorito(producto) {
      // Crear un nuevo elemento <section> con los datos del producto
      var section = document.createElement('section');
      section.classList.add('contenedor');
  
      var innerHTML = `
        <div class="caja-principal">
          <div class="imagen">
            <img src="${producto.url_imagen}" alt="">
          </div>
          <div class="texto">
            <p class="descripcion">${producto.nombre_articulo}</p>
          </div>
          <div class="carrito">
            <a class="boton1" href="#">Añadir al carrito</a>
          </div>
          <div class="delete">
            <p>${producto.precio}</p>
            <a class="boton2" href="#">Eliminar</a>
          </div>
        </div>
      `;
  
      section.innerHTML = innerHTML;
  
      // Agregar el nuevo elemento al contenedor de favoritos
      var favoritosContainer = document.getElementById('favoritos-container');
      console.log(favoritosContainer); // Verificar si el elemento se encuentra correctamente
  
      favoritosContainer.appendChild(section);
    }

    const formulario = document.getElementById("login");
    const inputs = document.querySelectorAll("#login input");
    const mensaje = document.getElementById("mensaje");
    
    const exp = {
        email: /^[a-zA-Z0-9._+-]+@[a-zA-Z0-9-]+\.[a-zA-Z]{2,}$/,
        pass: /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()])[a-zA-Z\d!@#$%^&*()]{8,}$/
    }
    
    const campos = {
        email: false,
        pass: false
    }
    
    const validarFormulario = (e) => {
        switch (e.target.name) {
            case "iemail":
                validarCampo(exp.email, e.target,"email");
            break;
            case "ipass":
                validarCampo(exp.pass, e.target,"pass");
                
            break;
        }
    }
    
    
    const validarCampo = (expresion, input, campo) => {
        if(expresion.test(input.value)){
            document.getElementById(`${campo}`).classList.remove('formulario_grupo-incorrecto');
            document.getElementById(`${campo}`).classList.add('formulario_grupo-correcto');
        document.querySelector(`#${campo} i`).classList.add('fa-check-circle');
        document.querySelector(`#${campo} i`).classList.remove('fa-times-circle');
            campos[campo] = true;
        } else{
            document.getElementById(`${campo}`).classList.add('formulario_grupo-incorrecto');
            document.getElementById(`${campo}`).classList.remove('formulario_grupo-correcto');
        document.querySelector(`#${campo} i`).classList.add('fa-times-circle');
        document.querySelector(`#${campo} i`).classList.remove('fa-check-circle');
            campos[campo] = false;
        }
    }
    
    inputs.forEach((input) => {
      input.addEventListener('keyup', validarFormulario);
      input.addEventListener('blur', validarFormulario);
    });
    
    formulario.addEventListener('submit', (e) => {
      if(campos.email && campos.pass){
          document.getElementById('formulario_mensaje-exito').classList.add('formulario_mensaje-exito-activo');
        setTimeout(() => {
          document.getElementById('formulario_mensaje-exito').classList.remove('formulario_mensaje-exito-activo');
        }, 5000);
    
        document.querySelectorAll('.formulario_grupo-correcto').forEach((icono) => {
          icono.classList.remove('formulario_grupo-correcto');
        });
          console.log("Llenado");
    
      }
        
        else{
            e.preventDefault();
        //document.getElementById('formulario_mensaje').classList.add('formulario_mensaje-activo');
            Swal.fire({
                title: '¡Error!',
                text: 'Se deben completar todos los campos obligatorios.',
                icon: 'error',
                showConfirmButton: 'Aceptar'
              });
        console.log("llena campos");
        }
        
    });
    
    function go_login() {
        window.location.href = 'index.php';
    }
    
    
    if((mensaje.textContent).length > 0 ){
        switch (mensaje.textContent) {
            case "¡Te has registrado correctamente!":
                Swal.fire({
                    title: 'Exito!',
                    text: '¡Te has registrado correctamente!',
                    icon: 'success',
                    showConfirmButton: 'Aceptar'
                });
                break;
            case "La contraseña es incorrecta":
                Swal.fire({
                    title: '¡Error!',
                    text: 'Contraseña incorrecta',
                    icon: 'error',
                    showConfirmButton: 'Aceptar'
                });
                break;
            case "No existe ninguna cuenta asociada a ese correo":
                Swal.fire({
                    title: '¡Error!',
                    text: 'Correo inválido o no registrado',
                    icon: 'error',
                    showConfirmButton: 'Aceptar'
                });
                break;
            case "No se ha activado la cuenta":
                Swal.fire({
                    title: '¡Error!',
                  //  text: 'No se ha activado la cuenta',
                    html: '<p>No se ha activado la cuenta.</p>' +
                  '<p><a href="../php/enviar_correo.php">¿Confirmar correo electrónico?</a></p>',
                    icon: 'error',
                    confirmButtonText: 'Cancelar'
                });
                break;
            case "Hubo un error":
                Swal.fire({
                    title: 'Error!',
                    text: 'No se ha activado la cuenta',
                    icon: 'error',
                    showConfirmButton: 'Aceptar'
                });
                break;    
            default:
                break;
        }
        
    }
  
  // Restablecer el estado de los botones
  function resetButtons(buttons, activeButton) {
    buttons.forEach(function(button) {
      if (button !== activeButton) {
        button.classList.remove('active');
      }
    });
  }
});
  