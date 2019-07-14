<script>
  function funciona(){
    alert("Contraseña cambiada con exito");
  }

  function noFunciona(){
    alert("Error al cambiar contraseña");
  }

  function igualAnterior(){
    alert("No puede ingresar la misma contraseña anterior");
  }
</script>

<?php

require_once('isLoginGuia.php');
include 'conexion.php';



$pass = $_POST['txtPassword'];



$verificarp = "SELECT password,id_guia FROM t_guia_trekking WHERE password ='$pass' and id_guia='$getIdGuia'";
$ejecutarveri = mysqli_query($conexion, $verificarp);

if (mysqli_fetch_array($ejecutarveri)>0) {
  echo "<script>igualAnterior()</script>";
  exit;
}

$queryp = "UPDATE t_guia_trekking SET password='$pass' WHERE id_guia='$getIdGuia'";
$ejecutar = mysqli_query($conexion, $queryp);

if (!$ejecutar) {
  echo "<script>noFunciona()</script>";
}
else{
  echo "<script>funciona()</script>";
}

 ?>
