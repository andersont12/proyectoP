<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

if (isset($_POST['cedula']) && !empty($_POST['cedula'])) {
    $cedula = $_POST['cedula'];
    $_SESSION["cedula"] = $cedula;
    $item = "cedula";
    $valor = $cedula;
    $item2 = null;
    $encriptar = 1;
    $respuesta = ControladorUsuarios::ctrMostrarUsuarios($item, $valor,$encriptar);
    $usuario = $respuesta[0];
    $email = $usuario["email"];
    $nombre = $usuario["nombre"];
    function generarCodigo($longitud = 4) {
        $codigoGenerado = '';
        for ($i = 0; $i < $longitud; $i++) {
            $codigoGenerado .= rand(0, 9);
        }
        return $codigoGenerado;
    }
    $codigo = generarCodigo();
    $_SESSION["codigo"] = $codigo;
    try {
        $pdo = Conexion::conectar();

        $sql = "UPDATE usuarios SET codigo_verificacion = :codigo WHERE cedula = :cedula";
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':codigo', $codigo);
        $stmt->bindParam(':cedula', $cedula);

        $stmt->execute();
    }catch (PDOException $e) {
        // Captura y maneja la excepción
        echo json_encode(["status" => "error", "message" => "Error: " . $e->getMessage()]);
    }

    $mail = new PHPMailer(true);
    try {
        // Server settings
        $mail->isSMTP();                                            
        $mail->Host       = 'smtp-mail.outlook.com';                
        $mail->SMTPAuth   = true;                                   
        $mail->Username   = 'apparking@outlook.com';                
        $mail->Password   = 'Proyectosena123';                      
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Recipients
        $mail->setFrom('apparking@outlook.com', 'Administracion APPARKING');
        $mail->addAddress($email, $nombre); 

        // Content
        $mail->isHTML(true);                                       
        $mail->Subject = mb_encode_mimeheader('Recuperación de contraseña', 'UTF-8', 'B');
        $mail->Body    = "
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset='UTF-8'>
            <title>Restablecimiento de Contraseña</title>
            <style>
                body { font-family: Arial, sans-serif; color: #333; background-color: #f4f4f4; margin: 0; padding: 0; }
                .container { width: 80%; max-width: 600px; margin: 0 auto; background: #fff; padding: 20px; border-radius: 5px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
                .header { background-color: #007BFF; color: #fff; padding: 10px; text-align: center; border-radius: 5px 5px 0 0; }
                .content { padding: 20px; }
                .footer { text-align: center; padding: 10px; font-size: 12px; color: #777; }
                .button { display: inline-block; padding: 10px 20px; font-size: 16px; color: #fff; background-color: #007BFF; text-decoration: none; border-radius: 5px; }
            </style>
        </head>
        <body>
            <div class='container'>
                <div class='header'>
                    <h1>Restablecimiento de Contraseña</h1>
                </div>
                <div class='content'>
                    <p>Hola $nombre,</p>
                    <p>Recibimos una solicitud para restablecer la contraseña de tu cuenta. Para continuar con el restablecimiento, utiliza el siguiente código de verificación:</p>
                    <h2> $codigo </h2>
                    <p>Este código es válido por 30 minutos. Si no solicitaste este cambio, puedes ignorar este mensaje.</p>
                    <p>Si necesitas ayuda adicional, no dudes en ponerte en contacto con nuestro soporte.</p>
                    <p>Gracias,<br>El equipo de APPARKING</p>
                </div>
                <div class='footer'>
                    <p>&copy; 2024 APPARKING. Todos los derechos reservados.</p>
                </div>
            </div>
        </body>
        </html>";
        $mail->AltBody = 'PRUEBA123';

        $mail->send();
        echo '<script>window.location = "restablecer";</script>';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
else{
    echo '<script>window.location = "inicio";</script>';  
}