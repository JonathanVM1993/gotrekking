<script>

  function funciona(){
    alert("Funciona el script");
  }

  function errorIngreso(){
    alert("Error al ingresar datos");
  }

  function exito(){
    alert("Noticia agregada correctamente");
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

    echo "$titulo";
    echo "$fecha";
    echo "$contenido";
    echo "$idnot";

    $nombreArchivo1 = $_FILES['imagennoticia']['tmp_name'];

    echo "$nombreArchivo1";

    $nom_random = rand(1, 10000);
    $ruta1= "fotosnoticia/".$nom_random.".jpg";
    move_uploaded_file($imagen["tmp_name"], $ruta1);

    $insertar = "UPDATE t_noticia SET titulo_noticia='$titulo', fecha_noticia='$fecha', contenido_noticia='$contenido'
    imagen_noticia='$ruta1' WHERE id_noticia='$idnot'";
    $resultado = mysqli_query($conexion,$insertar);

    if (!$insertar) {
      echo "<script>errorIngreso()</script>";
    }
    else{
      echo "<script>exito()</script>";
    }

 ?>
