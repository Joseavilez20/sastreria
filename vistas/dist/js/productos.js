const  btnsEliminar = document.getElementsByClassName("btnEliminarProducto");

for (var i = 0; i < btnsEliminar.length; i++) {
    btnsEliminar[i].addEventListener("click", function(){

        let id = this.getAttribute("idProducto");
        var r = confirm("Esta seguro que desea eliminarlo!");
        if (r == true) {
            window.location = "index.php?opcion=productos&idProducto="+id;
        }
        
        
    }, false);
}


const  btnsActualizar = document.getElementsByClassName("btnActualizarProducto");

for (var i = 0; i < btnsActualizar.length; i++) {
    btnsActualizar[i].addEventListener("click", function(){

        let id = this.getAttribute("idProducto");

        window.location = "index.php?opcion=edit-producto&idActualizarProducto="+id;
        
        
    }, false);
}


const btnVerificar = document.getElementById("btnVerificar");
if (btnVerificar != null){
    const dni = document.getElementById("inputDni");
        btnVerificar.addEventListener("click", function(){

            let id = this.getAttribute("idproducto");

            window.location = "producto.php?idActualizarProducto="+id+"&DNICliente="+dni.value;
            
        
    }, false);
}

