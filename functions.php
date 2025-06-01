<?php 
require_once('conexion.php');
function login($user,$pass,$rec){
    if ($user === "admin" && $pass === "admin") {
        session_start();
        $sesion_usuario = session_id();
        $_SESSION['id'] = $sesion_usuario;

        if ($rec == true) {
            setcookie('id',$sesion_usuario,time()+3600);
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
?>