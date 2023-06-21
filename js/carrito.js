/* BOTON PARA AUMENTAR O DISMINUIR LA CANTIDAD */
// const decreaseButton = document.querySelector('.decrease-button');
// const increaseButton = document.querySelector('.increase-button');
// const quantityInput = document.querySelector('.quantity-input');
const usuario = document.getElementById("usuario");
const email = document.getElementById("correo");
const mensaje = document.getElementById("base");

// decreaseButton.addEventListener('click', function () {
//   let currentValue = parseInt(quantityInput.value);
//   if (currentValue > 1) {
//     quantityInput.value = currentValue - 1;
//   }
// });
// increaseButton.addEventListener('click', function () {
//   let currentValue = parseInt(quantityInput.value);
//   quantityInput.value = currentValue + 1;
// });

/* BOTON ELIMINAR EL PRODUCTO*/
// const deleteButtons = document.querySelectorAll('.delete-button');

// deleteButtons.forEach(button => {
//   button.addEventListener('click', () => {
//     const confirmationPopup = document.createElement('div');
//     confirmationPopup.className = 'confirmation-popup';
//     confirmationPopup.innerHTML = `
//   <p>¿Esta seguro de eliminar este producto?</p>
//   <button class="confirm-yes">Sí</button>
//   <button class="confirm-no">No</button>
//   <span class="close-button">X</span>
// `;
//     const closeBtn = confirmationPopup.querySelector('.close-button');
//     const confirmYesBtn = confirmationPopup.querySelector('.confirm-yes');
//     const confirmNoBtn = confirmationPopup.querySelector('.confirm-no');

//     closeBtn.addEventListener('click', () => {
//       document.body.removeChild(confirmationPopup);
//     });

//     confirmNoBtn.addEventListener('click', () => {
//       document.body.removeChild(confirmationPopup);
//     });

//     document.body.appendChild(confirmationPopup);
//     confirmationPopup.style.display = 'block';
//   });
// });

/* BOTON PARA AÑADIR A FAVORITOS */
// const favoriteButtons = document.querySelectorAll('.favorite-button');

// favoriteButtons.forEach(button => {
//   button.addEventListener('click', () => {
//     const confirmationPopup = document.createElement('div');
//     confirmationPopup.className = 'confirmation-popup';
//     confirmationPopup.innerHTML = `
//   <p>¿Esta seguro de añadir este producto a favoritos?</p>
//   <button class="confirm-yes">Sí</button>
//   <button class="confirm-no">No</button>
//   <span class="close-button">X</span>
// `;
//     const closeBtn = confirmationPopup.querySelector('.close-button');
//     const confirmYesBtn = confirmationPopup.querySelector('.confirm-yes');
//     const confirmNoBtn = confirmationPopup.querySelector('.confirm-no');

//     closeBtn.addEventListener('click', () => {
//       document.body.removeChild(confirmationPopup);
//     });

//     confirmNoBtn.addEventListener('click', () => {
//       document.body.removeChild(confirmationPopup);
//     });

//     confirmYesBtn.addEventListener('click', () => {
//       const addedToFavoritesPopup = document.createElement('div');
//       addedToFavoritesPopup.className = 'confirmation-popup';
//       addedToFavoritesPopup.innerHTML = `
//         <p>El producto ha sido añadido a favoritos</p>

//       `;
//       document.body.removeChild(confirmationPopup);
//       document.body.appendChild(addedToFavoritesPopup);
//       addedToFavoritesPopup.style.display = 'block';

//       setTimeout(() => {
//         document.body.removeChild(addedToFavoritesPopup);
//       }, 2000);
//     });

//     document.body.appendChild(confirmationPopup);
//     confirmationPopup.style.display = 'block';
//   });
// });

function user() {
  const Toast = Swal.mixin({
      toast: true,
      html: `<h3 class="text_toast"> <b>Nombre:</b> ${usuario.textContent}</h3><br>
          <h3 class="text_toast"> <b>Correo:</b> ${email.textContent}</h3>`,
      position: 'top-end',
      showConfirmButton: true,
      showDenyButton:true,
      showCancelButton:true,
      confirmButtonText: 'Ir al perfil',
      denyButtonText: 'Cerrar Sesión',
      cancelButtonText: 'Ok'
  })
  
  Toast.fire({
      icon: 'info',
      title: 'Cuenta'
  }).then((result) => {
      if (result.isConfirmed){
          location.href = "perfil_usuario.php";
      }
      else if (result.isDenied){
          var valor = 0;
          location.href = "index.php?valor=" + encodeURIComponent(valor);
      }
      else if(result.isDismissed){
          var valor = 3;
      }
  })
  
  
}

