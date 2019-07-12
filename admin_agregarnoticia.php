<script>
	function errorSession(){
		alert("Usted no tiene permiso");
		window.location = "index.php";
	}
</script>
<?php
		require 'isLoginAdmin.php';
    include 'conexion.php';
    if (isset($_SESSION["administrador"])) {

    }
    else{
    	echo "<script>errorSession()</script>";
			exit;
    }
    mysqli_close($conexion);
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie-edge">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/styleb6.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:700&display=swap" rel="stylesheet">
	<script src="js/jqueryajax.js"></script>
	<script src="js/funciones10.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="jquery-3.3.1.slim.min"></script>
	<script src="popper.min"></script>
	<script>
		$(document).ready(function() {
			//boton registrar
			$("#btnIniciar").click(function(){
				var parametros = {
					correo: $("#txtCorreoL").val(),
					contraseña: $("#txtContraseñaL").val()
				};
				$.ajax({
				url: 'p_login.php',
				type: 'post',
				data: parametros,
				error: function(){
					//definir un proceso en el caso de algun error
					alert("Ha ocurrido un error");
				},
				beforeSend: function(){
					// mostrar algo antes de que cargue el archivo del servidor
					// gif
					$("#cargando1").html("<img src='img/loading2.gif'width='200px' height='200px' />");
				},
				success: function(parametroRetorno){
					// mostrar el resultado del archivo
					$("#cargando1").html(parametroRetorno);
				}
				});
			});
			// boton registrar
			});
	</script>
	<style>
	</style>
</head>
<body>
	<div class="container-fluid fondonegro">
		<div class="row">
			<div class="col-3 fondonegro borde1">
				<div class="container">

				</div>
			</div>
	<div class="col-4 borde1 mgtop" >
		<ul class="navbar" style="margin-top:12px;">
		<li class="nav-item dropdown">
			<a href="#" class="nav-link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
			Agregar
			</a>
			<div class="dropdown-menu fondonegro">
				<a class="dropdown-item" href="modificar_noticia.php">Modificar noticias</a>
				<a class="dropdown-item" href="modificar_viaje.php">Modificar viajes</a>
				<a class="dropdown-item" href="modificar_contraseñaadmin.php">Modificar contraseña</a>
			</div>
		</li>
		<li class="nav-item dropdown">
			<a href="#" class="nav-link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
			Modificar
			</a>
			<div class="dropdown-menu fondonegro">
				<a class="dropdown-item" href="usuario_perfil.php">Modificar noticias</a>
				<a class="dropdown-item" href="usuario_misviajes.php">Modificar viajes</a>
				<a class="dropdown-item" href="modificar_contraseñaadmin.php">Modificar contraseña</a>
			</div>
		</li>
		<li class="nav-item dropdown">
			<a href="#" class="nav-link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
		Revisar
			</a>
			<div class="dropdown-menu fondonegro">
				<a class="dropdown-item" href="admin_verguias.php">Ver guías registrados</a>
				<a class="dropdown-item" href="admin_verviajes.php">Ver viajes</a>
				<a class="dropdown-item" href="admin_revisarpostulacion.php">Revisar postulaciones</a>
			</div>
		</li>
		</ul>
	</div>
	<div class="col-5 borde1" style="padding:25px;">
		<form action="p_cerrarsesionadmin.php">
			<button type="submit" class ="btn - btn-warning">Cerrar sesion</button>
		</form>
	</div>
	</div>
	</div>
		<div class="col-12 contentainer-fluid " style="height:900px; ">
			<div class="row">
				<div class="col-4"></div>
				<div class="col-4 contenedortr containerpadre" style="margin-top:150px;"><div id="admin_noticia" class="admin_noticia">
				 <form action="p_agregarnoticia.php" name="formularionoticia" id="formularionoticia" enctype="multipart/form-data" method="post">
					 <table>
						<tr>
							<td><p>Título noticia:</p></td>
							<td><input type="text" id="txtNoticia" name="txtNoticia"></td>
						</tr>
						<tr>
							<td><p>Fecha:</p></td>
							<td><input type="text" id="txtFecha" name="txtFecha"></textarea></td>
						</tr>
						<tr>
							<td><p>Contenido noticia:</p></td>
							<td><textarea name="txtContenido" id="txtContenido" cols="30" rows="10"></textarea></td>
						</tr>
						<tr>
							<td><p>Agregue imagen:</p></td>
							<td><input type="file" id="imagennoticia" name="imagennoticia"></td>
						</tr>
						<tr>
							<td><input type="button" value="Agregar noticia" name ="btnR"id="btnR" onclick="agregar_noticia()"</td>
						</tr>
						<tr>
							<td><input type="button" value="Volver" name ="btnR"id="btnR" onclick="volver_panel()" ></td>
						</tr>						
					 </table>
				 </form>
				</div></div>
				<div class="col-4"></div>
			</div>
		</div>
					<div class="cargando1" id="cargando1" style='display: none'>
					</div>

	</div>
</body>
</html>
