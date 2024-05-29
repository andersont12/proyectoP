<?php

class controladorVehiculos{

	/*=============================================
	MOSTRAR VEHICULOS
	=============================================*/

	static public function ctrMostrarVehiculos($item, $valor){
		$tabla = "tbl_vehiculos";
		$orden = "placa";
		
		$respuesta = modeloVehiculos::mdlMostrarvehiculo($tabla, $item, $valor, $orden);

		return $respuesta;

	}

	/*=============================================
	CREAR VEHICULO
	=============================================*/

	static public function ctrCrearVehiculo(){

		if(isset($_POST["nuevaPlaca"]))
		{

			   	$ruta = "vistas/img/productos/default/anonymous.png";
				$tabla = "tbl_vehiculos";

				$datos = array("placa" => $_POST["nuevaPlaca"],
							   "vehi_tipo" => $_POST["nuevoTipoVehiculo"],
							   "vehi_marca" => $_POST["nuevaMarcaVehiculo"],
							   "cedula" => $_POST["nuevaCedula"]);

				$respuesta = ModeloVehiculos::mdlIngresarVehiculo($tabla, $datos);

				if($respuesta == "ok")
				{

					echo'<script>

						swal({
							  type: "success",
							  title: "La mascota ha sido guardada correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
										if (result.value) {

										window.location = "vehiculos";

										}
									})

						</script>';

				}
				echo'<script>

						swal({
							  type: "success",
							  title: "Error al guardar los dastos de las mascota",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
										if (result.value) {

										window.location = "mascotas";

										}
									})

						</script>';

		}

	}

	/*=============================================
	EDITAR MASCOTAS
	=============================================*/

	static public function ctrEditarMascota(){

		if(isset($_POST["editarNombre"]))
		{

				/*=============================================
				VALIDAR IMAGEN
				=============================================*/

			   	$ruta = $_POST["imagenActual"];

			   	if(isset($_FILES["editarImagen"]["tmp_name"]) && !empty($_FILES["editarImagen"]["tmp_name"])){

					list($ancho, $alto) = getimagesize($_FILES["editarImagen"]["tmp_name"]);

					$nuevoAncho = 500;
					$nuevoAlto = 500;

					/*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL MASCOTA
					=============================================*/

					$directorio = "vistas/img/productos/".$_POST["editarCodigo"];

					/*=============================================
					PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
					=============================================*/

					if(!empty($_POST["imagenActual"]) && $_POST["imagenActual"] != "vistas/img/productos/default/anonymous.png"){

						unlink($_POST["imagenActual"]);

					}else{

						mkdir($directorio, 0755);	
					
					}
					
					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["editarImagen"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/productos/".$_POST["editarCodigo"]."/".$aleatorio.".jpg";

						$origen = imagecreatefromjpeg($_FILES["editarImagen"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $ruta);

					}

					if($_FILES["editarImagen"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/productos/".$_POST["editarCodigo"]."/".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["editarImagen"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $ruta);

					}

				}

				$tabla = "mascotas";

				$datos = array("nombre_mascota" => $_POST["editarNombre"],
							   "raza_mascota" => $_POST["editarraza"],
							   "edad_mascota" => $_POST["editarEdad"],
							   "sexo_mascota" => $_POST["editarSexo"]);

				$respuesta = ModeloMascotas::mdlEditarMascota($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

						swal({
							  type: "success",
							  title: "La mascota ha sido editada correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
										if (result.value) {

										window.location = "mascotas";

										}
									})

						</script>';
			}

		}

	}

	/*=============================================
	BORRAR MASCOTAS
	=============================================*/
	static public function ctrEliminarMascotas(){

		if(isset($_GET["idProducto"])){

			$tabla ="productos";
			$datos = $_GET["idProducto"];

			if($_GET["imagen"] != "" && $_GET["imagen"] != "vistas/img/productos/default/anonymous.png"){

				unlink($_GET["imagen"]);
				rmdir('vistas/img/productos/'.$_GET["codigo"]);

			}

			$respuesta = ModeloMascostas::mdlEliminarMascota($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "La moscota ha sido borrada correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "mascotas";

								}
							})

				</script>';

			}		
		}


	}
}