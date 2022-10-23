<main class="pt-4">
    <?php 
      include "../modelos/cliente.modelo.php";
        if(isset($_GET["idActualizarCliente"])){

            $cliente = ModeloCliente::buscarCliente();
           
            echo '<form class="w-50" method="POST" enctype="multipart/form-data">
                    <input type="hidden"  class="form-control" name="idActualizarCliente" value="'.$cliente["id"].'">
                    <div class="mb-3">
                        <label for="inputCodigo" class="form-label">Codigo</label>
                        <input type="text" disabled class="form-control" id="inputCodigo" value="'.$cliente["codigo"].'">
                        
                    </div>
                    <div class="mb-3">
                        <label for="inputNombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="inputNombre" name="inputNombre" value="'.$cliente["nombre"].'">
                    </div>
                    <div class="mb-3">
                        <label for="inputApellidos" class="form-label">Apellidos</label>
                        <input type="text" class="form-control" id="inputApellidos" name="inputApellidos" value="'.$cliente["apellidos"].'">
                    </div>
                    <div class="mb-3">
                        <label for="inputDni" class="form-label">Dni</label>
                        <input type="text" disabled  class="form-control" id="inputDni" name="inputDni" value="'.$cliente["dni"].'">
                     </div>
                    <div class="mb-3">
                        <label for="inputDireccion" class="form-label">Direccion</label>
                        <input type="text" class="form-control" id="inputDireccion" name="inputDireccion" value="'.$cliente["direccion"].'">
                    </div>
                    <div class="mb-3">
                        <label for="inputTelefono" class="form-label">Telefono</label>
                        <input type="text" class="form-control" id="inputTelefono" name="inputTelefono" value="'.$cliente["telefono"].'">
                    </div>
                    <div class="mb-3">
                        <label for="inputCorreo" class="form-label">Correo</label>
                        <input type="text" class="form-control" id="inputCorreo" name="inputCorreo" value="'.$cliente["correo"].'">
                    </div>
               
            
            
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </div>';

        $actualizar = ModeloCliente::ActualizarCliente();
        if ($actualizar == "ok"){
            echo '<script>
                    window.location = "index.php?opcion=clientes";
                </script>';
        }

        echo '</form>';
        }
    ?>
    
</main>
</div>
</div>

