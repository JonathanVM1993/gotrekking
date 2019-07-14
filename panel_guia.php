<script>
	function errorSession(){
		alert("Usted no tiene permiso de guía");
		window.location = "index.php";
	}
</script>
<?php
    require 'isLoginGuia.php';
    include 'conexion.php';
    if (isset($_SESSION["usuarioguia"])) {
    }
    else{
    	echo "<script>errorSession()</script>";
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
			Mis viajes
			</a>
			<div class="dropdown-menu fondonegro">
				<a href="guia_misviajes.php">Próximos viajes</a>
			</div>
		</li>
		<li class="nav-item dropdown">
			<a href="#" class="nav-link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
			Bitácora
			</a>
			<div class="dropdown-menu fondonegro">
				<a href="guia_escribirbitacora.php">Escribir en bitácora</a>
				<a href="guia_mibitacora.php">Mi bitácora</a>
			</div>
		</li>
		<li class="nav-item dropdown">
			<a href="#" class="nav-link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
		Modificar
			</a>
			<div class="dropdown-menu fondonegro" style="padding:10px;">
				<a href="guia_modificar.php">Modificar perfil</a>
				<a href="guia_modificar_p.php">Contraseña</a>
			</div>
		</li>
		</ul>
	</div>
	<div class="col-4 borde1" style="padding:25px;">
		<form action="p_cerrarsesionguia.php">
			<button type="submit" class ="btn - btn-warning">Cerrar sesion</button>
		</form>
	</div>
	</div>
	</div>
		<div class="col-12 contentainer-fluid " style="height:900px; ">

		<div class="row">
			<div class="col-4"></div>
			<div class="col-4 containerpadre contenedortr" style="margin-top:300px;">

					<?php
					require_once 'isLoginGuia.php';
					include 'conexion.php';

					$contador = "SELECT finalizado_por FROM historial_viajes_finalizados WHERE finalizado_por='$getIdGuia'";
					$ejecutarcontador = mysqli_query($conexion, $contador);
					$resultado = mysqli_num_rows($ejecutarcontador);

					echo "<h1>Viajes realizados como guía:</h1>";
					echo "<h1 style='text-size:400px'>$resultado</h1>";

					 ?>


			</div>
			<div class="col-4"></div>
		</div>


		</div>
		</div>
	</div>
</body>
</html>
