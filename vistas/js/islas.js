
/*=============================================
ELIMINAR VEHICULO
=============================================*/
$(document).on("click", ".btnEliminarIslas", function(){

    var Id_map = $(this).attr("id_map");
    var opcion = 3; //borrar
    console.log(Id_map);
    console.log(opcion);
    swal({
      title: '¿Está seguro de borrar el vehiculo?',
      text: "¡Si no lo está puede cancelar la accíón!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar Vehiculo!'
    }).then(function(result){
  
      if(result.value){
          $.ajax({
              url: "modelos/islas.modelo.php",
              type: "POST",
              dataType: "json",
              data: {opcion:opcion,id_map:Id_map},
              success: function(){
                  swal({
                      type: "success",
                      title: "Vehiculo Eliminado",
                      showConfirmButton: true,
                      confirmButtonText: "Cerrar"
                  })
                  setTimeout(() => {
                      window.location.href = "mapeo-de-vehiculos";
                  }, 1300);
              }
          });
      }
  
    })
  
  })