<script>

  function funciona(){
    alert("Funciona el script");
  }

  function errorIngreso(){
    alert("Error al ingresar datos");
  }

  function exito(){
    alert("Noticia modificada correctamente");
  }

</script>
<script src="js/funciones3.js"></script>
<?php
    include 'conexion.php';


    $idnot = $_POST['id_noticia3'];
    $titulo = $_POST['txtNoticia'];
    $fecha = $_POST['txtFecha'];
    $contenido = $_POST['txtContenido'];
    $imagen = $_FILES['imagennoticia'];
    $prueba = "hola";

    $nombreArchivo1 = $_FILES['imagennoticia']['tmp_name'];

    $nom_random = rand(1, 10000);
    $ruta1= "fotosnoticia/".$nom_random.".jpg";
    move_uploaded_file($imagen["tmp_name"], $ruta1);

    echo "$titulo";
    echo "<br />";
    echo "$fecha";
    echo "<br />";
    echo "$contenido";
    echo "<br />";
    echo "$ruta1";
    echo "<br />";
    echo "$idnot";

    $insertar = "UPDATE t_noticia SET titulo_noticia='$titulo', fecha_noticia='$fecha', contenido_noticia='$contenido',
    imagen_noticia='$ruta1' WHERE id_noticia='$idnot'";
    $resultado = mysqli_query($conexion,$insertar);

    if (!$resultado) {
      echo "<script>errorIngreso()</script>";
    }
    else{
      echo "<script>exito()</script>";
    }

 ?>
