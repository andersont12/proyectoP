<?php
include('../../modelos/conexion.php');
date_default_timezone_set("America/Bogota");
$fecha = date("d/m/Y");

header("Content-Type: application/vnd.ms-excel; charset=iso-8859-1");
$filename = "ReporteExcel_" . $fecha . ".xls";
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Disposition: attachment; filename=" . $filename);

$listUsuarios = "SELECT * FROM usuarios WHERE perfil = 'Administrador'";
$DataUsuarios = mysqli_query($usu, $listUsuarios);

if (!$DataUsuarios) {
    die('Error en la consulta: ' . mysqli_error($usu));
}

?>

<table style="text-align: center;" border="1" cellpadding="1" cellspacing="1">
<thead>
    <tr style="background: #D0CDCD;">
        <th>#</th>
        <th>Cédula</th>
        <th>Nombre</th>
        <th>Perfil</th>
        <th>Estado</th>
        <th>Último Login</th>
        <th>Fecha de Nacimiento</th>
        <th>Email</th>
        <th>Teléfono</th>
    </tr>
</thead>
<tbody>
<?php
$i = 1;
while ($usuario = mysqli_fetch_array($DataUsuarios)) { ?>
    <tr>
        <td><?php echo $i++; ?></td>
        <td><?php echo $usuario['cedula']; ?></td>
        <td><?php echo $usuario['nombre']; ?></td>
        <td><?php echo $usuario['perfil']; ?></td>
        <td><?php echo $usuario['Estado']; ?></td> <!-- Revisar si es Estado y no Estadoe -->
        <td><?php echo $usuario['Ultimo Login']; ?></td>
        <td><?php echo $usuario['Fecha de nacimiento']; ?></td>
        <td><?php echo $usuario['Email']; ?></td>
        <td><?php echo $usuario['Telefono']; ?></td>
    </tr>
<?php } ?>
</tbody>
</table>

<?php
mysqli_close($usu);
?>
