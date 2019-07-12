<?php

include 'conexion.php';


$id_noticia2 = $_POST['id_noticia1'];
$query = "SELECT * FROM t_noticia WHERE id_noticia = '$id_noticia2'";
$ejecutar = mysqli_query($conexion, $query);




echo "Hola";


?>
