const  btnsEliminarProveedor = document.getElementsByClassName("btnEliminarProveedor");

for (var i = 0; i < btnsEliminarProveedor.length; i++) {
    btnsEliminarProveedor[i].addEventListener("click", function(){

        let id = this.getAttribute("idProveedor");
        var r = confirm("Esta seguro que desea eliminarlo!");
        if (r == true) {
            window.location = "index.php?opcion=proveedor&idProveedor="+id;
        }
        
        
    }, false);
}


const  btnsActualizarProveedor = document.getElementsByClassName("btnActualizarProveedor");

for (var i = 0; i < btnsActualizarProveedor.length; i++) {
    btnsActualizarProveedor[i].addEventListener("click", function(){

        let id = this.getAttribute("idProveedor");

        window.location = "index.php?opcion=edit-proveedor&idActualizarProveedor="+id;
        
        
    }, false);
}

