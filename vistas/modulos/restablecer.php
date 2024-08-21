<?php
$cedula = $_SESSION["cedula"];
$item = "cedula";
$valor = $cedula;
$item2 = null;
$encriptar = 1;
$respuesta = ControladorUsuarios::ctrMostrarUsuarios($item, $valor,$encriptar);
$usuario = $respuesta[0];
$codigo = $usuario["codigo_verificacion"];

if (isset($codigo) && isset($cedula) && $codigo !== null && $cedula !== null) {
?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Verificación de Código</title>
        <style>
            .password-container {
                position: relative;
                margin-bottom: 20px;
            }
            .validation-message {
                color: red;
                font-size: 0.9em;
                margin-top: 5px;
            }
            .validation-message.success {
                color: green;
            }
        </style>
    </head>
    <body id="cuerpoPagina">
        <div class="body1">
            <div class="contenedor">
                <div class="imagenLogin">
                    <!-- Puedes agregar una imagen o contenido aquí -->
                </div>

                <div class="registro">
                    <header>
                        <div class="logo">
                            <img src="images/logoPagina.png" alt="Logo de Apparking">
                        </div>
                        <div class="tituloLogo">
                            <h2>Apparking</h2>
                        </div>
                    </header>
                    <div class="contenidoLogin" id="login1">
                        <h2>Código de Verificación</h2>
                        <form method="post" id="formCodigoVerificacion">
                            <input type="text" minlength="4" maxlength="4" pattern="[0-9]+" title="Ingrese El código de 4 dígitos" name="codigoRecuperacion" id="codigoRecuperacion" value="" placeholder="Ingrese El código de 4 dígitos" class="form-control" required>
                            <button class="botonLogin" type="submit" name="Ingresar" value="Ingresar">Verificar</button>
                        </form>
                    </div>
                    <div class="contenidoLogin" id="login2">
                        <h2>Ingrese una contraseña nueva</h2>
                        <form method="post" id="formContrasenaCambio">
                        <input type="password" minlength="6" maxlength="12" title="ingrese entre (6 y 12) caracteres" name="password1" id="password1" value="" placeholder="Contraseña" class="form-control" required>
                        <input type="password" minlength="6" maxlength="12" title="ingrese entre (6 y 12) caracteres" name="password1" id="password2" value="" placeholder="Contraseña" class="form-control" required>
                        <div id="validationMessages" class="validation-message"></div>
                        <button class="botonLogin" type="submit" name="cambioContra" id="cambioContra" value="Ingresar">Cambiar contraseña</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
    </html>
    
    <script>
    $(document).ready(function() {
        // Oculta el segundo formulario al cargar la página
        $("#login2").hide();

        // Variables para el código de verificación
        var codigo = "<?php echo $codigo; ?>";

        // Maneja el evento de envío del formulario de verificación
        $("#formCodigoVerificacion").on("submit", function(event) {
            event.preventDefault(); // Evita el envío normal del formulario
            var codigoIngresado = $("#codigoRecuperacion").val();

            if (codigo === codigoIngresado) {
                $("#login1").hide(); // Oculta el primer formulario
                $("#login2").show(); // Muestra el segundo formulario
            } else {
                $(".alert").remove();
                $("#codigoRecuperacion").parent().after('<div class="alert alert-warning" style="margin-top: 10px;">Código incorrecto, intente nuevamente</div>');
            }
        });

        // Función para validar la contraseña
        function validatePassword() {
            var password1 = $('#password1').val();
            var password2 = $('#password2').val();
            var $validationMessages = $('#validationMessages');

            var hasUppercase = /[A-Z]/.test(password1);
            var hasLowercase = /[a-z]/.test(password1);
            var hasNumber = /[0-9]/.test(password1);

            var messages = [];

            if (!hasUppercase) {
                messages.push("- Debe contener al menos una letra mayúscula.");
            }
            if (!hasLowercase) {
                messages.push("- Debe contener al menos una letra minúscula.");
            }
            if (!hasNumber) {
                messages.push("- Debe contener al menos un número.");
            }
            if (password1 !== password2) {
                messages.push("- Las contraseñas no coinciden.");
            }

            if (messages.length === 0) {
                // Mensaje de éxito y habilitación del botón
                $validationMessages.html('<span class="success" style="color:green;">¡Contraseña válida y confirmada!</span>');
                $('#cambioContra').prop('disabled', false).css('opacity', '1');
            } else {
                // Mensajes de error y deshabilitación del botón
                $validationMessages.html(messages.join('<br>'));
                $('#cambioContra').prop('disabled', true).css('opacity', '0.5');
            }
        }

        // Llama a validatePassword cada vez que se cambia el valor de password1 o password2
        $('#password1, #password2').on('input', function() {
            validatePassword();
        });

    $("#formContrasenaCambio").on("submit", function(event) {
        event.preventDefault(); 
        
        var clave = $("#password2").val();
        var cedula = "<?php echo $cedula; ?>";

        var datos = new FormData();
        datos.append("cambioClave", clave);
        datos.append("cedula", cedula);
        console.log(datos);

        $.ajax({
            url: "ajax/usuarios.ajax.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(usuario){
                if(usuario){
                    swal({
					type: "success",
					title: "Contraseña cambiada exitosamente, Ya puede ingresar",
					showConfirmButton: true,
					confirmButtonText: "Cerrar"
					});
                    setTimeout(function() {
                        window.location = "Inicio";
                    }, 3000);
                }
                else{
                    $(".alert").remove();
                    $("#formContrasenaCambio").parent().after('<div class="alert alert-warning" style="margin-top: 10px;">Ha habido un error, intente mas tarde</div>');
                }
            }
        });
    });
    });
</script>
<?php
} else {
    echo '<script>window.location = "inicio";</script>';
    exit();
}
?>