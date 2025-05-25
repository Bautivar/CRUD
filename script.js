document.addEventListener("DOMContentLoaded", () => {
    const boton = document.getElementById("menu-btn");
        const menu = document.getElementById("mobile-menu");
        boton.addEventListener("click", () => {
          menu.classList.toggle("hidden");
        });
});