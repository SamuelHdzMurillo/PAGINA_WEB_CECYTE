<?php
// Función para obtener la ruta base según la ubicación de la página
function getBasePath() {
    // Obtener la ruta del script actual
    $scriptPath = $_SERVER['SCRIPT_NAME'];
    
    // Debug: Mostrar información de la ruta
    $scriptDir = dirname($scriptPath);
    
    // Si estamos en el directorio raíz del proyecto PAGINA_WEB_CECYTE
    if ($scriptDir === '/' || $scriptDir === '' || $scriptDir === '.') {
        return 'PAGINA_WEB_CECYTE/';
    }
    
    // Contar cuántos niveles de directorio hay
    $pathParts = explode('/', trim($scriptDir, '/'));
    
    // Filtrar elementos vacíos
    $pathParts = array_filter($pathParts, function($part) {
        return !empty($part) && $part !== '.';
    });
    
    // Contar cuántos niveles hacia arriba necesitamos ir
    $levelsUp = count($pathParts);
    
    // Generar la ruta base incluyendo PAGINA_WEB_CECYTE
    $basePath = 'PAGINA_WEB_CECYTE/' . str_repeat('../', $levelsUp);
    
    return $basePath;
}

// Función para detectar si la página actual es PHP o HTML
function getFileExtension() {
    $scriptPath = $_SERVER['SCRIPT_NAME'];
    $extension = pathinfo($scriptPath, PATHINFO_EXTENSION);
    return strtolower($extension);
}

// Función para generar la ruta correcta - siempre HTML
function getCorrectPath($fileName) {
    $basePath = getBasePath();
    
    // Siempre usar .html para los enlaces
    return $basePath . $fileName . '.html';
}

// Función para generar rutas de subdirectorios - siempre HTML
function getCorrectSubPath($subDir, $fileName) {
    $basePath = getBasePath();
    
    // Siempre usar .html para los enlaces
    return $basePath . $subDir . '/' . $fileName . '.html';
}

$basePath = getBasePath();
$currentExtension = getFileExtension();

// Debug: Mostrar información de la ruta (solo para desarrollo)
if (isset($_GET['debug']) && $_GET['debug'] === '1') {
    echo "<!-- DEBUG INFO:\n";
    echo "SCRIPT_NAME: " . $_SERVER['SCRIPT_NAME'] . "\n";
    echo "SCRIPT_DIR: " . dirname($_SERVER['SCRIPT_NAME']) . "\n";
    echo "BASE_PATH: " . $basePath . "\n";
    echo "REQUEST_URI: " . $_SERVER['REQUEST_URI'] . "\n";
    echo "-->\n";
}
?>

