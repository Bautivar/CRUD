<?php
    require_once('functions.php');
    $mensaje = "";

    if (isset($_POST['enviar'])) {
        $recuerdame = isset($_POST['recuerdame']);
        $mensaje = login($_POST['usuario'],$_POST['password'],$recuerdame);
    }
?>
<?php include_once("header.php") ?>

<main id="main">
    <section id="login" class="min-h-[600px] content-center justify-self-center my-[30px] text-white">
        <form action="#" method="post" class="shadow-md rounded px-8 py-6 w-full max-w-sm bg-neutral-900 p-8 rounded-lg shadow-lg">
            <h1 class="text-4xl font-bold mb-6 text-center text-amber-500">Iniciar Sesión</h1>

            <label for="usuario" class="m-1">Nombre de usuario</label>
            <input type="text" id="usuario" name="usuario" placeholder="Usuario" class="w-full p-3 rounded bg-neutral-800 focus:outline-none focus:ring-2 focus:ring-amber-500" required>

            <label for="password" class="m-1">Contraseña</label>
            <input type="password" id="password" name="password" placeholder="Contraseña" class="w-full p-3 mb-6 bg-neutral-800 rounded focus:outline-none focus:ring-2 focus:ring-amber-500" required>

            <label for="recuerdame" class="m-1">Recuerdame</label>
            <input type="checkbox" class=" mb-6" name="recuerdame" id="recuerdame">

            <input type="submit" name="enviar" value="Enviar"
           class="w-full bg-amber-500 hover:bg-amber-600 font-semibold py-3 rounded cursor-pointer transition-colors duration-200">
            <?= $mensaje;?>
        </form>
    </section>
</main>
<?php include_once("footer.php") ?>