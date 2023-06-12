/* BOTON PARA AUMENTAR O DISMINUIR LA CANTIDAD */
const decreaseButton = document.querySelector('.decrease-button');
const increaseButton = document.querySelector('.increase-button');
const quantityInput = document.querySelector('.quantity-input');
const usuario = document.getElementById("usuario");
const email = document.getElementById("correo");

decreaseButton.addEventListener('click', function () {
  let currentValue = parseInt(quantityInput.value);
  if (currentValue > 1) {
    quantityInput.value = currentValue - 1;
  }
});
increaseButton.addEventListener('click', function () {
  let currentValue = parseInt(quantityInput.value);
  quantityInput.value = currentValue + 1;
});

/* BOTON ELIMINAR EL PRODUCTO*/
const deleteButtons = document.querySelectorAll('.delete-button');

deleteButtons.forEach(button => {
  button.addEventListener('click', () => {
    const confirmationPopup = document.createElement('div');
    confirmationPopup.className = 'confirmation-popup';
    confirmationPopup.innerHTML = `
  <p>¿Esta seguro de eliminar este producto?</p>
  <button class="confirm-yes">Sí</button>
  <button class="confirm-no">No</button>
  <span class="close-button">X</span>
`;
    const closeBtn = confirmationPopup.querySelector('.close-button');
    const confirmYesBtn = confirmationPopup.querySelector('.confirm-yes');
    const confirmNoBtn = confirmationPopup.querySelector('.confirm-no');

    closeBtn.addEventListener('click', () => {
      document.body.removeChild(confirmationPopup);
    });

    confirmNoBtn.addEventListener('click', () => {
      document.body.removeChild(confirmationPopup);
    });

    document.body.appendChild(confirmationPopup);
    confirmationPopup.style.display = 'block';
  });
});

/* BOTON PARA AÑADIR A FAVORITOS */
const favoriteButtons = document.querySelectorAll('.favorite-button');

favoriteButtons.forEach(button => {
  button.addEventListener('click', () => {
    const confirmationPopup = document.createElement('div');
    confirmationPopup.className = 'confirmation-popup';
    confirmationPopup.innerHTML = `
  <p>¿Esta seguro de añadir este producto a favoritos?</p>
  <button class="confirm-yes">Sí</button>
  <button class="confirm-no">No</button>
  <span class="close-button">X</span>
`;
    const closeBtn = confirmationPopup.querySelector('.close-button');
    const confirmYesBtn = confirmationPopup.querySelector('.confirm-yes');
    const confirmNoBtn = confirmationPopup.querySelector('.confirm-no');

    closeBtn.addEventListener('click', () => {
      document.body.removeChild(confirmationPopup);
    });

    confirmNoBtn.addEventListener('click', () => {
      document.body.removeChild(confirmationPopup);
    });

    confirmYesBtn.addEventListener('click', () => {
      const addedToFavoritesPopup = document.createElement('div');
      addedToFavoritesPopup.className = 'confirmation-popup';
      addedToFavoritesPopup.innerHTML = `
        <p>El producto ha sido añadido a favoritos</p>

      `;
      document.body.removeChild(confirmationPopup);
      document.body.appendChild(addedToFavoritesPopup);
      addedToFavoritesPopup.style.display = 'block';

      setTimeout(() => {
        document.body.removeChild(addedToFavoritesPopup);
      }, 2000);
    });

    document.body.appendChild(confirmationPopup);
    confirmationPopup.style.display = 'block';
  });
});

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