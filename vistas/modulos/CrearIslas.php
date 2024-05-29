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
      
      Islas
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Crear Islas</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarVehiculo" id="botonAgregar">
          
          Agregar Islas

        </button>

      </div>

      <div class="row">
                <div class="col-md-6">
                    <table id="table_id" class="table table-bordered table-sm table-striped">
                       <thead>
                       <th><center>Nro</center></th>
                       <th>Nro espacio</th>
                       <th><center>Acción</center></th>
                       </thead>
                       <tr>
                                <td><center><?php echo $contador;?></center></td>
                                <td><?php echo $nro_espacio;?></td>
                                <td>
                                    <center>
                                        <a href="delete.php?id=<?php echo $id_rol; ?>" class="btn btn-danger">Borrar</a>
                                    </center>
                                </td>
                            </tr>
                    </table>
                </div>
            </div>
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
          
           <th>Nro espacio</th>
           <th>Estado</th>
           <th>Observaciones</th>
           <th>Fecha de creacion</th>
           <th>Estado</th>


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
      else
      {
        $item = "id_usuario";
        $valor = $_SESSION["id"];
        $item2 = null;
        $encriptar = null;
      }

      $CrearIsla = controladorCrearIsla::ctrCrearIsla($item, $valor);

      foreach ($vCrearIsla as $key => $value){
         
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
                <input type="text" class="form-control input-lg" name="nuevaCedula" id="nuevaCedula" placeholder="Ingresar cedula propietario" required>


              </div>

            </div>
            <!-- ENTRADA PARA LA PLACA -->
            <div class="form-group">
              
              <div class="input-group">
              
              <span class="input-group-addon"><i class="fa-id-badge"></i></span> 
                <input type="text" class="form-control input-lg" name="nuevaPlaca" id="nuevaPlaca" placeholder="Ingresar placa" required>


              </div>

            </div>

            <!-- ENTRADA PARA TIPO DE VEHICULO -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-car"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoTipoVehiculo" id="nuevoTipoVehiculo" placeholder="Ingresar Tipo Vehiculo" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA MARCA DE VEHICULO-->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-hand-pointer-o"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevaMarcaVehiculo" id="nuevaMarcaVehiculo" placeholder="Ingresar marca vehiculo" required>

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

                <input type="text" class="form-control input-lg" name="editarTipoVehiculo" id="editarTipoVehiculo" placeholder="Ingresar tipo vehiculo" id="nuevoTipoVehiculo" required>

              </div>

            </div>

            <!-- ENTRADA PARA MARCA VEHICULO -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-hand-pointer-o"></i></span> 

                <input type="text" class="form-control input-lg" name="editarMarcaVehiculo" id="editarMarcaVehiculo" placeholder="Ingresar Marca Vehiculo" required>

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
