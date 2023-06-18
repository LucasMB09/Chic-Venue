document.addEventListener('DOMContentLoaded', function() {
    var buttons = document.querySelectorAll('.btn-circle');
    buttons.forEach(function(button) {
      button.addEventListener('click', function(e) {
        e.preventDefault(); // Evita que el formulario se envíe automáticamente
        if (!isLoggedIn()) {
          if (button.getAttribute('name') === 'add') {
            showAddToCartAlert();
          } else if (button.getAttribute('name') === 'favorite') {
            showAddToFavoritesAlert();
          }
        } else {
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
        }
      });
    });
  
    // Función para verificar si el cliente está activado
    function isClienteActivado(clienteId, callback) {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', '../php/verificar_cliente.php?clienteId=' + clienteId, true);
        xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var activado = xhr.responseText;
            callback(activado === '1'); // Llama al callback con un valor booleano indicando si el cliente está activado
        }
        };
        xhr.send();
    }

    // Función para obtener el ID del cliente
    function obtenerClienteId() {
        // Lógica para obtener el ID del cliente
        // Por ejemplo, si tienes un elemento en el DOM con el ID 'clienteId', puedes obtener su valor así:
        var clienteIdElement = document.getElementById('clienteId');
        if (clienteIdElement) {
        return clienteIdElement.value;
        } else {
        return null; // Si no se encuentra el elemento, retorna null o un valor adecuado según tu caso
        }
    }

    // Función para verificar si el usuario ha iniciado sesión y está activado
    function isLoggedIn() {
        var clienteId = obtenerClienteId(); // Obtener el ID del cliente desde donde lo obtengas
        if (clienteId) {
        isClienteActivado(clienteId, function(estaActivado) {
            if (estaActivado) {
            // El cliente está activado
            // Aquí puedes realizar las acciones correspondientes
            console.log('El cliente está activado');
            } else {
            // El cliente no está activado
            // Aquí puedes realizar las acciones correspondientes
            console.log('El cliente no está activado');
            }
        });
        } else {
        // No se puede obtener el ID del cliente
        // Aquí puedes realizar las acciones correspondientes
        console.log('No se puede obtener el ID del cliente');
        }
    }
    

// Función para mostrar la alerta de agregar a carrito o iniciar sesión
    function showAddToCartAlert() {
        if (isLoggedIn()) {
        Swal.fire({
            title: 'Añadido al carrito',
            text: 'El producto ha sido añadido al carrito.',
            icon: 'success',
            timer: 1500,
            timerProgressBar: true,
            showConfirmButton: false
        });
        } else {
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
            location.href = "log-in.php"; // Redirigir al usuario a la página de inicio de sesión
            }
        });
        }
    }
  
    // Función para mostrar la alerta de agregar a favoritos o iniciar sesión
    function showAddToFavoritesAlert() {
      if (!isLoggedIn()) {
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
            location.href = "log-in.php"; // Redirigir al usuario a la página de inicio de sesión
          }
        });
      } else {
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
  
    // Restablecer el estado de los botones
    function resetButtons(buttons, activeButton) {
      buttons.forEach(function(button) {
        if (button !== activeButton) {
          button.classList.remove('active');
        }
      });
    }
  });
  