const formulario = document.getElementById("formulario");
const inputs = document.querySelectorAll("#formulario input");
const mensaje = document.getElementById("mensaje");
const con1 = document.getElementById("con1");
const con2 = document.getElementById("con2");

const exp = {
    pass: /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()])[a-zA-Z\d!@#$%^&*()]{8,}$/,
}

const contra = {
    carac: /[a-zA-Z\d!@#$%^&*()]{8,}/,
    mayus:/(?=.*[A-Z])[a-zA-Z\d!@#$%^&*()]/,
    minus:/(?=.*[a-z])[a-zA-Z\d!@#$%^&*()]/,
    car:/(?=.*[!@#$%^&*()])[a-zA-Z\d!@#$%^&*()]/,
    num:/(?=.*\d)[\d!@#$%^&*()]/
}

const campos = {
    pass1: false,
    pass2: false,
    carac: false,
    mayus: false,
    minus: false,
    car: false,
    num: false
}

const validarFormulario = (e) => {
    switch (e.target.name) {
        case "contra1":
            validarCampo(exp.pass, e.target, "pass1");
            valcontra(contra.carac,e.target, "carac");
            valcontra(contra.mayus,e.target, "mayus");
            valcontra(contra.minus,e.target, "minus");
            valcontra(contra.car,e.target, "car");
            valcontra(contra.num,e.target, "num");
            
        break;
        case "contra2":
            contraigual(con1,con2);
            // validarCampo(exp.pass, e.target, "pass2");
            // valcontra(contra.carac,e.target, "carac");
            // valcontra(contra.mayus,e.target, "mayus");
            // valcontra(contra.minus,e.target, "minus");
            // valcontra(contra.car,e.target, "car");
            // valcontra(contra.num,e.target, "num");
            
        break;
    }
}

const contraigual = (c1, c2) => {
    if(c1.value == c2.value){
        document.getElementById('pass2').classList.remove('formulario_grupo-incorrecto');
        document.getElementById('pass2').classList.add('formulario_grupo-correcto');
		document.querySelector('#pass2 i').classList.add('fa-check-circle');
		document.querySelector('#pass2 i').classList.remove('fa-times-circle');
        campos["pass2"] = true; 
    }
    else{
        document.getElementById('pass2').classList.add('formulario_grupo-incorrecto');
        document.getElementById('pass2').classList.remove('formulario_grupo-correcto');
		document.querySelector('#pass2 i').classList.add('fa-times-circle');
		document.querySelector('#pass2 i').classList.remove('fa-check-circle');
        campos["pass2"] = false
    }
}

const valcontra = (expresion, input, campo) => {
    if(expresion.test(input.value)){
        document.getElementById(`${campo}`).classList.add('text_correc');
        document.getElementById(`${campo}`).classList.remove('text_incorrec');
        campos[campo]=true;
    }
    else{
        document.getElementById(`${campo}`).classList.add('text_incorrec');
        document.getElementById(`${campo}`).classList.remove('text_correc');
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
	if(campos.pass1 && campos.pass2){
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
        case "Ha habido un problema":
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


