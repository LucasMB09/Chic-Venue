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

function agregarTarjeta() {
    Swal.fire({
        title: 'Agregar nueva tarjeta',
        html: `
            
            <input id="numero_tarjeta" class="swal2-input" placeholder="Número de tarjeta" required>
            
            <input id="vencimiento" class="swal2-input" placeholder="Vencimiento (MM/AA)" required>
            <input id="cvv" class="swal2-input" placeholder="CVV" required>
            <input id="nom_banco" class="swal2-input" placeholder="Banco" required>

        `,
        confirmButtonText: 'Agregar',
        showCancelButton: true,
        cancelButtonText: 'Cancelar',
        preConfirm: () => {
            const numeroTarjeta = Swal.getPopup().querySelector('#numero_tarjeta').value;
            const vencimiento = Swal.getPopup().querySelector('#vencimiento').value;
            const cvv = Swal.getPopup().querySelector('#cvv').value;
            const nomBanco = Swal.getPopup().querySelector('#nom_banco').value;

            if (!numeroTarjeta || !vencimiento || !cvv || !nomBanco) {
                Swal.showValidationMessage('Por favor, completa todos los campos');
                return false;
            }

            // Aquí puedes hacer la inserción en la base de datos
            const url = 'php/agregar_tarjeta.php';
            const data = {
                numero_tarjeta: numeroTarjeta,
                vencimiento: vencimiento,
                cvv: cvv,
                id_cliente: '<?php echo $num_cliente; ?>',
                nom_banco: nomBanco
            };

            return fetch(`${url}?numero_tarjeta=${numeroTarjeta}&vencimiento=${vencimiento}&cvv=${cvv}&id_cliente=${data.id_cliente}&nom_banco=${nomBanco}`, {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json'
                },
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error(response.statusText);
                }
                return response.json();
            })
            .catch(error => {
                Swal.showValidationMessage(`Se produjo un error: ${error}`);
            });
        }
    })
    .then(result => {
        if (result.isConfirmed) {
            Swal.fire({
                title: 'Tarjeta agregada',
                icon: 'success'
            }).then(() => {
                // Actualizar la página o hacer cualquier otra acción necesaria
                window.location.reload()

                //ahi ta, quien sabe porque no agarra el $_POST, pero chingue su ,adre por get, al final funciono jajaj omaigaGracias ah bb simon, ahi estamos
            });
        }
    });
}