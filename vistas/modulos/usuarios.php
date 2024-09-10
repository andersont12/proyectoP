<?php

if($_SESSION["perfil"] == "Vigilante"){

  echo '<script>

    window.location = "principal";

  </script>';

  return;

}

?>
<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar usuarios
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar usuarios</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario" id="botonAgregar">
          
          Agregar usuario

        </button>

        <button class="btn btn-primary" data-toggle="modal" data-target="#modalBuscarUsuario" id="botonBuscar">
          
          Buscar usuario

        </button>

        <a href="vistas\modulos\generar-reporte-usuarios.php" class="btn btn-primary">Generar reporte
                <i class="fa fa"></i>
            </a>
      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th>Cedula</th>
           <th>Nombre</th>
           <th>Usuario</th>
           <th>Perfil</th>
           <th>Correo</th>
           <th>Telefono</th>
           <th>Estado</th>
           <th>Ultima Conexion</th>
           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>

        <?php
      
        $item = "perfil";
        $valor = "administrador";
        $item2 = null;
        $encriptar = 1;
        $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor,$encriptar);
        
       foreach ($usuarios as $key => $value){
         
          echo ' <tr>
                  <td>'.$value["cedula"].'</td>
                  <td>'.$value["nombre"].'</td>
                  <td>'.$value["usuario"].'</td>';

                  echo '<td>'.$value["perfil"].'</td>';
                  echo '<td>'.$value["email"].'</td>';
                  echo '<td>'.$value["telefono"].'</td>';

                  if($value["estado"] != 0){

                    echo '<td><button class="btn btn-success btn-xs btnActivar" idUsuario="'.$value["cedula"].'" estadoUsuario="0">Activado</button></td>';

                  }else{

                    echo '<td><button class="btn btn-danger btn-xs btnActivar" idUsuario="'.$value["cedula"].'" estadoUsuario="1">Desactivado</button></td>';

                  }             

                  echo '<td>'.$value["ultimo_login"].'</td>
                  <td>

                    <div class="btn-group">
                        
                      <button class="btn btn-warning btnEditarUsuario" idUsuario="'.$value["cedula"].'" data-toggle="modal" data-target="#modalEditarUsuario"><i class="fa fa-pencil"></i></button>

                      <button class="btn btn-danger btnEliminarUsuario" idUsuario="'.$value["cedula"].'"><i class="fa fa-times"></i></button>

                    </div>  

                  </td>

                </tr>';
        }


        ?> 

        </tbody>

       </table>

      </div>

    </div>

  </section>

</div>

<!--=====================================
MODAL BUSCAR USUARIO
======================================-->

<div id="modalBuscarUsuario" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form id="formBuscarUsuario" role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" id="cabezaModal">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Buscar usuario</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA LA CEDULA -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-id-card-o"></i></span> 

                <input type="text" minlength="5" maxlength="11" pattern="[0-9]+" title="Solo se permiten números (0-9)" class="form-control input-lg" name="buscarCedula" placeholder="Ingresar Cedula" id="buscarCedula" required>

              </div>

            </div>


          </div>

          <div id="resultadoBusqueda">
            <table id="tablaResultados"  width="100%" class="tabla">
                <thead>
                    <tr>
                        <th>Cedula</th>
                        <th>Nombre</th>
                        <th>Usuario</th>
                        <th>Perfil</th>
                        <th>Conexion</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
          </div>
        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary" id="botonBuscarModal">Buscar usuario</button>

        </div>

        <?php

          $crearUsuario = new ControladorUsuarios();
          $crearUsuario -> ctrCrearUsuario();

        ?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL AGREGAR USUARIO
======================================-->

<div id="modalAgregarUsuario" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" id="cabezaModal">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar usuario</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA LA CEDULA -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-id-card-o"></i></span> 

                <input type="text" minlength="7" maxlength="12" pattern="[0-9]+" title="Solo se permiten números (0-9)" class="form-control input-lg" name="nuevaCedula" placeholder="Ingresar Cedula" id="nuevaCedula" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" minlength="3" maxlength="15" pattern="[A-Za-z]+" title="Solo se permiten letras (A-Z a-z)" class="form-control input-lg" name="nuevoNombre" placeholder="Ingresar Nombre" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL USUARIO -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="text" minlength="4" maxlength="20" pattern="^[a-zA-Z0-9]+$" class="form-control input-lg" name="nuevoUsuario" placeholder="Ingresar Usuario" id="nuevoUsuario" required>

              </div>

            </div>

        <!-- ENTRADA PARA EL CORREO -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="email" minlength="6" maxlength="30" class="form-control input-lg" name="nuevoCorreo" placeholder="Ingresar Correo" id="nuevoCorreo" required>

              </div>

            </div>

        <!-- ENTRADA PARA LA TELEFONO -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-id-card-o"></i></span> 

                <input type="text" minlength="7" maxlength="10" pattern="[0-9]+" title="Solo se permiten números (0-9)" class="form-control input-lg" name="nuevoTelefono" placeholder="Ingresar Telefono" id="nuevoTelefono" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA CONTRASEÑA -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-lock"></i></span> 

                <input type="password" minlength="4" maxlength="12" pattern="^[a-zA-Z0-9]+$" class="form-control input-lg" name="nuevoPassword" id="nuevoPassword" placeholder="Ingresar Contraseña" required>
                <div id="validationMessages2" class="validation-message" style="display: flex; justify-content: center; width: 100%;"></div>

              </div>

            </div>

            <!-- ENTRADA PARA SELECCIONAR SU PERFIL -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                <select class="form-control input-lg" name="nuevoPerfil" readonly>

                  <option value="Administrador">Administrador</option>

                </select>

              </div>

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary" class="botonGuardarModal" id="botonGuardarModal">Guardar usuario</button>

        </div>

        <?php

          //$crearUsuario = new ControladorUsuarios();
          //$crearUsuario -> ctrCrearUsuario();

        ?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR USUARIO
