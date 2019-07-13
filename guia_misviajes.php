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
	<script src="js/funciones17.js"></script>
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
			<div class="dropdown-menu fondonegro">
				<a href="guia_modificar.php">Modificar perfil</a>
				<a href="guia_modificar_p.php">Modificar contraseña</a>
			</div>
		</li>
		</ul>
	</div>
	<div class="col-5 borde1" style="padding:25px;">
		<form action="p_cerrarsesionguia.php">
			<button type="submit" class ="btn - btn-warning">Cerrar sesion</button>
		</form>
	</div>
	</div>
	</div>
	<div class="col-12 contentainer-fluid " style="height:900px; ">
		<div class="row">
			<div class="col-2"></div>
			<div class="col-8 containerpadre contenedortr" style="margin-top:50px;">
				<div id="guia_misviajes" class="guia_misviajes">
					<h1>Próximos viajes por realizar</h1>

					<?php
						require_once("isLoginGuia.php");
						include "conexion.php";
						if (isset($_POST['eliminar'])){
							$id_viaje = $_POST['id'];
							$estadoC = "En curso";

							$id_viaje = $_POST['id'];
							$eliminar = "DELETE FROM t_viaje where id_viaje = '".$id_viaje."' ";
							$query = "SELECT * from t_viaje";

							$eliminarcuestionario = "DELETE FROM cuestionario where viaje_cuestionario = '$id_viaje'";
							$ejecutar = mysqli_query($conexion, $eliminarcuestionario);

							$eliminarusuariodelviaje = "DELETE FROM usuarios_viaje where n_viaje ='$id_viaje'";
							$ejecutareliminarviaje = mysqli_query($conexion, $eliminarusuariodelviaje);

							error_reporting(E_ERROR | E_PARSE);
								$ejecutar = mysqli_query($conexion,$eliminar);
								if (!$ejecutar) {
									echo "<script>errorEliminar()</script>";
									header('location:guia_misviajes.php');
								}
									echo "<script>eliminarcorrecto()</script>";
									header('location:guia_misviajes.php');




						}
					else{
						$query = "SELECT nombre_viaje,fecha_viaje,ubicacion,hora_reunion,id_viaje FROM t_viaje WHERE id_guia ='$getIdGuia'";
						$ejecutar = mysqli_query($conexion, $query);
						while ($row=mysqli_fetch_row($ejecutar)) {
							echo "
							<table class='table'>
							<tr>
							<td>
							<form method='POST'>
								<input type='hidden' name='id' value='$row[4]''>
								<input type='submit' name='eliminar' value='Finalizar'>
							</form>
							<td>
								<form action='p_verlistainscritos.php' method='POST'>
								<input type='hidden' name='viaje_id' value='$row[4]'/>
								<input type='submit' value='Inscritos'/>
								</form>
							</td>
							<td>
								<td><p>Nombre: $row[0]</p></td>
								<td><p>Fecha: $row[1]</p></td>
								<td><p>$row[2]</p></td>
								<td><p>Hora reunión: </p><p>$row[3]</p></td>
							</tr>
							</table>";
							}
							}
					 ?>
					 <button onclick="volverGuiaPerfil()">Volver</button>
				</div>
			</div>
			<div class="col-2"></div>
		</div>
	</div>

	</div>
</body>
</html>
