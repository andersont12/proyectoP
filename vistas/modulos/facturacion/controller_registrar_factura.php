<?php
/**
 * Created by PhpStorm.
 * User: HILARIWEB
 * Date: 14/10/2022
 * Time: 16:12
 */

 include('../../../app/config.php');
include('literal.php');

date_default_timezone_set("America/bogota");
$fechaHora = date("Y-m-d h:i:s");
$dia = date("d");
$mes = date('m');
if($mes=="1")$mes = "Enero";
if($mes=="2")$mes = "Febrero";
if($mes=="3")$mes = "Marzo";
if($mes=="4")$mes = "Abril";
if($mes=="5")$mes = "Mayo";
if($mes=="6")$mes = "Junio";
if($mes=="7")$mes = "Julio";
if($mes=="8")$mes = "Agosto";
if($mes=="9")$mes = "Septiembre";
if($mes=="10")$mes = "Octubre";
if($mes=="11")$mes = "Noviembre";
if($mes=="12")$mes = "Diciembre";
$ano = date('Y');





$id_cliente = $_GET['id_cliente'];



$fecha_ingreso = $_GET['fecha_ingreso'];
$hora_ingreso = $_GET['hora_ingreso'];
$fecha_salida = date('Y-m-d');
$fecha_salida_para_calcular = date('Y/m/d');
$hora_salida = date('H:i');


//////////////////// CALCULA LA DIFERENCIA ENTRE EL TIEMPO DE ENTRADA Y DE SALIDA /////////////////////////////
$fecha_hora_ingreso = $fecha_ingreso." ".$hora_ingreso;
$fecha_hora_salida = $fecha_salida." ".$hora_salida;

$fecha_hora_ingreso  = new DateTime($fecha_hora_ingreso);
$fecha_hora_salida = new DateTime($fecha_hora_salida);
$diff = $fecha_hora_ingreso ->diff($fecha_hora_salida);

$tiempo = $diff->days." días con ".$diff->h." horas con ".$diff->i." minutos ";
//////////////////// CALCULA LA DIFERENCIA ENTRE EL TIEMPO DE ENTRADA Y DE SALIDA /////////////////////////////

$cuviculo = $_GET['cuviculo'];
$detalle = "Servicio de parqueo de ".$tiempo;



/////////////////////////////////////////////////////////



/////////////////////////////////////////////////////////

//$precio_final = $precio_dia + $precio_hora;

//$cantidad = "1";

//$total = ($precio_final * $cantidad);

//$monto_total = $total;

//$monto_literal = numtoletras($monto_total);

//$user_sesion = $_GET['user_sesion'];



/////////////////////// rescatando los datos del cliente//////////////////////////////////
$query_clientes = $link->prepare("SELECT * FROM tb_clientes WHERE id_cliente = '$id_cliente' AND estado = '1'  ");
$query_clientes->execute();
$datos_clientes = $query_clientes->fetchAll(PDO::FETCH_ASSOC);
foreach($datos_clientes as $datos_cliente){
    $id_cliente = $datos_cliente['id_cliente'];
    $nombre_cliente = $datos_cliente['nombre_cliente'];
    $nit_ci_cliente = $datos_cliente['nit_ci_cliente'];
    $placa_auto = $datos_cliente['placa_auto'];
}
/////////////////////////////////////////////////////////////////////////////////////////////

$qr = "Factura realizada por el sistema de paqueo, al cliente ".$nombre_cliente." con CI/NIT:
 ".$nit_ci_cliente." con el vehiculo con número de placa ".$placa_auto." y esta factura se genero en
   a hr: ".$hora_salida;


$sentencia = $link->prepare('INSERT INTO tb_facturaciones
(id_informacion,nro_factura,id_cliente,fecha_factura,fecha_ingreso,hora_ingreso,fecha_salida,hora_salida,tiempo,cuviculo,detalle,precio,cantidad,total,monto_total,monto_literal,user_sesion,qr, fyh_creacion, estado)
VALUES ( :id_informacion,:nro_factura,:id_cliente,:fecha_factura,:fecha_ingreso,:hora_ingreso,:fecha_salida,:hora_salida,:tiempo,:cuviculo,:detalle,:precio,:cantidad,:total,:monto_total,:monto_literal,:user_sesion,:qr,:fyh_creacion,:estado)');

$sentencia->bindParam(':id_informacion',$id_informacion);
$sentencia->bindParam(':nro_factura',$nro_factura);
$sentencia->bindParam(':id_cliente',$id_cliente);
$sentencia->bindParam(':fecha_factura',$fecha_factura);
$sentencia->bindParam(':fecha_ingreso',$fecha_ingreso);
$sentencia->bindParam(':hora_ingreso',$hora_ingreso);
$sentencia->bindParam(':fecha_salida',$fecha_salida);
$sentencia->bindParam(':hora_salida',$hora_salida);
$sentencia->bindParam(':tiempo',$tiempo);
$sentencia->bindParam(':cuviculo',$cuviculo);
$sentencia->bindParam(':detalle',$detalle);
$sentencia->bindParam(':precio',$precio_final);
$sentencia->bindParam(':cantidad',$cantidad);
$sentencia->bindParam(':total',$total);
$sentencia->bindParam(':monto_total',$monto_total);
$sentencia->bindParam(':monto_literal',$monto_literal);
$sentencia->bindParam(':user_sesion',$user_sesion);
$sentencia->bindParam(':qr',$qr);
$sentencia->bindParam('fyh_creacion',$fechaHora);
$sentencia->bindParam('estado',$estado_del_registro);

if($sentencia->execute()){
    echo 'success';

    $estado_espacio = "LIBRE";
    date_default_timezone_set("America/caracas");
    $fechaHora = date("Y-m-d h:i:s");
    $sentencia = $link->prepare("UPDATE tb_mapeos SET
    estado_espacio = :estado_espacio,
    fyh_actualizacion = :fyh_actualizacion 
    WHERE nro_espacio = :nro_espacio");
    $sentencia->bindParam(':estado_espacio',$estado_espacio);
    $sentencia->bindParam(':fyh_actualizacion',$fechaHora);
    $sentencia->bindParam(':nro_espacio',$cuviculo);
    $sentencia->execute();


    $estado_espacio_ticket = "LIBRE";
    $sentencia_ticket = $link->prepare("UPDATE tb_tickets SET
    estado_ticket = :estado_ticket WHERE fecha_ingreso = :fecha_ingreso AND hora_ingreso = :hora_ingreso");
    $sentencia_ticket->bindParam(':estado_ticket',$estado_espacio_ticket);
    $sentencia_ticket->bindParam(':fecha_ingreso',$fecha_ingreso);
    $sentencia_ticket->bindParam(':hora_ingreso',$hora_ingreso);
    $sentencia_ticket->execute();


    ?>
    <script>location.href = "vistas/modulos/facturacion/factura.php";</script>
    <?php
}else{
    echo 'error al registrar a la base de datos';
}
