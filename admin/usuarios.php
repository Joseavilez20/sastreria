<main class="pt-4">
              <button role="button" class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#modalAgregarUsuario">Agregar Usuario</button>
          <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Usuario</th>
                <th scope="col">Rol</th>
                <th scope="col">Estado</th>
                <th scope="col">Fecha</th>
                <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "../modelos/usuario.modelo.php";
                    $usuarios =  ModeloUsuario::mostrarUsuarios();

                    foreach ($usuarios as $key => $value) { 
                        echo '<tr>
                        <th scope="row">'.($key+1).'</th>
                       
                        <td>'.$value["nombre"].'</td>
                        <td>
                            '.$value["usuario"].'
                        </td>
                       
                        <td>'.$value["rol"].'</td>
                        <td>'.$value["estado"].'</td>
                        <td>'.$value["fecha"].'</td>
                        <td>
                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                            <button type="button"  idUsuario="'.$value["id"].'" class="btnEliminarUsuario btn btn-danger">x</button>
                            <button role="button"  idUsuario="'.$value["id"].'" class="btnActualizarUsuario btn btn-warning" >edit</button>
                            
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


  <div class="modal fade" id="modalAgregarUsuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Agregar Usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST">
                <div class="modal-body">
                
                    
                    <div class="mb-3">
                        <label for="inputNombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="inputNombre" name="inputNombre">
                    </div>
                    <div class="mb-3">
                        <label for="inputNuevoUsuario" class="form-label">Usuario</label>
                        <input type="text" class="form-control" id="inputNuevoUsuario" name="inputNuevoUsuario">
                    </div>
                    <div class="mb-3">
                        <label for="inputPassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="inputPassword" name="inputPassword">
                    </div>
                    <div class="mb-3">
                        <label for="inputRol" class="form-label">Rol</label>
                        <select name="inputRol" id="inputRol">
                            <option value="">Seleccione una opcion</option>
                            <option value="admin">Admin</option>
                            <option value="vendedor">Vendedor</option>
                        </select>
                       
                    </div>
                    <div class="mb-3">
                    <label for="inputEstado" class="form-label">Estado</label>
                        <select name="inputEstado" id="inputEstado">
                            <option value="0">Desactivado</option>
                            <option value="1">Activar</option>
                            
                        </select>
                    </div>
                    
                   
                    
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
                <?php 
                    $re = ModeloUsuario::insertarUsuario();
                    if ($re == "ok"){
                        echo '<script>
                                window.location = "index.php?opcion=usuarios";
                            </script>';
                    }

                   var_dump($re);
                ?>
                </form>
            </div>
        </div>
    </div>


    
    
            <?php 
                $result = ModeloUsuario::eliminarUsuario();
                if ($result == "ok"){
                    echo '<script>
                            window.location = "index.php?opcion=usuarios";
                        </script>';
                }
            ?>           