// Obtén todos los botones de incremento y decremento
const increaseButtons = document.querySelectorAll('.increase-button');
const decreaseButtons = document.querySelectorAll('.decrease-button');

const totalElement = document.getElementById('resumen_total');

// Obtener el costo de envío inicial
const shippingCost = 50.00;

// Función para actualizar el resumen del pedido
function actualizarResumen(subtotal) {
  // Calcular el total sumando el subtotal y el costo de envío
  const total = subtotal + shippingCost;

  // Actualizar los elementos del resumen del pedido
  totalElement.textContent = 'Total a pagar: $' + total.toFixed(2);
  return total;
}

// Función para calcular el subtotal por producto
function calcularSubtotalPorProducto(input) {
  const price = parseFloat(input.getAttribute('data-price'));
  const subtotalAmount = input.parentNode.parentNode.nextElementSibling.querySelector('.subtotal-amount');
  const quantity = parseInt(input.value);
  const subtotal = quantity * price;

  // Actualiza el valor del subtotal por producto en el elemento HTML
  subtotalAmount.textContent = '$' + subtotal.toFixed(2);

  return subtotal;
}

// Función para calcular el subtotal total de todos los productos
function calcularSubtotalTotal() {
  const subtotalAmounts = document.querySelectorAll('.subtotal-amount');
  let subtotalTotal = 0;

  // Recorre todos los subtotales por producto y suma los subtotales totales
  subtotalAmounts.forEach(subtotalAmount => {
    const subtotal = parseFloat(subtotalAmount.textContent.slice(1));
    subtotalTotal += subtotal;
  });

  // Actualiza el valor del subtotal total en el elemento HTML
  const subtotalTotalElement = document.getElementById('resumen_subtotal');
  subtotalTotalElement.textContent = 'Subtotal: $' + subtotalTotal.toFixed(2);
  var total = actualizarResumen(subtotalTotal)
  return total;
}

// Agrega los controladores de eventos a cada botón de incremento
increaseButtons.forEach(button => {
  button.addEventListener('click', () => {
    const targetId = button.getAttribute('data-target');
    const input = document.getElementById(targetId);
    if (input) {
      const currentValue = parseInt(input.value);
      input.value = currentValue + 1;
      calcularSubtotalPorProducto(input); // Actualiza el subtotal por producto
      calcularSubtotalTotal(); // Actualiza el subtotal total
    }
  });
});

// Agrega los controladores de eventos a cada botón de decremento
decreaseButtons.forEach(button => {
  button.addEventListener('click', () => {
    const targetId = button.getAttribute('data-target');
    const input = document.getElementById(targetId);
    if (input) {
      const currentValue = parseInt(input.value);
      if (currentValue > 1) {
        input.value = currentValue - 1;
        calcularSubtotalPorProducto(input); // Actualiza el subtotal por producto
        calcularSubtotalTotal(); // Actualiza el subtotal total
      }
    }
  });
});

// Calcula el subtotal por producto y el subtotal total inicial al cargar la página
const quantityInputs = document.querySelectorAll('.quantity-input');
quantityInputs.forEach(input => {
  calcularSubtotalPorProducto(input);
});
calcularSubtotalTotal();

if((mensaje.textContent).length > 0 ){
  switch (mensaje.textContent) {  
      case "Fav":
          Swal.fire({
              title: 'Exito!',
              text: 'Se agrego a favoritos',
              icon: 'success',
              showConfirmButton: 'Aceptar'
          });
          break;    
      case "Ya esta":
          Swal.fire({
              title: 'Error!',
              text: 'Ya existe en tus favoritos',
              icon: 'error',
              showConfirmButton: 'Aceptar'
          });
          break;
        case "Ha habido un problema":
          Swal.fire({
              title: 'Error!',
              text: 'No existe ningun producto con esa especificación',
              icon: 'error',
              showConfirmButton: 'Aceptar'
          });
          break; 
      case "Car borrado":
          Swal.fire({
              title: 'Exito!',
              text: 'Se ha borrado exitosamente',
              icon: 'success',
              showConfirmButton: 'Aceptar'
          });
          break;     
      default:
          break;
  }
  
}


function enviarDatos() {
  var tot = calcularSubtotalTotal();
  // Crear un formulario dinámico
  var form = document.createElement('form');
  form.method = 'post';
  form.action = '/php/metodoP.php';

  // Agregar los campos ocultos con los datos del artículo
  var inputNombre = document.createElement('input');
  inputNombre.type = 'hidden';
  inputNombre.name = 'total';
  inputNombre.value = tot;
  form.appendChild(inputNombre);

  // Agregar el formulario al documento y enviarlo
  document.body.appendChild(form);
  form.submit();
}

function redirecPro(){
  location.href = "/products.php";
}
