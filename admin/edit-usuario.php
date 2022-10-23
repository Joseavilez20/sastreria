<main class="pt-4">
    <?php 
      include "../modelos/usuario.modelo.php";
        if(isset($_GET["idActualizarUsuario"])){

            $usuario = ModeloUsuario::buscarUsuario();
            $checked = "Desactivado";
            if ($usuario["estado"] == 1){
                 $checked = "Activado";
            }
           
            echo '<form class="w-50" method="POST" >
                    <input type="hidden"  class="form-control" name="idActualizarUsuario" value="'.$usuario["id"].'">
                    
                    <div class="mb-3">
                        <label for="inputNombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="inputNombre" name="inputNombre" value="'.$usuario["nombre"].'">
                    </div>
                    <div class="mb-3">
                        <label for="inputUsuario" class="form-label">Usuario</label>
                        <input type="text" class="form-control" id="inputUsuario" name="inputUsuario" value="'.$usuario["usuario"].'">
                    </div>
                    <div class="mb-3">
                        <label for="inputPassword" class="form-label">Password</label>
                        <input type="text" class="form-control" id="inputPassword" name="inputPassword" value="'.$usuario["password"].'">
                     </div>
                     <div class="mb-3">
                     <label for="inputRol" class="form-label">Rol</label>
                     <select name="inputRol" id="inputRol">
                         <option value="'.$usuario["rol"].'">'.$usuario["rol"].'</option>
                         <option value="admin">Admin</option>
                         <option value="vendedor">Vendedor</option>
                     </select>
                    
                 </div>
                 <div class="mb-3">
                 <label for="inputEstado" class="form-label">Estado</label>
                 <select name="inputEstado" id="inputEstado">
                     <option value="'.$usuario["estado"].'">'.$checked.'</option>
                     <option value="1">Activar</option>
                     <option value="0">Desactivar</option>
                     
                 </select>
                 </div>
                 
                    
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </div>';

        $actualizar = ModeloUsuario::ActualizarUsuario();
        if ($actualizar == "ok"){
            echo '<script>
                    window.location = "index.php?opcion=usuarios";
                </script>';
        }

        echo '</form>';
        }
    ?>
    
</main>
</div>
</div>

