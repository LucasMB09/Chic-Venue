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

function eliminarTarjeta(tarjeta, aidi) {
    // Realizar la solicitud AJAX para eliminar la tarjeta
    const url = `/php/eliminar_tarjeta.php?num_cliente=${aidi}&tarjeta=${tarjeta}`;
  
    fetch(url)
      .then(response => response.text())
      .then(result => {
        console.log(result); // Mostrar el resultado en la consola
        // Aquí puedes realizar cualquier otra acción que desees luego de eliminar la tarjeta
      })
      .catch(error => console.error(error));
  }