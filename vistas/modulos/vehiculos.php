<?php

if($_SESSION["perfil"] == "Especial" || $_SESSION["perfil"] == "Vendedor"){

  echo '<script>

    window.location = "inicio";

  </script>';

  return;

}

?>

<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Vehiculos
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Vehiculos</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarVehiculo" id="botonAgregar">
          
          Agregar Vehiculo

        </button>

        <button class="btn btn-primary" data-toggle="modal" data-target="#modalBuscarVehiculo" id="botonBuscar">
          
          Buscar Vehiculo

        </button>
      </div>

      <div class="box-body">
        
      <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
          
           <th>Placa</th>
           <th>Cedula Propietario</th>
           <th>Vehi_Tipo</th>
           <th>Vehi_Marca</th>
           <th>Acciones</th>


         </tr> 

        </thead>

        <tbody>

        <?php
      if($_SESSION["perfil"] == "administrador")
      {
        $item = null;
        $valor = null;
        $item2 = null;
        $encriptar = null;
      }
      else if($_SESSION["perfil"] == "vigilante")
      {
        $item = null;
        $valor = null;
        $item2 = null;
        $encriptar = null;
      }
      else
      {
        $item = "cedula";
        $valor = $_SESSION["cedula"];
        $item2 = null;
        $encriptar = null;
      }

      $vehiculo = controladorVehiculos::ctrMostrarVehiculos($item, $valor);

      foreach ($vehiculo as $key => $value){
         
          echo ' <tr>
          <td>'.$value["placa"].'</td>
          <td>'.$value["cedula"].'</td>
          <td>'.$value["vehi_tipo"].'</td>
          <td>'.$value["vehi_marca"].'</td>';
                                    
                  echo '
                  <td>

                    <div class="btn-group">
                        
                      <button class="btn btn-warning btnEditarVehiculo" idPlaca="'.$value["placa"].'" data-toggle="modal" data-target="#modalEditarVehiculo"><i class="fa fa-pencil"></i></button>

                      <button class="btn btn-danger btnEliminarVehiculo" idPlaca="'.$value["placa"].'"><i class="fa fa-times"></i></button>

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
MODAL BUSCAR VEHICULO
======================================-->

<div id="modalBuscarVehiculo" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form id="formBuscarVehiculo"  role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" id="cabezaModal">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Consultar por placa</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">
            <input type="text" name="nuevoidusuario" id="nuevoidusuario" value="<?php echo($_SESSION["cedula"]); ?>"  style="visibility:hidden">

            <!-- ENTRADA PARA LA PLACA -->
            <div class="form-group">
              
              <div class="input-group">
              
              <span class="input-group-addon"><i class="fa-id-badge"></i></span> 
                <input type="text" minlength="5" maxlength="6" class="form-control input-lg" name="buscarPlaca" id="buscarPlaca" placeholder="Ingresar placa" required>


              </div>

            </div>

          </div>
          <div id="resultadoBusqueda">
            <table id="tablaResultados"  width="100%" class="tabla">
                <thead>
                    <tr>
                        <th>Placa</th>
                        <th>Cedula Propietario</th>
                        <th>Vehi_tipo</th>
                        <th>Vehi_marca</th>
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

          <button class="btn btn-primary" id="botonBuscarvehiculo">Buscar Vehiculo</button>

        </div>

        <?php

          //$crearMascota = new ControladorMascotas();
          //$crearMascota -> ctrCrearMascota();

        ?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL AGREGAR VEHICULO
======================================-->

<div id="modalAgregarVehiculo" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form id="formAgregarVehiculo"  role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" id="cabezaModal">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Vehiculo</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">
            <input type="text" name="nuevoidusuario" id="nuevoidusuario" value="<?php echo($_SESSION["cedula"]); ?>"  style="visibility:hidden">

            <!-- ENTRADA PARA LA CEDULA -->
            <div class="form-group">
              
              <div class="input-group">
              
              <span class="input-group-addon"><i class="fa fa-id-card-o"></i></span> 
                <input type="text" minlength="7" maxlength="10" pattern="[0-9]+" title="Solo se permiten números (0-9)" class="form-control input-lg" name="nuevaCedulaVehiculo" id="nuevaCedulaVehiculo" placeholder="Ingresar cedula propietario" required>


              </div>

            </div>
            <!-- ENTRADA PARA LA PLACA -->
            <div class="form-group">
              
              <div class="input-group">
              
              <span class="input-group-addon"><i class="fa-id-badge"></i></span> 
                <input type="text" minlength="5" maxlength="6" pattern="^[a-zA-Z0-9]+$" title="Solo se permiten letras (A-Z, a-z) y números (0-9)" class="form-control input-lg" name="nuevaPlaca" id="nuevaPlaca" placeholder="Ingresar placa" required>


              </div>

            </div>

            <!-- ENTRADA PARA TIPO DE VEHICULO -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-car"></i></span> 

                <input type="text" minlength="3" maxlength="15" pattern="[A-Za-z]+" title="Solo se permiten letras (A-Z a-z)" class="form-control input-lg" name="nuevoTipoVehiculo" id="nuevoTipoVehiculo" placeholder="Ingresar Tipo Vehiculo" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA MARCA DE VEHICULO-->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-hand-pointer-o"></i></span> 

                <input type="text" minlength="3" maxlength="15" pattern="[A-Za-z]+" title="Solo se permiten letras (A-Z a-z)" class="form-control input-lg" name="nuevaMarcaVehiculo" id="nuevaMarcaVehiculo" placeholder="Ingresar marca vehiculo" required>

              </div>

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button class="btn btn-primary" id="botonGuardarModal">Guardar vehiculo</button>

        </div>

        <?php

          //$crearMascota = new ControladorMascotas();
          //$crearMascota -> ctrCrearMascota();

        ?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR VEHICULO
======================================-->
<div id="modalEditarVehiculo" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form id="formEditarVehiculo" role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" id="cabezaModal">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar vehiculo</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

         

            <!-- ENTRADA PARA LA PLACA-->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-id-card-o"></i></span> 

                <input type="text" readonly class="form-control input-lg" name="editarPlaca" id="editarPlaca" placeholder="Ingresar placa" required>

              </div>

            </div>

             <!-- ENTRADA PARA LA CEDULA-->
            
          <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-id-badge"></i></span> 

                <input type="text" readonly class="form-control input-lg" name="editarCedula" id="editarCedula" placeholder="Ingresar placa" required>

              </div>

            </div>

            <!-- ENTRADA PARA TIPO VEHICULO -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-car"></i></span> 

                <input type="text" minlength="3" maxlength="15" pattern="[A-Za-z]+" title="Solo se permiten letras (A-Z a-z)" class="form-control input-lg" name="editarTipoVehiculo" id="editarTipoVehiculo" placeholder="Ingresar tipo vehiculo" id="nuevoTipoVehiculo" required>

              </div>

            </div>

            <!-- ENTRADA PARA MARCA VEHICULO -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-hand-pointer-o"></i></span> 

                <input type="text" minlength="3" maxlength="15" pattern="[A-Za-z]+" title="Solo se permiten letras (A-Z a-z)" class="form-control input-lg" name="editarMarcaVehiculo" id="editarMarcaVehiculo" placeholder="Ingresar Marca Vehiculo" required>

              </div>

            </div>


        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary" id="botonGuardarModal">Guardar Vehiculo</button>

        </div>

     <?php

          //$editarUsuario = new ControladorMascotas();
          //$editarUsuario -> ctrEditarMascota();

        ?> 

      </form>

    </div>

  </div>

</div>

<?php

  //$borrarUsuario = new ControladorUsuarios();
  //$borrarUsuario -> ctrBorrarUsuario();

?> 
