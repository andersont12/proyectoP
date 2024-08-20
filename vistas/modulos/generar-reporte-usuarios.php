<?php
include('../../app/config.php');
// Include the main TCPDF library (search for installation path).
include('../../app/templeates/TCPDF-main/tcpdf.php');

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
$pdf->setFont('Helvetica', '', 11);

// add a page
$pdf->AddPage('L');

// create some HTML content
$html = '
<P><b>Reporte de usuarios</b></P>
<table border="1" cellpadding="5">
<tr>
<td style="background-color: #c0c0c0;text-align: center" width="100px">cedula</td>
<td style="background-color: #c0c0c0;text-align: center" width="100px">nombre</td>
<td style="background-color: #c0c0c0;text-align: center" width="100px">perfil</td>
<td style="background-color: #c0c0c0;text-align: center" width="100px">Estado</td>
<td style="background-color: #c0c0c0;text-align: center" width="100px">Ultimo Login</td>
<td style="background-color: #c0c0c0;text-align: center" width="100px">Fecha de nacimiento</td>
<td style="background-color: #c0c0c0;text-align: center" width="100px">Email</td>
<td style="background-color: #c0c0c0;text-align: center" width="100px">Telefono</td>
</tr>
';
$contador = 0;
$query_usuario = $link->prepare("SELECT * FROM usuarios WHERE estado = '1' ");
$query_usuario->execute();
$usuarios = $query_usuario->fetchAll(PDO::FETCH_ASSOC);
foreach($usuarios as $usuario){
    $cedula = $usuario['cedula'];
	$nombre = $usuario['nombre'];
	$perfil = $usuario['perfil'];
    $estado = $usuario['estado'];
    $ultimo_login = $usuario['ultimo_login'];
    $fechaNacimiento = $usuario['fechanacimiento'];
    $email = $usuario['email'];
    $telefono = $usuario['telefono'];
    
    

    $html .= '
    <tr>
    <td style="text-align: center">'.$cedula.'</td>
    <td style="text-align: center">'.$nombre.'</td>
	<td style="text-align: center">'.$perfil.'</td>
    <td style="text-align: center">'.$estado.'</td>
    <td style="text-align: center">'.$ultimo_login.'</td>
    <td style="text-align: center">'.$fechaNacimiento.'</td>
    <td style="text-align: center">'.$email.'</td>
    <td style="text-align: center">'.$telefono.'</td>
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
