<script>
    function llega(){
      alert("Llega");
    }

    function correcto(){
      alert("Sus datos han sido modificados");
    }

    function error(){
      alert("Error al modificar datos");
    }

</script>


<?php

require_once('isLoginGuia.php');
include 'conexion.php';

$nombreg = $_POST['txtNombre'];
$apellidogp = $_POST['txtApellidoP'];
$apellidogm = $_POST['txtApellidoM'];
$rutg = $_POST['txtRut'];
$telefonog = $_POST['txtTelefono'];
$correog = $_POST['txtCorreo'];


$queryu = "UPDATE t_guia_trekking SET nom_guia='$nombreg', ap_p_guia='$apellidogp', ap_m_guia='$apellidogm', rut='$rutg', telefono='$telefonog', correo='$correog' WHERE id_guia='$getIdGuia'";
$ejecutar = mysqli_query($conexion, $queryu);

if (!$ejecutar) {
  echo "<script>error()</script>";
}
else{
  echo "<script>correcto()</script>";
}

mysqli_close('conexion.php');

 ?>
