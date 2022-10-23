const  btnsEliminarUsuario = document.getElementsByClassName("btnEliminarUsuario");

for (var i = 0; i < btnsEliminarUsuario.length; i++) {
    btnsEliminarUsuario[i].addEventListener("click", function(){

        let id = this.getAttribute("idUsuario");
        var r = confirm("Esta seguro que desea eliminarlo!");
        if (r == true) {
            window.location = "index.php?opcion=usuarios&idUsuario="+id;
        }
        
        
    }, false);
}


const  btnsActualizarUsuario = document.getElementsByClassName("btnActualizarUsuario");

for (var i = 0; i < btnsActualizarUsuario.length; i++) {
    btnsActualizarUsuario[i].addEventListener("click", function(){

        let id = this.getAttribute("idUsuario");

        window.location = "index.php?opcion=edit-usuario&idActualizarUsuario="+id;
        
        
    }, false);
}

