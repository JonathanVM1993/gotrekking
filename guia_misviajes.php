<script>
	function errorSession(){
		alert("Usted no tiene permiso de guía");
		window.location = "index.php";
	}
	function exitoFinalizar(){
		alert("Viaje finalizado con exito");
	}

	function yaFinalizado(){
		alert("Usted ya finalizó el viaje");
	}
	function errorFinalizar(){
		alert ("No se ha podido finalizar el viaje");
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
			<div class="col-1"></div>
			<div class="col-10 containerpadre contenedortr" style="margin-top:50px;">
				<div id="guia_misviajes" class="guia_misviajes">
					<h1>Próximos viajes por realizar</h1>

					<?php
						require_once("isLoginGuia.php");
						include "conexion.php";
						if (isset($_POST['eliminar'])){
							$id_viaje = $_POST['id'];
							$id_guia1 = $getIdGuia;
						  $estadofinalizado = "Finalizado";

							$verificar = "SELECT * FROM t_viaje WHERE id_guia ='$getIdGuia' AND estado_viaje='$estadofinalizado' AND id_viaje='$id_viaje'";
							$ejecutarverificar = mysqli_query($conexion, $verificar);

							if (mysqli_num_rows($ejecutarverificar) > 0) {
								echo "<script>yaFinalizado()</script>";
								exit;
							}

							$setear = "UPDATE t_viaje SET estado_viaje='$estadofinalizado' WHERE id_viaje='$id_viaje'";
							$ejecutarset = mysqli_query($conexion, $setear);



							$insertarhistorial = "INSERT INTO historial_viajes_finalizados(finalizado_por,viaje_finalizado,estado) VALUES('$getIdGuia','$id_viaje','$estadofinalizado')";
							$ejecutarhistorial = mysqli_query($conexion, $insertarhistorial);

							if ($ejecutarset) {
								echo "<script>exitoFinalizar()</script>";
							}

						}
					else{
						$query = "SELECT nombre_viaje,fecha_viaje,ubicacion,hora_reunion,id_viaje,estado_viaje,id_guia FROM t_viaje WHERE id_guia ='$getIdGuia'";
						$ejecutar = mysqli_query($conexion, $query);
						while ($row=mysqli_fetch_row($ejecutar)) {

							$pagados = "Pagado";
							$nopagados = "No pagado";

							$cantidadInscritos = "SELECT n_viaje FROM usuarios_viaje WHERE n_viaje='$row[4]'";
							$resultado5 = mysqli_query($conexion, $cantidadInscritos);
			        $rowcnt = mysqli_num_rows($resultado5);

							$cantidadNop = "SELECT n_viaje FROM usuarios_viaje WHERE estado_pago='$nopagados'";
							$ejecutarcn = mysqli_query($conexion, $cantidadNop);
							$rownopagados = mysqli_num_rows($ejecutarcn);

							$cantidadPagado = "SELECT n_viaje FROM usuarios_viaje WHERE estado_pago='$pagados'";
							$ejecutarpagados = mysqli_query($conexion, $cantidadPagado);
							$rownpagados = mysqli_num_rows($ejecutarpagados);


							echo "
							<table class='table'>
							<tr>
							<td>
							<form method='POST'>
								<input type='hidden' name='id' value='$row[4]'>
								<input type='hidden' name='idGuia' value='$row[5]'>
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
								<td><p>Cantidad inscritos: $rowcnt</p></td>
								<td><p>Cantidad pagados: $rownpagados</p></td>
								<td><p>Cantidad no pagados: $rownopagados</p></td>
								<td><p>Estado viaje: $row[5]</p></td>
							</tr>
							</table>";
							}
							}
					 ?>
					 <button onclick="volverGuiaPerfil()">Volver</button>
				</div>
			</div>
			<div class="col-1"></div>
		</div>
	</div>

	</div>
</body>
</html>
