<?php include_once("header.php") ?>
<main id="main" class="bg-neutral-950 min-h-screen py-10 px-4 text-white">
  <section id="agregarEntrada" class="max-w-3xl mx-auto bg-neutral-900 p-8 rounded-lg shadow-lg">
    <h2 class="text-3xl font-bold text-amber-500 mb-6 text-center">Agregar nueva entrada</h2>
    
    <form action="#" method="post" enctype="multipart/form-data" class="space-y-6">
      <div>
        <label for="tituloEntrada" class="block text-sm font-semibold mb-1">Título</label>
        <input type="text" name="tituloEntrada" id="tituloEntrada" placeholder="Título de la entrada" maxlength="150" required
               class="w-full p-3 rounded bg-neutral-800 text-white focus:outline-none focus:ring-2 focus:ring-amber-500" />
      </div>

      <div>
        <label for="contenidoEntrada" class="block text-sm font-semibold mb-1">Contenido</label>
        <textarea name="contenidoEntrada" id="contenidoEntrada" rows="6" placeholder="Escribí el contenido..." required
                  class="w-full p-3 rounded bg-neutral-800 text-white focus:outline-none focus:ring-2 focus:ring-amber-500"></textarea>
      </div>

      <div class="flex flex-col md:flex-row gap-4">
        <div class="w-full">
          <label for="fechaEntrada" class="block text-sm font-semibold mb-1">Fecha</label>
          <input type="date" name="fechaEntrada" id="fechaEntrada"
                 class="w-full p-3 rounded bg-neutral-800 text-white focus:outline-none focus:ring-2 focus:ring-amber-500" />
        </div>

        <div class="w-full">
          <label for="portada" class="block text-sm font-semibold mb-1">Portada</label>
          <input type="file" name="portadaEntrada" id="portada" required
                 class="w-full file:bg-amber-500 file:text-black file:font-semibold file:px-4 file:py-2 file:rounded file:border-0 file:cursor-pointer bg-neutral-800 text-white" />
        </div>
      </div>

      <div>
        <label for="idCategoria" class="block text-sm font-semibold mb-1">Categoría</label>
        <select name="idCategoria" id="idCategoria"
                class="w-full p-3 rounded bg-neutral-800 text-white focus:outline-none focus:ring-2 focus:ring-amber-500">
          <option value="">Seleccioná una categoría</option>
          <!-- Aquí van las opciones PHP -->
        </select>
      </div>

      <div class="flex justify-between items-center mt-6">
        <input type="submit" value="Publicar entrada"
               class="px-6 py-3 bg-amber-500 text-black font-semibold rounded hover:bg-amber-600 transition" />
        <input type="reset" value="Limpiar"
               class="px-6 py-3 bg-gray-700 text-white font-semibold rounded hover:bg-gray-600 transition" />
      </div>
    </form>
  </section>
</main>

<?php include_once("footer.php") ?>