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
	<script src="js/funciones10.js"></script>
	<script>
		function irModificar(){
			location.href = "modificar_usuario.php"
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
	<div class="container-fluid fondonegro">
		<div class="row">
			<div class="col-3 fondonegro borde1">
				<div class="container">

				</div>
			</div>
	<div class="col-4 borde1 mgtop" >
	<ul class="nav fondonegro justify-content-center mr-auto mt-2 mt-md-0 sticky-top" style="padding:40px" >
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
									<a class="dropdown-item" href="usuario_modificar">Cambiar contraseña</a>
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
			<div class="col-12 borde1" style="margin-top:38px;">
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
		<div class="content-all">
					<?php
					include 'conexion.php';
						$query = "SELECT * FROM t_viaje";
						$mostrar = mysqli_query($conexion, $query);

						while ($row=mysqli_fetch_array($mostrar)) {
							$nombreviaje = $row[1];
							$fecha = $row[2];
							$descripcion = $row[8];
							$ubicacion = $row[011];
							$rutaimagen1 = $row[4];
							$rutaimagen2 = $row[5];
							$rutaimagen3 = $row[6];
							$rutaimagen4 = $row[7];
							$nivelexperiencia = $row[012];
							$precio_viaje = $row[013];
							$query_nivel = "SELECT nivel_de_viaje FROM nivel_viaje WHERE id_nivel ='$nivelexperiencia'";
							$buscar_nivel = mysqli_query($conexion, $query_nivel);
							$resultado = mysqli_fetch_array($buscar_nivel);
							$nivel = $resultado[0];

							echo "<div class='viaje1 contenedortr' style='border-radius:20px; '>
							<div class='viaje_descripcion' style='padding:25px;'><p>Nombre viaje: $nombreviaje</p>
							<p>Fecha: $fecha</p>
							<p>Ubicacion: $ubicacion</p>
							<p>Descripcion: $descripcion</p>
							<p>Nivel viaje: $nivel</p>
							<p>Precio viaje: $precio_viaje</p>
              ";
						  require_once("p_isLogin.php");
							if ($estado) {
								echo "<input type='button' class='clasebotones' value='Inscribirme' name ='btnR'id='btnR' onclick='irCuestionario()'>";
							}
							echo "
							<p>Para inscribirte debes estar logueado</p>
							</div>
							<div class='imagen'> <img src='$rutaimagen1' width='100%' height='100%'> </div>
							<div class='imagen'> <img src='$rutaimagen2' width='100%' height='100%'></div>
							<div class='imagen'> <img src='$rutaimagen3' width='100%' height='100%'></div>
							<div class='imagen'> <img src='$rutaimagen4' width='100%' height='100%'></div>
						</div>";
						}
					 ?>
					</div>
					<div class="cargando1" id="cargando1" style='display: none'>

					</div>
		</div>
	</div>
	<script src="js/bootstrap.min.js"></script>
	<script src="jquery-3.3.1.slim.min"></script>
	<script src="popper.min"></script>
</body>
</html>
