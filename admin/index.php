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
    <link rel="stylesheet" href="../vistas/dist/css/estilos.css">
    <title>Sastreria</title>
  </head>
  <body>
    <nav class="navbar navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="../index.php">Inicio</a>
        </div>
    </nav>
 

      <?php 
      if(isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok"){

       include "header.php";

       if (isset($_GET["opcion"])){

         if($_GET["opcion"] == "productos" ||
            $_GET["opcion"] == "clientes" ||
            $_GET["opcion"] == "proveedores" ||
            $_GET["opcion"] == "usuarios" ||
            $_GET["opcion"] == "ventas" ||
            $_GET["opcion"] == "edit-producto" ||
            $_GET["opcion"] == "edit-cliente" ||
            $_GET["opcion"] == "edit-proveedor" ||
            $_GET["opcion"] == "edit-usuario" ){

           include $_GET["opcion"].".php";

         }else {
           echo '<h2>Bienvenido a sastreria.com</h2>';
         }

       }else {
        echo '<h2>Bienvenido a sastreria.com</h2>';
      }
      echo ' </div>
          </div>';
      }else {
          include "login.php";
      }
      ?>
          
 
   
 

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="../vistas/dist/js/productos.js"></script>
    <script src="../vistas/dist/js/clientes.js"></script>
    <script src="../vistas/dist/js/proveedores.js"></script>
    <script src="../vistas/dist/js/usuarios.js"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>