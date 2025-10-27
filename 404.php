<!DOCTYPE html>
<html lang="es">
  <head>
    <!-- Meta tags básicos -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- SEO Meta Tags -->
    <title>Error 404 - Página no encontrada | CECYTE BCS</title>
    <meta
      name="description"
      content="La página que buscas no existe. Regresa al sitio principal de CECYTE BCS para encontrar la información que necesitas."
    />
    <meta name="robots" content="noindex, nofollow" />

    <!-- Favicon -->
    <link
      rel="icon"
      type="image/png"
      href="img_logos/logo_Cecyte_vertical_sin_fondo.png"
    />

    <!-- Estilos y fuentes -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap"
      rel="stylesheet"
    />

    <!-- Librerías y frameworks -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    />
    <link
      href="https://unpkg.com/flowbite@^2.1/dist/flowbite.min.css"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    />
    <script src="https://unpkg.com/flowbite@^2.1/dist/flowbite.min.js"></script>

    <style>
      .error-animation {
        animation: bounce 2s infinite;
      }

      @keyframes bounce {
        0%,
        20%,
        50%,
        80%,
        100% {
          transform: translateY(0);
        }
        40% {
          transform: translateY(-30px);
        }
        60% {
          transform: translateY(-15px);
        }
      }

      .fade-in {
        animation: fadeIn 1s ease-in;
      }

      @keyframes fadeIn {
        from {
          opacity: 0;
          transform: translateY(20px);
        }
        to {
          opacity: 1;
          transform: translateY(0);
        }
      }

      .gradient-bg {
        background: linear-gradient(
          135deg,
          #107926 0%,
          #278a2a 50%,
          #f97316 100%
        );
      }
    </style>
  </head>

  <body>
    <!-- Barra de navegación -->
    <nav class="bg-white shadow-lg fixed top-0 left-0 w-full z-50">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
          <!-- Logo -->
          <div class="flex-shrink-0 flex items-center">
            <a href="index.php">
              <img
                src="img_logos/logo_Cecyte_vertical_sin_fondo.png"
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
                  href="pages_institucion/ubica_tu_plantel.php"
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
                  href="pages_institucion/pagina_historia.php"
                  class="block px-4 py-2 text-gray-700 hover:bg-gray-100"
                  >Historia, Misión y Visión</a
                >
                <a
                  href="pages_institucion/planteles_cecyte.php"
                  class="block px-4 py-2 text-gray-700 hover:bg-gray-100"
                  >Planteles CecyteBCS</a
                >
                <a
                  href="pages_institucion/planteles_emsad.php"
                  class="block px-4 py-2 text-gray-700 hover:bg-gray-100"
                  >Planteles Emsad</a
                >
                <a
                  href="directorio_telefonico.php"
                  class="block px-4 py-2 text-gray-700 hover:bg-gray-100"
                  >Directorio Telefónico</a
                >
              </div>
            </div>

            <!-- Menú Oferta Educativa -->
            <div class="relative group">
              <a
                href="oferta_educativa.php"
                class="text-gray-700 hover:text-green-600 px-5 py-5 rounded-md text-sm font-medium"
                >Oferta Educativa</a
              >
              <div
                class="absolute hidden group-hover:block bg-white shadow-lg mt-2 rounded-md"
              >
                <a
                  href="pages_oferta_educativa/mantenimiento_equipo_de_computo.php"
                  class="block py-2 px-4 text-gray-700 hover:bg-gray-100"
                  >Soporte y Mantenimiento de equipo de cómputo</a
                >
                <a
                  href="pages_oferta_educativa/programacion.php"
                  class="block py-2 px-4 text-gray-700 hover:bg-gray-100"
                  >Programación</a
                >
                <a
                  href="pages_oferta_educativa/ventas.php"
                  class="block py-2 px-4 text-gray-700 hover:bg-gray-100"
                  >Ventas</a
                >
                <a
                  href="pages_oferta_educativa/ecoturismo.php"
                  class="block py-2 px-4 text-gray-700 hover:bg-gray-100"
                  >Ecoturismo</a
                >
                <a
                  href="pages_oferta_educativa/produccion_industrial_de_alimentos.php"
                  class="block py-2 px-4 text-gray-700 hover:bg-gray-100"
                  >Producción industrial de alimentos</a
                >
                <a
                  href="pages_oferta_educativa/mantenimiento_industrial.php"
                  class="block py-2 px-4 text-gray-700 hover:bg-gray-100"
                  >Mantenimiento Industrial</a
                >
                <a
                  href="pages_oferta_educativa/servicios_de_hoteleria.php"
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
                  href="pages_alumnos/becas.php"
                  class="block py-2 px-4 text-gray-700 hover:bg-gray-100"
                  >Becas</a
                >
                <a
                  href="pages_alumnos/prog_acompanamiento.php"
                  class="block py-2 px-4 text-gray-700 hover:bg-gray-100"
                  >Programa de Acompañamiento</a
                >
                <a
                  href="pages_alumnos/requisitos_de_ingreso.php"
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
                  >Reglamento Asociaciones de Padres y Madres de Familia CECYTE
                  BCS</a
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
                  href="pages_normatividad/manuales_de_procedimientos.php"
                  class="block py-2 px-4 text-gray-700 hover:bg-gray-100"
                  >Manuales de Procedimientos</a
                >
                <a
                  href="pages_normatividad/manuales_de_org.php"
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
                  href="pages_transparencia/cuenta_publica.php"
                  class="block py-2 px-4 text-gray-700 hover:bg-gray-100"
                  >Cuenta Pública</a
                >
                <a
                  href="pages_transparencia/ley_diciplina.php"
                  class="block py-2 px-4 text-gray-700 hover:bg-gray-100"
                  >Ley de Disciplina Financiera</a
                >
              </div>
            </div>

            <!-- Menú Comunidad -->
            <a
              href="comunidad.php"
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
              href="pages_institucion/"
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
              href="pages_institucion/pagina_historia.php"
              class="block px-8 py-2 text-gray-700 hover:bg-gray-100"
              >Historia, Misión y Visión</a
            >
            <a
              href="pages_institucion/planteles_cecyte.php"
              class="block px-8 py-2 text-gray-700 hover:bg-gray-100"
              >Planteles CecyteBCS</a
            >
            <a
              href="pages_institucion/planteles_emsad.php"
              class="block px-8 py-2 text-gray-700 hover:bg-gray-100"
              >Planteles Emsad</a
            >
            <a
              href="directorio_telefonico.php"
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
              href="pages_oferta_educativa/mantenimiento_equipo_de_computo.php"
              class="block px-8 py-2 text-gray-700 hover:bg-gray-100"
              >Soporte y Mantenimiento de equipo de cómputo</a
            >
            <a
              href="pages_oferta_educativa/programacion.php"
              class="block px-8 py-2 text-gray-700 hover:bg-gray-100"
              >Programación</a
            >
            <a
              href="pages_oferta_educativa/ventas.php"
              class="block px-8 py-2 text-gray-700 hover:bg-gray-100"
              >Ventas</a
            >
            <a
              href="pages_oferta_educativa/ecoturismo.php"
              class="block px-8 py-2 text-gray-700 hover:bg-gray-100"
              >Ecoturismo</a
            >
            <a
              href="pages_oferta_educativa/produccion_industrial_de_alimentos.php"
              class="block px-8 py-2 text-gray-700 hover:bg-gray-100"
              >Producción industrial de alimentos</a
            >
            <a
              href="pages_oferta_educativa/mantenimiento_industrial.php"
              class="block px-8 py-2 text-gray-700 hover:bg-gray-100"
              >Mantenimiento Industrial</a
            >
            <a
              href="pages_oferta_educativa/servicios_de_hoteleria.php"
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
              href="pages_alumnos/becas.php"
              class="block px-8 py-2 text-gray-700 hover:bg-gray-100"
              >Becas</a
            >
            <a
              href="pages_alumnos/prog_acompanamiento.php"
              class="block px-8 py-2 text-gray-700 hover:bg-gray-100"
              >Programa de Acompañamiento</a
            >
            <a
              href="pages_alumnos/requisitos_de_ingreso.php"
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
              >Reglamento Asociaciones de Padres y Madres de Familia CECYTE
              BCS</a
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
              href="pages_normatividad/manuales_de_procedimientos.php"
              class="block px-8 py-2 text-gray-700 hover:bg-gray-100"
              >Manuales de Procedimientos</a
            >
            <a
              href="pages_normatividad/manuales_de_org.php"
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
              href="pages_transparencia/cuenta_publica.php"
              class="block px-8 py-2 text-gray-700 hover:bg-gray-100"
              >Cuenta Pública</a
            >
            <a
              href="pages_transparencia/ley_diciplina.php"
              class="block px-8 py-2 text-gray-700 hover:bg-gray-100"
              >Ley de Disciplina Financiera</a
            >
          </div>
        </div>

        <!-- Comunidad -->
        <a
          href="comunidad.php"
          class="block px-4 py-2 text-gray-700 hover:bg-gray-100"
          >CECYTE es Comunidad</a
        >
      </div>
    </nav>

    <!-- Contenido principal -->
    <main class="pt-20">
      <!-- Hero Section -->
      <section class="bg-gradient-to-r from-green-600 to-green-800 py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
          <!-- Logo grande animado -->
          <div class="mb-8 fade-in">
            <img
              src="img_logos/logo_cecyte_grande.webp"
              alt="CECYTE BCS"
              class="mx-auto h-32 w-auto error-animation"
            />
          </div>

          <!-- Número 404 grande -->
          <div class="mb-8 fade-in">
            <h1 class="text-9xl font-bold text-white mb-4">404</h1>
            <h2 class="text-4xl font-semibold text-white mb-4">
              Página no encontrada
            </h2>
            <p class="text-xl text-green-100 max-w-3xl mx-auto">
              La página que estás buscando no existe o ha sido movida. No te
              preocupes, te ayudamos a encontrar lo que necesitas.
            </p>
          </div>

          <!-- Botones de navegación -->
          <div class="mb-12 fade-in">
            <div
              class="flex flex-col sm:flex-row gap-4 justify-center items-center"
            >
              <a
                href="index.php"
                class="bg-white hover:bg-gray-100 text-green-600 font-semibold py-3 px-8 rounded-lg transition duration-300 transform hover:scale-105 shadow-lg"
              >
                <i class="fas fa-home mr-2"></i>
                Ir al Inicio
              </a>
              <a
                href="javascript:history.back()"
                class="bg-orange-500 hover:bg-orange-600 text-white font-semibold py-3 px-8 rounded-lg transition duration-300 transform hover:scale-105 shadow-lg"
              >
                <i class="fas fa-arrow-left mr-2"></i>
                Página Anterior
              </a>
            </div>
          </div>
        </div>
      </section>

      <!-- Enlaces útiles -->
      <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div class="text-center mb-12 fade-in">
            <h3 class="text-3xl font-bold text-gray-800 mb-4">
              Enlaces útiles
            </h3>
            <p class="text-lg text-gray-600">
              Explora nuestras secciones principales
            </p>
          </div>

          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <a
              href="oferta_educativa.php"
              class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition duration-300 transform hover:scale-105 border-l-4 border-green-500"
            >
              <div class="text-green-600 text-3xl mb-4">
                <i class="fas fa-graduation-cap"></i>
              </div>
              <h4 class="text-xl font-semibold text-gray-800 mb-2">
                Oferta Educativa
              </h4>
              <p class="text-gray-600">Conoce nuestras carreras técnicas</p>
            </a>

            <a
              href="pages_institucion/planteles_cecyte.php"
              class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition duration-300 transform hover:scale-105 border-l-4 border-green-500"
            >
              <div class="text-green-600 text-3xl mb-4">
                <i class="fas fa-school"></i>
              </div>
              <h4 class="text-xl font-semibold text-gray-800 mb-2">
                Planteles
              </h4>
              <p class="text-gray-600">Ubica tu plantel más cercano</p>
            </a>

            <a
              href="noticias.php"
              class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition duration-300 transform hover:scale-105 border-l-4 border-green-500"
            >
              <div class="text-green-600 text-3xl mb-4">
                <i class="fas fa-newspaper"></i>
              </div>
              <h4 class="text-xl font-semibold text-gray-800 mb-2">Noticias</h4>
              <p class="text-gray-600">Últimas noticias y eventos</p>
            </a>

            <a
              href="pages_alumnos/becas.php"
              class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition duration-300 transform hover:scale-105 border-l-4 border-green-500"
            >
              <div class="text-green-600 text-3xl mb-4">
                <i class="fas fa-dollar-sign"></i>
              </div>
              <h4 class="text-xl font-semibold text-gray-800 mb-2">Becas</h4>
              <p class="text-gray-600">Información sobre becas estudiantiles</p>
            </a>

            <a
              href="comunidad.php"
              class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition duration-300 transform hover:scale-105 border-l-4 border-green-500"
            >
              <div class="text-green-600 text-3xl mb-4">
                <i class="fas fa-users"></i>
              </div>
              <h4 class="text-xl font-semibold text-gray-800 mb-2">
                Comunidad
              </h4>
              <p class="text-gray-600">Únete a nuestra comunidad educativa</p>
            </a>

            <a
              href="pages_transparencia/cuenta_publica.php"
              class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition duration-300 transform hover:scale-105 border-l-4 border-green-500"
            >
              <div class="text-green-600 text-3xl mb-4">
                <i class="fas fa-chart-bar"></i>
              </div>
              <h4 class="text-xl font-semibold text-gray-800 mb-2">
                Transparencia
              </h4>
              <p class="text-gray-600">
                Información pública y rendición de cuentas
              </p>
            </a>
          </div>
        </div>
      </section>

      <!-- Información de contacto -->
      <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
          <div class="bg-gray-50 rounded-xl p-8 fade-in">
            <h3 class="text-2xl font-bold text-gray-800 mb-6">
              ¿Necesitas ayuda?
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              <div class="flex items-center justify-center">
                <div class="text-green-600 text-2xl mr-4">
                  <i class="fas fa-phone"></i>
                </div>
                <div class="text-left">
                  <p class="font-semibold text-gray-800">Teléfono</p>
                  <p class="text-gray-600">(612) 124-0430</p>
                </div>
              </div>
              <div class="flex items-center justify-center">
                <div class="text-green-600 text-2xl mr-4">
                  <i class="fas fa-envelope"></i>
                </div>
                <div class="text-left">
                  <p class="font-semibold text-gray-800">Email</p>
                  <p class="text-gray-600">informatica@cecytebcs.edu.mx</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white">
      <div class="border-t-4 border-gray-400"></div>
      <div class="mx-auto w-full max-w-screen-xl">
        <div class="grid grid-cols-2 gap-8 px-4 py-6 lg:py-8 md:grid-cols-4">
          <div>
            <h2
              class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white"
            >
              Sitios de Interés
            </h2>
            <ul class="text-gray-500 dark:text-gray-400 font-medium">
              <li class="mb-4">
                <a href="https://itaibcs.net/" class="hover:underline"
                  >ITAI del Estado de B.C.S.</a
                >
              </li>
              <li class="mb-4">
                <a
                  href="https://transparencia.cre.gob.mx/plataforma-nacional-de-transparencia-sipot/"
                  class="hover:underline"
                  >SIPOT</a
                >
              </li>
              <li class="mb-4">
                <a
                  href="https://cecytebcs.edu.mx/intranet/"
                  class="hover:underline"
                  >Intranet</a
                >
              </li>
              <li class="mb-4">
                <a
                  href="https://docs.google.com/forms/d/e/1FAIpQLSfOfmG7BHg8p731LYgcVC5WO5l3hzCtjJqzxMrkgByNG4Iz5A/viewform"
                  class="hover:underline"
                  >Buzón de quejas</a
                >
              </li>
            </ul>
          </div>
          <div>
            <h2
              class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white"
            >
              Domicilio
            </h2>
            <ul class="text-gray-500 dark:text-gray-400 font-medium">
              <li class="mb-4">
                <p>Golfo de California No. 190</p>
              </li>
              <li class="mb-4">
                <p>Col. El Conchalito.</p>
              </li>
              <li class="mb-4">
                <p>La Paz, B.C.S.</p>
              </li>
              <li class="mb-4">
                <p>C.P. 23090</p>
              </li>
            </ul>
          </div>
          <div>
            <h2
              class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white"
            >
              Contacto
            </h2>
            <ul class="text-gray-500 dark:text-gray-400 font-medium">
              <li class="mb-4">
                <p>Teléfono: (612) 124-0430</p>
              </li>
              <li class="mb-4">
                <p>Email: informatica@cecytebcs.edu.mx</p>
              </li>
            </ul>
          </div>
          <div>
            <h2
              class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white"
            >
              Redes Sociales
            </h2>
            <div class="flex space-x-4">
              <a
                href="https://www.facebook.com/DGCECYTEBCS"
                class="text-gray-500 hover:text-white"
              >
                <i class="fab fa-facebook text-2xl"></i>
              </a>
              <a
                href="https://x.com/CECYTE_BCS"
                class="text-gray-500 hover:text-white"
              >
                <i class="fab fa-twitter text-2xl"></i>
              </a>
              <a
                href="https://www.instagram.com/cecyte_bcs/"
                class="text-gray-500 hover:text-white"
              >
                <i class="fab fa-instagram text-2xl"></i>
              </a>
              <a
                href="https://www.youtube.com/@ProcesosInform%C3%A1ticaCecytebcs/shorts"
                class="text-gray-500 hover:text-white"
              >
                <i class="fab fa-youtube text-2xl"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="px-4 py-6 md:flex md:items-center md:justify-between">
          <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">
            © 2025 CECYTE BCS - Colegio de Estudios Científicos y Tecnológicos
            de Baja California Sur
          </span>
        </div>
      </div>
    </footer>

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
      const normatividadSubmenu = document.getElementById(
        "normatividad-submenu"
      );
      const transparenciaBtn = document.getElementById("transparencia-btn");
      const transparenciaSubmenu = document.getElementById(
        "transparencia-submenu"
      );

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

      // Efectos adicionales
      document.addEventListener("DOMContentLoaded", function () {
        // Agregar efecto de hover a los enlaces útiles
        const usefulLinks = document.querySelectorAll(".grid a");
        usefulLinks.forEach((link) => {
          link.addEventListener("mouseenter", function () {
            this.style.transform = "translateY(-2px)";
          });
          link.addEventListener("mouseleave", function () {
            this.style.transform = "translateY(0)";
          });
        });
      });
    </script>
  </body>
</html>
