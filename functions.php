<?php 
require_once('./conexion.php');
function login($conexion,$user,$pass,$rec){
    $sentencia = $conexion->prepare("SELECT * FROM usuariostb WHERE nombreUsuario = ? AND passwordUsuario = ?");
    
    $sentencia->execute([$user,$pass]);
    
    $usuario = $sentencia->fetch(PDO::FETCH_ASSOC); 
    
    if ($usuario) {
        session_start();
        $_SESSION['id'] = $usuario['idUsuario'];
        if ($rec == true) {
            setcookie('id',$usuario['idUsuario'],time()+3600);
        }
        return header('Location:admin.php');
    }
    return '<div class="bg-red-300 text-red-700 rounded p-3 my-2">Usuario o Contraseña incorrecta</div>';
}
function verificarSesion(){
    session_start();
    if (isset($_COOKIE['id'])) {
        $_SESSION['id'] = $_COOKIE['id'];
    }
    if (!isset($_SESSION['id'])) {
        header('location:login.php');
    }
}
function agregarEntrada($conexion,$titulo,$contenido,$fecha,$categoria,$imagen){
  $nombreImagen = $imagen['name'];
  $ruta = "img/portadas/".$nombreImagen;
  $rutaTemporal = $imagen['tmp_name'];
  move_uploaded_file($rutaTemporal,$ruta);

  $sentencia2 = $conexion->prepare('INSERT INTO entradastb (tituloEntrada,contenidoEntrada,portadaEntrada,fechaEntrada,idCategoria) VALUES (?,?,?,?,?)');
  $resultado2 = $sentencia2->execute([$titulo,$contenido,$nombreImagen,$fecha,$categoria]);

  if ($resultado2) {
    header("Location:admin.php");
  }
}
function modificarEntrada($conexion,$titulo,$contenido,$fecha,$categoria,$idEntrada,$portadaImagen,$imagenAnterior){
  $nombreImagen = $imagenAnterior;

  if (!empty($portadaImagen['name'])) {
    $imagen = $portadaImagen;
    $nombreImagen = $imagen['name'];
    $ruta = "img/portadas/".$nombreImagen;
    $rutaTemporal = $imagen['tmp_name'];
    move_uploaded_file($rutaTemporal,$ruta);
}
  $sentencia2 = $conexion->prepare('UPDATE `entradastb` SET `tituloEntrada`= ?,`contenidoEntrada`= ?,`portadaEntrada`=?,`fechaEntrada`= ?,`idCategoria`= ? WHERE idEntrada = ?');
  $resultado2 = $sentencia2->execute([$titulo,$contenido,$nombreImagen,$fecha,$categoria,$idEntrada]);

  if ($resultado2) {
    header("Location:admin.php");
  }
}
?>