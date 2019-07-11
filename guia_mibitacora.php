<script>
	function errorSession(){
		alert("Usted no tiene permiso");
		window.location = "index.php";
	}
	function bitacoraEliminada(){
		alert("Historia correctamente eliminada");
		window.locationf = "guia_mibitacora.php";
	}
	function eliminarIncorrecto(){
		alert("Error al eliminar");
		window.locationf = "guia_mibitacora.php";
	}
</script>
<?php
    include 'conexion.php';
    session_start();
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
	<script src="http://localhost:35729/livereload.js" charset="utf-8"></script>
	<link rel="stylesheet" href="css/style14.css">
	<link rel="stylesheet" href="css/boton.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:900&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
	<script src="js/jqueryajax.js"></script>
	<script src="js/funciones8.js"></script>
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
		h1{
			font-family: 'Open+Sans', sans-serif;
			font-size: 200%;
			color: #FFFFFF;
		}
		a{
			color: #FFFFFF;
		}
		li{
			font-family: 'Open+Sans', sans-serif;
			font-size: 100%;
			color: #FFFFFF;
			list-style: none;
		}
	</style>
</head>
<body>
	<div id="contenedor">
		<div id="arriba">
		<div id="logoGoTrekking">
			<nav>
				<ul class="navLogo">
					<li id="Logo">
					</li>
				</ul>
			</nav>
		</div>
		<div class="divarribaGuia" id="listarribaGuia">
			<nav class="navlistaarriba">
			<ul>
				<li><a href="guia_misviajes.php">Mis viajes</a></li>
				<li><a href="guia_escribirbitacora.php">Escribir en Bitacora</a></li>
				<li><a href="guia_mibitacora.php">Mi bitacora</a></li>
        <li><a href="guia_modificar.php">Modificar perfil</a></li>
			</ul>
			</nav>
		</div>
		<div class="sesion" id="arribaSesionGuia">
					<form action="p_cerrarsesionguia.php">
			 			<button type="submit" class= "bubbly-button" admin>Cerrar sesion</button>
			 		</form>

		</div>
		</div>
		<div class="content-all">
					<div id="guia_menu_bitacora" class="guia_menu_bitacora">
            <h1>Historial de bitácora</h1>
            <?php
              require('isLoginGuia.php');
              include 'conexion.php';
							if (isset($_POST['eliminar'])){
            		$id_bitacora = $_POST['id'];
            		$eliminar = "DELETE FROM bitacora_viajero where id_bitacora = '".$id_bitacora."' ";

                $ejecutareliminarviaje = mysqli_query($conexion, $eliminar);

            		error_reporting(E_ERROR | E_PARSE);
            			$ejecutar = mysqli_query($conexion,$ejecutareliminarviaje);
            			if (!$ejecutar) {
            				echo "<script>bitacoraEliminada()</script>";
            			}
                    else{
											echo "<script>eliminarIncorrecto()</script>";
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
	</div>
</body>
</html>
