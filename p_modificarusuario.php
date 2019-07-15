<script>
  function exito(){
    alert("Perfil modificado");
  }

  function error(){
    alert("Error al modificar perfil");
  }
  function probar(){
    alert("Llega hasta acá");
  }
  function volver(){
    location.href = "modificar_usuario.php";
  }
</script>

<?php



require('p_isLogin.php');
include "conexion.php";


$nombrem = $_POST['txtNombres'];
$apellidosm = $_POST['txtApellidos'];
$rutm = $_POST['txtRut'];
$fotom = $_FILES['foto'];

$nombreArchivo = $_FILES['foto']['tmp_name'];

$nom_random = rand(1, 100000);
$nom = $nom_random;


$ruta= "fotousuarios/".$nom.".jpg";
move_uploaded_file($fotom["tmp_name"], $ruta);

$queryM = "UPDATE t_usuario SET nombres='$nombrem', apellidos='$apellidosm',rut='$rutm',imagen='$ruta' WHERE id_usuario='$getId'";
$ejecutar = mysqli_query($conexion, $queryM);

if (!$ejecutar) {
  echo "<script>error()</script>";
}
else{
  echo "<script>exito()</script>";
  echo "<script>volver()</script>";
}


 ?>
