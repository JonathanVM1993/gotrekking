<script>
	function irInicio(){
		window.location = "index.php";

		function noSesion(){
			alert("No se encuentra ninguna sesion iniciada");
		}

		function cerrarSesion(){
			alert("Sesion cerrada correctamente");
			window.location = "index.php";
		}

		function irIndex(){

		}
	}
</script>

<?php
    include 'conexion.php';

	session_start();

	if (!isset($_SESSION["administrador"])) {
			echo "<script>noSesion()</script>";
			echo "<script>irInicio()</script>";
	}
	else{
			echo "<script>cerrarSesion()</script>";
			session_destroy();
			echo "<script>irInicio()</script>";
	}
	echo "Adios: ".$_SESSION["administrador"];
	echo "<script>cerrarSesion()</script>";
	mysqli_close($conexion);


 ?>
