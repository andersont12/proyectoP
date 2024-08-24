<?php
// Include the main TCPDF library (search for installation path).
require_once('../../../app/templeates/TCPDF-main/tcpdf.php');
include('../../../app/config.php');


//cargar el encabezado
//$query_informacions = $link->prepare("SELECT * FROM tb_informaciones WHERE estado = '1' ");
//$query_informacions->execute();
//$informacions = $query_informacions->fetchAll(PDO::FETCH_ASSOC);
//foreach($informacions as $informacion){
//    $id_informacion = $informacion['id_informacion'];
//    $nombre_parqueo = $informacion['nombre_parqueo'];
//    $actividad_empresa = $informacion['actividad_empresa'];
//    $sucursal = $informacion['sucursal'];
//    $direccion = $informacion['direccion'];
//    $zona = $informacion['zona'];
//    $telefono = $informacion['telefono'];
//    $departamento_ciudad = $informacion['departamento_ciudad'];
//    $pais = $informacion['pais'];
//}


/////////// rescatar la informacion de la factura
$query_fascturas = $link->prepare("SELECT * FROM tb_facturaciones WHERE estado = '1' ");
$query_fascturas->execute();
$facturas = $query_fascturas->fetchAll(PDO::FETCH_ASSOC);
foreach($facturas as $factura){
    $id_facturacion = $factura['id_facturacion'];
    $id_informacion = $factura['id_informacion'];
    $nro_factura = $factura['nro_factura'];
    $id_cliente = $factura['id_cliente'];
    $fecha_factura = $factura['fecha_factura'];
    $fecha_ingreso = $factura['fecha_ingreso'];
    $hora_ingreso = $factura['hora_ingreso'];
    $fecha_salida = $factura['fecha_salida'];
    $hora_salida = $factura['hora_salida'];
    $tiempo = $factura['tiempo'];
    $cuviculo = $factura['cuviculo'];
    $detalle = $factura['detalle'];
    $precio = $factura['precio'];
    $cantidad = $factura['cantidad'];
    $total = $factura['total'];
    $monto_total = $factura['monto_total'];
    $monto_literal = $factura['monto_literal'];
    $user_sesion = $factura['user_sesion'];
    $qr = $factura['qr'];
}


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




// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, array(79,175), true, 'UTF-8', false);

// set document information
$pdf->setCreator(PDF_CREATOR);
$pdf->setAuthor('Sistema de parqueo');
$pdf->setTitle('Sistema de parqueo');
$pdf->setSubject('Sistema de parqueo');
$pdf->setKeywords('TCPDF, PDF, example, test, guide');

// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set default monospaced font
$pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->setMargins(5, 5, 5);

// set auto page breaks
$pdf->setAutoPageBreak(true, 5);


// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->setFont('Helvetica', '', 7);

// add a page
$pdf->AddPage();




// create some HTML content
$html = '
<div>
    <p style="text-align: center">
         <br>
            <img src="../../../images/logoapp.jpg" width="100" height="100"><br>
         <br>
            APPARKING  <br>
         <br>
        --------------------------------------------------------------------------------
         <b>FACTURA Nro.</b> '.$nro_factura.'
        --------------------------------------------------------------------------------
        <br>
        <div style="text-align: left">
           
            <b>DATOS DEL CLIENTE</b> <br>
            <b>SEÑOR(A): </b> '.$nombre_cliente.' <br>
            <b>NIT/CI.: </b> '.$nit_ci_cliente.'  <br>
            <b>PLACA: </b> '.$placa_auto.'<br>
            <br>
            -------------------------------------------------------------------------------- <br>
            <br>
        <b>De: </b> '.$fecha_ingreso.'<b> Hora: </b>'.$hora_ingreso.'<br>
        <b>A: </b> '.$fecha_salida.'  <b>Hora: </b>'.$hora_salida.'<br>
        <b>Tiempo:  </b> '.$tiempo.'<br>
        <br>
         -------------------------------------------------------------------------------- <br>
         <br>
         <table border="1" cellpadding="3">
         <tr>
            <td style="text-align: center" width="99px"><b>Detalle</b></td>    
            <td style="text-align: center" WIDTH="45PX"><b></b></td>    
            <td style="text-align: center" width="45px"><b>Cantidad</b></td>    
            <td style="text-align: center" width="45px"><b></b></td>    
         </tr>
         <tr>
            <td>'.$detalle.'</td>
            <td style="text-align: center"></td>
            <td style="text-align: center">'.$cantidad.'</td>
            <td style="text-align: center"></td>
         </tr>
         </table>
         <p style="text-align: right">
        
        <br>
         -------------------------------------------------------------------------------- <br>
        <p style="text-align: center"> REGLAMENTO
        </p>
        <p style="text-align: center"> El vehiculo se entregara al portador del ticket. * No se aceptaran ordenes telefonicas ni escritas. * Retirado el vehiculo, no se acepatara ninguntipo de reclamo acerca de este recibo.
        </p>
        <p style="text-align: center"><b>GRACIAS POR SU PREFERENCIA</b></p>
        </div>
    </p>
</div>
';

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');



$style = array(
    'border' => 0,
    'vpadding' => '9',
    'hpadding' => '3',
    'fgcolor' => array(0, 0, 0),
    'bgcolor' => false, //array(255,255,255)
    'module_width' => 1, // width of a single module in points
    'module_height' => 1 // height of a single module in points
);






//Close and output PDF document
$pdf->Output('factura.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
