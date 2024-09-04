/*=============================================
EDITAR VEHICULO
=============================================*/
$(document).on("click", ".tablas .btnEditarVehiculo, .tablas .btnEditarVehiculo", function(){

	fila = $(this).closest("tr");
	placa = fila.find('td:eq(0)').text();
    cedula = fila.find('td:eq(1)').text();;
    vehi_tipo = fila.find('td:eq(2)').text();;
    vehi_marca = fila.find('td:eq(3)').text();
    
    $("#editarPlaca").val(placa);
    $("#editarCedula").val(cedula);
    $("#editarTipoVehiculo").val(vehi_tipo);
    $("#editarMarcaVehiculo").val(vehi_marca);
	
    opcion = 2; //editar

})

$("#formEditarVehiculo").submit(function(e){
    e.preventDefault();
	idPlaca = placa;
    idCedula = cedula;
    console.log(idPlaca);
    tipoVehiculo = $.trim($("#editarTipoVehiculo").val());
    marcaVehiculo = $.trim($("#editarMarcaVehiculo").val());
    opcion = 2;

    $.ajax({
        url: "modelos/vehiculos.modelo.2.php",
        type: "POST",
        dataType: "json",
        data: {idPlaca:idPlaca,
            idCedula:idCedula,
            tipoVehiculo:tipoVehiculo, 
            marcaVehiculo:marcaVehiculo,
            opcion:opcion},
        success: function(data){  
            if(data) {
                swal({
                    type: "success",
                    title: "Vehiculo Modificado",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"
                })
                setTimeout(() => {
                    window.location.href = "vehiculos";
                }, 1000);
            }
        }         
    });   
});

/*=============================================
AGREGAR VEHICULO
=============================================*/

$("#formAgregarVehiculo").submit(function(e){
    e.preventDefault();
    idPlaca = $.trim($("#nuevaPlaca").val());
    idCedula = $.trim($("#nuevaCedulaVehiculo").val());
    tipoVehiculo = $.trim($("#nuevoTipoVehiculo").val());
    marcaVehiculo = $.trim($("#nuevaMarcaVehiculo").val());
    console.log(idPlaca);
    opcion=1;  
     $.ajax({
        url: "modelos/vehiculos.modelo.2.php",
        type: "POST",
        dataType: "json",
        data: {idPlaca:idPlaca,
            idCedula:idCedula,
            tipoVehiculo,
            marcaVehiculo,
             opcion:opcion},
        success: function(data){
            if(data) {
                swal({
                    type: "success",
                    title: "Vehiculo Agregado",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"
                })
                setTimeout(() => {
                    window.location.href = "vehiculos";
                }, 1000);
            }          
        }        
    });    
});

/*=============================================
REVISAR SI EL VEHICULO ESTA REGISTRADO
=============================================*/

$("#nuevaPlaca").change(function(){

	$(".alert").remove();
	
	var placa = $(this).val();

	var datos = new FormData();
	console.log(placa);
	datos.append("validarVehiculo", placa);

	 $.ajax({
	    url:"ajax/vehiculos.ajax.php",
	    method:"POST",
	    data: datos,
	    cache: false,
	    contentType: false,
	    processData: false,
	    dataType: "json",
	    success:function(respuesta){
	    	
	    	if(respuesta){

	    		$("#nuevaPlaca").parent().after('<div class="alert alert-warning">Esta placa ya se encuentra registrada</div>');

	    		$("#nuevaPlaca").val("");

	    	}
			else{
				$("#nuevaPlaca").parent().after('<div class="alert alert-success">Placa Valida</div>');
			}
            console.log('Respuesta del server: '+ respuesta);

	    },
        error: function(xhr, status, error) {
            console.error("Error en la llamada AJAX:", status, error);
            console.log("Respuesta del servidor:", xhr.responseText);
            alert("Error en la respuesta del servidor: " + xhr.responseText);
        
        }

	})
})

/*=============================================
BUSCAR POR PLACA
=============================================*/

