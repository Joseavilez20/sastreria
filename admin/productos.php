<main class="pt-4">
              <button role="button" class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#modalAgregarProducto">Agregar</button>
          <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Codigo</th>
                <th scope="col">Nombre</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Imagen</th>
                <th scope="col">Precio</th>
                <th scope="col">Stock</th>
                <th scope="col">Fecha</th>
                <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "../modelos/producto.modelo.php";
                    $productos =  ModeloProducto::mostrarProductos();

                    foreach ($productos as $key => $value) { 
                        echo '<tr>
                        <th scope="row">'.($key+1).'</th>
                        <td>'.$value["codigo"].'</td>
                        <td>'.$value["nombre"].'</td>
                        <td>
                            <textArea rows="5"> '.$value["descripcion"].'</textArea>
                        </td>
                        <td>
                            <img src="../'.$value["imagen"].'" alt="traje1" width="100">
                        </td>
                        <td>'.$value["precio"].'</td>
                        <td>'.$value["stock"].'</td>
                        <td>'.$value["fecha"].'</td>
                        <td>
                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                            <button type="button"  idProducto="'.$value["id"].'" class="btnEliminarProducto btn btn-danger">x</button>
                            <button role="button"  idProducto="'.$value["id"].'" class="btnActualizarProducto btn btn-warning" >edit</button>
                            <button type="button"  class="btn btn-success">Ver</button>
                        </div>
                        </td>
                    <tr>';
                    }

                ?>
                
                
                
            </tbody>
            </table>
          </main>
      </div>
  </div>


    <div class="modal fade" id="modalAgregarProducto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Agregar Producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                
                    <div class="mb-3">
                        <label for="inputCodigo" class="form-label">Codigo</label>
                        <input type="text" class="form-control" id="inputCodigo" name="inputNuevoCodigo">
                        
                    </div>
                    <div class="mb-3">
                        <label for="inputNombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="inputNombre" name="inputNombre">
                    </div>
                    <div class="mb-3">
                        <label for="inputDescripcion" class="form-label">Descripcion</label>
                        <textarea name="inputDescripcion" id="inputDescripcion" cols="55" rows="4"></textarea>
                    </div>
                    <div class="mb-3">
                    <label for="inputImagen" class="form-label">Foto del producto</label>
                    <input class="form-control" type="file" id="inputImagen" name="inputImagen">
                    </div>
                    
                    <div class="mb-3">
                        <label for="inputPrecio" class="form-label">Precio</label>
                        <input type="number" class="form-control" id="inputPrecio" name="inputPrecio">
                    </div>
                    <div class="mb-3">
                        <label for="inputStock" class="form-label">Stock</label>
                        <input type="number" class="form-control" id="inputStock"  name="inputStock">
                    </div>
                    
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
                <?php 
                    $re = ModeloProducto::insertarProducto();
                    if ($re == "ok"){
                        echo '<script>
                                window.location = "index.php?opcion=productos";
                            </script>';
                    }
                ?>
                </form>
            </div>
        </div>
    </div>


    
    
            <?php 
                $result = ModeloProducto::eliminarProducto();
                if ($result == "ok"){
                    echo '<script>
                            window.location = "index.php?opcion=productos";
                        </script>';
                }
            ?>           
