<?php

require_once "controladores/plantilla.controlador.php";
require_once "controladores/usuarios.controlador.php";
require_once "controladores/vehiculos.controlador.php";
require_once "controladores/islas.controlador.php";
require_once "controladores/controller_create.php";

require_once "modelos/islas.modelo.php";
require_once "modelos/usuarios.modelo.php";
require_once "modelos/vehiculos.modelo.php";
require_once "modelos/vehiculos.modelo.2.php";

require_once "extensiones/vendor/autoload.php";

$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();