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
				<a class="dropdown-item" href="admin_agregarguia.php">Agregar guía</a>
				<a class="dropdown-item" href="admin_agregarviaje.php">Agregar viaje</a>
				<a class="dropdown-item" href="admin_agregarnoticia.php">Agregar noticias</a>
			</div>
		</li>
		<li class="nav-item dropdown">
			<a href="#" class="nav-link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
			Modificar
			</a>
			<div class="dropdown-menu fondonegro">
				<a class="dropdown-item" href="modificar_noticia.php">Modificar noticias</a>
				<a class="dropdown-item" href="modificar_viaje.php">Modificar viajes</a>
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
		<div class="col-12 contentainer-fluid " style="height:900px;">
			<div class="row">
				<div class="col-1"></div>
				<div class="col-10 contenedortr containerpadre" style="margin-top:50px; width:auto;">
					<div id="tabla_mostrar_guias" class="table_guias">
						<?php
				include "conexion.php";

				if (isset($_POST['eliminar'])){
					$id_guia = $_POST['id'];
					$eliminar = "DELETE FROM t_guia_trekking where id_guia = '".$id_guia."' ";
					$query = "SELECT * from t_guia_trekking";

					error_reporting(E_ERROR | E_PARSE);
						$ejecutar = mysqli_query($conexion,$eliminar);
						if (!$ejecutar) {
							echo "<script>errorEliminar()</script>";
							header('location:admin_verguias.php');
						}
							echo "Guía eliminado correctamente";
							header('location:admin_verguias.php');

				}else{
				$query = "SELECT * from t_guia_trekking";
				$mostrar = mysqli_query($conexion,$query);

				while ($row = mysqli_fetch_row($mostrar)) {
				$id = $row[0];
				echo "
						<table class='table table-responsive'>
						<tr>
						<td height='100px' width='150px;'><p>$row[0]</p></td>
					  <td height='100px' width='150px;'><p>$row[1]</p></td>
					  <td height='100px' width='150px;'><p>$row[2]</p></td>
					  <td height='100px' width='150px;'><p>$row[3]</p></td>
					  <td height='100px' width='150px;'><p>$row[4]</p></td>
					  <td height='100px' width='150px;'><p>$row[5]</p></td>
					  <td height='100px' width='150px;'><p>$row[6]</p></td>
					  <td>
					  <form method='POST'>
					  	<input type='hidden' name='id' value='$row[0]''>
					  	<input type='submit' name='eliminar' value='Eliminar'>
					  </form></td>
						</tr>
					  </table>
				";
				}
				echo '<a href="panel_admin.php">Volver</a>';
			}
				mysqli_close($conexion);

			 ?>
					</div>
					</div>
				</div>
				<div class="col-1"></div>
			</div>
		</div>
					<div class="cargando1" id="cargando1" style='display: none'>
					</div>

	</div>
</body>
</html>
