<?php

require_once "conexion.php";

class ModeloUsuarios{

	/*=============================================
	MOSTRAR USUARIOS
	=============================================*/

	static public function mdlMostrarUsuarios($tabla, $item, $item2, $valor, $encriptar)
	{
		if($item != null)
			{
				if($encriptar == null)
				{
					$condicion="select * from ".$tabla." where ".$item." = '".$valor."'";
					$stmt = Conexion::conectar()->prepare($condicion);
					$stmt -> execute();
					return $stmt->fetch();
				}
				if($encriptar == 1)
				{
					$condicion="select * from ".$tabla." where ".$item." = '".$valor."'";
					$stmt = Conexion::conectar()->prepare($condicion);
					$stmt -> execute();
					return $stmt->fetchAll();
				}
				else
				{
					$condicion = "SELECT * FROM " . $tabla . " WHERE " . $item . " = '" . $valor . "' AND clave = '" . $encriptar . "'";
					$stmt = Conexion::conectar()->prepare($condicion);
					$stmt -> execute();
					return $stmt->fetch();
				}
	
			}else
			{
	
				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
	
				$stmt -> execute();
	
				return $stmt -> fetchAll();
	
			}
			
	
			$stmt -> close();
	
			$stmt = null;
	
	}

	/*=============================================
	REGISTRO DE USUARIO
	=============================================*/

	static public function mdlIngresarUsuario($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(cedula, nombre, usuario, clave, perfil, email, telefono) VALUES (:cedula, :nombre, :usuario, :clave, :perfil, :correo, :telefono)");
		//, :estado, :ultimo_login, :fechanacimiento, :email, :telefono)");

		$stmt->bindParam(":cedula", $datos["cedula"]);
		$stmt->bindParam(":nombre", $datos["nombre"]);
		$stmt->bindParam(":usuario", $datos["usuario"]);
		$stmt->bindParam(":clave", $datos["clave"]);
		$stmt->bindParam(":perfil", $datos["perfil"]);
		$stmt->bindParam(":correo", $datos["correo"]);
		$stmt->bindParam(":telefono", $datos["telefono"]);
		

		if($stmt->execute())
		{
			return "ok";	

		}else{
			
			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;

	}

	/*=============================================
	EDITAR USUARIO
	=============================================*/

	static public function mdlEditarUsuario($tabla, $datos){
	
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET email = :email, telefono = :telefono, nombre = :nombre, clave = :clave, perfil = :perfil WHERE usuario = :usuario");

		$stmt -> bindParam(":email", $datos["email"], PDO::PARAM_STR);
		$stmt -> bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
		$stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt -> bindParam(":clave", $datos["clave"], PDO::PARAM_STR);
		$stmt -> bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);
		$stmt -> bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	ACTUALIZAR USUARIO
	=============================================*/

	static public function mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	BORRAR USUARIO
	=============================================*/

	static public function mdlBorrarUsuario($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;


	}

}