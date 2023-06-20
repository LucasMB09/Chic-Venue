document.addEventListener('DOMContentLoaded', function() {
  var buttons = document.querySelectorAll('.btn-circle');
  buttons.forEach(function(button) {
    button.addEventListener('click', async function(e) {
      e.preventDefault(); // Evita que el formulario se envíe automáticamente
      try {
        var loggedIn = await isLoggedIn();
        if (loggedIn) {
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
      } catch (error) {
        console.error(error);
        // Mostrar algún mensaje de error en caso de que ocurra un problema con la llamada AJAX
      }
    });
  });

  // Función para verificar si el usuario ha iniciado sesión y está activado
  function isLoggedIn() {
    return new Promise(function(resolve, reject) {
      var xhr = new XMLHttpRequest();
      xhr.open('GET', 'products.php?checkSession=true', true);
      xhr.onreadystatechange = function() {
        if (xhr.readyState === 4) {
          if (xhr.status === 200) {
            var response = JSON.parse(xhr.responseText);
            if (response.loggedIn && response.activated) {
              resolve(true);
            } else {
              resolve(false);
            }
          } else {
            reject('Error en la solicitud de verificación');
          }
        }
      };
      xhr.send();
    });
  }
    
  // Función para mostrar la alerta de agregar a carrito o iniciar sesión
  async function showAddToCartAlert() {
    try {
      var loggedIn = await isLoggedIn();
      if (loggedIn) {
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
            location.href = "log-in.php";
          }
        });
      }
    } catch (error) {
      console.error(error);
      // Mostrar algún mensaje de error en caso de que ocurra un problema con la llamada AJAX
    }
  }
  
  async function showAddToFavoritesAlert() {
    try {
      var loggedIn = await isLoggedIn();
      if (!loggedIn) {
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
        Swal.fire({
          title: 'Añadido a favoritos',
          text: 'El producto ha sido añadido a favoritos.',
          icon: 'success',
          timer: 1500,
          timerProgressBar: true,
          showConfirmButton: false
        });
      }
    } catch (error) {
      console.error(error);
      // Mostrar algún mensaje de error en caso de que ocurra un problema con la llamada AJAX
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
  
  function handleAgregarAFavoritos(button) {
    var nombre_articulo = button.getAttribute('data-nombre');
    var precio = button.getAttribute('data-precio');
    var imagen = button.getAttribute('data-imagen');
    console.log('Botón de favoritos clicado');
    showAddToFavoritesAlert();
  
    // Realiza una solicitud AJAX para enviar los datos a favoritos.php
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'favoritos.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
        // La solicitud se completó correctamente
        console.log('Datos enviados a favoritos.php');
        // Aquí puedes realizar alguna acción después de enviar los datos
        // Por ejemplo, actualizar la página o realizar otra operación
        // Puedes obtener la respuesta del servidor usando xhr.responseText si es necesario
        // También puedes mostrar el contenedor de favoritos en este punto
      }
    };
    var data = 'nombre_articulo=' + encodeURIComponent(nombre_articulo) +
               '&precio=' + encodeURIComponent(precio) +
               '&imagen=' + encodeURIComponent(imagen);
    xhr.send(data);
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
