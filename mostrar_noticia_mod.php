<script>

  function volverPanel(){
    location.href = 'panel_admin.php';
  }
</script>

<?php

include 'conexion.php';


$id_noticia2 = $_POST['id_noticia1'];
$query = "SELECT * FROM t_noticia WHERE id_noticia = '$id_noticia2'";
$ejecutar = mysqli_query($conexion, $query);

$row=mysqli_fetch_array($ejecutar);




echo "
<form action='p_modificar_noticia.php' name='formmnoticia1' id='formmnoticia1' enctype='multipart/form-data' method='post'>
  <table>
   <tr>
     <td><p>Título noticia:</p></td>
     <td><input type='text' id='txtNoticia' name='txtNoticia' placeholder='$row[1]'></td>
   </tr>
   <tr>
     <td><p>Fecha:</p></td>
     <td><input type='text' id='txtFecha' name='txtFecha' placeholder='$row[2]'></textarea></td>
   </tr>
   <tr>
     <td><p>Contenido noticia:</p></td>
     <td><textarea name='txtContenido' id='txtContenido' placeholder='$row[3]' cols='30' rows='10'></textarea></td>
   </tr>
   <tr>
     <td><p>Modifique imagen:</p></td>
     <td><input type='file' id='imagennoticia' name='imagennoticia'></td>
     <img src='$row[4]' height='50px' width='50px'/>
   </tr>
   <tr>
     <td><input type='button' value='Modificar noticia' name ='btnR'id='btnR' onclick='modificar_noticia()''</td>
   </tr>
   <tr>
     <input type='hidden' value='$id_noticia2' id='id_noticia3' name='id_noticia3'  >
     <td><input type='button' value='Volver' onclick='volverPanel()'  ></td>
   </tr>
  </table>
</form>
";




?>
