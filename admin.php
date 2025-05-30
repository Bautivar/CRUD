<?php include_once('header.php'); ?>
<main id="main">
    <section id="admin" class="p-4 max-w-7xl mx-auto text-center">
        <h1 class="text-5xl uppercase text-amber-500">Panel de administrador</h1>
        <p class="font-semibold py-2 text-white mb-5">Aqui puedes hacer muchas funciones, tales como agregar entradas, modificar o eliminar</p>

        <div class="grid grid-cols-7 gap-3 text-white border-2 border-white-500 p-3 items-center">
          <div class="p-2 text-amber-500 border-2 border-white-500">#Id</div>
          <div class="p-2 text-amber-500 border-2 border-white-500">Imagen</div>
          <div class="p-2 text-amber-500 border-2 border-white-500">Titulo</div>
          <div class="p-2 text-amber-500 border-2 border-white-500">Fecha</div>
          <div class="p-2 text-amber-500 border-2 border-white-500">Categoría</div>
          <div class="p-2 bg-amber-500 text-black"><a href="agregarEntrada.php">Agregar entrada</a></div>
          <div></div>
          <?php 
          $sentencia = $conexion->query("SELECT * FROM entradastb,categoriastb WHERE entradastb.idCategoria = categoriastb.idCategoria ORDER BY idEntrada ASC");
          $entradas = $sentencia->fetchAll(PDO::FETCH_ASSOC);
          foreach ($entradas as $fila) {
          ?>
          <div class="py-2"><?= $fila['idEntrada']; ?></div>
          <div class="py-2 justify-self-center"><img src="img/portadas/<?= $fila['portadaEntrada']; ?>" class="w-[100px]" alt=""></div>
          <div class="py-2"><?= $fila['tituloEntrada']; ?></div>
          <div class="py-2"><?= $fila['fechEntrada']; ?></div>
          <div class="py-2"><?= $fila['nombreCategoria']; ?></div>
          <div class="p-2 bg-white text-black"><a href="modificarEntrada.php?idEntrada=<?= $fila['idEntrada']; ?>">Modificar entrada</a></div>
          <div class="p-2 bg-red-600 text-black eliminar"><a href="#" onClick="borrado(<?= $fila['idEntrada'] ;?>)">Eliminar entrada</a></div>
          <?php } ?>
        </div>
    </section>
</main>
<?php include_once('footer.php'); ?>