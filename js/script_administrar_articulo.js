var id_articulo_modificando;

function listarArticulo(){


		$.ajax({
			url:"./metodos_ajax/articulo/mostrar_articulo.php",
			method:"POST",
			success:function(respuesta){
				// alert(respuesta);
				 $("#contenedor_listado_articulo").html(respuesta);
			}
		});
}


function guardar_nuevo_articulo(){

	var formData = new FormData(document.getElementById("mantenedor_ingresar_articulo"));

			$.ajax({
				url:"./metodos_ajax/articulo/crear_articulo.php",
				dataType: "html",
				type:'post',
				data: formData,
				cache: false,
				contentType: false,
				processData:false,
				success:function(respuesta){
					  alert(respuesta);

					 if(respuesta==1){
						 swal("Guardado","Los datos se han guardado correctamente.","success");

						 setTimeout(function(){
							 window.location ="./administracion_articulo.php";}
						 ,3000);

					 }else if(respuesta==2){
						 swal("Ocurrió un error","Recargue la página e intente nuevamente.","error");
					 }else if(respuesta==3){
						 swal("Ocurrió un error","Error al subir la imagen.","error");
					 }
				}
			});

}

function modificar_articulo(){

	var formData = new FormData(document.getElementById("mantenedor_modificar_articulo"));

			$.ajax({
				url:"./metodos_ajax/articulo/editar_articulo.php",
				dataType: "html",
				type:'post',
				data: formData,
				cache: false,
				contentType: false,
				processData:false,
				success:function(resultado){
              // alert(resultado);

						 if(resultado==1){
							 swal("Guardado","Los datos se han guardado correctamente.","success");
							 setTimeout(function(){
								 window.location ="./administracion_directorio.php";}
							 ,3000);
						 }else if(respuesta==2){
							 swal("Ocurrió un error","Recargue la página e intente nuevamente.","error");
						 }else if(respuesta==3){
							 swal("Ocurrió un error","Error al subir la imagen.","error");
						 }
				}
			});
}

function eliminarArticulo(id){

	swal({
			title: "¿Eliminar Empleado?",
			text: "",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#DD6B55",
			confirmButtonText: "Eliminar!",
			cancelButtonText: "Cancelar!",
			closeOnConfirm: false,
			closeOnCancel: false },
			function(isConfirm){
					if (isConfirm) {
			$.ajax({
				url:"./metodos_ajax/articulo/eliminar_articulo.php?id_articulo="+id,
				method:"POST",
				success:function(respuesta){
					  // alert(respuesta);
					 if(respuesta==1){
						 listarArticulo();
						 swal("Eliminado correctamente","Los datos se han guardado correctamente.","success");
					 }else if(respuesta==2){
						 swal("Ocurrió un error","Recargue la página e intente nuevamente.","error");
					 }
				}
			});
		} else {
				swal("Cancelado", "", "error");
		}
		});
		}


function listarImagenesArticulo(id_articulo){


     id_articulo_modificando= id_articulo;

			$.ajax({
				url:"./metodos_ajax/articulo/mostrar_imagenes_articulo.php?id_articulo="+id_articulo_modificando,
				method:"POST",
				success:function(respuesta){
					$("#divInferiorImagenesActuales").html(respuesta);
				}
			});
}


function soloUnaPrincipal(id){//permite presionar solo un checkbox
	 var cantidad= $("#contadorFotos").val();

	 for(var c=1;c<=cantidad;c++){
			 $('#principal'+c).prop('checked', false);
	 }

	 $("#principal"+id).prop('checked', true);

}



function agregarCampoFoto(){
					var contadorTr=$("#tablaFotosIngreso tr").length-1;
					contadorTr++;

					//alert(contadorTr);
							$("#tablaFotosIngreso").append('<tr><td><input required class="form-control" name="foto'+contadorTr+'" type="file"></input></td><td><input class="form-control" type="checkbox" onclick="soloUnaPrincipal('+contadorTr+')" name="principal'+contadorTr+'" id="principal'+contadorTr+'"></td></tr>');
							$("#contadorFotos").val(contadorTr);
}


function removerCampoFoto(){
						 var cantidad= $("#contadorFotos").val();

						 if(cantidad!=0){
								 $("#tablaFotosIngreso tr:last").remove();

									cantidad--;
									 $("#contadorFotos").val(cantidad);
							}
}

function eliminarImagenNoticia(idFoto){
					swal({title:"Cargando", text:"Espere un momento.", showConfirmButton:true,allowOutsideClick:false,showCancelButton: false,closeOnConfirm: false});

					$.ajax({
						url:"./metodos_ajax/noticias/eliminar_imagen.php?id_imagen="+idFoto,
						success:function(respuesta){
							alert(respuesta);
							 if(respuesta==1){

								 listarImagenesNoticia(id_noticia_modificando);
								 swal("Operacion exitosa!", "Imagen Eliminada", "success");
							 }
							 else if(respuesta==2){
								 swal("Noticia debe tener al menos una imagen!", "", "warning");
							 }
							 else{
								 swal("Operacion exitosa!", "Imagen Eliminada", "success");
							 }
						}
					});
}

function cambiarImagenPrincipal(idFoto,idNoticia){

					$.ajax({
						url:"./metodos_ajax/noticias/cambiar_imagen_principal.php?id_imagen="+idFoto+"&id_noticia="+idNoticia,
						success:function(respuesta){
							// alert(respuesta);
							 if(respuesta==1){

								 listarImagenesNoticia(id_noticia_modificando);
								 // swal("Operacion exitosa!", "Imagen Eliminada", "success");
							 }
						}
					});
}

function fotoPrincipal(idFoto,run){
					swal({title:"Cargando", text:"Espere un momento.", showConfirmButton:true,allowOutsideClick:false,showCancelButton: false,closeOnConfirm: false});
					$.ajax({
						url:"controladorMantenedores.php?mant=7&func=6",
						data:"idFoto="+idFoto+"&run="+run,
						success:function(respuesta){
							 if(respuesta==1){
								 cargarImagenesActuales(run);
								 swal("Operacion exitosa!", "Imagen Principal Cambiada", "success");
							 }
						}
					});
}
