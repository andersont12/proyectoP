<?php

include('../../../app/config.php');

// Obtener el último número de espacio
$query = "SELECT MAX(nro_espacio) AS max_nro_espacio FROM tb_mapeos";
$result = $link->query($query);
$row = $result->fetch(PDO::FETCH_ASSOC);
$ultimo_nro_espacio = $row['max_nro_espacio'];

// Determinar el próximo número de espacio
$nro_espacio = ($ultimo_nro_espacio !== null) ? $ultimo_nro_espacio + 1 : 1;
$estado_espacio = "LIBRE"; // Define el valor por defecto si es necesario
$obs = isset($_GET['obs']) ? $_GET['obs'] : "Observación por defecto"; // Valor por defecto si no se proporciona

date_default_timezone_set("America/Bogota");
$fechaHora = date("Y-m-d H:i:s"); // Cambiado a 'H' para formato de 24 horas

$estado_del_registro = '1'; // Ajusta este valor según tu lógica

// Preparar la consulta SQL
$sentencia = $link->prepare("INSERT INTO tb_mapeos 
        (nro_espacio, estado_espacio, obs, fyh_creacion, estado) 
VALUES (:nro_espacio, :estado_espacio, :obs, :fyh_creacion, :estado)");

// Vincular parámetros
$sentencia->bindParam(':nro_espacio', $nro_espacio);
$sentencia->bindParam(':estado_espacio', $estado_espacio);
$sentencia->bindParam(':obs', $obs);
$sentencia->bindParam(':fyh_creacion', $fechaHora);
$sentencia->bindParam(':estado', $estado_del_registro);

// Ejecutar la consulta y manejar la respuesta
if ($sentencia->execute()) {
    echo "Registro satisfactorio";
    // Redirigir a la página principal (si es necesario, puedes usar esta línea en lugar de JavaScript)
    // header('Location: Principal.php'); 
    ?>
    <script>location.href = "Principal";</script>
    <?php
} else {
    echo "No se pudo registrar en la base de datos";
}
?>
