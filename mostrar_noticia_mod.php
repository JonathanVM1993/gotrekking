<?php

include 'conexion.php';


$id_noticia2 = $_POST['id_noticia1'];
$query = "SELECT * FROM t_noticia WHERE id_noticia = '$id_noticia2'";
$ejecutar = mysqli_query($conexion, $query);





echo "
<form action='p_modificar_noticia.php' name='formmnoticia1' id='formmnoticia1' enctype='multipart/form-data' method='post'>
  <table>
   <tr>
     <td><p>Título noticia:</p></td>
     <td><input type='text' id='txtNoticia' name='txtNoticia'></td>
   </tr>
   <tr>
     <td><p>Fecha:</p></td>
     <td><input type='text' id='txtFecha' name='txtFecha'></textarea></td>
   </tr>
   <tr>
     <td><p>Contenido noticia:</p></td>
     <td><textarea name='txtContenido' id='txtContenido' cols='30' rows='10'></textarea></td>
   </tr>
   <tr>
     <td><p>Agregue imagen:</p></td>
     <td><input type='file' id='imagennoticia' name='imagennoticia'></td>
   </tr>
   <tr>
     <td><input type='button' value='Modificar noticia' name ='btnR'id='btnR' onclick='modificar_noticia()''</td>
   </tr>
   <tr>
     <input type='hidden' value='$id_noticia2' id='id_noticia3' name='id_noticia3'  >
     <td><input type='button' value='Volver' name ='btnR'id='btnR'  ></td>
   </tr>
  </table>
</form>
";




?>
