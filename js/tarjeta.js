// Validación del CVV
var cvvInput = document.getElementById("cvvInput");
var cvvErrorMessage = document.getElementById("cvvErrorMessage");
var aidi = document.getElementById("aidi");


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
document.getElementById('addCardBtn').addEventListener('click', async function  (event) {
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

      let parameters = '';
      parameters += `nombre_titular=${ownerName}&`;
      parameters += `numero_tarjeta=${cardNumber}&`;
      parameters += `vencimiento=${selectedMonth}-${selectedYear}&`;
      parameters += `cvv=${cvvValue}&`;
      parameters += `id_cliente=${aidi}&`; //Solo falta obtener el numero del cliente
      parameters += `nom_banco=${"BBVA"}`; //Y el banco o sino quitenselo pero ya funcionasiuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu
      //Cuando te doy tu for ah bb?jaj no hay falla, de compas bro:'), pos camara sino mañana no me levantoAdios ah bb, descansa, ,gracias hermano igual 

      
      const url = `/php/agregar_tarjeta.php?${parameters}`;

      //Aqui hay que meter la petiicon a bd donde tienes el fetch?Fetch? ammm es que segun yo, aaa espera ¿Es esto?
      const response = await fetch(url, {
        method: 'GET',
        headers: {
        "Content-Type": "application/json",
        // 'Content-Type': 'application/x-www-form-urlencoded',
      },
    } );

    const result = await response.json();

    if(result.success) {
      var message = document.createElement('div');
      message.className = 'message';
      message.textContent = 'La tarjeta fue añadida exitosamente';
      document.body.appendChild(message);

      setTimeout(function () {
          message.remove();
      }, 3000);

    } else {
      //Aqui muestran que hubo error
    }



    }
});

const usuario = document.getElementById("usuario");
const email = document.getElementById("correo");
const mensaje = document.getElementById("mensaje");

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

function redirecFiltro() {
    var color = document.getElementById('color').value;
    var talla = document.getElementById('talla').value;
    var precio = document.getElementById('Precio').value;
    var ofertas = document.getElementById('ofertas').checked;

    var urlDestino = 'products.php?color=' + encodeURIComponent(color)+
                     '&talla='+encodeURIComponent(talla)+
                     '&precio='+encodeURIComponent(precio)+
                     '&ofertas='+ (ofertas ? '1':'0');
    location.href = urlDestino; 
}