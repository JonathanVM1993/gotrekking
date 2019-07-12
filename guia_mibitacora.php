<script>
	function errorSession(){
		alert("Usted no tiene permiso de guía");
		window.location = "index.php";
	}

	function exitoEliminar(){
		alert("Historia eliminada de la bitacora");
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
	<div class="col-5 borde1" style="padding:25px;">
		<form action="p_cerrarsesionguia.php">
			<button type="submit" class ="btn - btn-warning">Cerrar sesion</button>
		</form>
	</div>
	</div>
	</div>
	<div class="col-12 contentainer-fluid " style="height:900px; ">
		<div class="row">
			<div class="col-4"></div>
			<div class="col-4 containerpadre contenedortr" style="margin-top:50px;">
				<div id="guia_menu_bitacora" class="guia_menu_bitacora">
					<h1>Historial de bitácora</h1>
					<?php
						require_once("isLoginGuia.php");
						include 'conexion.php';
						if (isset($_POST['eliminar'])){
							$id_bitacora = $_POST['id'];
							$eliminar = "DELETE FROM bitacora_viajero where id_bitacora = '".$id_bitacora."' ";
							$ejecutareliminarviaje = mysqli_query($conexion, $eliminar);

							error_reporting(E_ERROR | E_PARSE);
							$ejecutar = mysqli_query($conexion,$ejecutareliminarviaje);
								if (!$ejecutar) {
									echo "<script>exitoEliminar()</script>";
									header('location:guia_mibitacora.php');
								}
									else{
										echo "<script>exitoEliminar()</script>";
										header('location:guia_mibitacora.php');

									}
						}else{
						$id_guia = $getIdGuia;
						$query = "SELECT descripcion_viaje,fecha_ingreso,id_bitacora,id_guia_viajero FROM bitacora_viajero WHERE id_guia_viajero='$id_guia'";
						$ejecutarq = mysqli_query($conexion, $query);

						while($row2=mysqli_fetch_array($ejecutarq)) {
							$desc_bitacora = $row2[0];
							$fecha_ingr = $row2[1];
						echo "<table>
						<tr>
							<td><p>Fecha ingreso</p></td>
							<td><p>Historia</p></td>
							<td><p>Eliminar</p></td>
							<td></td>
						</tr>
						<tr>
							<td><p>$fecha_ingr</p></td>
							<td><p>$desc_bitacora</p></td>
							<td><form method='POST'>
								<input type='hidden' name='id' value='$row2[2]''>
								<input type='submit' name='eliminar' value='Eliminar'>
							</form></td>
						</tr>
						</table>";
						}
						}
					 ?>
				</div>
			</div>
			<div class="col-4"></div>
		</div>
	</div>
	</div>
</body>
</html>
