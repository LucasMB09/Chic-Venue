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
            location.href = "../perfil_usuario.php";
        }
        else if (result.isDenied){
            var valor = 0;
            location.href = "../index.php?valor=" + encodeURIComponent(valor);
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

    var urlDestino = '../products.php?color=' + encodeURIComponent(color)+
                     '&talla='+encodeURIComponent(talla)+
                     '&precio='+encodeURIComponent(precio)+
                     '&ofertas='+ (ofertas ? '1':'0');
    location.href = urlDestino; 
}
