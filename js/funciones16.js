
function irRegistrar(){
			location.href = "registrarse.php";
}

function volverGuiaViajes(){
			location.href = "guia_misviajes.php"
}

function volverGuiaPerfil(){
      location.href = "panel_guia.php";
}

function volverPerfil(){
			location.href = "usuario_perfil.php";
}

function irInicio(){
			location.href = "index.php";
}

function prueba(){
		alert("Funciona");
}

function volver_panel(){
			location.href = "panel_admin.php"
}
function irCuestionario(){
	  location.href = "usuario_cuestionario.php";
}

function irViajes(){
  location.href = "usuario_viajes.php";
}

function volver_viajes(){
  location.href = "admin_verviajes.php";
}

function miPerfil(){
	location.href = "usuario_perfil.php";
}

function volverPaneldeAdmin(){
	location.href = "panel_admin.php";
}
function registrar_usuario(){

	var parametros = new FormData($("#formulario-envia")[0]);

	$.ajax({
		url: "p_registro.php",
		type: "post",
		data: parametros,
		contentType: false,
		processData: false,
		error: function(){
					//definir un proceso en el caso de algun error
					alert("Ha ocurrido un error");
				},
		beforesend: function(){
		$("#cargando1").html("<img src='img/loading2.gif'width='200px' height='200px' />");
		},
		success: function(parametroRetorno){
			$("#cargando1").html(parametroRetorno);
		}
	});
}

function registrar_guia(){

	var parametros = new FormData($("#formularioguia")[0]);

	$.ajax({
		url: "p_agregarguia.php",
		type: "post",
		data: parametros,
		contentType: false,
		processData: false,
		error: function(){
					//definir un proceso en el caso de algun error
					alert("Ha ocurrido un error");
				},
		beforesend: function(){
		$("#cargando1").html("<img src='img/loading2.gif'width='200px' height='200px' />");
		},
		success: function(parametroRetorno){
			$("#cargando1").html(parametroRetorno);
		}
	});
}

function registrar_viaje(){

	var parametros = new FormData($("#formularioviaje")[0]);

	$.ajax({
		url: "p_agregarviaje.php",
		type: "post",
		data: parametros,
		contentType: false,
		processData: false,
		error: function(){
					//definir un proceso en el caso de algun error
					alert("Ha ocurrido un error");
				},
		beforesend: function(){
		$("#cargando1").html("<img src='img/loading2.gif'width='200px' height='200px' />");
		},
		success: function(parametroRetorno){
			$("#cargando1").html(parametroRetorno);
		}
	});
}

function agregar_noticia(){

	var parametros = new FormData($("#formularionoticia")[0]);
  alert("asd");
	$.ajax({
		url: "p_agregarnoticia.php",
		type: "post",
		data: parametros,
		contentType: false,
		processData: false,
		error: function(){
					//definir un proceso en el caso de algun error
					alert("Ha ocurrido un error");
				},
		beforesend: function(){
		$("#cargando1").html("<img src='img/loading2.gif'width='200px' height='200px' />");
		},
		success: function(parametroRetorno){
			$("#cargando1").html(parametroRetorno);
		}
	});
}

function agregar_bitacora(){
	var parametros = new FormData($("#form-b")[0]);
	$.ajax({
		url: "p_agregarb.php",
		type: "post",
		data: parametros,
		contentType: false,
		processData: false,
		error: function(){
					//definir un proceso en el caso de algun error
					alert("Ha ocurrido un error");
				},
		beforesend: function(){
		$("#cargando1").html("<img src='img/loading2.gif'width='200px' height='200px' />");
		},
		success: function(parametroRetorno){
			$("#cargando1").html(parametroRetorno);
		}
	});
}

function modificar_usuario(){
	var parametros = new FormData($("#formmu")[0]);
	$.ajax({
		url: "p_modificarusuario.php",
		type: "post",
		data: parametros,
		contentType: false,
		processData: false,
		error: function(){
					//definir un proceso en el caso de algun error
					alert("Ha ocurrido un error");
				},
		beforesend: function(){
		$("#cargando1").html("<img src='img/loading2.gif'width='200px' height='200px' />");
		},
		success: function(parametroRetorno){
			$("#cargando1").html(parametroRetorno);
      alert("Modificado correctamente");
		}
	});
}
function mostrarNoticia(){
	var parametros = new FormData($("#formmodificarn")[0]);
	$.ajax({
		url: "mostrar_noticia_mod.php",
		type: "post",
		data: parametros,
		contentType: false,
		processData: false,
		error: function(){
					//definir un proceso en el caso de algun error
					alert("Ha ocurrido un error");
				},
		beforesend: function(){
		$("#cargando1").html("<img src='img/loading2.gif'width='200px' height='200px' />");
		},
		success: function(parametroRetorno){
      $("#cargando1").html("<img src='img/loading2.gif'width='200px' height='200px' />");
			$("#cargando1").html(parametroRetorno);
		}
	});
}

function modificarPerfilG(){
	var parametros = new FormData($("#modificarg")[0]);
	$.ajax({
		url: "p_modificar_guia.php",
		type: "post",
		data: parametros,
		contentType: false,
		processData: false,
		error: function(){
					//definir un proceso en el caso de algun error
					alert("Ha ocurrido un error");
				},
		beforesend: function(){
		$("#cargando1").html("<img src='img/loading2.gif'width='200px' height='200px' />");
		},
		success: function(parametroRetorno){
      $("#cargando1").html("<img src='img/loading2.gif'width='200px' height='200px' />");
			$("#cargando1").html(parametroRetorno);
		}
	});
}

function modificarViaje(){
	var parametros = new FormData($("#formmodificarv")[0]);
	$.ajax({
		url: "p_modificar_viaje.php",
		type: "post",
		data: parametros,
		contentType: false,
		processData: false,
		error: function(){
					//definir un proceso en el caso de algun error
					alert("Ha ocurrido un error");
				},
		beforesend: function(){
		$("#cargando1").html("<img src='img/loading2.gif'width='200px' height='200px' />");
		},
		success: function(parametroRetorno){
      $("#cargando1").html("<img src='img/loading2.gif'width='200px' height='200px' />");
			$("#cargando1").html(parametroRetorno);
		}
	});
}

function modificar_noticia(){
  alert("llega");
	var parametros = new FormData($("#formmnoticia1")[0]);
	$.ajax({
		url: "p_modificar_noticia.php",
		type: "post",
		data: parametros,
		contentType: false,
		processData: false,
		error: function(){
					//definir un proceso en el caso de algun error
					alert("Ha ocurrido un error");
				},
		beforesend: function(){
		$("#cargando1").html("<img src='img/loading2.gif'width='200px' height='200px' />");
		},
		success: function(parametroRetorno){
      $("#cargando1").html("<img src='img/loading2.gif'width='200px' height='200px' />");
			$("#cargando1").html(parametroRetorno);
		}
	});
}
