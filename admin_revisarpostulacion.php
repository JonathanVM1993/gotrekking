<script>
	function errorSession(){
		alert("Usted no tiene permiso");
		window.location = "index.php";
	}
  function postulacionEliminada(){
		alert("Postulación eliminada");
		window.locationf = "admin_revisarpostulacion.phpp";
	}
	function eliminarIncorrecto(){
		alert("Error al eliminar");
		window.locationf = "admin_revisarpostulacion.php";
	}

  function volverPaneldeAdmin(){
    location.href = "panel_admin.php";
  }
  function pruebatest(){
    alert("funciona");
  }

</script>
<?php
    include 'conexion.php';
    session_start();
    if (isset($_SESSION["administrador"])) {
    	echo "Se encuentra actualmente en el panel de control de : ".$_SESSION["administrador"];
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
			font-size: 400%;
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
		<div class="divarriba" id="listarriba">
			<nav class="navlistaarriba">
			<ul>
				<li><a href="index.php">Inicio</a></li>
				<li><a href="noticias.php">Noticias</a></li>
				<li><a href="">Ver viajes</a></li>

			</ul>
			</nav>
		</div>
		<div class="arribaSesion" id="arribaSesion">
					<form action="p_cerrarsesionadmin.php">
			 			<p>Modo administrador</p>
			 			<button type="submit" class= "bubbly-button" admin>Cerrar sesion</button>
			 		</form>
		</div>
		</div>
		<div class="content-all">

					<div id="postulacion_r" class="postulacion_r">
            <?php
            include "conexion.php";
            if (isset($_POST['eliminar'])){
              $id_bitacora = $_POST['id'];
              $eliminar = "DELETE FROM postulacion where id_postulacion = '".$id_bitacora."' ";
              $ejecutareliminarviaje = mysqli_query($conexion, $eliminar);
              error_reporting(E_ERROR | E_PARSE);
                $ejecutar = mysqli_query($conexion,$ejecutareliminarviaje);
                if (!$ejecutar) {
                  echo "<script>postulacionEliminada()</script>";
                }
                  else{
                    echo "<script>eliminarIncorrecto()</script>";
                    }
            }else{
            $query = "SELECT * FROM postulacion";
            $ejecutar = mysqli_query($conexion, $query);
            echo "<table class='postulacion_r'>
            <tr>
              <td>Fecha postulación</td>
              <td>Descripción</td>
              <td>Curriculum</td>
              <td>Eliminar</td>
            </tr>
            </table>";

            while ($row=mysqli_fetch_row($ejecutar)) {
            $id_postulacion = $row[0];
            $fecha = $row[1];
            $descripcion = $row[2];
            $rutaimg = $row[4];

            echo "<table class='postulacion_r'>
            <tr>
            <td>$fecha</td>
            <td>$descripcion</td>
            <td><img src='$rutaimg' width='50px' height='50px' /></td>
            <td>
            <form method='POST'>
              <input type='hidden' name='id' value='$id_postulacion''>
              <input type='submit' name='eliminar' value='Eliminar'>
            </form></td>
            </tr>
            </table>";
            }
          }
             ?>
             <button onclick="volverPaneldeAdmin()">Volver</button>
					</div>
		</div>
	</div>
</body>
</html>
