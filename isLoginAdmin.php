<?php
    session_start();
    include 'conexion.php';

    $estado = false;
    if (isset($_SESSION["administrador"])) {
    	$estado1 = true;
    }
    else{
    	echo "<script>errorSession()</script>";
    }
    mysqli_close($conexion);
 ?>
