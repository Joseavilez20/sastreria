<?php

include_once "conexion.php";
class ModeloVenta 
{
    
    static public function mostrarVentas(){
        $stmt = Conexion::conectar()->prepare("SELECT * FROM ventas");
        $stmt -> execute();
        return $stmt -> fetchAll();
        $stmt -> close();

		$stmt = null;
    }

    static public function buscarVenta(){
        $stmt = Conexion::conectar()->prepare("SELECT * FROM ventas WHERE id = :id");
        $stmt -> bindParam(":id", $_GET["idActualizarVenta"], PDO::PARAM_INT);

        $stmt -> execute();
        return $stmt -> fetch();
        $stmt -> close();

		$stmt = null;
    }

    static public function insertarVenta(){
        $estado = 'ok';
        if (isset($_POST["ingresarVenta"])) {
            foreach($_SESSION['carrito'] as $indice=>$producto){
                $codigo = $aleatorio = mt_rand(100,999);
                
                $stmt = Conexion::conectar()->prepare("INSERT INTO ventas (codigo, id_cliente, id_vendedor, id_producto, cantidad, total) VALUES ( :codigo, :cliente, :vendedor, :producto, :cantidad, :total)");
                // var_dump($stmt);
                $stmt->bindParam(":codigo", $codigo, PDO::PARAM_STR);
                $stmt->bindParam(":cliente", $_POST["cliente"], PDO::PARAM_INT);
                $stmt->bindParam(":vendedor", $_POST["vendedor"], PDO::PARAM_INT);
                $stmt->bindParam(":producto", $producto['ID'], PDO::PARAM_INT);
                $stmt->bindParam(":total", $producto['PRECIO'], PDO::PARAM_STR);
                $stmt->bindParam(":cantidad", $producto['CANTIDAD'], PDO::PARAM_INT);
                
                
                if(!$stmt->execute()){
                    $estado = 'error';
                }
                
                 
            }

            // $stmt->close();
            $stmt = null;

            return $estado;    
     }
     

    }

    static public function eliminarVenta(){
        if(isset($_GET["idVenta"])){
            $stmt = Conexion::conectar()->prepare("DELETE FROM ventas WHERE id = :id");

            $stmt -> bindParam(":id", $_GET["idVenta"], PDO::PARAM_INT);

            if($stmt->execute()){

                return "ok";

            }else{

                return "error";
            
            }

            $stmt->close();
            $stmt = null;
        }
    }

    static public function actualizarVenta(){
        
        if (isset($_POST["idActualizarVenta"])) {
            $stmt = Conexion::conectar()->prepare("UPDATE ventas SET  nombre = :nombre, password = :pass, rol = :rol, estado = :estado WHERE id = :id");
            
            
            // $stmt->bindParam(":usuario", $_POST["inputVenta"], PDO::PARAM_STR);
            $stmt->bindParam(":nombre", $_POST["inputNombre"], PDO::PARAM_STR);
            $stmt->bindParam(":pass", $_POST["inputPassword"], PDO::PARAM_STR);
            $stmt->bindParam(":rol", $_POST["inputRol"], PDO::PARAM_STR);
            $stmt->bindParam(":estado", $_POST["inputEstado"], PDO::PARAM_STR);
            $stmt->bindParam(":id", $_POST["idActualizarVenta"], PDO::PARAM_INT);
            
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
