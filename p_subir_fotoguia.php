<script>
  function exito(){
    alert("Foto subida con exito");
  }

  function error(){
    alert("No se ha podido subir la foto");
  }
  function volver(){
    location.href = "panel_guia.php";
  }

</script>


<?php

require_once('isLoginGuia.php');
include 'conexion.php';

$fotoperfil = $_FILES['fotog'];

$nom_random = rand(1, 10000);
$nom = $nom_random;

$nombreArchivo = $_FILES['fotog']['tmp_name'];

$ruta= "fotousuarios/".$nom.".jpg";
move_uploaded_file($fotoperfil["tmp_name"], $ruta);

$query = "UPDATE t_guia_trekking SET imagen='$ruta' WHERE id_guia='$getIdGuia'";
$ejecutar = mysqli_query($conexion, $query);

if (!$ejecutar) {
echo "<script>error()</script>";
}
else{
echo "<script>exito()</script>";

}

 mysqli_close($conexion);

 ?>
