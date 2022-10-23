<main class="pt-4">
    <?php 
      include "../modelos/proveedor.modelo.php";
        if(isset($_GET["idActualizarProveedor"])){

            $proveedor = ModeloProveedor::buscarProveedor();
           
            echo '<form class="w-50" method="POST" enctype="multipart/form-data">
                    <input type="hidden"  class="form-control" name="idActualizarProveedor" value="'.$proveedor["id"].'">
                    <div class="mb-3">
                        <label for="inputCodigo" class="form-label">Codigo</label>
                        <input type="text" disabled class="form-control" id="inputCodigo" value="'.$proveedor["codigo"].'">
                        
                    </div>
                    <div class="mb-3">
                        <label for="inputNombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="inputNombre" name="inputNombre" value="'.$proveedor["nombre"].'">
                    </div>
                    <div class="mb-3">
                        <label for="inputApellidos" class="form-label">Apellidos</label>
                        <input type="text" class="form-control" id="inputApellidos" name="inputApellidos" value="'.$proveedor["apellidos"].'">
                    </div>
                    <div class="mb-3">
                        <label for="inputDni" class="form-label">Dni</label>
                        <input type="text" disabled  class="form-control" id="inputDni" name="inputDni" value="'.$proveedor["dni"].'">
                     </div>
                    <div class="mb-3">
                        <label for="inputDireccion" class="form-label">Direccion</label>
                        <input type="text" class="form-control" id="inputDireccion" name="inputDireccion" value="'.$proveedor["direccion"].'">
                    </div>
                    <div class="mb-3">
                        <label for="inputTelefono" class="form-label">Telefono</label>
                        <input type="text" class="form-control" id="inputTelefono" name="inputTelefono" value="'.$proveedor["telefono"].'">
                    </div>
                    <div class="mb-3">
                        <label for="inputCorreo" class="form-label">Correo</label>
                        <input type="text" class="form-control" id="inputCorreo" name="inputCorreo" value="'.$proveedor["correo"].'">
                    </div>
               
            
            
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </div>';

        $actualizar = ModeloProveedor::ActualizarProveedor();
        if ($actualizar == "ok"){
            echo '<script>
                    window.location = "index.php?opcion=proveedores";
                </script>';
        }

        echo '</form>';
        }
    ?>
    
</main>
</div>
</div>

