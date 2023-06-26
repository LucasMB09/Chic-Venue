const usuario = document.getElementById("usuario");
const email = document.getElementById("correo");
const elim = document.getElementById("elim");

function user() {
    const Toast = Swal.mixin({
        toast: true,
        html: `<h3 class="text_toast"> <b>Nombre:</b> ${usuario.textContent}</h3><br>
            <h3 class="text_toast"> <b>Correo:</b> ${email.textContent}</h3>`,
        position: 'top-end',
        showConfirmButton: false,
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
        // if (result.isConfirmed){
        //     location.href = "perfil_usuario.php";
        // }
        if (result.isDenied){
            var valor = 0;
            location.href = "index.php?valor=" + encodeURIComponent(valor);
        }
        else if(result.isDismissed){
            var valor = 3;
        }
    })
    
    
}

function mandarPHP(codigo)
{
  parametros = { 'id': codigo };
 
}

function irProd() {
    location.href = "products.php";
}

console.log(elim);
if((elim.textContent).length > 0 ){
    switch (elim.textContent) {
        case "eliminado":
            Swal.fire({
                title: 'Hecho!',
                text: 'Tarjeta eliminada exitosamente',
                icon: 'info',
                showConfirmButton: 'Aceptar'
            });
            break;
        case "Cambio":
            Swal.fire({
                title: 'Hecho!',
                text: 'Cambio de datos exitosamente',
                icon: 'success',
                showConfirmButton: 'Aceptar'
            });
            break;
        case "Dir agregada":
            Swal.fire({
                title: 'Hecho!',
                text: 'Dirección agregada exitosamente',
                icon: 'success',
                showConfirmButton: 'Aceptar'
            });
            break;
        case "Dir modifi":
            Swal.fire({
                title: 'Hecho!',
                text: 'Dirección modificada exitosamente',
                icon: 'success',
                showConfirmButton: 'Aceptar'
            });
            break;
        case "Dir elim":
            Swal.fire({
                title: 'Hecho!',
                text: 'Dirección eliminada exitosamente',
                icon: 'info',
                showConfirmButton: 'Aceptar'
            });
            break;
        default:
            break;
    }
    
}
