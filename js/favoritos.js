const usuario = document.getElementById("usuario");
const email = document.getElementById("correo");
const mensaje = document.getElementById("mensa");

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

function submitForm() {
    document.getElementById('elim_fav').submit();
}

if((mensaje.textContent).length > 0 ){
    switch (mensaje.textContent) {
        case "Ha habido un problema":
            Swal.fire({
                title: 'Error!',
                text: 'No existe ningun producto con esa especificación',
                icon: 'error',
                showConfirmButton: 'Aceptar'
            });
            break; 
        case "Se ha borrado":
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