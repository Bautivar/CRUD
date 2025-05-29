<?php include_once('header.php'); ?>
<section id="opinion" class="p-4 max-w-7xl mx-auto">
    <div class="text-center">
        <h2 class="text-3xl text-amber-500">Todas las entradas</h2>
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
</section>
<?php include_once('footer.php'); ?>