
<header class="main-header">
 	
	<!--=====================================
					LOGOTIPO
	======================================-->
	<a href="principal" class="logo" id="tituloBarraCabecera"> 
		
		<!-- logo mini -->
		<span class="logo-mini" id="cajaLogoCabezera">
			
			<img src="images/logoPagina.png" class="img-responsive" style="">

		</span>
		APPARKING
	</a>

	<!--=====================================
	BARRA DE NAVEGACIÓN
	======================================-->
	<nav class="navbar navbar-static-top" role="navigation" id="contenedorCabecera">
		
		<!-- Botón de navegación -->

	 	<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button" id="menuCabecera">
        	
        	<span class="sr-only">Toggle navigation</span>
      	
      	</a>

		<!-- perfil de usuario -->

		<div class="navbar-custom-menu">
				
			<ul class="nav navbar-nav">
				
				<li class="dropdown user user-menu">
					
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">

					<?php

					if($_SESSION["foto"] != ""){

						echo '<img src="'.$_SESSION["foto"].'" class="user-image">';

					}else{


						echo '<img src="vistas/img/usuarios/default/anonymous.png" class="user-image">';

					}


					?>
						
						<span class="hidden-xs"><?php  echo $_SESSION["nombre"]; ?></span>

					</a>

					<!-- Dropdown-toggle -->

					<ul class="dropdown-menu">
						
						<li class="user-body">
							
							<div class="pull-right">

								<div class="perfil">Ver perfil 
									<button class="btn btn-primary" data-toggle="modal" data-target="#modalVerPerfil" id="botonVerPerfil">Perfil</button>
								</div>
								<div>Cerrar sesion <a href="salir" class="btn btn-default btn-flat">Salir</a></div>
								

							</div>

						</li>

					</ul>

				</li>

			</ul>

		</div>

	</nav>

 </header>
<!--=====================================
MODAL EDITAR USUARIO
======================================-->

<div id="modalVerPerfil" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" id="cabezaModal">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Perfil</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">
            <!-- ENTRADA PARA EL CEDULA -->
            
            <div class="form-group">
				<h4>Usuario</h4>
              <div class="input-group"> 
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" readonly class="form-control input-lg" id="editarCedula" name="editarNombre" value="<?php echo $_SESSION["usuario"];?>" required readonly>

              </div>

            </div>

            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
				<h4>Nombre</h4>
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" id="editarNombre" name="editarNombre" value="<?php echo $_SESSION["nombre"];?>" required readonly>

              </div>

            </div>

            <!-- ENTRADA PARA EL USUARIO -->
				<h4>Correo</h4>
             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="text" class="form-control input-lg" id="editarUsuario" name="editarUsuario" value="<?php echo $_SESSION["email"];?>" readonly>

              </div>

            </div>

            <!-- ENTRADA PARA LA CONTRASEÑA -->
					<h4>Telefono</h4>
             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-lock"></i></span> 

                <input type="text" class="form-control input-lg" name="editarPassword" value="<?php echo $_SESSION["telefono"];?>" readonly>

                <input type="hidden" id="passwordActual" name="passwordActual">

              </div>

            </div>


          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>

        </div>

     <?php

          $editarUsuario = new ControladorUsuarios();
          $editarUsuario -> ctrEditarUsuario();

        ?> 

      </form>

    </div>

  </div>

</div>