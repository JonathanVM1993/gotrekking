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
	<script src="js/funciones11.js"></script>
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
			<form class="form-inline" name="formulario-registro" id="formulario-registro" enctype="multipart/form-data" method="post">
				<input class="form-control mb-2 mr-sm-2 mgtop" type="text" placeholder="Ingrese correo" id="txtCorreoL" name="txtCorreoL">
						<input class="form-control mb-2 mr-sm-2 mgtop" type="password" placeholder="Contraseña" id="txtContraseñaL" name="txtContraseñaL">
						<input type="button" class="form-control mb-2 mr-sm-2 mgtop" value="Iniciar sesion" id="btnIniciar"></p>
						<input type="button" class="form-control mb-2 mr-sm-2 mgtop" value= "Registrarse" onclick="irRegistrar()"></p>
			</form>
			<?php
				}?>
	</div>
	</div>
	</div>
	</div>
		<div class="col-12 contentainer-fluid" style="height:600px;">
			<div class="container contenedortr  containerpadre" style="margin-top:180px;">
				<div class="row">
					<div class="col-8">
						<h1>Modificar perfil</h1>
	          <?php
	          include "conexion.php";
	          $id = $getId;
	          $queryperfil = "SELECT * FROM t_usuario WHERE id_usuario = $id";
	          $ejecutarperfil = mysqli_query($conexion, $queryperfil);
	          $rowperfil = mysqli_fetch_row($ejecutarperfil);
	          $getCorreo = $rowperfil[1];
	          $getRutaFoto = $rowperfil[8];
	          echo "
            <form name='formmu' id='formmu' enctype='multipart/form-data' method='post'>
            <table class='table-responsive'>
              <tr>
                <td><p>Correo:</p></td>
                <td><input type='text' id='txtCorreo' name='txtCorreo'  placeholder='$getCorreo'></td>
              </tr>
              <tr>
                <td><p>Nombres:</p></td>
                <td><input type='text' id='txtNombres' name='txtNombres'  placeholder='$getNombres'></td>
              </tr>
              <tr>
                <td><p>Apellidos:</p></td>
                <td><input type='text' id='txtApellidos' name='txtApellidos'  placeholder='$getApellidos'></td>
              </tr>
              <tr>
                <td><p>Rut:</p></td>
                <td><input type='text' id='txtRut' name='txtRut'  placeholder='$getRut'></td>
              </tr>
              <tr>
                <td><p>Foto perfil:</p></td>
                <td><input type='file' id='foto' name='foto' placeholder='' ></td>
              </tr>
              <tr>
                <td><button class='clasebotones' onclick='modificar_usuario()'>Modificar</button></td>
              </tr>
            </table>
            </form>
            ";
	           ?>
						 <td><button class='clasebotones' onclick='volverPerfil()'>Volver</button></td>
					</div>
					<div class="col-4 " style="margin-top:80px;">
						<img class="rounded-circle"src="<?php echo $getFoto?>" alt="" height="170px" width="170px">
					</div>
				</div>
			</div>
		</div>
		<script src="js/bootstrap.min.js"></script>
		<script src="jquery-3.3.1.slim.min"></script>
		<script src="popper.min"></script>
</body>
</html>
