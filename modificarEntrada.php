<?php include_once('header.php');
require_once('functions.php');
verificarSesion();

if (isset($_GET['idEntrada'])) {
    $idEntrada = $_GET['idEntrada'];
    $sentencia = $conexion->prepare("SELECT * FROM entradastb,categoriastb WHERE entradastb.idCategoria = categoriastb.idCategoria AND idEntrada = ?");
    $sentencia->execute([$idEntrada]);
    $entrada = $sentencia->fetch(PDO::FETCH_ASSOC);
}

$sentencia1 = $conexion->query('SELECT * FROM categoriastb ORDER BY idCategoria ASC');
$categorias = $sentencia1->fetchAll(PDO::FETCH_ASSOC);

if (isset($_POST['enviar'])) {
  modificarEntrada($conexion,$_POST['tituloEntrada'],$_POST['contenidoEntrada'],date('Y/m/d'),$_POST['idCategoria'],$idEntrada,$_FILES['portadaEntrada'],$entrada['portadaEntrada']);
}
?>
<main id="main" class="bg-neutral-950 min-h-screen py-10 px-4 text-white">
  <section id="modificarEntrada" class="max-w-3xl mx-auto bg-neutral-900 p-8 rounded-lg shadow-lg">
    <h2 class="text-4xl font-bold mb-6 text-center text-amber-500">Agregar nueva entrada</h2>
    
    <form action="#" method="post" enctype="multipart/form-data">
        <div>
          <label for="tituloEntrada" class="block text-sm font-semibold m-1">Título</label>
          <input type="text" name="tituloEntrada" value="<?= $entrada['tituloEntrada'];?>" id="tituloEntrada" placeholder="Título de la entrada" maxlength="150" class="w-full p-3 rounded bg-neutral-800 focus:outline-none focus:ring-2 focus:ring-amber-500" />
        </div>  

        <div>
          <label for="contenidoEntrada" class="block text-sm font-semibold m-1">Contenido</label>
          <textarea name="contenidoEntrada" id="contenidoEntrada" rows="6" placeholder="Escribe el contenido" class="w-full p-3 rounded bg-neutral-800 focus:outline-none focus:ring-2 focus:ring-amber-500"><?= $entrada['contenidoEntrada'];?></textarea>
        </div>  

        <div>
            <label for="portadaAnterior" class="block text-sm font-semibold m-1">Imagen original</label>
            <input type="image" class="h-64 w-96" id="portadaAnterior" src="img/portadas/<?=$entrada['portadaEntrada'];?>" alt="">  
        </div>

        <div class="flex flex-col gap-4">
          <div class="w-full flex items-end text-center">
            <label for="portada" class="w-full px-6 py-3 text-black font-semibold rounded bg-amber-500 hover:bg-amber-600 transition">Modificar portada</label>
            <input type="file" name="portadaEntrada" id="portada" class="hidden" />
          </div>
        </div>  

        <div>
          <label for="idCategoria" class="block text-sm font-semibold m-1">Categoría</label>
          <select name="idCategoria" id="idCategoria" class="w-full p-3 rounded bg-neutral-800 focus:outline-none focus:ring-2 focus:ring-amber-500">
            <?php foreach ($categorias as $categoria) { 
                  if ($categoria['idCategoria'] === $entrada['idCategoria']) {?>        
                  <option value="<?= $categoria['idCategoria']; ?>" selected> <?= $categoria['nombreCategoria']; ?></option>    
                  <?php }else {?>   
                      <option value="<?= $categoria['idCategoria']; ?>"> <?= $categoria['nombreCategoria']; ?></option> 
                  <?php };?>    
            <?php }; ?>
          </select>
        </div>  

        <div class="flex justify-between items-center mt-4">
          <input type="submit" value="Modificar entrada" name="enviar" class="px-6 py-3 bg-amber-500 text-black font-semibold rounded hover:bg-amber-600 transition" />
          <input type="reset" value="Limpiar" name="limpiar" class="px-6 py-3 bg-gray-700 font-semibold rounded hover:bg-gray-600 transition" />
        </div>
    </form>
  </section>
</main>

<?php include_once('footer.php'); ?><?php 