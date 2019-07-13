
<script>
  function probar(){
    alert("Llega hasta aquí")
  }

  function correcto(){
    alert("Modificado correctamente");
  }

  function incorrecto(){
    alert("No se ha podido modificar el viaje");
  }

  function volver(){
    location.href ="admin_verviajes.php";
  }
</script>

<?php

include 'conexion.php';

$idviaje = $_POST['idviaje1'];
$nombreviaje = $_POST['txtNombre'];
$fecha_viaje = $_POST['txtFecha'];
$guia = $_POST['id'];
$imagen1 = $_FILES['img1'];
$imagen2 = $_FILES['img2'];
$imagen3 = $_FILES['img3'];
$imagen5 = $_FILES['img5'];
$imagen6 = $_FILES['img6'];
$imagen7 = $_FILES['img7'];
$imagengoogle = $_FILES['img4'];
$descripcion = $_POST['txtDescripcion'];
$ubicacion1= $_POST['txtUbicacion'];
$nivel1 = $_POST['id_nivel'];
$precio1= $_POST['txtPrecio'];
$horaviaje = $_POST['txtHora'];
$estado_viaje = "En curso";

$nombreArchivo1 = $_FILES['img1']['tmp_name'];
$nombreArchivo2 = $_FILES['img2']['tmp_name'];
$nombreArchivo3 = $_FILES['img3']['tmp_name'];
$nombreArchivo4 = $_FILES['img4']['tmp_name'];

$nom_random = rand(1, 100000);
$nom1 = rand(1, 100000);
$nom2 = rand(1, 100000);
$nom3 = rand(1, 100000);
$nom4 = rand(1, 100000);
$nom5 = rand(1, 100000);
$nom6 = rand(1, 100000);
$nom7 = rand(1, 100000);

$ruta1= "fotosviaje/".$nom1.".jpg";
$ruta2= "fotosviaje/".$nom2.".jpg";
$ruta3= "fotosviaje/".$nom3.".jpg";
$ruta4= "fotosviaje/".$nom4.".jpg";
$ruta5= "fotosviaje/".$nom5.".jpg";
$ruta6= "fotosviaje/".$nom6.".jpg";
$ruta7= "fotosviaje/".$nom7.".jpg";

move_uploaded_file($imagen1["tmp_name"], $ruta1);
move_uploaded_file($imagen2["tmp_name"], $ruta2);
move_uploaded_file($imagen3["tmp_name"], $ruta3);
move_uploaded_file($imagengoogle["tmp_name"], $ruta4);
move_uploaded_file($imagen5["tmp_name"], $ruta5);
move_uploaded_file($imagen6["tmp_name"], $ruta6);
move_uploaded_file($imagen7["tmp_name"], $ruta7);

echo "$nombreviaje";
echo "<br/>";
echo "$fecha_viaje";
echo "<br/>";
echo "$guia";
echo "<br/>";
echo "$nombreArchivo1";
echo "<br/>";
echo "$nombreArchivo2";
echo "<br/>";
echo "$nombreArchivo3";
echo "<br/>";
echo "$nombreArchivo4";
echo "<br/>";
echo "$descripcion";
echo "<br/>";
echo "$ubicacion1";
echo "<br/>";
echo "$nivel1";
echo "<br/>";
echo "$precio1";
echo "<br/>";
echo "$horaviaje";
echo "<br/>";
echo "$estado_viaje";
echo "<br/>";
echo "$ruta5";
echo "<br/>";
echo "$ruta6";
echo "<br/>";
echo "$ruta7";
echo "<br/>";

$queryset = "UPDATE t_viaje SET nombre_viaje='$nombreviaje', fecha_viaje='$fecha_viaje', id_guia='$guia',imagen1='$ruta1', imagen2='$ruta2',imagen3='$ruta3',imagen4='$ruta4',descripcion_viaje='$descripcion',ubicacion='$ubicacion1', nivel='$nivel1',precio_viaje='$precio1', hora_reunion='$horaviaje',
 imagen5='$ruta5',imagen6='$ruta6',imagen7='$ruta6' WHERE id_viaje='$idviaje'";

$ejecutar = mysqli_query($conexion, $queryset);

if (!$ejecutar) {
  echo "<script>incorrecto()</script>";
  echo "<script>volver()</script>";
}
else{
  echo "<script>correcto()</script>";
  echo "<script>volver()</script>";
}

mysqli_close($conexion);
 ?>
