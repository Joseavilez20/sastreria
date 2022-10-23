<main class="pt-4">
              <!-- <button role="button" class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#modalAgregarVenta">Agregar Venta</button> -->
          <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Codigo</th>
                <th scope="col">Cliente</th>
                <th scope="col">Producto</th>
                <th scope="col">Total</th>
                <th scope="col">Fecha</th>
                
                </tr>
            </thead>
            <tbody>
                <?php
                include "../modelos/ventas.modelo.php";
                include "../modelos/cliente.modelo.php";
                include "../modelos/producto.modelo.php";
                    $ventas =  ModeloVenta::mostrarVentas();
                   

                    foreach ($ventas as $key => $value) { 
                        $cliente = ModeloCliente::buscarCliente1($value["id_cliente"]);
                        $producto = ModeloProducto::buscarProducto1($value["id_producto"]);
                        echo '<tr>
                        <th scope="row">'.($key+1).'</th>
                        <td>'.$value["codigo"].'</td>
                        <td>'.$cliente["nombre"].' '.$cliente["apellidos"].'</td>
                        <td>
                            '.$producto["nombre"].'
                        </td>
                        <td>
                           '.$value["total"].'
                        </td>
                     
                        <td>'.$value["fecha"].'</td>
                       
                    <tr>';
                    }

                ?>
                
                
                
            </tbody>
            </table>
          </main>
      </div>
  </div>

