<!doctype html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
  </head>
   <body class="font-sans bg-[#1f1f1f]">
    <header class="bg-black shadow-lg sticky top-0">
      <div class="max-w-7xl mx-auto p-4 flex justify-between items-center">

        <div class="flex items-center space-x-2">
          <a href="index.php"><img class="h-[50px] w-auto" src="img/logo.png" alt="Logo blog"></a>
        </div>

        <nav class="hidden md:flex space-x-6">
          <a href="index.php" class="text-white hover:bg-amber-500 p-2 rounded text-lg hover:text-black">Inicio</a>
          <a href="login.php" class="text-white hover:bg-amber-500 p-2 rounded text-lg hover:text-black">Iniciar sesión</a>
        </nav>

        <button id="menu-btn" class="md:hidden">
          <img src="img/hamburguesa.png" alt="Menú hamburguesa">
        </button>
      </div>

      <div id="mobile-menu" class="md:hidden hidden px-4 pb-4 space-y-2 bg-[#1f1f1f]">
        <a href="index.php" class="block text-white hover:bg-amber-500 p-2 rounded text-lg hover:text-black">Inicio</a>
        <a href="login.php" class="block text-white hover:bg-amber-500 p-2 rounded text-lg hover:text-black">Iniciar sesión</a>
      </div>
    </header>



    