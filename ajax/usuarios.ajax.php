<?php

require_once "../controladores/usuarios.controlador.php";
require_once "../modelos/usuarios.modelo.php";

class AjaxUsuarios{

	/*=============================================
	EDITAR USUARIO
	=============================================*/	

	public $idUsuario;

	public function ajaxEditarUsuario(){

		$item = "cedula";
		$valor = $this->idUsuario;

		$respuesta = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

		echo json_encode($respuesta);

	}

	/*=============================================
	ACTIVAR USUARIO
	=============================================*/	

	public $activarUsuario;
	public $activarId;


	public function ajaxActivarUsuario(){

		$tabla = "usuarios";

		$item1 = "estado";
		$valor1 = $this->activarUsuario;

		$item2 = "cedula";
		$valor2 = $this->activarId;

		$respuesta = ModeloUsuarios::mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2);

	}

	/*=============================================
	VALIDAR NO REPETIR USUARIO
	=============================================*/	

	public $validarUsuario;

	public function ajaxValidarUsuario(){

		$item = "usuario";
		$valor = $this->validarUsuario;
		$encriptar = null;

		$respuesta = ControladorUsuarios::ctrMostrarUsuarios($item, $valor, $encriptar);

		echo json_encode($respuesta);

	}
		/*=============================================
	VALIDAR NO REPETIR CEDULA
	=============================================*/	

	public $validarCedula;

	public function ajaxValidarCedula(){

		$item = "cedula";
		$valor = $this->validarCedula;
		$encriptar = null;

		$respuesta = ControladorUsuarios::ctrMostrarUsuarios($item, $valor, $encriptar);

		echo json_encode($respuesta);

	}

	/*=============================================
	VALIDAR NO REPETIR CORREO NUEVO
	===========================================*/	

	public $validarCorreoNuevo;

	public function ajaxValidarCorreoNuevo(){

		$item = "email";
		$valor = $this->validarCorreoNuevo;
		$encriptar = null;

		$respuesta = ControladorUsuarios::ctrMostrarUsuarios($item, $valor, $encriptar);

		echo json_encode($respuesta);

	}

	/*=============================================
	VALIDAR NO REPETIR TELEFONO NUEVO
	===========================================*/	

	public $validarTelefonoNuevo;

	public function ajaxValidarTelefonoNuevo(){

		$item = "telefono";
		$valor = $this->validarTelefonoNuevo;
		$encriptar = null;

		$respuesta = ControladorUsuarios::ctrMostrarUsuarios($item, $valor, $encriptar);

		echo json_encode($respuesta);

	}
}

/*=============================================
EDITAR USUARIO
=============================================*/
if(isset($_POST["idUsuario"])){

	$editar = new AjaxUsuarios();
	$editar -> idUsuario = $_POST["idUsuario"];
	$editar -> ajaxEditarUsuario();

}

/*=============================================
ACTIVAR USUARIO
=============================================*/	

if(isset($_POST["activarUsuario"])){

	$activarUsuario = new AjaxUsuarios();
	$activarUsuario -> activarUsuario = $_POST["activarUsuario"];
	$activarUsuario -> activarId = $_POST["activarId"];
	$activarUsuario -> ajaxActivarUsuario();

}

/*=============================================
VALIDAR NO REPETIR USUARIO
=============================================*/

if(isset( $_POST["validarUsuario"])){

	$valUsuario = new AjaxUsuarios();
	$valUsuario -> validarUsuario = $_POST["validarUsuario"];
	$valUsuario -> ajaxValidarUsuario();

}

/*=============================================
VALIDAR NO REPETIR CEDULA
=============================================*/

if(isset($_POST["validarCedula"])){

	$valCedula = new AjaxUsuarios();
	$valCedula -> validarCedula = $_POST["validarCedula"];
	$valCedula -> ajaxValidarCedula();

}

/*=============================================
VALIDAR NO REPETIR CORREO NUEVO
=============================================*/

if(isset($_POST["validarCorreoNuevo"])){

	$valCorreoNuevo = new AjaxUsuarios();
	$valCorreoNuevo -> validarCorreoNuevo = $_POST["validarCorreoNuevo"];
	$valCorreoNuevo -> ajaxValidarCorreoNuevo();

}

/*=============================================
VALIDAR NO REPETIR TELEFONO NUEVO
=============================================*/

if(isset($_POST["validarTelefonoNuevo"])){

	$valTelefonoNuevo = new AjaxUsuarios();
	$valTelefonoNuevo -> validarTelefonoNuevo = $_POST["validarTelefonoNuevo"];
	$valTelefonoNuevo -> ajaxValidarTelefonoNuevo();

}

/*=============================================
CONSULTA POR CEDULA
=============================================*/

if (isset($_POST["cedula"])) {
	$item = "cedula";
    $valor = $_POST["cedula"];
    $item2 = null;
    $encriptar = 1;
    $respuesta = ControladorUsuarios::ctrMostrarUsuarios($item, $valor,$encriptar);
	if ($respuesta) {
        echo json_encode($respuesta);
    } else {
        echo json_encode(null);
    }

}

/*=============================================
CONSULTA POR CORREO
=============================================*/

if (isset($_POST["correo"])) {
	$item = "email";
    $valor = $_POST["correo"];
    $item2 = null;
    $encriptar = 1;
    $respuesta = ControladorUsuarios::ctrMostrarUsuarios($item, $valor,$encriptar);
	if ($respuesta) {
        echo json_encode($respuesta);
    } else {
        echo json_encode(null);
    }

}

/*=============================================
CAMBIO DE CONTRASEÑA
=============================================*/
if (isset($_POST["cambioClave"]) && isset($_POST["cedula"])) {
    $clave = md5($_POST["cambioClave"]);
    $cedula = $_POST["cedula"];

	$pdo = Conexion::conectar();

	$sql = "UPDATE usuarios SET clave = :clave, codigo_verificacion = null WHERE cedula = :cedula";
	$stmt = $pdo->prepare($sql);

	$stmt->bindParam(':clave', $clave);
	$stmt->bindParam(':cedula', $cedula);

	$stmt->execute();
    // Respuesta en JSON
    return json_encode(true);
	$_SESSION['cedula'] = null;
	$_SESSION['codigo'] = null;
} else {
    return json_encode(false);
}