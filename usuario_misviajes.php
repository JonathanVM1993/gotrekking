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
	<link rel="stylesheet" href="css/styleb6.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:700&display=swap" rel="stylesheet">
	<script src="js/jqueryajax.js"></script>
	<script src="js/funciones10.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="jquery-3.3.1.slim.min"></script>
	<script src="popper.min"></script>
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
	<div class="col-12 contentainer-fluid " style="height:900px; ">
		<div class="row">
			<div class="col-2 "></div>
			<div class="col-8 contenedortr contsep containerpadre" style="height:660px;">
				<div class="proximos_viajes contsep">
	        <h1>Mis proximos viajes</h1>

	      <div class="tabla_pagados">
	        <?php
	          include "conexion.php";

	          $queryviajes = "SELECT cliente,n_viaje,estado_pago from usuarios_viaje WHERE cliente = $getId";
	        	$mostrar = mysqli_query($conexion,$queryviajes);
	          	while ($row1=mysqli_fetch_array($mostrar)) {
	              $viaje = $row1[1];
	              $estado_pago = $row1[2];
	              $estado_nopagado = "Pagado";
	              $querycomparar = "SELECT nombre_viaje, fecha_viaje, ubicacion, precio_viaje, hora_reunion from t_viaje WHERE id_viaje=$viaje";
	              $ejecutar = mysqli_query($conexion, $querycomparar);
	              while ($row2 = mysqli_fetch_row($ejecutar)) {
	                echo "
									<table class='table'>
	                <tr>
	                <td><p>$row2[0]</p></td>
	                <td><p>$row2[1]</p></td>
	                <td><p>$row2[2]</p></td>
	                <td><p>$row2[3]</p></td>
									<td><p>$row2[4]</p></td>
	                <td><p>$estado_pago</p></td>
									";if($estado_pago==$estado_nopagado) {
	                  echo "<p>Ya está pagado este viaje!</p>";
	                }
	                else{
	                  echo "<td><button>Pagar</button></td>";
	                } echo "</p></td>
	                </tr>";echo"
	                </table>";
	              }
	            }
	            ?>
	         </div>
	         <button <button class= "bubbly-button" value= "Registrarse" onclick="volverPerfil()">Volver</button>
	      </div>
			</div>
			<div class="col-2 border"></div>
		</div>
	</div>

</body>
</html>
