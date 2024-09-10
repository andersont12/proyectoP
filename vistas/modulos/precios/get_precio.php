<?php
include('../../../app/config.php'); // Ajusta la ruta según tu estructura de directorios

// Verificar que el id_precio esté presente en la solicitud GET
if (isset($_GET['id_precio'])) {
    $id_precio = $_GET['id_precio'];

    try {
        // Preparar la consulta para obtener los datos del precio
        $sentencia = $link->prepare("SELECT * FROM tb_precios WHERE id_precio = :id_precio");
        $sentencia->bindParam(':id_precio', $id_precio, PDO::PARAM_INT);
        $sentencia->execute();

        // Obtener el resultado
        $resultado = $sentencia->fetch(PDO::FETCH_ASSOC);

        // Comprobar si se encontró el precio
        if ($resultado) {
            // Configurar el encabezado para JSON
            header('Content-Type: application/json');
            // Enviar los datos en formato JSON
            echo json_encode($resultado);
        } else {
            // Enviar un error si no se encontró el precio
            header('HTTP/1.1 404 Not Found');
            echo json_encode(['error' => 'Precio no encontrado']);
        }
    } catch (PDOException $e) {
        // Manejo de errores de la base de datos
        header('HTTP/1.1 500 Internal Server Error');
        echo json_encode(['error' => 'Error en la base de datos: ' . $e->getMessage()]);
    }
} else {
    // Enviar un error si falta el id_precio
    header('HTTP/1.1 400 Bad Request');
    echo json_encode(['error' => 'Falta el id_precio']);
}
?>