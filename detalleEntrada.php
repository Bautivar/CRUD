<?php include_once('header.php'); ?><?php 
if (isset($_GET['idEntrada'])) {
    $idEntrada = $_GET['idEntrada'];
    $sentencia = $conexion->prepare("SELECT * FROM entradastb,categoriastb WHERE entradastb.idCategoria = categoriastb.idCategoria AND idEntrada = ?");
    $sentencia->execute([$idEntrada]);
    $entrada = $sentencia->fetch(PDO::FETCH_ASSOC);
}
?>

<main class="min-h-screen py-10 px-4 text-white">
    <section class="max-w-4xl mx-auto bg-neutral-900 rounded-lg overflow-hidden shadow-lg">
        <img src="img/portadas/<?= $entrada['portadaEntrada']; ?>" class="w-full h-80 object-cover" alt="" />

        <div class="p-6">
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-3xl font-bold text-amber-500"><?= $entrada['tituloEntrada']; ?></h1>
                <span class="text-sm text-gray-400"><?= date('d/m/Y', strtotime($entrada['fechaEntrada'])); ?></span>
            </div>

            <p class="text-lg mb-2 text-gray-300">Categoría: <?= $entrada['nombreCategoria']; ?></p>

            <article class="text-gray-200 leading-relaxed space-y-4 mt-4">
                <?= nl2br($entrada['contenidoEntrada']); ?>
            </article>

            <div class="mt-8 text-center">
                <a href="index.php" class="font-semibold px-6 py-2 bg-amber-500 text-black rounded hover:bg-amber-600 transition">
                    Volver al inicio
                </a>
            </div>
        </div>
    </section>
</main>

<?php include_once('footer.php'); ?>
