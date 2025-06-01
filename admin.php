<?php 
include_once('header.php'); 
require_once('functions.php');
verificarSesion();
?>
  <main id="main">
    <section id="admin" class="p-4 max-w-7xl min-h-[700px] mx-auto text-center">
      <h1 class="text-5xl uppercase text-amber-500">Panel de administrador</h1>
      <p class="font-semibold py-2 text-white mb-5">Aqui puedes agregar, modificar o eliminar entradas</p>

      <div class="overflow-x-auto">
  <div class="min-w-[800px]">
    <div class="grid grid-cols-7 gap-3 text-white border-2 border-white-500 p-3 items-center">
      <div class="p-2 text-amber-500 border-2 border-white-500">#Id</div>
      <div class="p-2 text-amber-500 border-2 border-white-500">Imagen</div>
      <div class="p-2 text-amber-500 border-2 border-white-500">Titulo</div>
      <div class="p-2 text-amber-500 border-2 border-white-500">Fecha</div>
      <div class="p-2 text-amber-500 border-2 border-white-500">Categoría</div>
      <div class="p-2 text-amber-500 border-2 border-white-500 col-span-2">Botones</div>

      <?php 
      $sentencia = $conexion->query("SELECT * FROM entradastb,categoriastb WHERE entradastb.idCategoria = categoriastb.idCategoria ORDER BY idEntrada ASC");
      $entradas = $sentencia->fetchAll(PDO::FETCH_ASSOC);
      foreach ($entradas as $fila) {
      ?>
        <div class="py-2"><?= $fila['idEntrada']; ?></div>
        <div class="py-2 justify-self-center"><img src="img/portadas/<?= $fila['portadaEntrada']; ?>" class="w-[100px]" alt=""></div>
        <div class="py-2"><?= $fila['tituloEntrada']; ?></div>
        <div class="py-2"><?= $fila['fechaEntrada']; ?></div>
        <div class="py-2"><?= $fila['nombreCategoria']; ?></div>
        <div><a class="p-3 bg-white text-black" href="modificarEntrada.php?idEntrada=<?= $fila['idEntrada']; ?>">Modificar</a></div>
        <div><a class="p-3 bg-red-600 text-black" href="#" onClick="borrado(<?= $fila['idEntrada']; ?>)">Eliminar</a></div>
      <?php } ?>
    </div>
    <div class="text-right mt-3">
      <a class="p-3 bg-amber-500 text-black inline-block" href="agregarEntrada.php">Agregar entrada</a>
    </div>
  </div>
</div>

      
    </section>
  </main>
  <?php include_once('footer.php'); ?>
