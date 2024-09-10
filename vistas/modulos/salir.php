<?php
$objeto = new Conexion();
$conexion = $objeto->Conectar();
$cedula = $_SESSION["cedula"];
date_default_timezone_set('America/Bogota');
$fecha = date('Y-m-d');
$hora = date('H:i:s');
$fechaActual = $fecha.' '.$hora;
$consulta = "UPDATE usuarios SET ultimo_cierre_sesion = '$fechaActual' WHERE cedula = '$cedula' ";		
$resultado = $conexion->prepare($consulta);
$resultado->execute();

session_destroy();

echo '<script>

	window.location = "ingreso";

</script>';


?>