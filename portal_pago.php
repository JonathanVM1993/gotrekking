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
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:700&display=swap" rel="stylesheet">
	<script src="js/jqueryajax.js"></script>
	<script src="js/funciones21.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="jquery-3.3.1.slim.min"></script>
	<script src="popper.min"></script>
	<script>
		function irModificar(){
			location.href = "modificar_usuario.php"
		}
    function volverPerfil(){
      location.href = "usuario_perfil.php";
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

<div class="container " style="margin-top:100px;">
  <div class="row">
  <div class="col-3 "></div>
  <div class="col-6 ">
    <img src="img/webpay_simulacion.jpg" alt="">
    <form action="usuario_pagar.php" method='POST'>
      <?php $idviaje5 = $_POST['id_viajes'] ?>
      <input type="hidden" id='id_viajes' name='id_viajes' value='<?php echo $idviaje5 ?>'>
    <button>Pagar</button>
    </form>
  </div>
  <div class="col-3 "></div>
  </div>
</div>
</body>
</html>
