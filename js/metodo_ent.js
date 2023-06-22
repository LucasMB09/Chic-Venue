const usuario = document.getElementById("usuario");
const email = document.getElementById("correo");
const mensaje = document.getElementById("uwu");

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

if((mensaje.textContent).length > 0 ){
    switch (mensaje.textContent) {
        case "Dir agregada":
            Swal.fire({
                title: 'Hecho!',
                text: 'Dirección agregada exitosamente',
                icon: 'success',
                showConfirmButton: 'Aceptar'
            });
            break;        
        default:
            break;
    }
    
}