======================================-->

<div id="modalEditarUsuario" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" id="cabezaModal">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar usuario</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">
            <!-- ENTRADA PARA EL CEDULA -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text"  readonly class="form-control input-lg" id="editarCedula" name="editarNombre" value="" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" minlength="10" maxlength="12" pattern="[A-Za-z]+" title="Solo se permiten letras (A-Z a-z)" class="form-control input-lg" id="editarNombre" name="editarNombre" value="" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL USUARIO -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="text" class="form-control input-lg" id="editarUsuario" name="editarUsuario" value="" readonly>

              </div>

            </div>

        <!-- ENTRADA PARA EL CORREO -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="email" minlength="6" maxlength="30" class="form-control input-lg" name="editarCorreo" placeholder="Ingresar Correo" id="editarCorreo" required>

              </div>

            </div>

        <!-- ENTRADA PARA LA TELEFONO -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-id-card-o"></i></span> 

                <input type="text" minlength="7" maxlength="10" pattern="[0-9]+" title="Solo se permiten números (0-9)" class="form-control input-lg" name="editarTelefono" placeholder="Ingresar Telefono" id="editarTelefono" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA CONTRASEÑA -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-lock"></i></span> 

                <input type="password" minlength="4" maxlength="12" class="form-control input-lg" name="editarPassword" id="editarPassword" placeholder="Escriba la nueva contraseña">

                <input type="hidden" id="passwordActual" name="passwordActual">

              </div>
              <div id="validationMessages" class="validation-message" style="display: flex; justify-content: center;"></div>

            </div>

            <!-- ENTRADA PARA SELECCIONAR SU PERFIL -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                <select class="form-control input-lg" name="editarPerfil" readonly>

                  <option value="Administrador">Administrador</option>

                </select>

              </div>

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary" id="botonEditarModal" >Modificar usuario</button>

        </div>

     <?php

          $editarUsuario = new ControladorUsuarios();
          $editarUsuario -> ctrEditarUsuario();

        ?> 

      </form>

    </div>

  </div>

</div>

<?php

  $borrarUsuario = new ControladorUsuarios();
  $borrarUsuario -> ctrBorrarUsuario();

?> 
<script>
$(document).ready(function() { 
  $('#botonGuardarModal').prop('disabled', true).css('opacity', '0.5');
  $('#botonEditarModal').prop('disabled', true).css('opacity', '0.5');
  function validatePassword() {
      var password = $('#editarPassword').val();
      var $validationMessages = $('#validationMessages');
      var hasUppercase = /[A-Z]/.test(password);
      var hasLowercase = /[a-z]/.test(password);
      var hasNumber = /[0-9]/.test(password);
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
      if (messages.length === 0) {
          $('#botonEditarModal').prop('disabled', false).css('opacity', '1');
          $validationMessages.html('<span class="success" style="color:green;">¡Contraseña válida y confirmada!</span>');
      } else {
        $('#botonEditarModal').prop('disabled', true).css('opacity', '0.5');
          $validationMessages.html(messages.join('<br>'));
      }
  }
  $('#editarPassword').on('input', function() {
      validatePassword();
  });
  function validatePasswordGuardar() {
      var password = $('#nuevoPassword').val();
      var $validationMessages = $('#validationMessages2');
      var hasUppercase = /[A-Z]/.test(password);
      var hasLowercase = /[a-z]/.test(password);
      var hasNumber = /[0-9]/.test(password);
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
      if (messages.length === 0) {
          $('#botonGuardarModal').prop('disabled', false).css('opacity', '1');
          $validationMessages.html('<span class="success" style="color:green;">¡Contraseña válida y confirmada!</span>');
      } else {
        $('#botonGuardarModal').prop('disabled', true).css('opacity', '0.5');
          $validationMessages.html(messages.join('<br>'));
      }
  }
  $('#nuevoPassword').on('input', function() {
      validatePasswordGuardar();
  });
});

</script>

