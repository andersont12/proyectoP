<?php

require_once "../controladores/vehiculos.controlador.php";
require_once "../modelos/vehiculos.modelo.2.php";
require_once "../modelos/vehiculos.modelo.php";

class AjaxVehiculos{

	/*=============================================
	EDITAR VEHICULOS
	=============================================*/	

	public $idMascota;

	public function ajaxEditarMascota(){

		$item = "id_mascota";
		$valor = $this->idMascota;

		$respuesta = ControladorMascotas::ctrMostrarMascotas($item, $valor);

		echo json_encode($respuesta);

	}


	/*=============================================
	VALIDAR NO REPETIR VEHICULOS
	===========================================*/	

	public $validarVehiculo;

	public function ajaxValidarVehiculo(){
	
		$item = "placa";
		$valor = $this->validarVehiculo;

		$respuesta = controladorVehiculos::ctrMostrarVehiculo($item, $valor);
		
		echo json_encode($respuesta);

	}
}

/*=============================================
EDITAR VEHICULO
=============================================*/
if(isset($_POST["id_mascota"])){

	$editar = new AjaxMascotas();
	$editar -> idMascota = $_POST["id_mascota"];
	$editar -> ajaxEditarMascota();

}


/*=============================================
VALIDAR NO REPETIR VEHICULO
=============================================*/

if(isset($_POST["validarVehiculo"])){

	$item = "placa";
	$valor = $_POST["validarVehiculo"];

	$respuesta = controladorVehiculos::ctrMostrarVehiculos($item, $valor);
		
	if ($respuesta) {
        echo json_encode($respuesta);
    } else {
        echo json_encode(null);
    }

}

/*=============================================
CONSULTA POR PLACA
=============================================*/

if (isset($_POST["placa"])) {
	$item = "placa";
    $valor = $_POST["placa"];
    $respuesta = controladorVehiculos::ctrMostrarVehiculos($item, $valor);
	if ($respuesta) {
        echo json_encode($respuesta);
    } else {
        echo json_encode(null);
    }

}