<?php include_once('header.php');?>
<?php 
if ($_GET['idEntrada']) {
    require_once('conexion.php');
    $idEntrada = $_GET['idEntrada'];
    $sentencia = $conexion->prepare("SELECT * FROM entradastb,categoriastb WHERE entradastb.idCategoria = categoriastb.idCategoria AND idEntrada = ?");

    $sentencia->execute([$idEntrada]);
    $entrada = $sentencia->fetch(PDO::FETCH_ASSOC);
}
?>
<main id="main">
    <section id="entrada" class="p-4 max-w-lg mx-auto text-white"> 
        <div>
            <img src="img/portadas/<?= $entrada['portadaEntrada']; ?>" class="h-64 object-cover" alt="">
            <h3 class="text-amber-600 text-xl"><?= $entrada['tituloEntrada']; ?></h3>
            <p><?= $entrada['contenidoEntrada']; ?><p>
        </div>
    </section>
</main>
<?php include_once('footer.php');?>