const usuario = document.getElementById("usuario");
const email = document.getElementById("correo");
const mensaje = document.getElementById("mensaje");
const ses = document.getElementById("change");

if((mensaje.textContent).length > 0 ){
    switch (mensaje.textContent) {
        case "Inicio de sesión exitoso":
            Swal.fire({
                title: 'Exito!',
                text: mensaje.textContent,
                icon: 'success',
                showConfirmButton: 'Aceptar'
            });
            break;
        default:
            break;
    }
    
}


function user() {
    const Toast = Swal.mixin({
        toast: true,
        html: `<h3 class="text_toast"> <b>Nombre:</b> ${usuario.textContent}</h3><br>
            <h3 class="text_toast"> <b>Correo:</b> ${email.textContent}</h3>`,
        position: 'top-end',
        showConfirmButton: true,
        showDenyButton:true,
        confirmButtonText: 'OK',
        denyButtonText: 'Cerrar Sesión'
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
            location.href = "index.php?valor=" + encodeURIComponent(valor);      
        }
    })
    
    
}
