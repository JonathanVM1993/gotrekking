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
	<script src="js/funciones21.js"></script>
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
      <div class="col-4"></div>
          <div class="col-4 containerpadre contenedortr" style="margin-top:50px;">


            <?php
              include 'conexion.php';
              $id_user = $_POST['idu'];

              $query = "SELECT * FROM cuestionario WHERE usuario_cuestionario ='$id_user'";
              $ejecutar = mysqli_query($conexion, $query);

              $row = mysqli_fetch_array($ejecutar);

              $querybuscarnivel = "SELECT * from nivel_viaje WHERE id_nivel ='$row[1]'";
              $ejecutarq = mysqli_query($conexion, $querybuscarnivel);
              $row2 = mysqli_fetch_array($ejecutarq);

              echo "
              <table class='table'>
              <tr>
                <td><p>Experiencia:</p></td>
                <td><p>$row2[1]</p></td>
              </tr>
              <tr>
                <td><p>Trekking realizado anteriormente:</p></td>
                <td><p>$row[4]</p></td>
              </tr>
              <tr>
                <td><p>Calzado:</p></td>
                <td><p>$row[5]</p></td>
              </tr>
              <tr>
                <td><p>Cuenta con capa:</p></td>
                <td><p>$row[6]</p></td>
              </tr>
              <tr>
                <td><p>Cuenta con bastón:</p></td>
                <td><p>$row[7]</p></td>
              </tr>
              <tr>
                <td><p>Actividad física a la semana:</p></td>
                <td><p>$row[8]</p></td>
              </tr>
              <tr>
                <td><p>Estatura:</p></td>
                <td><p>$row[9]</p></td>
              </tr>
              <tr>
                <td><p>Peso:</p></td>
                <td><p>$row[10]</p></td>
              </tr>
              <tr>
                <td><p>Alguna enfermedad o problema:</p></td>
                <td><p>$row[11]</p></td>
              </tr>
              <tr>
                <td><button onclick='volverGuiaViajes()'>Volver</button></td>
              </tr>
              </table>";


             ?>

          </div>
          <div class="col-4"></div>
        </div>
  </div>
    <div class="cargando1" id="cargando1" style='display: none'>
    </div>
</body>
</html>
