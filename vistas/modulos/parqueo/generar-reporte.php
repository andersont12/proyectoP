<?php

include('../../../app/config.php');

// Include the main TCPDF library (search for installation path).
include('../../../app/templeates/TCPDF-main/tcpdf.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->setCreator(PDF_CREATOR);
$pdf->setAuthor('Nicola Asuni');
$pdf->setTitle('TCPDF Example 004');
$pdf->setSubject('TCPDF Tutorial');
$pdf->setKeywords('TCPDF, PDF, example, test, guide');

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->setMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->setHeaderMargin(PDF_MARGIN_HEADER);
$pdf->setFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->setAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->setFont('Helvetica', '', 10);

// add a page
$pdf->AddPage('L');

// create some HTML content
$html = '
<div>
                <img src="../../../images/logoapp.jpg" width="80" height="80" style="float:left;">
                <div>
                APPARKING
                </div>
    </div>
<P><b>Reporte de vehiculo visitante en el cuviculo</b></P>
<table border="1" cellpadding="4">
<tr>
<td style="background-color: #c0c0c0;text-align: center" width="100px">Nro de cuviculo</td>
<td style="background-color: #c0c0c0;text-align: center" width="100px">Placa</td>
<td style="background-color: #c0c0c0;text-align: center" width="100px">fecha ingreso</td>
<td style="background-color: #c0c0c0;text-align: center" width="100px">hora_ingreso</td>
<td style="background-color: #c0c0c0;text-align: center" width="100px">fecha_salida</td>
<td style="background-color: #c0c0c0;text-align: center" width="100px">hora_salida</td>
<td style="background-color: #c0c0c0;text-align: center" width="100px">tiempo</td>

</tr>
';
$contador = 0;
$query_mapeos = $link->prepare("SELECT m.*, t.placa_auto, t.cuviculo, f.fecha_ingreso, f.hora_ingreso, f.fecha_salida, f.hora_salida, f.tiempo
                                                        FROM tb_mapeos m
                                                        JOIN tb_tickets t ON m.id_map = t.cuviculo
                                                        JOIN tb_facturaciones f ON t.cuviculo = f.id_facturacion
                                                        WHERE m.estado = '1' ");
$query_mapeos->execute();
$mapeos = $query_mapeos->fetchAll(PDO::FETCH_ASSOC);
foreach($mapeos as $mapeo){
    $id_map = $mapeo['id_map'];
    $nro_espacio = $mapeo['nro_espacio'];
    $placa_auto = $mapeo['placa_auto'];
    $fecha_ingreso = $mapeo['fecha_ingreso'];
    $hora_ingreso = $mapeo['hora_ingreso'];
    $fecha_salida = $mapeo['fecha_salida'];
    $hora_salida = $mapeo['hora_salida'];
    $tiempo = $mapeo['tiempo'];
    $contador = $contador + 1;

    $html .= '
    <tr>
    <td style="text-align: center">'.$nro_espacio.'</td>
    <td style="text-align: center">'.$placa_auto.'</td>
    <td style="text-align: center">'.$fecha_ingreso.'</td>
    <td style="text-align: center">'.$hora_ingreso.'</td>
    <td style="text-align: center">'.$fecha_salida.'</td>
    <td style="text-align: center">'.$hora_salida.'</td>
    <td style="text-align: center">'.$tiempo.'</td>
    </tr>
    ';


}

$html.='
</table>
';

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

//Close and output PDF document
$pdf->Output('example_004.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+