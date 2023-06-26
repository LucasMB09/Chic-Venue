
const usuario = document.getElementById("usuario");
const email = document.getElementById("correo");
const mensaje = document.getElementById("base");


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

// Activar el carrusel automáticamente
var carousel = document.querySelector('#manualCarousel');
var carouselInstance = new bootstrap.Carousel(carousel, {
  interval: 5000, // Cambiar a 5000 (5 segundos)
  wrap: true, // Permitir repetir las imágenes
  perPage: 3 // Mostrar 3 imágenes a la vez
});

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

if((mensaje.textContent).length > 0 ){
    switch (mensaje.textContent) {
        case "No hay":
            Swal.fire({
                title: 'Error!',
                text: 'No existe ningun producto con esa especificación',
                icon: 'error',
                showConfirmButton: 'Aceptar'
            });
            break;
        case "No nombre":
            Swal.fire({
                title: 'Error!',
                text: 'No existe ningun producto con este nombre',
                icon: 'error',
                showConfirmButton: 'Aceptar'
            });
            break;    
        case "Fav":
            Swal.fire({
                title: 'Exito!',
                text: 'Se agrego a favoritos',
                icon: 'success',
                showConfirmButton: 'Aceptar'
            });
            break;    
        case "Ya esta":
            Swal.fire({
                title: 'Error!',
                text: 'Ya existe en tus favoritos',
                icon: 'error',
                showConfirmButton: 'Aceptar'
            });
            break;
        case "Car":
            Swal.fire({
                title: 'Exito!',
                text: 'Se agrego a tu carrito',
                icon: 'success',
                showConfirmButton: 'Aceptar'
            });
            break;
        case "Ya carrito":
            Swal.fire({
                title: 'Error!',
                text: 'Ya existe en tu carrito',
                icon: 'error',
                showConfirmButton: 'Aceptar'
            });
            break;
        case "No hay stock":
            Swal.fire({
                title: 'Error!',
                text: 'No hay existencias de ese producto',
                icon: 'error',
                showConfirmButton: 'Aceptar'
            });
            break;
        default:
            break;
    }
    
}