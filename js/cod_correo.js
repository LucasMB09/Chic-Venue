const uwu = document.getElementById("uwu");

if((uwu.textContent).length > 0 ){
    switch (uwu.textContent) {
        case "Ha habido un problema":
            Swal.fire({
                title: 'Error!',
                text: uwu.textContent,
                icon: 'error',
                showConfirmButton: 'Aceptar'
            });
            break;
        case "Los códigos no coinciden":
            Swal.fire({
                title: 'Error!',
                text: uwu.textContent,
                icon: 'error',
                showConfirmButton: 'Aceptar'
            });
            break;
        default:
            break;
    }
}


