<?php

include_once "conexion.php";
class ModeloProducto 
{
    
    static public function mostrarProductos(){
        $stmt = Conexion::conectar()->prepare("SELECT * FROM producto");
        $stmt -> execute();
        return $stmt -> fetchAll();
        $stmt -> close();

		$stmt = null;
    }

    static public function buscarProducto(){
        $stmt = Conexion::conectar()->prepare("SELECT * FROM producto WHERE id = :id");
        $stmt -> bindParam(":id", $_GET["idActualizarProducto"], PDO::PARAM_INT);

        $stmt -> execute();
        return $stmt -> fetch();
        $stmt -> close();

		$stmt = null;
    }

    static public function buscarProducto1($value){
        $stmt = Conexion::conectar()->prepare("SELECT * FROM producto WHERE id = :id");
        $stmt -> bindParam(":id", $value, PDO::PARAM_INT);

        $stmt -> execute();
        return $stmt -> fetch();
        $stmt -> close();

		$stmt = null;
    }
    static public function insertarProducto(){

        if (isset($_POST["inputNuevoCodigo"])) {

            	/*=============================================
				VALIDAR IMAGEN
				=============================================*/

			   	$ruta = "../vistas/img/productos/default/anonymous.png";


			   	if(isset($_FILES["inputImagen"]["tmp_name"])){

					list($ancho, $alto) = getimagesize($_FILES["inputImagen"]["tmp_name"]);

					$nuevoAncho = 276;
					$nuevoAlto = 414;

					/*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
					=============================================*/

					$directorio = "../vistas/img/productos/".$_POST["inputNuevoCodigo"];

					mkdir($directorio, 0755);

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["inputImagen"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "../vistas/img/productos/".$_POST["inputNuevoCodigo"]."/".$aleatorio.".jpg";
                        $rutaPersonalizada = "vistas/img/productos/".$_POST["inputNuevoCodigo"]."/".$aleatorio.".jpg";

						$origen = imagecreatefromjpeg($_FILES["inputImagen"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $ruta);

					}

					if($_FILES["inputImagen"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "../vistas/img/productos/".$_POST["inputNuevoCodigo"]."/".$aleatorio.".png";
                        $rutaPersonalizada = "vistas/img/productos/".$_POST["inputNuevoCodigo"]."/".$aleatorio.".png";
						$origen = imagecreatefrompng($_FILES["inputImagen"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $ruta);

					}

				}


            $stmt = Conexion::conectar()->prepare("INSERT INTO producto (codigo, nombre, descripcion, imagen, precio, stock) VALUES ( :codigo, :nombre, :descripcion, :imagen, :precio, :stock)");
            
            $stmt->bindParam(":codigo", $_POST["inputNuevoCodigo"], PDO::PARAM_STR);
            $stmt->bindParam(":nombre", $_POST["inputNombre"], PDO::PARAM_STR);
            $stmt->bindParam(":descripcion", $_POST["inputDescripcion"], PDO::PARAM_STR);
            $stmt->bindParam(":imagen", $rutaPersonalizada, PDO::PARAM_STR);
            $stmt->bindParam(":precio", $_POST["inputPrecio"], PDO::PARAM_STR);
            $stmt->bindParam(":stock", $_POST["inputStock"], PDO::PARAM_INT);
            
            if($stmt->execute()){

                return "ok";

            }else{

                return "error";
            
            }

            $stmt->close();
            $stmt = null;
     }

    }

    static public function eliminarProducto(){
        if(isset($_GET["idProducto"])){
            $stmt = Conexion::conectar()->prepare("DELETE FROM producto WHERE id = :id");

            $stmt -> bindParam(":id", $_GET["idProducto"], PDO::PARAM_INT);

            if($stmt->execute()){

                return "ok";

            }else{

                return "error";
            
            }

            $stmt->close();
            $stmt = null;
        }
    }

    static public function actualizarProducto(){
        
        if (isset($_POST["idActualizarProducto"])) {
            $stmt = Conexion::conectar()->prepare("UPDATE producto SET  nombre = :nombre, descripcion = :descripcion, precio = :precio, stock =:stock WHERE id = :id");
                
            // $stmt->bindParam(":codigo", $_POST["inputCodigo"], PDO::PARAM_STR);
            $stmt->bindParam(":nombre", $_POST["inputNombre"], PDO::PARAM_STR);
            $stmt->bindParam(":descripcion", $_POST["inputDescripcion"], PDO::PARAM_STR);
            // $stmt->bindParam(":imagen", $ruta , PDO::PARAM_STR);
            $stmt->bindParam(":precio", $_POST["inputPrecio"], PDO::PARAM_STR);
            $stmt->bindParam(":stock", $_POST["inputStock"], PDO::PARAM_INT);
            $stmt->bindParam(":id", $_POST["idActualizarProducto"], PDO::PARAM_INT);
            
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