$("#formBuscarVehiculo").submit(function(e) {
	e.preventDefault();

	let placa = $.trim($("#buscarPlaca").val());
	console.log("Placa ingresada:", placa);

	$.ajax({
		url: "ajax/vehiculos.ajax.php",
		type: "POST",
		dataType: "json",
		data: {
			placa: placa
		},
		success: function(respuesta) {
			console.log("Resultado del servidor:", respuesta);

                if (respuesta) {
                    const vehiculo = respuesta[0];
    
                    let fila = "<tr>";
                    fila += "<td>" + vehiculo.placa + "</td>";
                    fila += "<td>" + vehiculo.cedula + "</td>";
                    fila += "<td>" + vehiculo.vehi_tipo + "</td>";
                    fila += "<td>" + vehiculo.vehi_marca + "</td>";
                    fila += '<td><div class="btn-group"><button class="btn btn-warning btnEditarVehiculo" placa="' + placa + '" data-toggle="modal" data-target="#modalEditarVehiculo"><i class="fa fa-pencil" aria-hidden="true"></i></button><button class="btn btn-danger btnEliminarVehiculo" idPlaca="' + placa + '"><i class="fa fa-times"></i></button></div></td>';
                    fila += "</tr>";
    
                    $("#tablaResultados tbody").html(fila);
                } else {
                    $("#tablaResultados tbody").html('<tr><td colspan="7" class="text-center">Vehiculo no registrado</td></tr>');
                }
                console.log('Respuesta del server: '+respuesta);
		},
	});
});

/*=============================================
ELIMINAR VEHICULO
=============================================*/
$(document).on("click", ".btnEliminarVehiculo", function(){

  var idPlaca = $(this).attr("idPlaca");
  var opcion = 3; //borrar
  console.log(idPlaca);
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
            url: "modelos/vehiculos.modelo.2.php",
            type: "POST",
            dataType: "json",
            data: {opcion:opcion, idPlaca:idPlaca},
            success: function(){
                swal({
                    type: "success",
                    title: "Vehiculo Eliminado",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"
                })
                setTimeout(() => {
                    window.location.href = "vehiculos";
                }, 1300);
            }
        });
    }

  })
})

/*=============================================
REGISTRAR ENTRADA VEHICULO
=============================================*/
$(document).on("click", ".btnIngresoVehiculo", function(){

    var idPlaca = $(this).attr("idPlaca");
    var opcion = 4; //Insertar Ingreso
    console.log(idPlaca);
    console.log(opcion);
    swal({
      title: '¿Desea confirmar el ingreso al vehiculo al parqueadero?',
      text: "¡Si no lo está puede cancelar la accíón!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, confirmar Ingreso!'
    }).then(function(result){
  
      if(result.value){
        
        $.ajax({
            url: "modelos/vehiculos.modelo.2.php",
            type: "POST",
            dataType: "json",
            data: {opcion:opcion, idPlaca:idPlaca},
            success: function(){
                swal({
                    type: "success",
                    title: "Ingreso registrado",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"
                })
                setTimeout(() => {
                    window.location.href = "vehiculos";
                }, 1300);
            }
        });
      }
  
    })

})

/*=============================================
REGISTRAR SALIDA VEHICULO
=============================================*/
$(document).on("click", ".btnSalidaVehiculo", function(){
    
    var idPlaca = $(this).attr("idPlaca");
    var opcion = 5; //Insertar Salida
    console.log(idPlaca);
    console.log(opcion);
    swal({
      title: '¿Desea confirmar la salida del vehiculo?',
      text: "¡Si no lo está puede cancelar la accíón!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, confirmar Salida!'
    }).then(function(result){
  
      if(result.value){
        
        $.ajax({
            url: "modelos/vehiculos.modelo.2.php",
            type: "POST",
            dataType: "json",
            data: {opcion:opcion, idPlaca:idPlaca},
            success: function(){
                swal({
                    type: "success",
                    title: "Salida registrada",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"
                })
                setTimeout(() => {
                    window.location.href = "vehiculos";
                }, 1300);
            }
        });
      }
  
    })

})
	

	
