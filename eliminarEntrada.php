<?php
if ($_GET['idEntrada']) {
    $idEntrada = $_GET['idEntrada'];
    require_once('conexion.php');
    $consulta = "DELETE FROM entradastb WHERE idEntrada = ?";
    $sentencia = $conexion->prepare($consulta);
    $resultado = $sentencia->execute([$idEntrada]);
    if ($resultado) {
        header("Location:admin.php");
    }
}

?>