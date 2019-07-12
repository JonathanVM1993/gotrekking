<script>
function prueba(){
  alert("Llega");
}

function errorInserto(){
  alert("Error al ingresar datos");
}

function exito(){
  alert("Ingreso de datos a bitácora exitoso");
}

function volver(){
  location.href = "guia_escribirbitacora.php";
}
</script>

<?php
require('isLoginGuia.php');
include "conexion.php";

$des_b = $_POST['d_bit'];
$titulo = $_POST['txtTitulo'];

$id_guia = $getIdGuia;

date_default_timezone_set("America/Santiago");
$fecha = date("20y-m-d");


$query = "INSERT INTO bitacora_viajero(id_guia_viajero,descripcion_viaje,fecha_ingreso,titulo_historia) VALUES('$id_guia','$des_b','$fecha','$titulo')";
$ejecutar = mysqli_query($conexion, $query);

if (!$ejecutar) {
  echo "<script>errorInserto()</script>";
  echo "<script>volver()</script>";
}
else{
  echo "<script>exito()</script>";
  echo "<script>volver()</script>";
}

mysqli_close($conexion);
?>