<!-- Barra de navegación -->
<nav class="bg-white shadow-lg fixed top-0 left-0 w-full z-50">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between h-16">
      <!-- Logo -->
      <div class="flex-shrink-0 flex items-center">
        <a href="<?php echo $basePath; ?>index.php">
          <img
            src="<?php echo $basePath; ?>img_logos/logo_Cecyte_vertical_sin_fondo.png"
            alt="CECYTE BCS - Colegio de Estudios Científicos y Tecnológicos de Baja California Sur"
            class="h-12 w-auto"
          />
        </a>
      </div>
      
      <!-- Botón de menú móvil -->
      <div class="flex items-center sm:hidden">
        <button
          id="menu-btn"
          class="text-gray-500 hover:text-gray-700 focus:outline-none focus:text-gray-700"
        >
          <svg
            class="h-6 w-6 transition-transform duration-300"
            stroke="currentColor"
            fill="none"
            viewBox="0 0 24 24"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M4 6h16M4 12h16m-7 6h7"
            ></path>
          </svg>
        </button>
      </div>

      <!-- Enlaces de navegación -->
      <div class="hidden sm:flex sm:items-center sm:ml-6">
        <!-- Menú Docentes -->
        <div class="relative group">
          <a
            href="#"
            class="text-gray-700 hover:text-green-600 px-8 py-5 rounded-md text-sm font-medium"
            >Docentes</a
          >
          <div
            class="absolute hidden group-hover:block bg-white shadow-lg mt-2 rounded-md z-10"
          >
            <a
              href="<?php echo $basePath; ?>pages_institucion/ubica_tu_plantel.php"
              class="block px-4 py-2 text-gray-700 hover:bg-gray-100"
              >Convocatorias</a
            >
            <a
              href="https://sites.google.com/cecytebcs.edu.mx/orientacionespej23/inicio?authuser=0"
              class="block px-4 py-2 text-gray-700 hover:bg-gray-100"
              >Centro Virtual 2024-2025</a
            >
          </div>
        </div>

        <!-- Menú Institución -->
        <div class="relative group">
          <a
            href="#"
            class="text-gray-700 hover:text-green-600 px-5 py-5 rounded-md text-sm font-medium"
            >Institución</a
          >
          <div
            class="absolute hidden group-hover:block bg-white shadow-lg mt-2 rounded-md z-10"
          >
            <a
              href="<?php echo $basePath; ?>pages_institucion/pagina_historia.php"
              class="block px-4 py-2 text-gray-700 hover:bg-gray-100"
              >Historia, Misión y Visión</a
            >
            <a
              href="<?php echo $basePath; ?>pages_institucion/planteles_cecyte.php"
              class="block px-4 py-2 text-gray-700 hover:bg-gray-100"
              >Planteles CecyteBCS</a
            >
            <a
              href="<?php echo $basePath; ?>pages_institucion/planteles_emsad.php"
              class="block px-4 py-2 text-gray-700 hover:bg-gray-100"
              >Planteles Emsad</a
            >
            <a
              href="<?php echo $basePath; ?>directorio_telefonico.php"
              class="block px-4 py-2 text-gray-700 hover:bg-gray-100"
              >Directorio Telefónico</a
            >
          </div>
        </div>

        <!-- Menú Oferta Educativa -->
        <div class="relative group">
          <a
            href="<?php echo $basePath; ?>oferta_educativa.php"
            class="text-gray-700 hover:text-green-600 px-5 py-5 rounded-md text-sm font-medium"
            >Oferta Educativa</a
          >
          <div
            class="absolute hidden group-hover:block bg-white shadow-lg mt-2 rounded-md"
          >
            <a
              href="<?php echo $basePath; ?>pages_oferta_educativa/mantenimiento_equipo_de_computo.php"
              class="block py-2 px-4 text-gray-700 hover:bg-gray-100"
              >Soporte y Mantenimiento de equipo de cómputo</a
            >
            <a
              href="<?php echo $basePath; ?>pages_oferta_educativa/programacion.php"
              class="block py-2 px-4 text-gray-700 hover:bg-gray-100"
              >Programación</a
            >
            <a
              href="<?php echo $basePath; ?>pages_oferta_educativa/ventas.php"
              class="block py-2 px-4 text-gray-700 hover:bg-gray-100"
              >Ventas</a
            >
            <a
              href="<?php echo $basePath; ?>pages_oferta_educativa/ecoturismo.php"
              class="block py-2 px-4 text-gray-700 hover:bg-gray-100"
              >Ecoturismo</a
            >
            <a
              href="<?php echo $basePath; ?>pages_oferta_educativa/produccion_industrial_de_alimentos.php"
              class="block py-2 px-4 text-gray-700 hover:bg-gray-100"
              >Producción industrial de alimentos</a
            >
            <a
              href="<?php echo $basePath; ?>pages_oferta_educativa/mantenimiento_industrial.php"
              class="block py-2 px-4 text-gray-700 hover:bg-gray-100"
              >Mantenimiento Industrial</a
            >
            <a
              href="<?php echo $basePath; ?>pages_oferta_educativa/servicios_de_hoteleria.php"
              class="block py-2 px-4 text-gray-700 hover:bg-gray-100"
              >Servicios de Hotelería</a
            >
          </div>
        </div>

        <!-- Menú Alumnos -->
        <div class="relative group">
          <a
            href="#"
            class="text-gray-700 hover:text-green-600 px-5 py-5 rounded-md text-sm font-medium"
            >Alumnos</a
          >
          <div
            class="absolute hidden group-hover:block bg-white shadow-lg mt-2 rounded-md"
          >
            <a
              href="<?php echo $basePath; ?>pages_alumnos/becas.php"
              class="block py-2 px-4 text-gray-700 hover:bg-gray-100"
              >Becas</a
            >
            <a
              href="<?php echo $basePath; ?>pages_alumnos/prog_acompanamiento.php"
              class="block py-2 px-4 text-gray-700 hover:bg-gray-100"
              >Programa de Acompañamiento</a
            >
            <a
              href="<?php echo $basePath; ?>pages_alumnos/requisitos_de_ingreso.php"
              class="block py-2 px-4 text-gray-700 hover:bg-gray-100"
              >Requisitos de Ingreso</a
            >
            <a
              href="https://drive.google.com/file/d/143LGPrFHMY_bS4odyrRyx5EuxEjoytEC/view?usp=drive_link"
              class="block py-2 px-4 text-gray-700 hover:bg-gray-100"
              >Reglamento de Escolaridad CECYTE BCS</a
            >
            <a
              href="https://drive.google.com/file/d/1ewSW14CPvRKedEoxHU2wB4f_yx7WGZjM/view?usp=drive_link"
              class="block py-2 px-4 text-gray-700 hover:bg-gray-100"
              >Reglamento Asociaciones de Padres y Madres de Familia CECYTE BCS</a
            >
          </div>
        </div>

        <!-- Menú Normatividad -->
        <div class="relative group">
          <a
            href="#"
            class="text-gray-700 hover:text-green-600 px-5 py-5 rounded-md text-sm font-medium"
            >Normatividad</a
          >
          <div
            class="absolute hidden group-hover:block bg-white shadow-lg mt-2 rounded-md"
          >
            <a
              href="<?php echo $basePath; ?>pages_normatividad/manuales_de_procedimientos.php"
              class="block py-2 px-4 text-gray-700 hover:bg-gray-100"
              >Manuales de Procedimientos</a
            >
            <a
              href="<?php echo $basePath; ?>pages_normatividad/manuales_de_org.php"
              class="block py-2 px-4 text-gray-700 hover:bg-gray-100"
              >Manuales de Organización</a
            >
            <a
              href="https://drive.google.com/file/d/1k8AwVEAeVoe7URFcN2N2tcElsEYJRgtW/view?usp=sharing"
              class="block py-2 px-4 text-gray-700 hover:bg-gray-100"
              >Reglamento Interno</a
            >
            <a
              href="https://www.gob.mx/cms/uploads/attachment/file/560393/CODIGO_DE_ETICA.pdf"
              class="block py-2 px-4 text-gray-700 hover:bg-gray-100"
              >Codigo de etica</a
            >
            <a
              href="https://drive.google.com/file/d/13m142kMwEJ6hj8xaDJXu-XdA-jAkO9jb/view?usp=sharing"
              class="block py-2 px-4 text-gray-700 hover:bg-gray-100"
              >Código de Conducta</a
            >
            <a
              href="https://drive.google.com/file/d/1lIJBD8IXxHcM3hwp7v3VmG2X1EJZXKnG/view?usp=sharing"
              class="block py-2 px-4 text-gray-700 hover:bg-gray-100"
              >Protocolo de Seguridad</a
            >
            <a
              href="https://drive.google.com/file/d/1g3kR6hG8EnDKR-mNqczA9tI48ijncxSF/view?usp=sharing"
              class="block py-2 px-4 text-gray-700 hover:bg-gray-100"
              >Decreto de Creación</a
            >
          </div>
        </div>

        <!-- Menú Transparencia -->
        <div class="relative group">
          <a
            href="https://transparencia.cecytebcs.edu.mx/"
            class="text-gray-700 hover:text-green-600 px-5 py-5 rounded-md text-sm font-medium"
            >Transparencia</a
          >
          <div
            class="absolute hidden group-hover:block bg-white shadow-lg mt-2 rounded-md"
          >
            <a
              href="https://transparencia.cecytebcs.edu.mx/informacion-publica/articulo-75"
              class="block py-2 px-4 text-gray-700 hover:bg-gray-100"
              >Artículo 75</a
            >
            <a
              href="<?php echo $basePath; ?>pages_transparencia/cuenta_publica.php"
              class="block py-2 px-4 text-gray-700 hover:bg-gray-100"
              >Cuenta Pública</a
            >
            <a
              href="<?php echo $basePath; ?>pages_transparencia/ley_diciplina.php"
              class="block py-2 px-4 text-gray-700 hover:bg-gray-100"
              >Ley de Disciplina Financiera</a
            >
          </div>
        </div>

        <!-- Menú Comunidad -->
        <a
          href="<?php echo $basePath; ?>comunidad.php"
          class="text-gray-700 hover:text-green-600 px-5 py-5 rounded-md text-sm font-medium"
          >CECYTE es Comunidad</a
        >
      </div>
    </div>
  </div>

  <!-- Menú móvil -->
  <div class="sm:hidden hidden" id="mobile-menu">
    <!-- Docentes Menu -->
    <div class="block">
      <button
        class="w-full text-left text-gray-700 hover:text-green-600 px-4 py-2 flex justify-between items-center focus:outline-none"
        id="docentes-btn"
      >
        Docentes
        <svg
          class="h-5 w-5"
          fill="none"
          stroke="currentColor"
          viewBox="0 0 24 24"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M19 9l-7 7-7-7"
          ></path>
        </svg>
      </button>
      <div class="hidden" id="docentes-submenu">
        <a
          href="<?php echo $basePath; ?>pages_institucion/"
          class="block px-8 py-2 text-gray-700 hover:bg-gray-100"
          >Convocatorias</a
        >
        <a
          href="https://sites.google.com/cecytebcs.edu.mx/orientacionespej23/inicio?authuser=0"
          class="block px-8 py-2 text-gray-700 hover:bg-gray-100"
          >Centro Virtual 2024-2025</a
        >
      </div>
    </div>

    <!-- Institución Menu -->
    <div class="block">
      <button
        class="w-full text-left text-gray-700 hover:text-green-600 px-4 py-2 flex justify-between items-center focus:outline-none"
        id="institucion-btn"
      >
        Institución
        <svg
          class="h-5 w-5"
          fill="none"
          stroke="currentColor"
          viewBox="0 0 24 24"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M19 9l-7 7-7-7"
          ></path>
        </svg>
      </button>
      <div class="hidden" id="institucion-submenu">
        <a
          href="<?php echo $basePath; ?>pages_institucion/pagina_historia.php"
          class="block px-8 py-2 text-gray-700 hover:bg-gray-100"
          >Historia, Misión y Visión</a
        >
        <a
          href="<?php echo $basePath; ?>pages_institucion/planteles_cecyte.php"
          class="block px-8 py-2 text-gray-700 hover:bg-gray-100"
          >Planteles CecyteBCS</a
        >
        <a
          href="<?php echo $basePath; ?>pages_institucion/planteles_emsad.php"
          class="block px-8 py-2 text-gray-700 hover:bg-gray-100"
          >Planteles Emsad</a
        >
        <a
          href="<?php echo $basePath; ?>directorio_telefonico.php"
          class="block px-8 py-2 text-gray-700 hover:bg-gray-100"
          >Directorio Telefónico</a
        >
      </div>
    </div>

    <!-- Oferta Educativa Menu -->
    <div class="block">
      <button
        class="w-full text-left text-gray-700 hover:text-green-600 px-4 py-2 flex justify-between items-center focus:outline-none"
        id="oferta-btn"
      >
        Oferta Educativa
        <svg
          class="h-5 w-5"
          fill="none"
          stroke="currentColor"
          viewBox="0 0 24 24"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M19 9l-7 7-7-7"
          ></path>
        </svg>
      </button>
      <div class="hidden" id="oferta-submenu">
        <a
          href="<?php echo $basePath; ?>pages_oferta_educativa/mantenimiento_equipo_de_computo.php"
          class="block px-8 py-2 text-gray-700 hover:bg-gray-100"
          >Soporte y Mantenimiento de equipo de cómputo</a
        >
        <a
          href="<?php echo $basePath; ?>pages_oferta_educativa/programacion.php"
          class="block px-8 py-2 text-gray-700 hover:bg-gray-100"
          >Programación</a
        >
        <a
          href="<?php echo $basePath; ?>pages_oferta_educativa/ventas.php"
          class="block px-8 py-2 text-gray-700 hover:bg-gray-100"
          >Ventas</a
        >
        <a
          href="<?php echo $basePath; ?>pages_oferta_educativa/ecoturismo.php"
          class="block px-8 py-2 text-gray-700 hover:bg-gray-100"
          >Ecoturismo</a
        >
        <a
          href="<?php echo $basePath; ?>pages_oferta_educativa/produccion_industrial_de_alimentos.php"
          class="block px-8 py-2 text-gray-700 hover:bg-gray-100"
          >Producción industrial de alimentos</a
        >
        <a
          href="<?php echo $basePath; ?>pages_oferta_educativa/mantenimiento_industrial.php"
          class="block px-8 py-2 text-gray-700 hover:bg-gray-100"
          >Mantenimiento Industrial</a
        >
        <a
          href="<?php echo $basePath; ?>pages_oferta_educativa/servicios_de_hoteleria.php"
          class="block px-8 py-2 text-gray-700 hover:bg-gray-100"
          >Servicios de Hotelería</a
        >
      </div>
    </div>

    <!-- Alumnos Menu -->
    <div class="block">
      <button
        class="w-full text-left text-gray-700 hover:text-green-600 px-4 py-2 flex justify-between items-center focus:outline-none"
        id="alumnos-btn"
      >
        Alumnos
        <svg
          class="h-5 w-5"
          fill="none"
          stroke="currentColor"
          viewBox="0 0 24 24"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M19 9l-7 7-7-7"
          ></path>
        </svg>
      </button>
      <div class="hidden" id="alumnos-submenu">
        <a
          href="<?php echo $basePath; ?>pages_alumnos/becas.php"
          class="block px-8 py-2 text-gray-700 hover:bg-gray-100"
          >Becas</a
        >
        <a
          href="<?php echo $basePath; ?>pages_alumnos/prog_acompanamiento.php"
          class="block px-8 py-2 text-gray-700 hover:bg-gray-100"
          >Programa de Acompañamiento</a
        >
        <a
          href="<?php echo $basePath; ?>pages_alumnos/requisitos_de_ingreso.php"
          class="block px-8 py-2 text-gray-700 hover:bg-gray-100"
          >Requisitos de Ingreso</a
        >
        <a
          href="https://drive.google.com/file/d/143LGPrFHMY_bS4odyrRyx5EuxEjoytEC/view?usp=drive_link"
          class="block px-8 py-2 text-gray-700 hover:bg-gray-100"
          >Reglamento de Escolaridad CECYTE BCS</a
        >
        <a
          href="https://drive.google.com/file/d/1ewSW14CPvRKedEoxHU2wB4f_yx7WGZjM/view?usp=drive_link"
          class="block px-8 py-2 text-gray-700 hover:bg-gray-100"
          >Reglamento Asociaciones de Padres y Madres de Familia CECYTE BCS</a
        >
      </div>
    </div>

    <!-- Normatividad Menu -->
    <div class="block">
      <button
        class="w-full text-left text-gray-700 hover:text-green-600 px-4 py-2 flex justify-between items-center focus:outline-none"
        id="normatividad-btn"
      >
        Normatividad
        <svg
          class="h-5 w-5"
          fill="none"
          stroke="currentColor"
          viewBox="0 0 24 24"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M19 9l-7 7-7-7"
          ></path>
        </svg>
      </button>
      <div class="hidden" id="normatividad-submenu">
        <a
          href="<?php echo $basePath; ?>pages_normatividad/manuales_de_procedimientos.php"
          class="block px-8 py-2 text-gray-700 hover:bg-gray-100"
          >Manuales de Procedimientos</a
        >
        <a
          href="<?php echo $basePath; ?>pages_normatividad/manuales_de_org.php"
          class="block px-8 py-2 text-gray-700 hover:bg-gray-100"
          >Manuales de Organización</a
        >
        <a
          href="https://drive.google.com/file/d/1k8AwVEAeVoe7URFcN2N2tcElsEYJRgtW/view?usp=sharing"
          class="block px-8 py-2 text-gray-700 hover:bg-gray-100"
          >Reglamento Interno</a
        >
        <a
          href="https://www.gob.mx/cms/uploads/attachment/file/560393/CODIGO_DE_ETICA.pdf"
          class="block px-8 py-2 text-gray-700 hover:bg-gray-100"
          >Codigo de etica</a
        >
        <a
          href="https://drive.google.com/file/d/13m142kMwEJ6hj8xaDJXu-XdA-jAkO9jb/view?usp=sharing"
          class="block px-8 py-2 text-gray-700 hover:bg-gray-100"
          >Código de Conducta</a
        >
        <a
          href="https://drive.google.com/file/d/1lIJBD8IXxHcM3hwp7v3VmG2X1EJZXKnG/view?usp=sharing"
          class="block px-8 py-2 text-gray-700 hover:bg-gray-100"
          >Protocolo de Seguridad</a
        >
        <a
          href="https://drive.google.com/file/d/1g3kR6hG8EnDKR-mNqczA9tI48ijncxSF/view?usp=sharing"
          class="block px-8 py-2 text-gray-700 hover:bg-gray-100"
          >Decreto de Creación</a
        >
      </div>
    </div>

    <!-- Transparencia Menu -->
    <div class="block">
      <button
        class="w-full text-left text-gray-700 hover:text-green-600 px-4 py-2 flex justify-between items-center focus:outline-none"
        id="transparencia-btn"
      >
        Transparencia
        <svg
          class="h-5 w-5"
          fill="none"
          stroke="currentColor"
          viewBox="0 0 24 24"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M19 9l-7 7-7-7"
          ></path>
        </svg>
      </button>
      <div class="hidden" id="transparencia-submenu">
        <a
          href="https://transparencia.cecytebcs.edu.mx/informacion-publica/articulo-75"
          class="block px-8 py-2 text-gray-700 hover:bg-gray-100"
          >Artículo 75</a
        >
        <a
          href="<?php echo $basePath; ?>pages_transparencia/cuenta_publica.php"
          class="block px-8 py-2 text-gray-700 hover:bg-gray-100"
          >Cuenta Pública</a
        >
        <a
          href="<?php echo $basePath; ?>pages_transparencia/ley_diciplina.php"
          class="block px-8 py-2 text-gray-700 hover:bg-gray-100"
          >Ley de Disciplina Financiera</a
        >
      </div>
    </div>

    <!-- Comunidad -->
    <a
      href="<?php echo $basePath; ?>comunidad.php"
      class="block px-4 py-2 text-gray-700 hover:bg-gray-100"
      >CECYTE es Comunidad</a
    >
  </div>
