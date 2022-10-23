<main class="pt-4">
              <button role="button" class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#modalAgregarProveedor">Agregar Proveedor</button>
          <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Codigo</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellidos</th>
                <th scope="col">Dni</th>
                <th scope="col">Direccion</th>
                <th scope="col">Telefono</th>
                <th scope="col">Correo</th>
                <th scope="col">Fecha</th>
                <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "../modelos/proveedor.modelo.php";
                    $proveedores =  ModeloProveedor::mostrarProveedores();

                    foreach ($proveedores as $key => $value) { 
                        echo '<tr>
                        <th scope="row">'.($key+1).'</th>
                        <td>'.$value["codigo"].'</td>
                        <td>'.$value["nombre"].'</td>
                        <td>
                            '.$value["apellidos"].'
                        </td>
                        <td>
                           '.$value["dni"].'
                        </td>
                        <td>'.$value["direccion"].'</td>
                        <td>'.$value["telefono"].'</td>
                        <td>'.$value["correo"].'</td>
                        <td>'.$value["fecha"].'</td>
                        <td>
                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                            <button type="button"  idProveedor="'.$value["id"].'" class="btnEliminarProveedor btn btn-danger">x</button>
                            <button role="button"  idProveedor="'.$value["id"].'" class="btnActualizarProveedor btn btn-warning" >edit</button>
                            
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


  <div class="modal fade" id="modalAgregarProveedor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Agregar Proveedor</h5>
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
                        <label for="inputApellidos" class="form-label">Apellidos</label>
                        <input type="text" class="form-control" id="inputApellidos" name="inputApellidos">
                    </div>
                    <div class="mb-3">
                        <label for="inputDni" class="form-label">Dni</label>
                        <input type="text" class="form-control" id="inputDni" name="inputDni">
                    </div>
                    <div class="mb-3">
                        <label for="inputDireccion" class="form-label">Direccion</label>
                        <input type="text" class="form-control" id="inputDireccion" name="inputDireccion">
                    </div>
                    <div class="mb-3">
                        <label for="inputTelefono" class="form-label">Telefono</label>
                        <input type="text" class="form-control" id="inputTelefono" name="inputTelefono">
                    </div>
                    <div class="mb-3">
                        <label for="inputCorreo" class="form-label">Correo</label>
                        <input type="text" class="form-control" id="inputCorreo" name="inputCorreo">
                    </div>
                   
                    
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
                <?php 
                    $re = ModeloProveedor::insertarProveedor();
                    if ($re == "ok"){
                        echo '<script>
                                window.location = "index.php?opcion=proveedores";
                            </script>';
                    }
                ?>
                </form>
            </div>
        </div>
    </div>


    
    
            <?php 
                $result = ModeloProveedor::eliminarProveedor();
                if ($result == "ok"){
                    echo '<script>
                            window.location = "index.php?opcion=proveedores";
                        </script>';
                }
            ?>           
