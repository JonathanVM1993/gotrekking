<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie-edge">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/styleb5.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:700&display=swap" rel="stylesheet">
	<script src="js/jqueryajax.js"></script>
	<script src="js/funciones21.js"></script>
  <script src="js/jqueryajax.js"></script>
	<script>
		function irModificar(){
			location.href = "modificar_usuario.php"
		}
    function volverPerfil(){
      location.href = "usuario_perfil.php";
    }

	</script>
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
	<style type="text/css">
	</style>

	</style>
</head>
<body>
	<div class="container-fluid fondonegro ">
		<div class="row">
			<div class="col-3 fondonegro borde1">
			</div>
	<div class="col-4 borde1 mgtop " >
	<ul class="nav fondonegro justify-content-center mr-auto mt-2 mt-md-0 mgtop" style="padding:40px" >
		<li class="nav-item"><a href="index.php" class="nav-link">Inicio</a></li>
		<li class="nav-item"><a href="noticias.php" class="nav-link">Noticias</a></li>
		<li class="nav-item"><a href="usuario_viajes.php" class="nav-link">Ver viajes</a></li>
		<li class="nav-item"><a href="usuario_postulacion.php" class="nav-link">Postularme como guia</a></li>
	</ul>
	</div>
	<div class="col-5 borde1">
		<?php
		require_once("p_isLogin.php");
		if ($estado) {
				?>
				<div class="container">
					<div class="row">
						<div class="col-4 borde1">
					</div>
						<div class="col-4 borde1">
							<ul class="navbar">
							<li class="nav-item dropdown">
								<a href="#" class="nav-link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
								<img class="rounded-circle" src="<?php echo $getFoto?>" width="100px" height="100px">
								</a>
								<div class="dropdown-menu fondonegro">
									<a class="dropdown-item" href="usuario_perfil.php">Mi perfil</a>
									<a class="dropdown-item" href="usuario_misviajes.php">Mis viajes</a>
									<a class="dropdown-item" href="modificar_usuario.php">Modificar perfil</a>
                  <a class="dropdown-item" href="usuario_modificarp.php">Cambiar contraseña</a>
									<form class="form-inline" action="p_cerrarsesion.php">
										<button type="submit" class ="btn btn-primary btn-lg">Cerrar sesion</button>
										</form>
								</div>
							</li>
							</ul>
						</div>
					</div>
				</div>
				<?php
			}
			else{
				?>
				<div class="col-12 borde1" style="margin-top:35px;">
			<form class="form-inline" name="formulario-registro" id="formulario-registro" enctype="multipart/form-data" method="post">
				<input class="form-control mb-2 mr-sm-2 mgtop" type="text" placeholder="Ingrese correo" id="txtCorreoL" name="txtCorreoL">
						<input class="form-control mb-2 mr-sm-2 mgtop" type="password" placeholder="Contraseña" id="txtContraseñaL" name="txtContraseñaL">
						<input type="button" class="form-control mb-2 mr-sm-2 mgtop" value="Iniciar sesion" id="btnIniciar"></p>
						<input type="button" class="form-control mb-2 mr-sm-2 mgtop" value= "Registrarse" onclick="irRegistrar()"></p>
			</form>
			</div>
			<?php
				}?>
	</div>
	</div>
	</div>
	<div class="col-12 contentainer-fluid " style="height:900px; ">
		<div class="row">
			<div class="col-4"></div>
			<div class="col-4 containerpadre contenedortr" style="margin-top:50px;">
				<div class="formulario1" id="formulario">
					<h1>Registrate</h1>
					<ul>
						<form name="formulario-envia" id="formulario-envia" enctype="multipart/form-data" method="post">
							<table class="tablaregistrar">
								<tr>
									<td><p>Correo:</p></td>
									<td><input class="sinborde"  name="txtCorreo"   type="text" id="txtCorreo" onkeypress="return soloEmail(event)" onpaste="return false"></td>
								</tr>
								<tr>
									<td><p>Nombres:</p></td>
									<td><input class="sinborde" name="txtNombres"   type="text" id="txtNombres" onkeypress="return soloLetras(event)" onpaste="return false"></td>
								</tr>
								<tr>
									<td><p>Apellidos:</p></td>
									<td><input class="sinborde" name="txtApellidos"   type="text" id="txtApellidos" onkeypress="return soloLetras(event)" onpaste="return false"></td>
								</tr>
								<tr>
									<td><p>Edad:</p></td>
									<td><input class="sinborde" name="txtEdad"   type="text" id="txtEdad" onkeypress="return soloNumeros(event)" onpaste="return false"></td>
								</tr>
								<tr>
									<td><p>Rut:</p></td>
									<td><input class="sinborde" name="txtRut"   type="text" id="txtRut" onkeypress="return soloRut(event)" onpaste="return false"></td>
								</tr>
								<tr>
									<td><p>Contraseña:</p></td>
									<td><input class="sinborde" name="txtContraseña"  type="text" id="txtContraseña" onkeypress="return soloPassword(event)" onpaste="return false"></td>
								</tr>
								<tr>
									<td><p>Enfermedad:</p></td>
									<td><input class="sinborde" name="txtEnfermedad"  type="text" id="txtEnfermedad" onkeypress="return soloTextoGrande(event)" onpaste="return false"></td>
								</tr>
								<tr>
									<td><p>Foto de perfil:</p></td>
									<td><input class="sinborde" type="file" name="foto"  id="foto"></td>
								</tr>
								<tr>
									<td><input type="button" value="Registrar" name ="btnR"id="btnR" onclick="registrar_usuario()"></td>
								</tr>
							</table>
							</form>
					</ul>
							</div>
							<div class="cargando1" id="cargando1">
							</div>
			</div>
			<div class="col-4"></div>
		</div>
	</div>
	</div>
</body>
</html>
