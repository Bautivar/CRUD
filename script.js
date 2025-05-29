document.addEventListener("DOMContentLoaded", () => {
    const boton = document.getElementById("menu-btn");
        const menu = document.getElementById("mobile-menu");
        boton.addEventListener("click", () => {
          menu.classList.toggle("hidden");
        });
      });
      function borrado(idBorrado){
      let confirmacion = confirm("¿Estas seguro que quieres borrar la entrada con id " + idBorrado + " ?");
      if (confirmacion) {
        window.location = "eliminarEntrada.php?idEntrada=" + idBorrado;
      }
    }