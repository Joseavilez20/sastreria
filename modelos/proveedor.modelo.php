<?php

include_once "conexion.php";
class ModeloProveedor
{
    
    static public function mostrarProveedores(){
        $stmt = Conexion::conectar()->prepare("SELECT * FROM proveedor");
        $stmt -> execute();
        return $stmt -> fetchAll();
        $stmt -> close();

		$stmt = null;
    }

    static public function buscarProveedor(){
        $stmt = Conexion::conectar()->prepare("SELECT * FROM proveedor WHERE id = :id");
        $stmt -> bindParam(":id", $_GET["idActualizarProveedor"], PDO::PARAM_INT);

        $stmt -> execute();
        return $stmt -> fetch();
        $stmt -> close();

		$stmt = null;
    }

    static public function insertarProveedor(){

        if (isset($_POST["inputNuevoCodigo"])) {

            $stmt = Conexion::conectar()->prepare("INSERT INTO proveedor (codigo, nombre, apellidos, dni, direccion, telefono, correo) VALUES ( :codigo, :nombre, :apellidos, :dni, :direccion, :telefono, :correo)");
            
            $stmt->bindParam(":codigo", $_POST["inputNuevoCodigo"], PDO::PARAM_STR);
            $stmt->bindParam(":nombre", $_POST["inputNombre"], PDO::PARAM_STR);
            $stmt->bindParam(":apellidos", $_POST["inputApellidos"], PDO::PARAM_STR);
            $stmt->bindParam(":dni", $_POST["inputDni"] , PDO::PARAM_STR);
            $stmt->bindParam(":direccion", $_POST["inputDireccion"], PDO::PARAM_STR);
            $stmt->bindParam(":telefono", $_POST["inputTelefono"], PDO::PARAM_STR);
            $stmt->bindParam(":correo", $_POST["inputCorreo"], PDO::PARAM_STR);
            
            if($stmt->execute()){

                return "ok";

            }else{

                return "error";
            
            }

            $stmt->close();
            $stmt = null;
     }

    }

    static public function eliminarProveedor(){
        if(isset($_GET["idProveedor"])){
            $stmt = Conexion::conectar()->prepare("DELETE FROM proveedor WHERE id = :id");

            $stmt -> bindParam(":id", $_GET["idProveedor"], PDO::PARAM_INT);

            if($stmt->execute()){

                return "ok";

            }else{

                return "error";
            
            }

            $stmt->close();
            $stmt = null;
        }
    }

    static public function actualizarProveedor(){
        
        if (isset($_POST["idActualizarProveedor"])) {
            $stmt = Conexion::conectar()->prepare("UPDATE proveedor SET  nombre = :nombre, apellidos = :apellidos, direccion = :direccion, telefono =:telefono, correo = :correo WHERE id = :id");
            
            // $stmt->bindParam(":codigo", $_POST["inputNuevoCodigo"], PDO::PARAM_STR);
            $stmt->bindParam(":nombre", $_POST["inputNombre"], PDO::PARAM_STR);
            $stmt->bindParam(":apellidos", $_POST["inputApellidos"], PDO::PARAM_STR);
            // $stmt->bindParam(":dni", $_POST["inputDni"] , PDO::PARAM_STR);
            $stmt->bindParam(":direccion", $_POST["inputDireccion"], PDO::PARAM_STR);
            $stmt->bindParam(":telefono", $_POST["inputTelefono"], PDO::PARAM_STR);
            $stmt->bindParam(":correo", $_POST["inputCorreo"], PDO::PARAM_STR);
            $stmt->bindParam(":id", $_POST["idActualizarProveedor"], PDO::PARAM_INT);
            
            if($stmt->execute()){

                return "ok";

            }else{

                return "error";
            
            }

            $stmt->close();
            $stmt = null;
        }
    }
}
