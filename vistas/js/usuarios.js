/*=============================================
SUBIENDO LA FOTO DEL USUARIO
=============================================*/
$(".nuevaFoto").change(function(){

	var imagen = this.files[0];
	console.log(imagen);
	/*=============================================
  	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
  	=============================================*/

  	if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

  		$(".nuevaFoto").val("");

  		 swal({
		      title: "Error al subir la imagen",
		      text: "¡La imagen debe estar en formato JPG o PNG!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

  	}else if(imagen["size"] > 2000000){

  		$(".nuevaFoto").val("");

  		 swal({
		      title: "Error al subir la imagen",
		      text: "¡La imagen no debe pesar más de 2MB!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

  	}else{

  		var datosImagen = new FileReader;
  		datosImagen.readAsDataURL(imagen);

  		$(datosImagen).on("load", function(event){

  			var rutaImagen = event.target.result;

  			$(".previsualizar").attr("src", rutaImagen);

  		})

  	}
})

/*=============================================
EDITAR USUARIO
=============================================*/
$(document).on("click", ".tablas .btnEditarUsuario, .tabla .btnEditarUsuario", function(){
	fila = $(this).closest("tr");
	cedula = fila.find('td:eq(0)').text();
    nombre = fila.find('td:eq(1)').text();;
    usuario = fila.find('td:eq(2)').text();;
    perfil = fila.find('td:eq(3)').text();
	email = fila.find('td:eq(4)').text();
	telefono = fila.find('td:eq(5)').text();
	estado = fila.find('td:eq(6)').text();
	ultimaConexion = fila.find('td:eq(7)').text();
    $("#editarCedula").val(cedula);
    $("#editarNombre").val(nombre);
    $("#editarUsuario").val(usuario);
    $("#editarPerfil").val(perfil);
	$("#editarCorreo").val(email);
	$("#editarTelefono").val(telefono);
	var idUsuario = $(this).attr("idUsuario");
	
	var datos = new FormData();
	datos.append("idUsuario", idUsuario);

	$.ajax({

		url:"ajax/usuarios.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			$("#editarNombre").val(respuesta["nombre"]);
			$("#editarUsuario").val(respuesta["usuario"]);
			$("#editarPerfil").html(respuesta["perfil"]);
			$("#editarPerfil").val(respuesta["perfil"]);
			$("#fotoActual").val(respuesta["foto"]);

			$("#passwordActual").val(respuesta["password"]);

			if(respuesta["foto"] != ""){

				$(".previsualizarEditar").attr("src", respuesta["foto"]);

			}else{

				$(".previsualizarEditar").attr("src", "vistas/img/usuarios/default/anonymous.png");

			}

		}

	});

})

/*=============================================
ACTIVAR USUARIO
=============================================*/
$(".tablas").on("click", ".btnActivar", function(){

	var idUsuario = $(this).attr("idUsuario");
	var estadoUsuario = $(this).attr("estadoUsuario");

	var datos = new FormData();
 	datos.append("activarId", idUsuario);
  	datos.append("activarUsuario", estadoUsuario);

  	$.ajax({

	  url:"ajax/usuarios.ajax.php",
	  method: "POST",
	  data: datos,
	  cache: false,
      contentType: false,
      processData: false,
      success: function(respuesta){

      		if(window.matchMedia("(max-width:767px)").matches){

	      		 swal({
			      title: "El usuario ha sido actualizado",
			      type: "success",
			      confirmButtonText: "¡Cerrar!"
			    }).then(function(result) {
			        if (result.value) {

			        	window.location = "usuarios";

			        }


				});

	      	}

      }

  	})

  	if(estadoUsuario == 0){

  		$(this).removeClass('btn-success');
  		$(this).addClass('btn-danger');
  		$(this).html('Desactivado');
  		$(this).attr('estadoUsuario',1);

  	}else{

  		$(this).addClass('btn-success');
  		$(this).removeClass('btn-danger');
  		$(this).html('Activado');
  		$(this).attr('estadoUsuario',0);

  	}

})

/*=============================================
BUSCAR POR CEDULA
=============================================*/

$("#formBuscarUsuario").submit(function(e) {
	e.preventDefault();
	$(".alert").remove();
	let cedula = $.trim($("#buscarCedula").val());
	console.log("Cédula ingresada:", cedula);

	$.ajax({
		url: "ajax/usuarios.ajax.php",
		type: "POST",
		dataType: "json",
		data: {
			cedula: cedula
		},
		success: function(respuesta) {
			console.log("Resultado del servidor:", respuesta);


            if (respuesta) {
                const usuario = respuesta[0];

                let fila = "<tr>";
                fila += "<td>" + usuario.cedula + "</td>";
                fila += "<td>" + usuario.nombre + "</td>";
                fila += "<td>" + usuario.usuario + "</td>";
                fila += "<td>" + usuario.perfil + "</td>";
                fila += "<td>" + usuario.ultimo_login + "</td>";
                fila += '<td><div class="btn-group"><button class="btn btn-warning btnEditarUsuario" idUsuario="' + usuario.cedula + '" data-toggle="modal" data-target="#modalEditarUsuario"><i class="fa fa-pencil" aria-hidden="true"></i></button><button class="btn btn-danger btnEliminarUsuario" idUsuario="' + usuario.cedula + '"><i class="fa fa-times"></i></button></div></td>';
                fila += "</tr>";

                $("#tablaResultados tbody").html(fila);
            } else {
                $("#tablaResultados tbody").html('<tr><td colspan="7" class="text-center">Usuario no encontrado</td></tr>');
            }
		},
		error: function(xhr, status, error) {
			console.error("Error en la llamada AJAX:", status, error);
			console.log("Respuesta del servidor:", xhr.responseText);
			alert("Error en la respuesta del servidor: " + xhr.responseText);
		}
	});
});

/*=============================================
BUSCAR POR CORREO
=============================================*/

$("#formRecuperarContraseña").submit(function(e) {
	e.preventDefault();
	$(".alert").remove();
	let correo = $.trim($("#correoRecuperacion").val());
	console.log("Correo ingresado:", correo);

	$.ajax({
		url: "ajax/usuarios.ajax.php",
		type: "POST",
		dataType: "json",
		data: {
			correo: correo
		},
		success: function(respuesta) {
			console.log("Resultado del servidor:", respuesta);
            if (respuesta) {
                const usuario = respuesta[0];
                var cedula = usuario.cedula;
                var form = $('<form>', {
                    'method': 'POST',
                    'action': 'config'
                }).append($('<input>', {
                    'type': 'hidden',
                    'name': 'cedula',
                    'value': cedula
                }));

                $('body').append(form);
                form.submit();
				swal({
					type: "success",
					title: "Correo de verificacion enviando, Verifique su correo electronico",
					showConfirmButton: true,
					confirmButtonText: "Cerrar"
					});
            } else {
				$("#correoRecuperacion").parent().after('<div class="alert alert-warning" style="margin-top: 10px;">Correo no encontrado, verifique nuevamente o comuniquese con el Administrador</div>');
            }
		},
		error: function(xhr, status, error) {
			console.error("Error en la llamada AJAX:", status, error);
			console.log("Respuesta del servidor:", xhr.responseText);
			alert("Error en la respuesta del servidor: " + xhr.responseText);
		}
	});
});

/*=============================================
REVISAR SI EL USUARIO YA ESTÁ REGISTRADO
=============================================*/

$("#nuevoUsuario").change(function(){

	$(".alert").remove();
	
	var usuario = $(this).val();

	var datos = new FormData();
	console.log(usuario);
	datos.append("validarUsuario", usuario);

	 $.ajax({
	    url:"ajax/usuarios.ajax.php",
	    method:"POST",
	    data: datos,
	    cache: false,
	    contentType: false,
	    processData: false,
	    dataType: "json",
	    success:function(usuario){
	    	
	    	if(usuario){

	    		$("#nuevoUsuario").parent().after('<div class="alert alert-warning" style="margin-top: 10px;">Este usuario ya existe en la base de datos</div>');

	    		$("#nuevoUsuario").val("");

	    	}
			else{
				$("#nuevoUsuario").parent().after('<div class="alert alert-success" style="margin-top: 10px;">Usuario Valido</div>');
			}

	    }

	})
})

/*=============================================
REVISAR SI LA CEDULA YA ESTÁ REGISTRADA
=============================================*/

$("#nuevaCedula").change(function(){

	$(".alert").remove();
	
	var cedula = $(this).val();

	var datos = new FormData();
	console.log(cedula);
	datos.append("validarCedula", cedula);

	 $.ajax({
	    url:"ajax/usuarios.ajax.php",
	    method:"POST",
	    data: datos,
	    cache: false,
	    contentType: false,
	    processData: false,
	    dataType: "json",
	    success:function(usuario){
	    	
	    	if(usuario){

	    		$("#nuevaCedula").parent().after('<div class="alert alert-warning" style="margin-top: 10px;">Esta cedula ya esta registrada en la base de datos</div>');

	    		$("#nuevaCedula").val("");

	    	}
			else{
				$("#nuevaCedula").parent().after('<div class="alert alert-success" style="margin-top: 10px;">Cedula valida</div>');
			}

	    }

	})
})

/*=============================================
REVISAR SI EL CORREO NUEVO YA ESTÁ REGISTRADO
=============================================*/

$("#nuevoCorreo").change(function(){

	$(".alert").remove();
	
	var correo = $(this).val();

	var datos = new FormData();
	console.log(correo);
	datos.append("validarCorreoNuevo", correo);

	 $.ajax({
	    url:"ajax/usuarios.ajax.php",
	    method:"POST",
	    data: datos,
	    cache: false,
	    contentType: false,
	    processData: false,
	    dataType: "json",
	    success:function(usuario){
	    	
	    	if(usuario){

	    		$("#nuevoCorreo").parent().after('<div class="alert alert-warning" style="margin-top: 10px;">Este correo ya esta registrado en la base de datos</div>');

	    		$("#nuevoCorreo").val("");
	    	}
			else{
				$("#nuevoCorreo").parent().after('<div class="alert alert-success" style="margin-top: 10px;">Correo valido</div>');
			}

	    }

	})
})

/*=============================================
REVISAR SI EL TELEFONO NUEVO YA ESTÁ REGISTRADO
=============================================*/

$("#nuevoTelefono").change(function(){

	$(".alert").remove();
	
	var telefono = $(this).val();

	var datos = new FormData();
	console.log(telefono);
	datos.append("validarTelefonoNuevo", telefono);

	 $.ajax({
	    url:"ajax/usuarios.ajax.php",
	    method:"POST",
	    data: datos,
	    cache: false,
	    contentType: false,
	    processData: false,
	    dataType: "json",
	    success:function(usuario){
	    	
	    	if(usuario){

	    		$("#nuevoTelefono").parent().after('<div class="alert alert-warning" style="margin-top: 10px;">Este telefono ya esta registrado en la base de datos</div>');

	    		$("#nuevoTelefono").val("");
	    	}
			else{
				$("#nuevoTelefono").parent().after('<div class="alert alert-success" style="margin-top: 10px;">Telefono valido</div>');
			}

	    }

	})
})

/*=============================================
ELIMINAR USUARIO
=============================================*/
$(document).on("click", ".btnEliminarUsuario", function(){

  var idUsuario = $(this).attr("idUsuario");
  var opcion = 3; //borrar
  swal({
    title: '¿Está seguro de borrar el usuario?',
    text: "¡Si no lo está puede cancelar la accíón!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar usuario!'
  }).then(function(result){

    if(result.value){
		$.ajax({
            url: "modelos/crud.php",
            type: "POST",
            dataType: "json",
            data: {opcion:opcion, idUsuario:idUsuario},
            success: function(){
                tablas.row(fila.parents('tr')).remove().draw();
            }
        });
      
		window.location = "usuarios";

    }

  })

})