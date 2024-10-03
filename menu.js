// Toggle the mobile menu
const menuBtn = document.getElementById("menu-btn");
const mobileMenu = document.getElementById("mobile-menu");
const serviciosBtn = document.getElementById("servicios-btn");
const serviciosSubmenu = document.getElementById("servicios-submenu");
const nosotrosBtn = document.getElementById("nosotros-btn");
const nosotrosSubmenu = document.getElementById("nosotros-submenu");
const alumnosBtn = document.getElementById("alumnos-btn");
const alumnosSubmenu = document.getElementById("alumnos-submenu");
const normaBtn = document.getElementById("norma-btn");
const normaSubmenu = document.getElementById("norma-submenu");
const trnsBtn = document.getElementById("trns-btn");
const trnsSubmenu = document.getElementById("trns-submenu");

menuBtn.addEventListener("click", () => {
  mobileMenu.classList.toggle("hidden");
});

serviciosBtn?.addEventListener("click", () => {
  serviciosSubmenu.classList.toggle("hidden");
});

nosotrosBtn?.addEventListener("click", () => {
  nosotrosSubmenu.classList.toggle("hidden");
});

alumnosBtn?.addEventListener("click", () => {
  alumnosSubmenu.classList.toggle("hidden");
});

normaBtn?.addEventListener("click", () => {
  normaSubmenu.classList.toggle("hidden");
});

trnsBtn?.addEventListener("click", () => {
  trnsSubmenu.classList.toggle("hidden");
});
