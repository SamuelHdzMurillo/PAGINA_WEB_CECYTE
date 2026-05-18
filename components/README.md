# Componente de Navbar - CECYTE BCS

## 📋 Descripción

Este componente de navbar en PHP es completamente reutilizable y se adapta automáticamente a la ubicación de la página donde se incluya. Mantiene el mismo diseño y funcionalidad del navbar original, pero con navegación inteligente.

## 🚀 Características

- ✅ **Navegación Inteligente**: Detecta automáticamente la ubicación de la página
- ✅ **Rutas Relativas**: Ajusta todas las rutas según el directorio actual
- ✅ **Responsive**: Menú móvil completo con dropdowns
- ✅ **Mismo Estilo**: Conserva el diseño original con Tailwind CSS
- ✅ **Fácil Uso**: Una sola línea de código para incluir

## 📁 Estructura de Archivos

```
components/
├── navbar.php          # Componente principal del navbar
├── navbar_simple.php   # Componente simplificado del navbar
└── README.md          # Este archivo de documentación
```

## 🔧 Instalación y Uso

### 1. Incluir el Navbar

Para usar el navbar en cualquier página PHP, simplemente incluye el archivo:

```php
// Componente principal (recomendado)
<?php include 'components/navbar.php'; ?>

// O componente simplificado
<?php include 'components/navbar_simple.php'; ?>
```

### 2. Desde Diferentes Directorios

El componente funciona desde cualquier ubicación:

```php
// Desde el directorio raíz
<?php include 'components/navbar.php'; ?>

// Desde pages_institucion/
<?php include '../components/navbar.php'; ?>

// Desde pages_oferta_educativa/
<?php include '../components/navbar.php'; ?>

// Desde pages_alumnos/
<?php include '../components/navbar.php'; ?>

// Desde pages_normatividad/
<?php include '../components/navbar.php'; ?>

// Desde pages_transparencia/
<?php include '../components/navbar.php'; ?>
```

## 🎯 Funcionamiento

### Detección Automática de Rutas

El componente utiliza la función `getBasePath()` que:

1. Analiza la URL actual (`$_SERVER['REQUEST_URI']`)
2. Cuenta los niveles de directorio
3. Genera la ruta base apropiada (`../`, `../../`, etc.)
4. Aplica esta ruta a todos los enlaces

### Ejemplo de Rutas Generadas

| Ubicación de la Página                     | Ruta Base Generada | Ejemplo de Enlace |
| ------------------------------------------ | ------------------ | ----------------- |
| `/index.php`                               | `` (vacío)         | `index.php`       |
| `/pages_institucion/historia.php`          | `../`              | `../index.php`    |
| `/pages_oferta_educativa/programacion.php` | `../`              | `../index.php`    |

## 📱 Características del Menú Móvil

- **Menú Hamburguesa**: Se activa en pantallas pequeñas
- **Dropdowns**: Todos los submenús funcionan en móvil
- **Animaciones**: Transiciones suaves
- **JavaScript Incluido**: No requiere archivos adicionales

## 🧪 Componentes Disponibles

### Navbar Principal

- **Archivo**: `components/navbar.php`
- **Funciones**: Componente completo con todas las funcionalidades
- **Características**: Debug incluido, detección de rutas

### Navbar Simplificado

- **Archivo**: `components/navbar_simple.php`
- **Funciones**: Componente simplificado y optimizado
- **Características**: Lógica más directa, siempre enlaces HTML

## 🔗 Enlaces Incluidos

### Menús Principales

- **Docentes**: Convocatorias, Centro Virtual
- **Institución**: Historia, Planteles, Directorio
- **Oferta Educativa**: Todas las carreras técnicas
- **Alumnos**: Becas, Programas, Reglamentos
- **Normatividad**: Manuales, Códigos, Protocolos
- **Transparencia**: Artículo 75, Cuenta Pública
- **Comunidad**: CECYTE es Comunidad

### Enlaces Externos

- Centro Virtual 2024-2025
- Reglamentos (Google Drive)
- Código de Ética (Gobierno)
- Portal de Transparencia

## 🎨 Estilos y Dependencias

### CSS Framework

- **Tailwind CSS**: Para todos los estilos
- **Font Awesome**: Para iconos
- **Flowbite**: Para componentes interactivos

### Estilos Personalizados

- Gradientes en hover
- Sombras y transiciones
- Diseño responsive
- Efectos de animación

## 🔧 Personalización

### Modificar Enlaces

Edita el archivo `components/navbar.php` y actualiza las rutas según necesites.

### Agregar Nuevos Menús

1. Añade el HTML del menú en la sección desktop
2. Añade el HTML del menú en la sección móvil
3. Actualiza el JavaScript para el nuevo dropdown

### Cambiar Estilos

Modifica las clases de Tailwind CSS en el archivo del componente.

## 🐛 Solución de Problemas

### Enlaces No Funcionan

- Verifica que la ruta de inclusión sea correcta
- Asegúrate de que los archivos de destino existan
- Revisa los permisos de archivo

### Estilos No Se Aplican

- Verifica que Tailwind CSS esté cargado
- Asegúrate de que Font Awesome esté incluido
- Revisa la consola del navegador por errores

### Menú Móvil No Funciona

- Verifica que el JavaScript esté incluido
- Asegúrate de que los IDs de los elementos sean únicos
- Revisa la consola por errores de JavaScript

## 📞 Soporte

Para soporte técnico o preguntas sobre el componente, contacta al Departamento de Informática de CECYTE BCS.

---

**Desarrollado por**: CECYTE BCS - Departamento de Informática  
**Versión**: 1.0  
**Última actualización**: Diciembre 2024
