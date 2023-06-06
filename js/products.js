
const usuario = document.getElementById("usuario");
const email = document.getElementById("correo");

function user() {
    const Toast = Swal.mixin({
        toast: true,
        html: `<h3 class="text_toast"> <b>Nombre:</b> ${usuario.textContent}</h3><br>
            <h3 class="text_toast"> <b>Correo:</b> ${email.textContent}</h3>`,
        position: 'top-end',
        showConfirmButton: true,
        showDenyButton:true,
        // showCancelButton:true,
        confirmButtonText: 'OK',
        denyButtonText: 'Cerrar Sesión'//,
        // cancelButtonText: 'Datos'
    })
    
    Toast.fire({
        icon: 'info',
        title: 'Cuenta'
    }).then((result) => {
        if (result.isConfirmed){
            var valor = 2;
        }
        else if (result.idDenied){
            var valor = 3;
        }
        else{
            var valor = 0;
            location.href = "products.php?valor=" + encodeURIComponent(valor);
        }
    })
    
    
}