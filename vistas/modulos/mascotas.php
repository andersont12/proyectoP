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
      
      Perfil Mascotas
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Perfil Mascotas</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarMascota">
          
          Agregar Mascota

        </button>

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Nombre</th>
           <th>Raza</th>
           <th>Foto</th>
           <th>Edad</th>
           <th>Sexo</th>
           <th>Color</th>
           <th>Alimento</th>
           <th>Tipo</th>
           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>

        <?php
      if($_SESSION["perfil"] == "Administrador")
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

       $mascotas = ControladorMascotas::ctrMostrarMascotas($item, $valor);

       foreach ($mascotas as $key => $value){
         
          echo ' <tr>
                  <td>'.$value["id_mascota"].'</td>
                  <td>'.$value["nombre_mascota"].'</td>
                  <td>'.$value["raza_mascota"].'</td>';

                  if($value["foto_mascota"] != "")
                  {
                    echo '<td><img src="'.$value["foto_mascota"].'" class="img-thumbnail" width="40px"></td>';

                  }else
                  {

                    echo '<td><img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail" width="40px"></td>';

                  }
                                    
                  echo '<td>'.$value["edad_mascota"].'</td>
                  <td>'.$value["sexo_mascota"].'</td>
                  <td>'.$value["color_mascota"].'</td>
                  <td>'.$value["alimento_mascota"].'</td>
                  <td>'.$value["tipo_mascota"].'</td>
                  <td>

                    <div class="btn-group">
                        
                      <button class="btn btn-warning btnEditarMascota" idmascota="'.$value["id_mascota"].'" data-toggle="modal" data-target="#modalEditarMascota"><i class="fa fa-pencil"></i></button>

                      <button class="btn btn-danger btnEliminarMascota" idmascota="'.$value["id_mascota"].'"><i class="fa fa-times"></i></button>

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
MODAL AGREGAR MASCOTA
======================================-->

<div id="modalAgregarMascota" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form id="formmascota"  role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar mascota</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">
            <input type="text" name="nuevoidusuario" id="nuevoidusuario" value="<?php echo($_SESSION["id"]); ?>"  style="visibility:hidden">
            <!-- ENTRADA PARA EL NOMBRE DE LA MASCOTA -->
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-linux"></i></span> 
                <input type="text" class="form-control input-lg" name="nuevoNombre" id="nuevoNombre" placeholder="Ingresar nombre mascota" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA RAZA -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-paw"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevaRaza" id="nuevaRaza" placeholder="Ingresar raza de la mascota" id="nuevoRaza" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA EDAD DE LA MASCOTA -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 

                <input type="number" class="form-control input-lg" name="nuevaEdad" id="nuevaEdad" placeholder="Ingresar edad de la mascota" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA COLOR DE LA MASCOTA -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevaColor" id="nuevaColor" placeholder="Ingresar el color de la mascota" required>

              </div>

            </div>

            <!-- ENTRADA PARA ALIMENTO DE LA MASCOTA -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoAlimento" id="nuevoAlimento" placeholder="Ingresar el alimento de la mascota" required>

              </div>

            </div>

            <!-- ENTRADA PARA SELECCIONAR SEXO DE MASCOTA -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-venus-mars"></i></span> 

                <select class="form-control input-lg" name="nuevoSexo" id="nuevoSexo">
                  
                  <option value="">Selecionar sexo</option>

                  <option value="Macho">Macho</option>

                  <option value="Hembra">Hembra</option>

                </select>

              </div>

            </div>

            <!-- ENTRADA PARA SELECCIONAR TIPO DE MASCOTA -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-venus-mars"></i></span> 

                <select class="form-control input-lg" name="nuevoTipo" id="nuevoTipo">
                  
                  <option value="">Selecionar Tipo de la Mascota</option>

                  <option value="Perro">Perro</option>

                  <option value="Gato">Gato</option>

                </select>

              </div>

            </div>

            <!-- ENTRADA PARA SUBIR FOTO -->

             <div class="form-group">
              
              <div class="panel">SUBIR FOTO</div>

              <input type="file" class="nuevaFoto" name="nuevaFotoMas">

              <p class="help-block">Peso máximo de la foto 2MB</p>

              <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button class="btn btn-primary">Guardar mascota</button>

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
MODAL EDITAR MASCOTA
======================================-->

<div id="modalEditarMascota" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form id="formmascotas" role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar mascota</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-linux"></i></span> 

                <input type="text" class="form-control input-lg" name="editarNombre" id="editarNombre" placeholder="Ingresar nombre mascota" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA RAZA -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa fa-paw"></i></span> 

                <input type="text" class="form-control input-lg" name="editarraza" id="editarraza" placeholder="Ingresar raza de la mascota" id="nuevoRaza" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA EDAD DE LA MASCOTA -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 

                <input type="number" class="form-control input-lg" name="editarEdad" id="editarEdad" placeholder="Ingresar edad de la mascota" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA COLOR DE LA MASCOTA -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 

                <input type="text" class="form-control input-lg" name="editarColor" id="editarColor" placeholder="Ingresar el color de la mascota" required>

              </div>

            </div>

            <!-- ENTRADA PARA ALIMENTO DE LA MASCOTA -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 

                <input type="text" class="form-control input-lg" name="editarAlimento" id="editarAlimento" placeholder="Ingresar el alimento de la mascota" required>

              </div>

            </div>

            <!-- ENTRADA PARA SELECCIONAR SEXO DE MASCOTA -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-venus-mars"></i></span> 

                <select class="form-control input-lg" name="editarSexo" id="editarSexo">
                  
                  <option value="">Selecionar sexo</option>

                  <option value="Macho">Macho</option>

                  <option value="Hembra">Hembra</option>

                </select>

              </div>

            </div>

            <!-- ENTRADA PARA SELECCIONAR TIPO DE MASCOTA -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-venus-mars"></i></span> 

                <select class="form-control input-lg" name="editarTipo" id="editarTipo">
                  
                  <option value="">Selecionar Tipo de la Mascota</option>

                  <option value="Perro">Perro</option>

                  <option value="Gato">Gato</option>

                </select>

              </div>

            </div>

            <!-- ENTRADA PARA SUBIR FOTO -->

             <div class="form-group">
              
              <div class="panel">SUBIR FOTO</div>

              <input type="file" class="nuevaFoto" name="nuevaFotoMas" id="nuevaFotoMas">

              <p class="help-block">Peso máximo de la foto 2MB</p>

              <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizarEditar" width="100px">

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Mascota</button>

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