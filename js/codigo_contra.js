const uwu = document.getElementById("uwu");

if((uwu.textContent).length > 0 ){
    switch (uwu.textContent) {
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


