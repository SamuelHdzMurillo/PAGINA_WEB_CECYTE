/**
 * Navbar CECYTE BCS — componente central
 * Carga nav-menu.json y renderiza el navbar con rutas relativas según data-base.
 */
(function () {
  const root = document.getElementById("navbar-root");
  if (!root) return;

  const base = root.dataset.base || "";
  const variant = root.dataset.variant || "default";
  const isHome = variant === "home";

  function resolveHref(href) {
    if (!href || href.startsWith("http") || href.startsWith("#")) return href;
    return base + href;
  }

  function linkAttrs(item) {
    let attrs = "";
    if (item.target) attrs += ` target="${item.target}"`;
    if (item.rel) attrs += ` rel="${item.rel}"`;
    return attrs;
  }

  const CHEVRON = `<svg class="h-5 w-5 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>`;

  const HAMBURGER = `<svg class="h-6 w-6 transition-transform duration-300" stroke="currentColor" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>`;

  function renderDesktopChild(child) {
    if (child.type === "separator") {
      return `<div class="border-t border-gray-200 my-2"></div>`;
    }
    if (child.type === "heading") {
      return `<div class="px-4 py-2"><span class="text-sm font-semibold text-gray-500 uppercase tracking-wide">${child.label}</span></div>`;
    }
    const cls =
      child.label && child.label.length > 30
        ? "block py-2 px-4 text-gray-700 hover:bg-gray-100 transition-colors duration-200"
        : "block px-4 py-2 text-gray-700 hover:bg-gray-100 transition-colors duration-200";
    return `<a href="${resolveHref(child.href)}" class="${cls}"${linkAttrs(child)}>${child.label}</a>`;
  }

  function renderDesktopItem(item) {
    if (item.mobileOnly) return "";
    if (item.type === "link" || (!item.children && item.href !== "#")) {
      return `<a href="${resolveHref(item.href)}" class="text-gray-700 hover:text-green-600 px-2 py-4 rounded-md text-sm font-medium transition-colors duration-200 whitespace-nowrap">${item.label}</a>`;
    }
    const minW = item.dropdownMinW || "min-w-48";
    const children = (item.children || []).map(renderDesktopChild).join("");
    return `<div class="relative group">
      <a href="${resolveHref(item.href)}" class="text-gray-700 hover:text-green-600 px-2 py-4 rounded-md text-sm font-medium transition-colors duration-200 whitespace-nowrap">${item.label}</a>
      <div class="absolute hidden group-hover:block bg-white shadow-lg mt-2 rounded-md z-10 ${minW}">${children}</div>
    </div>`;
  }

  function renderMobileExtra(extra) {
    if (extra.type === "separator-green") {
      return `<div class="border-t-2 border-green-300 my-4 mx-6"></div>`;
    }
    if (extra.type === "heading-green") {
      const icon = extra.icon ? `<i class="${extra.icon} mr-2"></i>` : "";
      return `<div class="bg-green-100 px-6 py-3 mb-3 border-l-4 border-green-500"><span class="text-sm font-bold text-green-800 uppercase tracking-wide flex items-center">${icon}${extra.label}</span></div>`;
    }
    if (extra.type === "link-green") {
      return `<a href="${resolveHref(extra.href)}" class="block px-12 py-3 text-gray-700 hover:bg-green-50 hover:text-green-700 transition-colors duration-200 border-l-2 border-transparent hover:border-green-500 text-sm">${extra.label}</a>`;
    }
    return "";
  }

  function renderMobileLink(child) {
    return `<a href="${resolveHref(child.href)}" class="block px-8 py-3 text-gray-700 hover:bg-gray-100 transition-colors duration-200 text-sm"${linkAttrs(child)}>${child.label}</a>`;
  }

  function renderMobileItem(item) {
    if (item.type === "link" || (!item.children && item.href !== "#")) {
      return `<a href="${resolveHref(item.href)}" class="block px-6 py-4 text-gray-700 hover:bg-gray-50 hover:text-green-600 transition-colors duration-200 font-medium border-b border-gray-200">${item.label}</a>`;
    }
    const links = (item.children || [])
      .filter((c) => c.href)
      .map(renderMobileLink)
      .join("");
    const extras = (item.mobileExtras || []).map(renderMobileExtra).join("");
    const scrollStyle = item.mobileScrollable
      ? ' style="max-height: 80vh; overflow-y: auto"'
      : "";
    const submenuPy = item.id === "docentes" ? "" : " py-2";
    return `<div class="block border-b border-gray-200">
      <button class="w-full text-left text-gray-700 hover:text-green-600 hover:bg-gray-50 px-6 py-4 flex justify-between items-center focus:outline-none transition-colors duration-200 font-medium" id="${item.id}-btn">
        <span>${item.label}</span>${CHEVRON}
      </button>
      <div class="hidden bg-gray-50${submenuPy}" id="${item.id}-submenu"${scrollStyle}>${links}${extras}</div>
    </div>`;
  }

  function renderHomeBanner(menu) {
    if (!isHome) return "";
    const social = (menu.social || [])
      .map(
        (s) =>
          `<a href="${s.href}" target="_blank" class="text-white/80 hover:text-white hover:bg-white/10 px-2 py-1 rounded transition-all duration-200" title="${s.title}"><i class="${s.icon} text-sm"></i></a>`,
      )
      .join("");
    return `<section class="w-full bg-gray-500 text-white py-2 flex flex-col md:flex-row justify-center items-center gap-4">
        <h1 class="text-xl md:text-xl font-bold text-center">"${menu.motto}"</h1>
        <div class="flex items-center gap-1">${social}</div>
      </section>`;
  }

  function renderNavbar(menu) {
    const desktopItems = menu.items.map(renderDesktopItem).join("");
    const mobileItems = menu.items.map(renderMobileItem).join("");
    const banner = renderHomeBanner(menu);

    root.innerHTML = `<nav class="bg-white shadow-lg fixed top-0 left-0 w-full z-50">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
          <div class="flex-shrink-0 flex items-center">
            <a href="${resolveHref("index.html")}" class="cursor-pointer hover:opacity-80 transition-opacity duration-200" title="Ir a la página principal">
              <img src="${resolveHref("img_logos/logo_Cecyte_vertical_sin_fondo.png")}" alt="CECYTE BCS - Colegio de Estudios Científicos y Tecnológicos de Baja California Sur" class="h-12 w-auto" />
            </a>
          </div>
          <div class="flex items-center sm:hidden">
            <button id="menu-btn" class="text-gray-500 hover:text-gray-700 focus:outline-none focus:text-gray-700">${HAMBURGER}</button>
          </div>
          <div class="hidden sm:flex sm:items-center sm:ml-6 sm:space-x-2 lg:space-x-3 xl:space-x-4">${desktopItems}</div>
        </div>
      </div>
      <div class="sm:hidden hidden bg-white border-t border-gray-200 py-2 max-h-[90vh] overflow-y-auto" id="mobile-menu">${mobileItems}</div>
      <div class="w-full h-1 bg-orange-500"></div>
      ${banner}
    </nav>`;
  }

  function initMobileMenu() {
    const menuBtn = document.getElementById("menu-btn");
    const mobileMenu = document.getElementById("mobile-menu");
    if (!menuBtn || !mobileMenu) return;

    function rotateIcon(button, isOpen) {
      const icon = button.querySelector("svg");
      if (icon)
        icon.style.transform = isOpen ? "rotate(180deg)" : "rotate(0deg)";
    }

    function toggleSubmenu(button, submenu) {
      const isHidden = submenu.classList.contains("hidden");
      if (isHidden) {
        submenu.classList.remove("hidden");
        submenu.style.opacity = "0";
        submenu.style.maxHeight = "0";
        const scrollHeight = submenu.scrollHeight;
        const maxHeight = Math.min(scrollHeight + 20, 600);
        setTimeout(() => {
          submenu.style.transition = "opacity 0.3s ease, max-height 0.3s ease";
          submenu.style.opacity = "1";
          submenu.style.maxHeight = maxHeight + "px";
        }, 10);
        rotateIcon(button, true);
      } else {
        submenu.style.transition = "opacity 0.3s ease, max-height 0.3s ease";
        submenu.style.opacity = "0";
        submenu.style.maxHeight = "0";
        setTimeout(() => submenu.classList.add("hidden"), 300);
        rotateIcon(button, false);
      }
    }

    menuBtn.addEventListener("click", () => {
      const isHidden = mobileMenu.classList.contains("hidden");
      if (isHidden) {
        mobileMenu.classList.remove("hidden");
        mobileMenu.style.opacity = "0";
        mobileMenu.style.transform = "translateY(-10px)";
        setTimeout(() => {
          mobileMenu.style.transition =
            "opacity 0.3s ease, transform 0.3s ease";
          mobileMenu.style.opacity = "1";
          mobileMenu.style.transform = "translateY(0)";
        }, 10);
      } else {
        mobileMenu.style.transition = "opacity 0.3s ease, transform 0.3s ease";
        mobileMenu.style.opacity = "0";
        mobileMenu.style.transform = "translateY(-10px)";
        setTimeout(() => mobileMenu.classList.add("hidden"), 300);
      }
    });

    root.querySelectorAll("[id$='-btn']").forEach((btn) => {
      if (btn.id === "menu-btn") return;
      const submenuId = btn.id.replace("-btn", "-submenu");
      const submenu = document.getElementById(submenuId);
      if (submenu) {
        btn.addEventListener("click", () => toggleSubmenu(btn, submenu));
      }
    });

    document.addEventListener("click", (event) => {
      if (
        !mobileMenu.contains(event.target) &&
        !menuBtn.contains(event.target)
      ) {
        if (!mobileMenu.classList.contains("hidden")) {
          mobileMenu.style.transition =
            "opacity 0.3s ease, transform 0.3s ease";
          mobileMenu.style.opacity = "0";
          mobileMenu.style.transform = "translateY(-10px)";
          setTimeout(() => mobileMenu.classList.add("hidden"), 300);
        }
      }
    });

    window.addEventListener("resize", () => {
      if (window.innerWidth >= 640) mobileMenu.classList.add("hidden");
    });
  }

  fetch(resolveHref("components/nav-menu.json"))
    .then((res) => {
      if (!res.ok) throw new Error("No se pudo cargar nav-menu.json");
      return res.json();
    })
    .then((menu) => {
      renderNavbar(menu);
      initMobileMenu();
    })
    .catch((err) => {
      console.error("Error cargando navbar:", err);
      root.innerHTML = `<nav class="bg-white shadow-lg fixed top-0 left-0 w-full z-50"><div class="max-w-7xl mx-auto px-4 py-4"><a href="${resolveHref("index.html")}" class="text-green-700 font-medium">CECYTE BCS — Inicio</a></div></nav>`;
    });
})();
