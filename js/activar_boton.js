function habilitar(){
    nombre_articulo = document.getElementById("nombre_articulo").value;
    descripcion = document.getElementById("descripcion").value;
    precio = document.getElementById("precio").value;
    imagen = document.getElementById("imagen").value;
    categoria = document.getElementById("categoria").value;
    val = 0;

    if(nombre_articulo == ""){
        val++;
    }
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
        document.getElementById("btm-crear").disabled = false;
    }
    else{
        document.getElementById("btm-crear").disabled = true;
    }
}

document.getElementById("nombre_articulo").addEventListener("keyup",habilitar);
document.getElementById("descripcion").addEventListener("keyup",habilitar);
document.getElementById("precio").addEventListener("keyup",habilitar);
document.getElementById("imagen").addEventListener("keyup",habilitar);
document.getElementById("categoria").addEventListener("change",habilitar);