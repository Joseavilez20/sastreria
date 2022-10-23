const  btnsEliminarCliente = document.getElementsByClassName("btnEliminarCliente");

for (var i = 0; i < btnsEliminarCliente.length; i++) {
    btnsEliminarCliente[i].addEventListener("click", function(){

        let id = this.getAttribute("idCliente");
        var r = confirm("Esta seguro que desea eliminarlo!");
        if (r == true) {
            window.location = "index.php?opcion=clientes&idCliente="+id;
        }
        
        
    }, false);
}


const  btnsActualizarCliente = document.getElementsByClassName("btnActualizarCliente");

for (var i = 0; i < btnsActualizarCliente.length; i++) {
    btnsActualizarCliente[i].addEventListener("click", function(){

        let id = this.getAttribute("idCliente");

        window.location = "index.php?opcion=edit-cliente&idActualizarCliente="+id;
        
        
    }, false);
}

