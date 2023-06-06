const formulario = document.getElementById("registro");
const inputs = document.querySelectorAll("#registro input");
const mensaje = document.getElementById("mensaje");

const exp = {
    email: /^[a-zA-Z0-9._+-]+@[a-zA-Z0-9-]+\.[a-zA-Z]{2,}$/,
    pass: /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()])[a-zA-Z\d!@#$%^&*()]{8,}$/,
    nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/,
    apellido: /^[a-zA-ZÀ-ÿ\s]{1,40}$/
}

const contra = {
    carac: /[a-zA-Z\d!@#$%^&*()]{8,}/,
    mayus:/(?=.*[A-Z])[a-zA-Z\d!@#$%^&*()]/,
    minus:/(?=.*[a-z])[a-zA-Z\d!@#$%^&*()]/,
    car:/(?=.*[!@#$%^&*()])[a-zA-Z\d!@#$%^&*()]/,
    num:/(?=.*\d)[\d!@#$%^&*()]/
}

const ema = {
    arroba: /@/,
    punto: /\./
}

const campos = {
    email: false,
    pass: false,
    nombre: false,
    apellido: false,
    carac: false,
    mayus: false,
    minus: false,
    car: false,
    num: false,
    arroba: false,
    punto: false
}

const validarFormulario = (e) => {
    switch (e.target.name) {
        case "email":
            validarCampo(exp.email, e.target, "email");
            valcontra(ema.arroba,e.target,"arroba");
            valcontra(ema.punto,e.target,"punto");
            if(campos.arroba && campos.punto){
                document.getElementById('cont_cor').style.display = 'none';
            }
            else{
                document.getElementById('cont_cor').style.display = 'block';
            }
        break;
        case "contrasena":
            validarCampo(exp.pass, e.target, "pass");
            valcontra(contra.carac,e.target, "carac");
            valcontra(contra.mayus,e.target, "mayus");
            valcontra(contra.minus,e.target, "minus");
            valcontra(contra.car,e.target, "car");
            valcontra(contra.num,e.target, "num");
            if(campos.carac && campos.mayus && campos.minus && campos.car && campos.num){
                contenedor.classList.remove('contenedor');
                contenedor.classList.add('contenedor_correc');
                document.getElementById("texcorrec").style.display = 'block';
                document.getElementById("contenedor").style.display = 'none';
            }
            else{
                contenedor.style.display = "block";
                contenedor.classList.remove('contenedor_correc');
                contenedor.classList.add('contenedor');
                document.getElementById("texcorrec").style.display = 'none';
                document.getElementById("contenedor").style.display = 'block';
            }
            
        break;
        case "nombre":
            validarCampo(exp.nombre, e.target, "nombre");
            if(campos.nombre){
                document.getElementById('cont_nom').style.display = 'none';
            }
            else{
                document.getElementById('cont_nom').style.display = 'block';
            }
        break;
        case "apellido":
            validarCampo(exp.apellido, e.target, "apellido");
            if(campos.apellido){
                document.getElementById('cont_ape').style.display = 'none';
            }
            else{
                document.getElementById('cont_ape').style.display = 'block';
            }
        break;
    }
}

const valcontra = (expresion, input, campo) => {
    if(expresion.test(input.value)){
        document.getElementById(`${campo}`).style.display = 'none';
        campos[campo]=true;
    }
    else{
        document.getElementById(`${campo}`).style.display = 'block';
        campos[campo]=false;
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
	if(campos.email && campos.pass && campos.nombre && campos.apellido){
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
		console.log("llena campos");
        Swal.fire({
            title: 'Error!',
            text: 'Se deben completar todos los campos obligatorios.',
            icon: 'error',
            showConfirmButton: 'Aceptar'
        });
        
    }
});

function go_login() {
    window.location.href = 'log-in.php';
}

//console.log(mensaje.textContent);

if((mensaje.textContent).length > 0 ){
    switch (mensaje.textContent) {
        case "¡Este correo ya esta asociado a una cuenta!":
            Swal.fire({
                title: 'Error!',
                text: '¡Este correo ya esta asociado a una cuenta!',
                icon: 'error',
                showConfirmButton: 'Aceptar'
            });
            break;
        case "¡Ups ha ocurrido un error!":
            Swal.fire({
                title: 'Upss!',
                text: 'Ha habido un error con la página, vuelva a intentarlo',
                icon: 'warning',
                showConfirmButton: 'Aceptar'
            });
            break;
        default:
            break;
    }
    
}