</nav>

<!-- Script para el menú móvil -->
<script>
// Variables de navegación móvil
const menuBtn = document.getElementById("menu-btn");
const mobileMenu = document.getElementById("mobile-menu");
const docentesBtn = document.getElementById("docentes-btn");
const docentesSubmenu = document.getElementById("docentes-submenu");
const institucionBtn = document.getElementById("institucion-btn");
const institucionSubmenu = document.getElementById("institucion-submenu");
const ofertaBtn = document.getElementById("oferta-btn");
const ofertaSubmenu = document.getElementById("oferta-submenu");
const alumnosBtn = document.getElementById("alumnos-btn");
const alumnosSubmenu = document.getElementById("alumnos-submenu");
const normatividadBtn = document.getElementById("normatividad-btn");
const normatividadSubmenu = document.getElementById("normatividad-submenu");
const transparenciaBtn = document.getElementById("transparencia-btn");
const transparenciaSubmenu = document.getElementById("transparencia-submenu");

// Toggle del menú móvil principal
menuBtn.addEventListener("click", () => {
  mobileMenu.classList.toggle("hidden");
});

// Toggle de submenús
docentesBtn.addEventListener("click", () => {
  docentesSubmenu.classList.toggle("hidden");
});

institucionBtn.addEventListener("click", () => {
  institucionSubmenu.classList.toggle("hidden");
});

ofertaBtn.addEventListener("click", () => {
  ofertaSubmenu.classList.toggle("hidden");
});

alumnosBtn.addEventListener("click", () => {
  alumnosSubmenu.classList.toggle("hidden");
});

normatividadBtn.addEventListener("click", () => {
  normatividadSubmenu.classList.toggle("hidden");
});

transparenciaBtn.addEventListener("click", () => {
  transparenciaSubmenu.classList.toggle("hidden");
});
</script>
