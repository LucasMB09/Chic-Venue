function confirmacionEliminar(){
    var respuesta=confirm("Confirmar eliminación de producto");
    if(respuesta==true){
        return true;
    }
    else{
        return false;
    }
}

function confirmacionEditar(){
    var respuesta=confirm("Confirmar modificación de producto");
    if(respuesta==true){
        return true;
    }
    else{
        return false;
    }
}
