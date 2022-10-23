<?php 
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Sastreria</title>
  </head>
  <body>
   
  <div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Sastreria</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
            </li>
            <li class="nav-item">
            <a class="nav-link active" href="index.php#misproductos">Productos</a>
            </li>
            
            <li class="nav-item">
            <a class="nav-link active" href=admin/index.php>Administrar</a>
            </li>

            <li class="nav-item">
            <a class="nav-link active" href=carrito.php>Ver Carrito</a>
            </li>
        </ul>
        <!-- <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form> -->
        </div>
    </div>
    </nav>
    <div class="row">
        <div class="col-6">

     

<?php
include "modelos/cliente.modelo.php";
include "modelos/ventas.modelo.php";

if (isset($_GET["idEliminarProducto"])){
    echo '<script>
   
    var r = confirm("Seguro que desea eliminar el producto?");
    if (r == true) { ';
  

    $ID = $_GET["idEliminarProducto"];
    foreach($_SESSION['carrito'] as $indice=>$producto){
        if($producto['ID']==$ID){
            unset($_SESSION['carrito'][$indice]);
            echo 'window.location = "carrito.php";';

        }
    }

    echo '}
    </script>';
}else if (isset($_POST["agregarProducto"])){

    if(!isset($_SESSION["carrito"])){
        $producto = array(
                    'ID' =>$_POST["idProducto"],
                    'NOMBRE'=>$_POST["nombreProducto"],
                    'CANTIDAD'=>1,
                    'PRECIO'=>$_POST["precioProducto"]
                );
       $_SESSION["carrito"][0] = $producto;
   

    }else {
        
        $numeroProductos = count($_SESSION['carrito']);
        $encontrado =false;
        
        foreach($_SESSION['carrito'] as $indice=>$producto){
            if($producto['ID']==$_POST["idProducto"]){
                // $producto['CANTIDAD'] = $producto['CANTIDAD'] + 1;
                $_SESSION['carrito'][$indice]['CANTIDAD'] =  $_SESSION['carrito'][$indice]['CANTIDAD'] + 1;
                $encontrado = true;
            }
        }
        if (!$encontrado) {
            $producto = array(
                'ID' =>$_POST["idProducto"],
                'NOMBRE'=>$_POST["nombreProducto"],
                'CANTIDAD'=>1,
                'PRECIO'=>$_POST["precioProducto"]
            );
            $_SESSION['carrito'][$numeroProductos]=$producto;
            
        }
       
        echo '<script>
                window.location = "carrito.php";
            </script>';
        
    }

 }else {
    mostrar();
 }
 function mostrar(){
    $total = 0;
    if (!empty($_SESSION['carrito'])){
        echo '<table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Accion</th>
                    </tr>
                    </thead>
                    <tbody>';
        foreach($_SESSION['carrito'] as $indice=>$producto){
            
                    $total= $total + $producto['PRECIO'] * $producto['CANTIDAD'];
                    
                    echo '<tr>
                        <th scope="row">'.($indice+1).'</th>
                        <td>'.$producto['NOMBRE'].'</td>
                        <td>'.$producto['PRECIO'].'</td>
                        <td>'.$producto['CANTIDAD'].'</td>
                        <td><a class="btn btn-danger" href="carrito.php?idEliminarProducto='.$producto['ID'].'">Eliminar</a></td>
                    </tr>';
                    
                  
            
        }
        echo '</tbody>
        </table>';
        echo '<h3>Total : $'.$total.'</h3>';
      
        
    }
 }
    
?>

        </div>
        <div class="col-6">
        <form class="mt-2">
            <div class="mb-3">
                        <label for="inputDni" class="form-label">Por favor digite su DNI si es cliente o Registrese </label>
                        <a class="btn btn-primary" href="#" role="button" data-bs-toggle="modal" data-bs-target="#modalRegistrarse">Aquí</a>
                        <input type="text" class="form-control" id="inputDni" name="DNICliente">
            </div>
            <?php 
            echo '<button type="submit"  class="btn btn-success">Verificar si estoy registrado</button>';
            
                $cliente = ModeloCliente::buscarDNICliente();
               

            ?>
        </form>
        <?php 
        
          
            if(isset($cliente) && $cliente != false){
                echo '<h3>'.$cliente["nombre"].' '.$cliente["apellidos"].'</h3>';

                
                echo '<form method="POST">
                        <div class="mb-3">
                                    <input type="hidden" class="form-control"  name="ingresarVenta">
                                    <input type="hidden" class="form-control"  name="cliente" value="'.$cliente["id"].'">
                                    <input type="hidden" class="form-control"  name="vendedor" value="1">

                        </div>
                        <button type="submit" class="btn btn-primary">Continuar Compra</button>';
                     $vv = ModeloVenta::insertarVenta();
                     if ($vv == "ok"){
                         echo '<div class="alert alert-success" role="alert">
                            Compra completada con exito!
                       </div>';
                       echo '<a href="index.php">Regresar al catalogo de productos</a>';
                     }
                    echo '</form>';
            }     
        
        ?>
        </div>
    </div>
</div>

<div class="modal fade" id="modalRegistrarse" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Agregar Cliente</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="POST" >
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
            $re = ModeloCliente::insertarCliente();
            if ($re == "ok"){
                echo '<script>
                        var r = confirm("Gracias por registrarse!");
                        if (r == true) {
                            window.location = "index.php";
                        } 
                        
                    </script>';
            }
        ?>
        </form>
    </div>
</div>
</div>


<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
-->
</body>
</html>