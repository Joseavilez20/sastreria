<?php

include_once "conexion.php";
class ModeloUsuario 
{
    
    static public function mostrarUsuarios(){
        $stmt = Conexion::conectar()->prepare("SELECT * FROM usuarios");
        $stmt -> execute();
        return $stmt -> fetchAll();
        $stmt -> close();

		$stmt = null;
    }

    static public function buscarUsuario(){
        $stmt = Conexion::conectar()->prepare("SELECT * FROM usuarios WHERE id = :id");
        $stmt -> bindParam(":id", $_GET["idActualizarUsuario"], PDO::PARAM_INT);

        $stmt -> execute();
        return $stmt -> fetch();
        $stmt -> close();

		$stmt = null;
    }

    static public function buscarNombreUsuario($usuario){
        $stmt = Conexion::conectar()->prepare("SELECT * FROM usuarios WHERE usuario = :usuario");
        $stmt -> bindParam(":usuario", $usuario, PDO::PARAM_STR);

        $stmt -> execute();
        return $stmt -> fetch();
        $stmt -> close();

		$stmt = null;
    }

    static public function insertarUsuario(){
        // var_dump($_REQUEST);
        if (isset($_POST["inputNuevoUsuario"])) {

            $stmt = Conexion::conectar()->prepare("INSERT INTO usuarios (nombre, usuario, password, rol, estado) VALUES ( :nombre, :usuario, :pass, :rol, :estado)");
            // var_dump($stmt);
            $stmt->bindParam(":usuario", $_POST["inputNuevoUsuario"], PDO::PARAM_STR);
            $stmt->bindParam(":nombre", $_POST["inputNombre"], PDO::PARAM_STR);
            $stmt->bindParam(":pass", $_POST["inputPassword"], PDO::PARAM_STR);
            $stmt->bindParam(":rol", $_POST["inputRol"], PDO::PARAM_STR);
            $stmt->bindParam(":estado", $_POST["inputEstado"], PDO::PARAM_STR);
            
            
            if($stmt->execute()){

                return "ok";

            }else{

                return "error";
            
            }

            $stmt->close();
            $stmt = null;
     }

    }

    static public function eliminarUsuario(){
        if(isset($_GET["idUsuario"])){
            $stmt = Conexion::conectar()->prepare("DELETE FROM usuarios WHERE id = :id");

            $stmt -> bindParam(":id", $_GET["idUsuario"], PDO::PARAM_INT);

            if($stmt->execute()){

                return "ok";

            }else{

                return "error";
            
            }

            $stmt->close();
            $stmt = null;
        }
    }

    static public function actualizarUsuario(){
        
        if (isset($_POST["idActualizarUsuario"])) {
            $stmt = Conexion::conectar()->prepare("UPDATE usuarios SET  nombre = :nombre, password = :pass, rol = :rol, estado = :estado WHERE id = :id");
            
            
            // $stmt->bindParam(":usuario", $_POST["inputUsuario"], PDO::PARAM_STR);
            $stmt->bindParam(":nombre", $_POST["inputNombre"], PDO::PARAM_STR);
            $stmt->bindParam(":pass", $_POST["inputPassword"], PDO::PARAM_STR);
            $stmt->bindParam(":rol", $_POST["inputRol"], PDO::PARAM_STR);
            $stmt->bindParam(":estado", $_POST["inputEstado"], PDO::PARAM_STR);
            $stmt->bindParam(":id", $_POST["idActualizarUsuario"], PDO::PARAM_INT);
            
            if($stmt->execute()){

                return "ok";

            }else{

                return "error";
            
            }

            $stmt->close();
            $stmt = null;
        }
    }

    static public function ingresar(){
        if (isset($_POST["inputUsuario"])) {
            $respuesta = ModeloUsuario::buscarNombreUsuario($_POST["inputUsuario"]);

            if($respuesta["usuario"] == $_POST["inputUsuario"] && $respuesta["password"] == $_POST["inputPass"]){

                if($respuesta["estado"] == 1){

                    $_SESSION["iniciarSesion"] = "ok";
                    $_SESSION["id"] = $respuesta["id"];
                    $_SESSION["nombre"] = $respuesta["nombre"];
                    $_SESSION["usuario"] = $respuesta["usuario"];
                    $_SESSION["rol"] = $respuesta["rol"];

                    echo '<script>

                            window.location = "index.php";

                        </script>';
                }else{

                    echo '<br>
                        <div class="alert alert-danger">El usuario aún no está activado</div>';

                }
            }
        }
    }
}
