<?php

include_once "conexion.php";
class ModeloCliente 
{
    
    static public function mostrarClientes(){
        $stmt = Conexion::conectar()->prepare("SELECT * FROM cliente");
        $stmt -> execute();
        return $stmt -> fetchAll();
        $stmt -> close();

		$stmt = null;
    }

    static public function buscarCliente(){
        $stmt = Conexion::conectar()->prepare("SELECT * FROM cliente WHERE id = :id");
        $stmt -> bindParam(":id", $_GET["idActualizarCliente"], PDO::PARAM_INT);

        $stmt -> execute();
        return $stmt -> fetch();
        $stmt -> close();

		$stmt = null;
    }

    static public function buscarCliente1($value){
        $stmt = Conexion::conectar()->prepare("SELECT * FROM cliente WHERE id = :id");
        $stmt -> bindParam(":id", $value, PDO::PARAM_INT);

        $stmt -> execute();
        return $stmt -> fetch();
        $stmt -> close();

		$stmt = null;
    }
    static public function buscarDNICliente(){
        if (isset($_GET["DNICliente"])) {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM cliente WHERE dni = :id");
        $stmt -> bindParam(":id", $_GET["DNICliente"], PDO::PARAM_INT);

        $stmt -> execute();
        return $stmt -> fetch();
        $stmt -> close();

		$stmt = null;
        }
    }

    static public function insertarCliente(){

        if (isset($_POST["inputNuevoCodigo"])) {

            $stmt = Conexion::conectar()->prepare("INSERT INTO cliente (codigo, nombre, apellidos, dni, direccion, telefono, correo) VALUES ( :codigo, :nombre, :apellidos, :dni, :direccion, :telefono, :correo)");
            
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

    static public function eliminarCliente(){
        if(isset($_GET["idCliente"])){
            $stmt = Conexion::conectar()->prepare("DELETE FROM cliente WHERE id = :id");

            $stmt -> bindParam(":id", $_GET["idCliente"], PDO::PARAM_INT);

            if($stmt->execute()){

                return "ok";

            }else{

                return "error";
            
            }

            $stmt->close();
            $stmt = null;
        }
    }

    static public function actualizarCliente(){
        
        if (isset($_POST["idActualizarCliente"])) {
            $stmt = Conexion::conectar()->prepare("UPDATE cliente SET  nombre = :nombre, apellidos = :apellidos, direccion = :direccion, telefono =:telefono, correo = :correo WHERE id = :id");
            
            // $stmt->bindParam(":codigo", $_POST["inputNuevoCodigo"], PDO::PARAM_STR);
            $stmt->bindParam(":nombre", $_POST["inputNombre"], PDO::PARAM_STR);
            $stmt->bindParam(":apellidos", $_POST["inputApellidos"], PDO::PARAM_STR);
            // $stmt->bindParam(":dni", $_POST["inputDni"] , PDO::PARAM_STR);
            $stmt->bindParam(":direccion", $_POST["inputDireccion"], PDO::PARAM_STR);
            $stmt->bindParam(":telefono", $_POST["inputTelefono"], PDO::PARAM_STR);
            $stmt->bindParam(":correo", $_POST["inputCorreo"], PDO::PARAM_STR);
            $stmt->bindParam(":id", $_POST["idActualizarCliente"], PDO::PARAM_INT);
            
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
