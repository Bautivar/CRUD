<?php include_once('header.php'); ?>
<main id="main">
    <section id="banner" class="h-screen bg-[url(img/banner.webp)] bg-center bg-no-repeat bg-cover flex justify-center items-center">
        <div class="bg-black/80 text-white text-center max-w-[550px] p-4">
            <h1 class="text-5xl uppercase">Bienvenidos al blog</h1>
            <p class="md:text-start py-2">Este es un espacio dedicado a todo lo relacionado con Rockstar Games: noticias, lanzamientos, curiosidades, teorías, debates y mucho más. Si te apasionan juegos como GTA, Red Dead Redemption o simplemente querés estar al día con todo lo nuevo del estudio, llegaste al lugar indicado. La idea es simple: compartir esta pasión en una comunidad sana y respetuosa, donde cualquiera pueda opinar, descubrir y disfrutar del mundo Rockstar. Ya seas fan de toda la vida o estés empezando a conocerlo, acá siempre hay algo para vos. <br>¡Gracias por visitar y que empiece el viaje!</p>
        </div>
    </section>

    <section id="entradas" class="p-4 max-w-7xl mx-auto">
        <div class="text-center">
            <h2 class="text-3xl text-amber-500">Ultimas entradas</h2>
            <p class="text-white text-xl my-8">Aqui publicare todas las ultimas entradas publicadas semanalmente</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 text-white my-5">
            <?php 
            require_once("conexion.php");
            $sentencia = $conexion->query("SELECT * FROM entradastb, categoriastb WHERE entradastb.idCategoria = categoriastb.idCategoria ORDER BY fechaEntrada DESC LIMIT 3");

            $entradas = $sentencia->fetchAll(PDO::FETCH_ASSOC);

            foreach ($entradas as $fila) {
            ?>
            <div class="bg-neutral-900 rounded overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300">
                <img src="img/portadas/<?= $fila['portadaEntrada']; ?>" class="w-full h-64 object-cover" alt="Portada">
                <div class="p-4">
                    <div class="flex justify-between items-center mb-2">
                        <h3 class="text-amber-500 text-xl font-bold"><?= $fila['tituloEntrada']; ?></h3>
                        <h4 class="text-sm text-gray-400"><?= date('d/m/Y', strtotime($fila['fechaEntrada'])); ?></h4>
                    </div>
                    <h4 class="text-lg mb-2 text-gray-300">Categoría: <?= $fila['nombreCategoria']; ?></h4>
                    <p class="text-gray-200 mb-2"><?= substr($fila['contenidoEntrada'], 0, 150) ?>...</p>
                    <a href="detalleEntrada.php?idEntrada=<?= $fila['idEntrada']; ?>" class="text-blue-500 hover:text-amber-500 font-semibold">Ver más</a>
                </div>
            </div>
            <?php } ?>
        </div>
            
        <div class="flex justify-center mt-8">
            <a href="entradas.php" class="px-6 py-3 bg-amber-500 hover:bg-amber-600 text-black rounded font-semibold transition-colors duration-300">
                Ver todas las entradas
            </a>
        </div>


    </section>
</main>

<?php include_once('footer.php'); ?>