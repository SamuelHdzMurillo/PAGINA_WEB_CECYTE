/**
 * Widget de accesibilidad CECYTE BCS
 * Carga el menú desde accessibility-widget/core/ con rutas relativas según data-base.
 */
(function () {
  const mount = document.getElementById("a11y-widget-root");
  if (!mount || mount.dataset.a11yLoaded === "true") return;

  const base = mount.dataset.base || "";
  const assetBase = `${base}accessibility-widget/core/`;

  window.AccessibilityWidgetConfig = Object.assign(
    {},
    window.AccessibilityWidgetConfig || {},
    {
      storageKey: "cecytebcs-accessibility-settings",
      logoSrc: `${base}img_logos/logo_Cecyte_vertical_sin_fondo.png`,
      logoAlt: "Logotipo CECYTE BCS",
      speechLang: "es-MX",
      labels: {
        eyebrow: "Accesibilidad",
        title: "Opciones de accesibilidad",
      },
    }
  );

  if (!document.getElementById("a11y-widget-css")) {
    const link = document.createElement("link");
    link.id = "a11y-widget-css";
    link.rel = "stylesheet";
    link.href = `${assetBase}assets/css/accessibility.css`;
    document.head.appendChild(link);
  }

  const loadModule = () => {
    if (document.querySelector('script[data-a11y-module="true"]')) return;

    const script = document.createElement("script");
    script.type = "module";
    script.src = `${assetBase}assets/js/index.js`;
    script.dataset.a11yModule = "true";
    document.body.appendChild(script);
  };

  fetch(`${assetBase}accessibility-menu.html`)
    .then((res) => {
      if (!res.ok) throw new Error("No se pudo cargar accessibility-menu.html");
      return res.text();
    })
    .then((html) => {
      mount.insertAdjacentHTML("beforebegin", html);
      mount.dataset.a11yLoaded = "true";
      loadModule();
    })
    .catch((err) => {
      console.error("Error cargando widget de accesibilidad:", err);
    });
})();
