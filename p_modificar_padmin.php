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

  include 'conexion.php';

  $pass = $_POST['txtPassword'];


  $verificarp = "SELECT password FROM t_admin WHERE password ='$pass'";
  $ejecutarveri = mysqli_query($conexion, $verificarp);

  if (mysqli_fetch_array($ejecutarveri)>0) {
    echo "<script>igualAnterior()</script>";
    exit;
  }

  $queryset = "UPDATE t_admin SET password='$pass'";
  $ejecutar = mysqli_query($conexion, $queryset);

    if (!$ejecutar) {
      echo "<script>noFunciona()</script>";
    }
    else{
      echo "<script>funciona()</script>";
    }
mysqli_close($conexion);
 ?>
