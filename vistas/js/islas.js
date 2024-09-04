
/*=============================================
ELIMINAR VEHICULO
=============================================*/
$(document).on("click", ".btnEliminarIsla", function(){

    var idIsla = $(this).attr("idIsla");
    var opcion = 1; //borrar
    console.log(idIsla);
    console.log(opcion);
    swal({
      title: '¿Está seguro de borrar la Isla?',
      text: "¡Si no lo está puede cancelar la accíón!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar Isla!'
    }).then(function(result){
  
      if(result.value){
          $.ajax({
              url: "modelos/islas.modelo.php",
              type: "POST",
              dataType: "json",
              data: {opcion:opcion, idIsla:idIsla},
              success: function(){
                  swal({
                      type: "success",
                      title: "Isla Eliminada",
                      showConfirmButton: true,
                      confirmButtonText: "Cerrar"
                  })
                  setTimeout(() => {
                      window.location.href = "principal";
                  }, 1300);
              }
          });
      }
  
    })
  
  })