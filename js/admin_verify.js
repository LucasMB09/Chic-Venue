const formulario = document.getElementById("login");
const inputs = document.querySelectorAll("#login input");
const mensaje = document.getElementById("mensaje");

const exp = {
    email: /^[a-zA-Z0-9._+-]+@[a-zA-Z0-9-]+\.[a-zA-Z]{2,}$/,
    pass: /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()])[a-zA-Z\d!@#$%^&*()]{8,}$/
}

const campos = {
    email: false,
    pass: false
}

const validarFormulario = (e) => {
    switch (e.target.name) {
        case "iemail":
            validarCampo(exp.email, e.target,"email");
        break;
        case "ipass":
            validarCampo(exp.pass, e.target,"pass");
            
        break;
    }
}


const validarCampo = (expresion, input, campo) => {
    if(expresion.test(input.value)){
        document.getElementById(`${campo}`).classList.remove('formulario_grupo-incorrecto');
        document.getElementById(`${campo}`).classList.add('formulario_grupo-correcto');
		document.querySelector(`#${campo} i`).classList.add('fa-check-circle');
		document.querySelector(`#${campo} i`).classList.remove('fa-times-circle');
        campos[campo] = true;
    } else{
        document.getElementById(`${campo}`).classList.add('formulario_grupo-incorrecto');
        document.getElementById(`${campo}`).classList.remove('formulario_grupo-correcto');
		document.querySelector(`#${campo} i`).classList.add('fa-times-circle');
		document.querySelector(`#${campo} i`).classList.remove('fa-check-circle');
        campos[campo] = false;
    }
}

inputs.forEach((input) => {
	input.addEventListener('keyup', validarFormulario);
	input.addEventListener('blur', validarFormulario);
});

formulario.addEventListener('submit', (e) => {
	if(campos.email && campos.pass){
	    document.getElementById('formulario_mensaje-exito').classList.add('formulario_mensaje-exito-activo');
		setTimeout(() => {
			document.getElementById('formulario_mensaje-exito').classList.remove('formulario_mensaje-exito-activo');
		}, 5000);

		document.querySelectorAll('.formulario_grupo-correcto').forEach((icono) => {
			icono.classList.remove('formulario_grupo-correcto');
		});
	    console.log("Llenado");

	}
    
    else{
        e.preventDefault();
		//document.getElementById('formulario_mensaje').classList.add('formulario_mensaje-activo');
        Swal.fire({
            title: '¡Error!',
            text: 'Se deben completar todos los campos obligatorios.',
            icon: 'error',
            showConfirmButton: 'Aceptar'
          });
		console.log("llena campos");
    }
    
});

function go_login() {
    window.location.href = 'log-in.php';
}


if((mensaje.textContent).length > 0 ){
    switch (mensaje.textContent) {
        case "¡Te has registrado correctamente!":
            Swal.fire({
                title: 'Exito!',
                text: '¡Te has registrado correctamente!',
                icon: 'success',
                showConfirmButton: 'Aceptar'
            });
            break;
        case "La contraseña es incorrecta":
            Swal.fire({
                title: '¡Error!',
                text: 'Contraseña incorrecta',
                icon: 'error',
                showConfirmButton: 'Aceptar'
            });
            break;
        case "No existe ninguna cuenta asociada a ese correo":
            Swal.fire({
                title: '¡Error!',
                text: 'Correo inválido o no registrado',
                icon: 'error',
                showConfirmButton: 'Aceptar'
            });
            break;
        case "No se ha activado la cuenta":
            Swal.fire({
                title: '¡Error!',
              //  text: 'No se ha activado la cuenta',
                html: '<p>No se ha activado la cuenta.</p>' +
              '<p><a href="../php/enviar_correo.php">¿Confirmar correo electrónico?</a></p>',
                icon: 'error',
                confirmButtonText: 'Cancelar'
            });
            break;
        case "Hubo un error":
            Swal.fire({
                title: 'Error!',
                text: 'No se ha activado la cuenta',
                icon: 'error',
                showConfirmButton: 'Aceptar'
            });
            break;    
        default:
            break;
    }
    
}