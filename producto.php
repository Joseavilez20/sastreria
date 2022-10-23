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
            <a class="nav-link active" href="index.php">Productos</a>
            </li>
            
            <li class="nav-item">
            <a class="nav-link active" href=admin/index.php>Administrar</a>
            </li>
        </ul>
        <!-- <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form> -->
        </div>
    </div>
    </nav>

    <main class="mt-3">
        <div class="row">
            <div class="col-6">
    <?php   
    
    include "modelos/producto.modelo.php";
  
            
    $producto = ModeloProducto::buscarProducto();

   echo' <div class="card mb-3" style="max-width: 900px; ">
        <div class="row g-0">
            <div class="col-md-4">
            <img src="'.$producto["imagen"].'" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title">'.$producto["nombre"].'</h5>
                <p class="card-text">"'.$producto["descripcion"].'"</p>
                <p class="card-text">$"'.$producto["precio"].'"</p>
                <p class="card-text"><small class="text-muted">stock:'.$producto["stock"].'</small></p>
                <form action="carrito.php" method="post">
                    <input type="hidden"  name="agregarProducto">
                    <input type="hidden"  name="idProducto" value="'.$producto["id"].'">
                    <input type="hidden" name="nombreProducto" value="'.$producto["nombre"].'">
                    <input type="hidden" name="precioProducto" value="'.$producto["precio"].'" >

                    <button type="submit" class="btn btn-primary" href=carrito.php>Agregar al carrito</button>
                </form>
                
            </div>
            </div>
        </div>
        </div>
        </div>';
   
    ?>  
    
    </div>
     </main> 
</div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="vistas/dist/js/productos.js"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>