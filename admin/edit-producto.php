<main class="pt-4">
    <?php 
      include "../modelos/producto.modelo.php";
        if(isset($_GET["idActualizarProducto"])){

            $producto = ModeloProducto::buscarProducto();
           
            echo '<form class="w-50" method="POST" enctype="multipart/form-data">
                    <input type="hidden"  class="form-control" name="idActualizarProducto" value="'.$producto["id"].'">
                    <div class="mb-3">
                        <label for="inputCodigo" class="form-label">Codigo</label>
                        <input type="text" disabled class="form-control" id="inputCodigo" value="'.$producto["codigo"].'">
                        
                    </div>
                    <div class="mb-3">
                        <label for="inputNombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="inputNombre" name="inputNombre" value="'.$producto["nombre"].'">
                    </div>
                    <div class="mb-3">
                        <label for="inputDescripcion" class="form-label">Descripcion</label>
                        <textarea name="inputDescripcion" id="inputDescripcion" cols="55" rows="4">'.$producto["descripcion"].'</textarea>
                    </div>
                    <div class="mb-3">
                    <label for="inputImagen" class="form-label">Foto del producto</label>
                    <input class="form-control" type="file" id="inputImagen" name="inputImagen">
                    </div>
                    
                    <div class="mb-3">
                        <label for="inputPrecio" class="form-label">Precio</label>
                        <input type="number" class="form-control" id="inputPrecio" name="inputPrecio" value="'.$producto["precio"].'">
                    </div>
                    <div class="mb-3">
                        <label for="inputStock" class="form-label">Stock</label>
                        <input type="number" class="form-control" id="inputStock"  name="inputStock" value="'.$producto["stock"].'">
                    </div>
            
            
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </div>';

        ModeloProducto::ActualizarProducto();
        echo '</form>';
        }
    ?>
    
</main>
</div>
</div>

