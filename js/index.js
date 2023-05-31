const mensaje = document.getElementById("mensaje");

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