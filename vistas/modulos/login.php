<body id="cuerpoPagina">
    <div class="body1">
        <div class="contenedor">

            <div class="imagenLogin">

            </div>

            <div class="registro">
                <header>
                    <div class="logo">
                        <img src="images/logoPagina.png" alt="">
                    </div>
                    <div class="tituloLogo">
                        <h2>Apparking</h2>
                    </div>
                </header>
                <div class="contenidoLogin">
                    <h2>Ingresar</h2>
                    <form method="post">
                        <input type="text" name="ingUsuario" value="" placeholder="Usuario" class="form-control" required>
                        <input type="password" name="ingPassword" value="" placeholder="Contraseña" class="form-control" required>
                        <button class="botonLogin" type="submit" name="Ingresar" value="Ingresar">Ingresar</button>
                        <p> ¿Olvido su contraseña? haga click <a class="clickAqui" href="Recuperar_contra.html">AQUÌ</a></p>
                        <?php

                            $login = new ControladorUsuarios();
                            $login -> ctrIngresoUsuario();
                
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>