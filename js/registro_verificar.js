const formulario = document.getElementById("registro");
const inputs = document.querySelectorAll("#registro input");

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

const campos = {
    email: false,
    pass: false,
    nombre: false,
    apellido: false,
    carac: false,
    mayus: false,
    minus: false,
    car: false,
    num: false
}

const validarFormulario = (e) => {
    switch (e.target.name) {
        case "email":
            validarCampo(exp.email, e.target, "email");
        break;
        case "contrasena":
            validarCampo(exp.pass, e.target, "pass");
            valcontra(contra.carac,e.target, "carac");
            valcontra(contra.mayus,e.target, "mayus");
            valcontra(contra.minus,e.target, "minus");
            valcontra(contra.car,e.target, "car");
            valcontra(contra.num,e.target, "num");
            if(campos.carac && campos.mayus && campos.minus && campos.car && campos.num){
                contenedor.style.display = "none";
            }
            else{
                contenedor.style.display = "block";
            }
        break;
        case "nombre":
            validarCampo(exp.nombre, e.target, "nombre")
        break;
        case "apellido":
            validarCampo(exp.apellido, e.target, "apellido")
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
		document.getElementById('formulario_mensaje').classList.add('formulario_mensaje-activo');
		console.log("llena campos");
    }
});

function go_login() {
    window.location.href = 'log-in.html';
}