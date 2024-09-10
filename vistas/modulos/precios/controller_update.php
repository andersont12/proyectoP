<?php
include('../../../app/config.php');

$cantidad = $_POST['cantidad'];
$detalle = $_POST['detalle'];
$precio = $_POST['precio'];
$id_precio = $_POST['id_precio'];

date_default_timezone_set("America/Caracas");
$fechaHora = date("Y-m-d H:i:s");

// Preparar la sentencia SQL
$sentencia = $link->prepare("UPDATE tb_precios SET
    cantidad = :cantidad,
    detalle = :detalle,
    precio = :precio,
    fyh_actualizacion = :fyh_actualizacion 
    WHERE id_precio = :id_precio");

// Vincular los parámetros
$sentencia->bindParam(':cantidad', $cantidad);
$sentencia->bindParam(':detalle', $detalle);
$sentencia->bindParam(':precio', $precio);
$sentencia->bindParam(':fyh_actualizacion', $fechaHora);
$sentencia->bindParam(':id_precio', $id_precio);

if ($sentencia->execute()) {
    ?>
<script>
    location.href = "/proyectoP/index";
</script>
<?php
} else {
    print_r($sentencia->errorInfo());
    echo 'Error al registrar en la base de datos';
}
?>