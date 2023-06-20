function habilitar(){
    nombre_articulo = document.getElementById("nombre_articulo").value;
    descripcion = document.getElementById("descripcion").value;
    precio = document.getElementById("precio").value;
    imagen = document.getElementById("imagen").value;
    categoria = document.getElementById("categoria").value;
    val = 0;

    function habilitar(){
    nombre_articulo = document.getElementById("nombre_articulo").value;
    descripcion = document.getElementById("descripcion").value;
    precio = document.getElementById("precio").value;
    imagen = document.getElementById("imagen").value;
    categoria = document.getElementById("categoria").value;
    val = 0;

    var regex = /^[a-zA-Z]+$/;
    if (!regex.test(nombre_articulo)) {
        val++;
    }
    if (!regex.test(descripcion)) {
        val++;
    }
    var regexPrecio = /^\d+(\.\d+)?$/;
    if (!regexPrecio.test(precio)) {
        val++;
    }
    if(imagen == ""){
        val++;
    }
    if(categoria == ""){
        val++;
    }
    if(val == 0){
        document.getElementById("btn-crear-product").disabled = false;
    }
    else{
        document.getElementById("btn-crear-product").disabled = true;
    }
}

document.getElementById("nombre_articulo").addEventListener("keyup",habilitar);
document.getElementById("descripcion").addEventListener("keyup",habilitar);
document.getElementById("precio").addEventListener("keyup",habilitar);
document.getElementById("imagen").addEventListener("keyup",habilitar);
document.getElementById("categoria").addEventListener("change",habilitar);
    if(descripcion == ""){
        val++;
    }
    if(precio == ""){
        val++;
    }
    if(imagen == ""){
        val++;
    }
    if(categoria == ""){
        val++;
    }
    if(val == 0){
        document.getElementById("btn-crear-product").disabled = false;
    }
    else{
        document.getElementById("btn-crear-product").disabled = true;
    }
}

document.getElementById("nombre_articulo").addEventListener("keyup",habilitar);
document.getElementById("descripcion").addEventListener("keyup",habilitar);
document.getElementById("precio").addEventListener("keyup",habilitar);
document.getElementById("imagen").addEventListener("keyup",habilitar);
document.getElementById("categoria").addEventListener("change",habilitar);