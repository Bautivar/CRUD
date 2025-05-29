<?php
    $mensaje = "";
    if (isset($_POST['enviar'])) {
        $usuario = $_POST['usuario'];
        $password = $_POST['password'];

        if ($usuario === "admin" && $password === "admin") {
            header('Location:admin.php');
        }else{
            $mensaje = ' <div class="bg-red-300 text-red-700 rounded p-3 my-2">
                    Usuario o Contraseña incorrecta
                </div>';
        }
    }
?>
<?php include_once("header.php") ?>

<main id="main">
    <section id="login" class="max-w-7xl justify-self-center my-[30px] text-white">
        <form action="#" method="post" class="shadow-md rounded px-8 py-6 w-full max-w-sm bg-neutral-900 p-8 rounded-lg shadow-lg">
            <h1 class="text-4xl font-bold mb-6 text-center text-amber-500">Iniciar Sesión</h1>

            <label for="usuario">Nombre de usuario</label>
            <input type="text" id="usuario" name="usuario" placeholder="Usuario" class="w-full p-3 mb-4 bg-neutral-800 rounded focus:outline-none focus:ring-2 focus:ring-amber-500" required>

            <label for="password">Contraseña</label>
            <input type="password" id="password" name="password" placeholder="Contraseña" class="w-full p-3 mb-6 bg-neutral-800 rounded focus:outline-none focus:ring-2 focus:ring-amber-500" required>

            <input type="submit" name="enviar" value="Enviar"
           class="w-full bg-amber-500 hover:bg-amber-600 text-white font-semibold py-3 rounded cursor-pointer transition-colors duration-200">
           <?= $mensaje ?>
        </form>
    </section>
</main>
<?php include_once("footer.php") ?>